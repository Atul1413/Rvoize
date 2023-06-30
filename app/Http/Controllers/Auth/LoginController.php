<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\UserMeta;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Matrix\Exception;
use Modules\Candidate\Models\Candidate;
use Modules\Company\Models\Company;
use Modules\User\Events\SendMailUserRegistered;
use Socialite;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/user/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        if(is_admin()){
            return '/admin';
        }else{
            return $this->redirectTo;
        }
    }

    public function showLoginForm()
    {
        return view('auth.login',['page_title'=> __("Login")]);
    }

    public function socialLogin($provider, $usertype = 'candidate')
    {
        if(!in_array($usertype,['candidate','employer'])) {
            $usertype = 'candidate';
        }
      
        $this->initConfigs($provider, $usertype);

        return Socialite::driver($provider)->redirect();
    }

    protected function initConfigs($provider,$usertype)
    {
        switch($provider){
            case "facebook":
            case "google":
            case "twitter":
            case "linkedin":    
                config()->set([
                    'services.'.$provider.'.client_id'=>setting_item($provider.'_client_id'),
                    'services.'.$provider.'.client_secret'=>setting_item($provider.'_client_secret'),
                    'services.'.$provider.'.redirect'=>'/social-callback/'.$usertype.'/'.$provider,
                ]);
            break;
        }
    }

    public function socialCallBack($usertype, $provider)
    {
        try {
            $this->initConfigs($provider, $usertype);
            $user = Socialite::driver($provider)->user();
            if (empty($user)) {
                return redirect()->to('login')->with('error', __('Can not authorize'));
            }

            $existUser = User::getUserBySocialId($provider, $user->getId());

            if (empty($existUser)) {

                $meta = UserMeta::query()->where('name', 'social_' . $provider . '_id')->where('val', $user->getId())->first();
                if (!empty($meta)) {
                    $meta->delete();
                }

                if (empty($user->getEmail())) {
                    return redirect()->route('login')->with('error', __('Can not get email address from your social account'));
                }

                $userByEmail = User::query()->where('email', $user->getEmail())->first();
                if (!empty($userByEmail)) {
                    return redirect()->route('login')->with('error', __('Email :email already exists. Please login with right social account. Cannot register new account with your social email', ['email' => $user->getEmail()]));
                }

                // Create New User
                $realUser = new User();
                $realUser->email = $user->getEmail();
                $realUser->password = Hash::make(uniqid() . time());
                $realUser->name = $user->getName();
                $realUser->first_name = $user->getName();
                $realUser->status = 'publish';
                $realUser->role_id = ($usertype === 'employer') ? 2 : 3;

                $realUser->save();

                $realUser->addMeta('social_' . $provider . '_id', $user->getId());
                $realUser->addMeta('social_' . $provider . '_email', $user->getEmail());
                $realUser->addMeta('social_' . $provider . '_name', $user->getName());
                $realUser->addMeta('social_' . $provider . '_avatar', $user->getAvatar());
                $realUser->addMeta('social_meta_avatar', $user->getAvatar());

                event(new Registered($realUser));

                if($usertype === 'employer') {
                    $realUser->assignRole('employer');
                    $company = new Company();
                    $company_data = [
                        'owner_id' => $realUser->id,
                        'create_user' => $realUser->id,
                        'name' => $realUser->name,
                        'email' => $realUser->email,
                        'slug' => Str::slug($realUser->name,'-'),
                    ];
                    $company->fillByAttr(array_keys($company_data),$company_data);
                    $company->save();
                } else {
                    $realUser->assignRole('candidate');
                    $candidate = new Candidate();
                    $candidate_data = [
                        'id' => $realUser->id,
                        'create_user' => $realUser->id,
                        'slug' => Str::slug($realUser->name,'-'),
                    ];
                    $candidate->fillByAttr(array_keys($candidate_data),$candidate_data);
                    $candidate->save();
                }


               

                try {
                    event(new SendMailUserRegistered($realUser));
                } catch (Exception $exception) {
                    Log::warning("SendMailUserRegistered: " . $exception->getMessage());
                }

                // Login with user
                Auth::login($realUser);

                return redirect('/');

            } else {

                if ($existUser->deleted == 1) {
                    return redirect()->route('login')->with('error', __('User blocked'));
                }
                if (in_array($existUser->status, ['blocked'])) {
                    return redirect()->route('login')->with('error', __('Your account has been blocked'));
                }

                Auth::login($existUser);

                return redirect('/');
            }
        }catch (\Exception $exception)
        {
            $message = $exception->getMessage();
            if(empty($message) and request()->get('error_message')) $message = request()->get('error_message');
            if(empty($message)) $message = $exception->getCode();
            return redirect()->route('login')->with('error',$message);
        }
    }


}
