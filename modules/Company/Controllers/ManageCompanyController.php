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
            'email'=>'required|email',
            'phone'=>'required|max:30',
            'founded_in' => 'sometimes|date_format:Y/m/d',
        ]);
       
        if(empty($row)){
            return redirect(route('user.company.profile'))->with('error', __("No company found"));
        }


        if(!empty($row->phone) && ($row->phone != $input['phone'])) {
            $input['phone_verified_at'] = null;
            $input['otp'] = null;
            $input['otp_expired_at'] = null;
              
        } else {
            $input['phone_verified_at'] = $row->phone_verified_at;
            $input['otp'] = $row->otp;
            $input['otp_expired_at'] = $row->otp_expired_at;
        }


        $attr = [
            'name',
            'email',
            'phone',
            'phone_verified_at',
            'otp',
            'otp_expired_at',
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

    public function sendOtp(Request $request) {

        $rules = [ 'id' => [ 'required'] ];
        $messages = [ 'id.required' => __('Company is required field') ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validator->errors()
            ], 200);
        }

        $company = Company::where('id', (int) $request->id ?? 0)->first() ?? [];
        if(empty($company)) {
            $errors = new MessageBag(['candidate' => __('No company found')]);
            return response()->json([
                'error'    => true,
                'messages' => $errors
            ], 200);
        }

        if(empty($company->phone)) {
            $errors = new MessageBag(['phone' => __('Phone must be filled in order to send OTP')]);
            return response()->json([
                'error'    => true,
                'messages' => $errors
            ], 200);
        }
       

        $sender ='SEMPWR';
        $mob = (int) trim($company->phone);
        $auth='D!~7363OldbDTVDFK';
        $entity_id = '1201160637699734120';
        $template_id = '1207162695833282772';
        $otp = random_int(100000, 999999);


        $msg = urlencode('Welcome to eMpower. Your OTP for the user registration is '. $otp); 
        
        $url = 'http://aquicksms.com/API/sms-api.php?auth='.$auth.'&msisdn='.$mob.'&senderid='.$sender.'&entity_id='.$entity_id.'&template_id='.$template_id.'&message='.$msg;  // API URL
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // change to 1 to verify cert
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        try {
            $result = json_decode(curl_exec($ch),true);
        } catch(\Exception $exception) {
            Log::warning("Failed to Send SMS : ". $exception->getMessage());
            $errors = new MessageBag(['failed' => $exception->getMessage()]);
            return response()->json([
                'error'    => true,
                'messages' => $errors
            ], 200);
        }

        if($result['status'] == 'success' && $result['code'] == 100) {
            $company->update([
                'otp' => $otp,
                'otp_expired_at' => now()->addMinutes(5),
            ]);
            return response()->json([
                'error'    => false,
                'messages' => 'SMS Sent'
            ], 200);
        } else {
            $errors = new MessageBag(['failed' => __('Oops! Failed to Send SMS')]);
            return response()->json([
                'error'    => true,
                'messages' => $errors
            ], 200);
        }
  
        
    }

    public function verifyNumber(Request $request) {
        $rules = [ 'id' => [ 'required'] , 'otp' => ['required','digits:6'] ];
        $messages = [ 'id.required' => __('Candidate ID is required'), 'otp.required' => __('OTP is required'), 'otp.digits' => __('OTP must exactly be of 6 digits') ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validator->errors()
            ], 200);
        }

        $company = Company::select('id','otp','otp_expired_at','phone','phone_verified_at')
                                ->where('id', (int) $request->id ?? 0)
                                ->first() ?? [];

        if(empty($company->phone)) {
            $errors = new MessageBag(['phone' => __('Phone must be filled in order to send OTP')]);
            return response()->json([
                'error'    => true,
                'messages' => $errors
            ], 200);
        }

        if(empty($company->otp)) {
            $errors = new MessageBag(['phone' => __('OTP request not given yet. Please click Send OTP')]);
            return response()->json([
                'error'    => true,
                'messages' => $errors
            ], 200);
        }
        if(new DateTime() <= $company->otp_expired_at) {
            if($company->otp == $request->otp) {
                $company->update([
                    'phone_verified_at' => now(),
                    'otp' => null,
                    'otp_expired_at' => null,
                ]);
                return response()->json([
                    'error'    => false,
                    'messages' => 'Profile Verified'
                ], 200);
                
            } {
                $errors = new MessageBag(['phone' => __('Oops! OTP does not match. Please check again')]);
                return response()->json([
                    'error'    => true,
                    'messages' => $errors
                ], 200);
            }
        } else {
            $company->update([
                'otp' => null,
                'otp_expired_at' => null,
            ]);
            $errors = new MessageBag(['phone' => __('OTP has exceeded expiry time. Please request a another OTP')]);
            return response()->json([
                'error'    => true,
                'messages' => $errors
            ], 200);
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
