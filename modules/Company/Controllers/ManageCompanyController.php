<?php

namespace Modules\Company\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Company\Models\Company;
use Modules\Company\Models\CompanyCategory as Category;
use Modules\Company\Models\CompanyTerm;
use Modules\Company\Models\CompanyTranslation;
use Modules\Core\Models\Attributes;
use Modules\FrontendController;
use Modules\Language\Models\Language;
use Modules\Location\Models\Location;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Arr;
use App\User;
use Validator;

class ManageCompanyController extends FrontendController{

    protected $attributes;
    protected $location;
    protected $company;
    protected $company_translation;
    protected $category;
    protected $language;
    protected $company_term;

    public function __construct(){

        $this->attributes = Attributes::class;
        $this->company = Company::class;
        $this->location = Location::class;
        $this->category = Category::class;
        $this->company_translation = CompanyTranslation::class;
        $this->language = Language::class;
        $this->company_term = CompanyTerm::class;

    }

    public function companyProfile(Request $request){

        $this->checkPermission('employer_manage');

        $row = $this->company::where('owner_id', Auth::id())->first();

        if(empty($row)){
            $user = auth()->user();
            $row = new $this->company;
            $row->owner_id = auth()->id();
            $row->email = $user->email;
            $row->name = $user->display_name;
            $row->save();
        }

        $translation = $row->translateOrOrigin($request->query('lang'));
        $data = [
            'row'  => $row,
            'categories'        => $this->category::get()->toTree(),
            'attributes'     => $this->attributes::where('service', 'company')->get(),
            'company_location'     => $this->location::where('status', 'publish')->get()->toTree(),
            'translation'  => $translation,
            'enable_multi_lang'=>true,
            'page_title'=>__("Company Profile"),
            'menu_active' => 'company_profile',
            "selected_terms"    => $row->companyTerm ? $row->companyTerm->pluck('term_id') : [],
            'is_user_page' => true,
            'percentage' => $this->getProfilePercent($row),
        ];
        return view('Company::frontend.layouts.manageCompany.detail', $data);
    }

    public function companyUpdate(Request $request){
        $this->checkPermission('employer_manage');
        $input = $request->input();

        $row = $this->company::where('owner_id', Auth::id())->first();

        
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:bc_companies,email,'.$row->id,
            'phone'=>'required|max:30',
            'founded_in' => 'sometimes|date_format:Y/m/d',
        ]);
        
        if(empty($row)){
            return redirect(route('user.company.profile'))->with('error', __("No company found"));
        }
        
        $user = User::where('id',Auth::id())->first();
        // if($user->email != $input['email']) {
        //     $user->update(['email' => $input['email']]);
        //     $row->update(['email' => $input['email']]);
        // }


        if(!empty($user->phone) ) {
            if($user->phone != $input['phone']) {
                $user->update([
                    'phone' => $input['phone'],
                    'phone_verified_at' => null,
                    'otp' => null,
                    'otp_expired_at' => null,
                ]);
            }
        } else {
            $user->update([
                'phone' => $input['phone'],
                'phone_verified_at' => $user->phone_verified_at,
                'otp' => $user->otp,
                'otp_expired_at' => $user->otp_expired_at,
            ]);
        }

        $attr = [
            'name',
            'email',
            'website',
            'location_id',
            'avatar_id',
            'founded_in',
            'category_id',
            'map_lat',
            'map_lng',
            'status',
            'about',
            'social_media',
            'city',
            'state',
            'country',
            'address',
            'team_size',
            'is_featured',
            'zip_code',
            'allow_search'
        ];
        
        if(!empty($input['founded_in'])) {
            $date = date('Y-m-d',strtotime($input['founded_in']));
            $input['founded_in'] = $date;
        } else {
            $input['founded_in'] = null;
        }

        $input['team_size'] = !empty($input['team_size']) ? $input['team_size'] : 0;

        $row->fillByAttr($attr, $input);
        if($request->input('slug')){
            $row->slug = $request->input('slug');
        }

        $res = $row->saveOriginOrTranslation($request->query('lang'),true);

        if ($res) {
            if (!$request->input('lang') or is_default_lang($request->input('lang'))) {
                $this->saveTerms($row, $request);
            }
            return back()->with('success',  __('Company updated') );
        }
    }

    public function saveTerms($row, $request)
    {
        if (empty($request->input('terms'))) {
            $this->company_term::where('company_id', $row->id)->delete();
        } else {
            $term_ids = $request->input('terms');
            foreach ($term_ids as $term_id) {
                $this->company_term::firstOrCreate([
                    'term_id' => $term_id,
                    'company_id' => $row->id
                ]);
            }
            $this->company_term::where('company_id', $row->id)->whereNotIn('term_id', $term_ids)->delete();
        }
    }

    private function getProfilePercent($company)
    {
        $errorMessages = [
            "name" => 'Name must be filled',
            "email" => 'Email must be filled',
            "phone" => 'Please provide Phone number to get updates',
            "phone_verified_at" => 'Verified phone number is necessary',
            "website" => 'Website link',
            "founded_in" => 'Est. Since date is needed',
            "terms" => 'Provide your company size',
            "about" => 'Tell us a brief about your company',
            "city" => 'Which city do live in?',
            "state" => 'Provide state',
            "country" => 'Tell us which country you belong to.',
            "address" => 'Provide residential location',
            "category_id" => 'What kind of category your company belongs to',
        ];

        $userAttributes = Arr::only($company->attributesToArray(), [
            "name",
            "email",
            "phone",
            "phone_verified_at",
            "website",
            "founded_in",
            "about",
            "city",
            'terms',
            "state",
            "country",
            "address",
            "category_id",
        ]);
        $userAttributes['phone'] = auth()->user()->phone ?? null;
        $userAttributes['phone_verified_at'] = auth()->user()->phone_verified_at ?? null;
        $userAttributes['terms'] = $company?->companyTerm?->count() ?? 0;

        $percentage['Over All Profile'] = $this->calculatePercent($userAttributes);
        $percentage['Basic Information'] = $this->calculatePercent(Arr::only($userAttributes, [
            "name",
            "email",
            "phone",
            "phone_verified_at",
            "website",
            "founded_in",
        ]));
        $percentage['Address Section'] = $this->calculatePercent(Arr::only($userAttributes, [
            "city",
            "state",
            "country",
            "address",
        ]));
        $percentage['About Section'] = $this->calculatePercent(Arr::only($userAttributes, [
            "about",
            "terms",
            "category_id",
        ]));
        
        $errorList = array_diff_assoc($userAttributes, array_filter($userAttributes, function ($value) {
            return !empty(trim($value));
        }));
        foreach ($errorList as $columnId => $v) {
            $percentage['errors'][] = $errorMessages[$columnId] ?? $columnId;
        }
        return $percentage;
    }

    private function calculatePercent($userAttributes)
    {
        if (count($userAttributes) < 1) {
            return 0;
        } else {
            $complete = array_filter($userAttributes, function ($value) {
                return !empty(trim($value));
            });
            return round((count($complete) / count($userAttributes)) * 100, 2);
        }
    }
}
