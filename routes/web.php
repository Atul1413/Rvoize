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


// Route::get('test',function(Illuminate\Http\Request $request) {
//     $row = Job::select([
//         "id", "title",'slug', "category_id", "location_id", "company_id", "create_user"
//     ])->with([
//         'company:id,name',
//         'skills:id,name,slug,status',
//         'user:id,first_name,last_name,name'
//         ])->find(16);

//     $skillsIdList = [];
//     if(!empty($row->skills)) {
//         foreach($row->skills as $skill) {
//             if($skill->status === 'publish' && !empty($skill->id)) {
//                 $skillsIdList[] = $skill->id;
//             } else {
//                 continue;
//             }
//         }
//     }

//     $relatedLocation = Candidate::where('location_id',$row->location_id)->pluck('id')?->toArray();
//     $relatedSkills = DB::table('bc_candidate_skills')->whereIn('skill_id',$skillsIdList)->pluck('origin_id')?->toArray();
//     $relatedCandIds = array_unique(array_merge($relatedLocation,$relatedSkills));

//     $relatedCandidates = Candidate::select(['id','title','slug','experience_year','location_id'])->whereIn('id',$relatedCandIds)->get();
    
//     if(!$relatedCandidates->isEmpty()) {
//         foreach($relatedCandidates as $candidate) {
//             $data = [
//                 'id' => $candidate->id,
//                 'event' => $row->company?->name ?? '',
//                 'to' => 'candidate',
//                 'name' => $candidate->title ?? '',
//                 'avatar' => $row->company?->getAuthor?->avatar_url ?? ($row->jobInfo?->user?->avatar_url ?? ''),
//                 'link' => route('job.particular',['slug' => $row->slug]),
//                 'type' => 'job_alert',
//                 'message' => __(':company posted job for :job position that you might be Interested in.', ['company' => $row->company?->name ?? '', 'job' => $row->title ?? ''])
//             ];

//             event(new CandidateAlertJob($data));
//         }
        
//     }

   


// });