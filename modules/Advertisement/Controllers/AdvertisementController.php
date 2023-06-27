<?php
namespace Modules\Advertisement\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Matrix\Exception;
use Modules\Advertisement\Models\Advertisement;
use Modules\FrontendController;


class AdvertisementController extends FrontendController
{


   
    public function __construct()
    {
        parent::__construct();
    }


    public function index(Request $request) 
    {
        $this->checkPermission('advertisement_manage');
        $user = auth()->user();
        // dd($user->company?->id);    
        $ad = Advertisement::where('company_id',$user->company?->id)->orderBy('id', 'desc')->paginate(20);
        $data = [
            'rows'        => $ad,
            'menu_active' => 'manage_ads',
            'page_title'=>__("Ads Management")
        ];
        return view('Advertisement::frontend.layouts.manage-ads.manage-ads', $data);
    }

    public function createAd()
    {
        $this->checkPermission('job_manage');
        if(!auth()->user()->checkCompanyProgress()) {
            return redirect(route('user.company.profile'))->with('error', __('Need to complete Company Profile before posting a job') );
        }

        $row = new Advertisement();
        $row->fill([
            'status' => 'publish',
        ]);
        $data = [
            'row'         => $row,
            'menu_active' => 'create_ads',
            'page_title' => __("Create new Ad"),
            'is_user_page' => true
        ];
        return view('Advertisement::frontend.layouts.manage-ads.edit-ads', $data);    
    }
  
}
