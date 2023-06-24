<?php

namespace Modules\Candidate\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Candidate\Models\Candidate;
use Modules\Candidate\Models\CandidateCategories;
use Modules\Candidate\Models\CandidateCvs;
use Modules\Candidate\Models\CandidateSkills;
use Modules\Candidate\Models\Category;
use Modules\FrontendController;
use Modules\Location\Models\Location;
use Modules\Skill\Models\Skill;
use Illuminate\Support\Arr;


class ProfileController extends FrontendController
{
    /**
     * @var Candidate
     */
    private $candidate;

    public function __construct(Candidate $candidate)
    {
        parent::__construct();
        $this->candidate = $candidate;
    }

    public function index(){
        if(!is_candidate()) abort(403);

        $user = auth()->user();

        $data = [
            'row'=>$user->candidate ?? $this->candidate,
            'page_title'=>__("Candidate Profile"),
            'user'=>$user,
            'is_user_page'     => true,
            'locations' => Location::query()->where('status', 'publish')->get()->toTree(),
            'categories' => Category::get()->toTree(),
            'skills' => Skill::query()->where('status', 'publish')->get(),
            'cvs'   => CandidateCvs::query()->where('origin_id', $user->id)->with('media')->get(),
            'menu_active' => 'user_profile',
            'languages' => config('languages.locales'),
            'percentage' => $this->getProfilePercent($user)
        ];
        return view('Candidate::frontend.profile.edit',$data);
    }

