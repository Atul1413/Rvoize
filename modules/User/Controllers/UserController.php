<?php
namespace Modules\User\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Log;
use Matrix\Exception;
use Modules\Candidate\Models\Candidate;
use Modules\FrontendController;
use Modules\User\Events\NewVendorRegistered;
use Modules\User\Events\SendMailUserRegistered;
use Modules\User\Events\UserSubscriberSubmit;
use Modules\User\Models\Subscriber;
use Modules\User\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use Validator;
use Modules\Booking\Models\Booking;
use App\Helpers\ReCaptchaEngine;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Modules\Booking\Models\Enquiry;
use Modules\Company\Models\Company;
use Modules\Company\Models\CompanyRequest;


class UserController extends FrontendController
{
    use AuthenticatesUsers;

    protected $enquiryClass;
    protected $company;

    public function __construct()
    {
        $this->enquiryClass = Enquiry::class;
        $this->company = Company::class;
        parent::__construct();
    }

    public function dashboard(Request $request)
    {
        $this->checkPermission('dashboard_vendor_access');
        $user_id = Auth::id();
        $data = [
            'cards_report'       => Booking::getTopCardsReportForVendor($user_id),
            'earning_chart_data' => Booking::getEarningChartDataForVendor(strtotime('monday this week'), time(), $user_id),
            'page_title'         => __("Vendor Dashboard"),
            'breadcrumbs'        => [
                [
                    'name'  => __('Dashboard'),
                    'class' => 'active'
                ]
            ]
        ];
        return view('User::frontend.dashboard', $data);
    }

    public function reloadChart(Request $request)
    {
        $chart = $request->input('chart');
        $user_id = Auth::id();
        switch ($chart) {
            case "earning":
                $from = $request->input('from');
                $to = $request->input('to');
                return $this->sendSuccess([
                    'data' => Booking::getEarningChartDataForVendor(strtotime($from), strtotime($to), $user_id)
                ]);
                break;
        }
    }

    public function profile(Request $request)
    {
        $user = Auth::user();
        $data = [
            'row'         => $user,
            'page_title'       => __("Profile"),
        ];
        return view('User::frontend.profile', $data);
    }

