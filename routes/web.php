<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/intro','\App\Http\Controllers\LandingpageController@index');
Route::get('/', '\App\Http\Controllers\HomeController@index')->name('home');
Route::post('/install/check-db', '\App\Http\Controllers\HomeController@checkConnectDatabase');

Route::get('/update', function (){
    return redirect('/');
});

//Cache
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cleared!";
})->middleware(['auth', 'dashboard']);

//Login
Auth::routes();
//Custom User Login and Register
Route::post('register','\Modules\User\Controllers\UserController@userRegister')->name('auth.register');
Route::post('login','\Modules\User\Controllers\UserController@userLogin')->name('auth.login');
Route::post('logout','\Modules\User\Controllers\UserController@logout')->name('auth.logout');
// Social Login
Route::get('social-login/{provider}', '\App\Http\Controllers\Auth\LoginController@socialLogin');
Route::get('social-callback/{provider}', '\App\Http\Controllers\Auth\LoginController@socialCallBack');

// Logs
Route::get('admin/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware(['auth', 'dashboard','system_log_view']);

//Icon Helper
Route::get('bc-helper/icons', '\App\Http\Controllers\BCController@index')->middleware(['auth'])->name('bc.icons');


/*
Route::get('testing-sms', function() {
    $sender ='SEMPWR';
    $mob ='7350442484';
    $auth='D!~7363OldbDTVDFK';
    $entity_id = '1201160637699734120';
    $template_id = '1207162695833282772';
    $otp = 122131;
    $msg = urlencode('Welcome to eMpower. Your OTP for the user registration is '. $otp); 
    
    $url = 'http://aquicksms.com/API/sms-api.php?auth='.$auth.'&msisdn='.$mob.'&senderid='.$sender.'&entity_id='.$entity_id.'&template_id='.$template_id.'&message='.$msg.'';  // API URL
    
    echo $sender . "<br/>";
    
    function SendSMS($hostUrl){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $hostUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // change to 1 to verify cert
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        $result = curl_exec($ch);
        return $result;
    }
    
    $result=SendSMS($url);  // call function that return response with code
    echo $result;
});
*/