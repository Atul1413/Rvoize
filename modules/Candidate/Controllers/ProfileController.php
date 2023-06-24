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
use Illuminate\Support\Facades\Log;
use Illuminate\Support\MessageBag;
use Validator;


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
            "avatar_id" => 'Upload candidate picture',
            "bio" => 'Help us know you better by telling About yourself',
            "phone" => 'Please provide Phone number to get updates',
            "phone_verified_at" => 'Verified phone number is necessary',
            "title" => 'Current position of candidate',
            "website" => 'Website link',
            "gender" => 'Gender of candidate',
            "expected_salary" => 'Expected salary should be given',
            "salary_type" => 'Provide salary type',
            "experience_year" => 'Experience is essential to get you selected. Provide',
            "education_level" => 'Highest Qualification Level is mandatory',
            "languages" => 'Languages known',
            "video" => 'Video of candidate',
            "gallery" => 'Images of candidate',
            "country" => 'Country candidate is residing in',
            "city" => 'City candidate lives in',
            "address" => 'Help us to reach you by filling up address',
            "map_lat" => 'Map Latitude',
            "map_lng" => 'Map Longitude',
            "education" => 'Atleast one Education details must be provided',
            "experience" => 'Atleast one Experience details must be provided',
            "award" => 'Atleast one Award/achievement detail must be given',
            "social_media" => 'Atleast one Social link must be provided',
            "categories" => 'Atleast one Category must be selected',
            "skills" => 'Atleast one Skill must be selected',
        ];

        $userAttributes = Arr::only($user->attributesToArray(), [
            "first_name",
            "last_name",
            "bio",
            "avatar_id",
        ]);

        $candidateRelationAttributes = $user->relationsToArray() ?? [];
        if (!empty($candidateRelationAttributes) && !empty($candidateRelationAttributes['candidate'])) {
            $candidateRelationAttributes = Arr::only($candidateRelationAttributes['candidate'], [
                "title",
                'phone',
                'phone_verified_at',
                "website",
                "gender",
                "expected_salary",
                "salary_type",
                "experience_year",
                "education_level",
                "languages",
                "video",
                "gallery",
                "country",
                "city",
                "address",
                "map_lat",
                "map_lng",
                // hasMany Relational Values
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
                $userAttributes[$key] = count($value);
            } else {
                $userAttributes[$key] = trim($value);
            }
        }

        $percentage['Over All Profile'] = $this->calculatePercent($userAttributes);
        $percentage['Information Section'] = $this->calculatePercent(Arr::only($userAttributes, [
            "first_name",
            "last_name",
            "avatar_id",
            "bio",
            "phone",
            "phone_verified_at",
            "website",
            "gender",
            "video",
            "gallery",
        ]));
        $percentage['Location Section'] = $this->calculatePercent(Arr::only($userAttributes, [
            "country",
            "city",
            "address",
            "map_lat",
            "map_lng",
        ]));
        $percentage['Criteria Section'] = $this->calculatePercent(Arr::only($userAttributes, [
            "title",
            "expected_salary",
            "salary_type",
            "experience_year",
            "education_level",
            "languages",
        ]));
        $percentage['EEA Section'] = $this->calculatePercent(Arr::only($userAttributes, [
            "education",
            "experience",
            "award",
            "social_media",
            'skills',
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

        $request->validate([
            'first_name'              => 'required|max:255',
            'last_name'              => 'required|max:255',
            'title'              => 'required|max:255',
            'phone'              => 'required|max:30',
        ]);

        $user = auth()->user();
        $candidate = $user->candidate ?? $this->candidate;
        $candidate->id = $user->id;


        $user->fillByAttr([
            'first_name',
            'last_name',
            'avatar_id',
            'bio',
        ], $request->input());

        $user->save();
      
        if(!empty($candidate->phone) && ($candidate->phone != $request->phone)) {
            $request->merge([
                'phone_verified_at' => null,
                'otp' => null,
                'otp_expired_at' => null,
            ]);
        } else {
            $request->merge([
                'phone_verified_at' => $candidate->phone_verified_at,
                'otp' => $candidate->otp,
                'otp_expired_at' => $candidate->otp_expired_at,
            ]);
        }


        $candidate->fillByAttr([
            'title',
            'phone',
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
            'phone_verified_at',
            'otp',
            'otp_expired_at',

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
    
    public function sendOtp(Request $request) {

        $rules = [ 'id' => [ 'required'] ];
        $messages = [ 'id.required' => __('Email is required field') ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validator->errors()
            ], 200);
        }

        $candidate = Candidate::where('id', (int) $request->id ?? 0)->first() ?? [];
        if(empty($candidate)) {
            $errors = new MessageBag(['candidate' => __('No candidate found')]);
            return response()->json([
                'error'    => true,
                'messages' => $errors
            ], 200);
        }

        if(empty($candidate->phone)) {
            $errors = new MessageBag(['phone' => __('Phone must be filled in order to send OTP')]);
            return response()->json([
                'error'    => true,
                'messages' => $errors
            ], 200);
        }

       

        $sender ='SEMPWR';
        $mob = (int) trim($candidate->phone);
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
            $candidate->update([
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

        $candidate = Candidate::select('id','otp','otp_expired_at','phone','phone_verified_at')
                                ->where('id', (int) $request->id ?? 0)
                                ->first() ?? [];

        if(empty($candidate->phone)) {
            $errors = new MessageBag(['phone' => __('Phone must be filled in order to send OTP')]);
            return response()->json([
                'error'    => true,
                'messages' => $errors
            ], 200);
        }

        if(empty($candidate->otp)) {
            $errors = new MessageBag(['phone' => __('OTP request not given yet. Please click Send OTP')]);
            return response()->json([
                'error'    => true,
                'messages' => $errors
            ], 200);
        }
        if(new DateTime() <= $candidate->otp_expired_at) {
            if($candidate->otp == $request->otp) {
                $candidate->update([
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
            $candidate->update([
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
}