    public function userLogin(Request $request)
    {
        $rules = [
            'email'    => 'required|email',
            'password' => 'required'
        ];
        $messages = [
            'email.required'    => __('Email is required field'),
            'email.email'       => __('Email invalidate'),
            'password.required' => __('Password is required field'),
        ];
        if (ReCaptchaEngine::isEnable() and setting_item("recaptcha_enable")) {
            $codeCapcha = $request->input('g-recaptcha-response');
            if (!$codeCapcha or !ReCaptchaEngine::verify($codeCapcha)) {
                $errors = new MessageBag(['recaptcha' => __('Please verify the captcha')]);
                return response()->json([
                    'error'    => true,
                    'messages' => $errors
                ], 200);
            }
        }
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validator->errors()
            ], 200);
        } else {
            $email = $request->input('email');
            $password = $request->input('password');
            if (Auth::attempt([
                'email'    => $email,
                'password' => $password
            ], $request->has('remember'))) {
                if (in_array(Auth::user()->status, ['blocked'])) {
                    Auth::logout();
                    $errors = new MessageBag(['email' => __('Your account has been blocked')]);
                    return response()->json([
                        'error'    => true,
                        'messages' => $errors,
                        'redirect' => false
                    ], 200);
                }
                return response()->json([
                    'error'    => false,
                    'messages' => false,
                    'redirect' => $request->input('redirect') ?? $request->headers->get('referer') ?? url(app_get_locale(false, '/'))
                ], 200);
            } else {
                $errors = new MessageBag(['email' => __('Email or password incorrect')]);
                return response()->json([
                    'error'    => true,
                    'messages' => $errors,
                    'redirect' => false
                ], 200);
            }
        }
    }

    public function userRegister(Request $request)
    {
        $rules = [
            'first_name' => [
                'required',
                'string',
                'max:255'
            ],
            'last_name'  => [
                'required',
                'string',
                'max:255'
            ],
            'email'      => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users'
            ],
            'password'   => [
                'required',
                'string',
                'confirmed',
                'min:6'
            ],
//            'phone'       => ['required','unique:users'],
//            'term'       => ['required'],
        ];
        $messages = [
           // 'phone.required'      => __('Phone is required field'),
            'email.required'      => __('Email is required field'),
            'email.email'         => __('Email invalidate'),
            'password.required'   => __('Password is required field'),
            'first_name.required' => __('The first name is required field'),
            'last_name.required'  => __('The last name is required field'),
            //'term.required'       => __('The terms and conditions field is required'),
        ];
        if (ReCaptchaEngine::isEnable() and setting_item("recaptcha_enable")) {
            $codeCapcha = $request->input('g-recaptcha-response');
            if (!$codeCapcha or !ReCaptchaEngine::verify($codeCapcha)) {
                $errors = new MessageBag(['recaptcha' => __('Please verify the captcha')]);
                return response()->json([
                    'error'    => true,
                    'messages' => $errors
                ], 200);
            }
        }
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validator->errors()
            ], 200);
        } else {

            $user = \App\User::create([
                'first_name' => $request->input('first_name'),
                'last_name'  => $request->input('last_name'),
                'name' => $request->input('email'),
                'email'      => $request->input('email'),
                'password'   => Hash::make($request->input('password')),
                'status'    => $request->input('publish','publish'),
               // 'phone'    => $request->input('phone'),
            ]);
            event(new Registered($user));
            Auth::loginUsingId($user->id);
            try {
                event(new SendMailUserRegistered($user));
            } catch (Exception $exception) {

                Log::warning("SendMailUserRegistered: " . $exception->getMessage());
            }
            $role = $request->input('type');
            if(in_array($role, ['employer','candidate']))
            {
                $user->assignRole($role);
                if($role == 'employer') {
                    $company_data = [
                        'name' => $request->input('first_name').' '.$request->input('last_name'),
                        'email' => $request->input('email'),
                        'owner_id' => $user->id,
                        'status'=>'draft'
                    ];
                    $this->company::firstOrCreate($company_data);
                }
                if($role == 'candidate'){
                    $candidate = new Candidate();
                    $candidate_data = [
                        'id'=>$user->id,
                        // 'title'=>$user->display_name
                    ];
                    $candidate->fillByAttr(array_keys($candidate_data),$candidate_data);
                    $candidate->save();
                }
            }
            return response()->json([
                'error'    => false,
                'messages' => false,
                'redirect' => $request->input('redirect') ?? $request->headers->get('referer') ?? url(app_get_locale(false, '/'))
            ], 200);
        }
    }

    public function subscribe(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255'
        ]);
        $check = Subscriber::withTrashed()->where('email', $request->input('email'))->first();
        if ($check) {
            if ($check->trashed()) {
                $check->restore();
                return $this->sendSuccess([], __('Thank you for subscribing'));
            }
            return $this->sendError(__('You are already subscribed'));
        } else {
            $a = new Subscriber();
            $a->email = $request->input('email');
            $a->first_name = $request->input('first_name');
            $a->last_name = $request->input('last_name');
            $a->save();

            event(new UserSubscriberSubmit($a));

            return $this->sendSuccess([], __('Thank you for subscribing'));
        }
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        return redirect(app_get_locale(false, '/'));
    }

    public function permanentlyDelete(Request $request)
    {
        if(!empty(setting_item('user_enable_permanently_delete')))
        {
            $user = Auth::user();
            \DB::beginTransaction();
            try {
                $user->sendEmailPermanentlyDelete();
                $user->delete();
                \DB::commit();
                Auth::logout();
                return redirect(route('home'));
            }catch (\Exception $exception){
                \DB::rollBack();
            }
        }
        return back()->with('error',__('Error. You can\'t permanently delete'));
    }

    public function upgradeCompany()
    {
        $user = Auth::user();
        $vendorRequest = CompanyRequest::query()->where("user_id",$user->id)->where("status","pending")->first();
        if(!empty($vendorRequest)){
            return redirect()->back()->with('warning', __('You have just done the become company request, please wait for the Admin\'s approved'));
        }
        $vendorAutoApproved = setting_item('company_auto_approved');
        $dataVendor['role_request'] = setting_item('company_role');
        if ($vendorAutoApproved) {
            if ($dataVendor['role_request']) {
                $user->assignRole($dataVendor['role_request']);
            }
            $dataVendor['status'] = 'approved';
            $dataVendor['approved_time'] = now();
        } else {
            $dataVendor['status'] = 'pending';
        }
        $companyRequestData = $user->companyRequest()->save(new CompanyRequest($dataVendor));
        try {
            event(new NewVendorRegistered($user, $companyRequestData));
        } catch (Exception $exception) {
            Log::warning("NewCompanyRegistered: " . $exception->getMessage());
        }
        return redirect()->back()->with('success', __('Request company success!'));
    }


    public function sendOtp(Request $request) {

        $user = User::where('id', Auth::id())->first() ?? [];
        if(empty($user)) {
            $errors = new MessageBag(['user' => __('No User found')]);
            return response()->json([
                'error'    => true,
                'messages' => $errors
            ], 200);
        }

        if(empty($user->phone)) {
            $errors = new MessageBag(['phone' => __('Phone must be filled in order to send OTP')]);
            return response()->json([
                'error'    => true,
                'messages' => $errors
            ], 200);
        }

        $sender ='SEMPWR';
        $mob =  str_replace("+","",$user->phone);
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
            $user->update([
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
        $rules = [ 'otp' => ['required','digits:6'] ];
        $messages = ['otp.required' => __('OTP is required'), 'otp.digits' => __('OTP must exactly be of 6 digits') ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validator->errors()
            ], 200);
        }

        $user = User::where('id', Auth::id())->first() ?? [];

        if(empty($user->phone)) {
            $errors = new MessageBag(['phone' => __('Phone must be filled in order to send OTP')]);
            return response()->json([
                'error'    => true,
                'messages' => $errors
            ], 200);
        }

        if(empty($user->otp)) {
            $errors = new MessageBag(['phone' => __('OTP request not given yet. Please click Send OTP')]);
            return response()->json([
                'error'    => true,
                'messages' => $errors
            ], 200);
        }
        if(new \DateTime() <= $user->otp_expired_at) {
            if($user->otp == $request->otp) {
                $user->update([
                    'phone_verified_at' => now(),
                    'otp' => null,
                    'otp_expired_at' => null,
                ]);

                if($user?->company()->exists()) {
                    Company::where('id',$user->company?->id)->first()?->update(['phone' => $user->phone]);
                }

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
            $user->update([
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