    private function getProfilePercent($user)
    {
        $errorMessages = [
            "first_name" => 'First name must be filled',
            "last_name" => 'Last name must be filled',
            "email" => 'Email is required',
            "bio" => 'Help us know you better by telling about yourself',
            "phone" => 'Please provide contact number to get updates',
            "phone_verified_at" => 'Verified phone number is necessary',
            "title" => 'Current position of candidate',
            "gender" => 'Gender of candidate',
            "expected_salary" => 'Expected salary must be mentioned',
            "salary_type" => 'Provide salary type',
            "experience_year" => 'Experience is essential to get you selected. Provide',
            "education_level" => 'Highest Qualification Level is mandatory',
            "languages" => 'Verbal languages known',
            "country" => 'Country candidate is residing in',
            "city" => 'City candidate lives in',
            "address" => 'Help us to reach you by filling up address',
            "map_lat" => 'Map Latitude',
            "map_lng" => 'Map Longitude',
            "education" => 'Atleast one Education details must be provided',
            "experience" => 'Atleast one Experience details must be provided',
            "award" => 'Atleast one Award/Certifications detail must be given',
            "social_media" => 'Atleast one Social link must be provided',
            "categories" => 'Atleast one Category must be selected',
            "skills" => 'Atleast one Skill must be selected',
        ];

        $userAttributes = Arr::only($user->attributesToArray(), [
            "first_name",
            "last_name",
            "bio",
            'email',
            'phone',
            'phone_verified_at',
        ]);

        $candidateRelationAttributes = $user->relationsToArray() ?? [];
        if (!empty($candidateRelationAttributes) && !empty($candidateRelationAttributes['candidate'])) {
            $candidateRelationAttributes = Arr::only($candidateRelationAttributes['candidate'], [
                "title",
                "gender",
                "expected_salary",
                "salary_type",
                "experience_year",
                "education_level",
                "languages",
                "country",
                "city",
                "address",
                "education",
                "experience",
                "award",
                "social_media",
            ]);
            $candidateRelationAttributes['categories'] = $user->candidate?->categories?->count() ?? 0;
            $candidateRelationAttributes['skills'] = $user->candidate?->skills?->count() ?? 0;
            $userAttributes = array_merge($userAttributes, $candidateRelationAttributes);
        }


        foreach ($userAttributes as $key => $value) {
            if (is_array($value)) {
                $userAttributes[$key] = count(array_filter($value));
            } else {
                $userAttributes[$key] = trim($value);
            }
        }

        $percentage['Over All Profile'] = $this->calculatePercent($userAttributes);
        $percentage['Basic Section'] = $this->calculatePercent(Arr::only($userAttributes, [
            "first_name",
            "last_name",
            "bio",
            "phone",
            "phone_verified_at",
            "gender",
            "address",
            "city",
            "country",
            "languages",
        ]));
        
        $percentage['Qualification Section'] = $this->calculatePercent(Arr::only($userAttributes, [
            "education",
            "experience",
            "award",
            'skills',
        ]));
        $percentage['Job Preferences'] = $this->calculatePercent(Arr::only($userAttributes, [
            "title",
            "social_media",
            "expected_salary",
            "salary_type",
            "experience_year",
            "education_level",
            'categories',
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

    public function store(Request $request){
        $user = auth()->user();
        $request->validate([
            'first_name'              => 'required|max:255',
            'last_name'              => 'required|max:255',
            'title'              => 'required|max:255',
            'phone'              => 'required|max:30',
            'email'              => 'required|max:255|unique:users,email,'.$user->id,
        ]);

        
        $candidate = $user->candidate ?? $this->candidate;
        $candidate->id = $user->id;


        if(!empty($user->phone) && ($user->phone != $request->phone)) {
            $request->merge([
                'phone_verified_at' => null,
                'otp' => null,
                'otp_expired_at' => null,
            ]);
        } else {
            $request->merge([
                'phone_verified_at' => $user->phone_verified_at,
                'otp' => $user->otp,
                'otp_expired_at' => $user->otp_expired_at,
            ]);
        }

        $user->fillByAttr([
            'first_name',
            'last_name',
            'avatar_id',
            'bio',
            'email',
            'phone',
            'phone_verified_at',
            'otp',
            'otp_expired_at',
        ], $request->input());

        $user->save();
      
       


        $candidate->fillByAttr([
            'title',
            'gallery',
            'video',
            'gender',
            'expected_salary',
            'salary_type',
            'website',
            'education_level',
            'experience_year',
            'languages',
            'allow_search',
         
            'address',
            'city',
            'country',
            'location_id',
            'map_lat',
            'map_lng',
            'map_zoom',

            'education',
            'experience',
            'award',
            'social_media',
            'video_cover_id'

        ], $request->input());

        $candidate->save();

        if(!empty($request->input('languages')))
        {
            $candidate->languages = implode(',',$request->input('languages'));
        }else{
            $candidate->languages = '';
        }

        $candidate->saveOriginOrTranslation($request->query('lang'),true);


        $uploadedCandidate = CandidateCvs::query()->where('origin_id', $user->id)->pluck('file_id')->toArray();
        $cvUpload = $request->input('cvs', []);
        if(!empty($cvUpload)) {
            CandidateCvs::query()->where('origin_id', $user->id)->whereNotIn('file_id', $cvUpload)->delete();
            foreach ($cvUpload as $oneCv) {
                if (in_array($oneCv, $uploadedCandidate)) {
                    continue;
                }
                $cv = new CandidateCvs();
                $cv->file_id = $oneCv;
                $cv->origin_id = $user->id;
                $cv->is_default = 0;
                $cv->create_user = Auth::id();
                $cv->save();
            }

            //Update Default CV
            CandidateCvs::query()->where("origin_id", $user->id)->update(['is_default' => 0]);
            CandidateCvs::query()->where("origin_id", $user->id)->where('file_id', @$request->csv_default)->update(['is_default' => 1]);
        }

        if(!empty($request->skills)){
            $cSkills =  CandidateSkills::query()->where('origin_id', $user->id)->pluck('skill_id')->toArray();
            foreach($request->skills as $skill){
                $pos = array_search(intval($skill), $cSkills);
                if($pos !== false){
                    unset($cSkills[$pos]);
                }else{
                    DB::table('bc_candidate_skills')->insert([
                        'origin_id'       => $user->id,
                        'skill_id'        => $skill
                    ]);
                }
            }
            if(!empty($cSkills)){
                CandidateSkills::query()->where('origin_id', $user->id)->whereIn('skill_id', $cSkills)->delete();
            }
        }else{
            CandidateSkills::query()->where('origin_id', $user->id)->delete();
        }

        if(!empty($request->categories)){
            $cCats =  CandidateCategories::query()->where('origin_id', $user->id)->pluck('cat_id')->toArray();
            foreach($request->categories as $category){
                $pos = array_search(intval($category), $cCats);
                if($pos !== false){
                    unset($cCats[$pos]);
                }else{
                    DB::table('bc_candidate_categories')->insert([
                        'origin_id'       => $user->id,
                        'cat_id'        => $category
                    ]);
                }
            }
            if(!empty($cCats)){
                CandidateCategories::query()->where('origin_id', $user->id)->whereIn('cat_id', $cCats)->delete();
            }
        }else{
            CandidateCategories::query()->where('origin_id', $user->id)->delete();
        }

        return back()->with('success',__("Candidate profile saved"));
    }
    
  
}
