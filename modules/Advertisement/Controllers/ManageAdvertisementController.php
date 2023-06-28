<?php
namespace Modules\Advertisement\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Modules\Advertisement\Models\Advertisement;
use Modules\FrontendController;
use Modules\Media\Traits\HasUpload;
use Illuminate\Support\Facades\Validator;
use Modules\Advertisement\Models\AdvertisementCountry;
use Modules\Media\Models\MediaFile;

class ManageAdvertisementController extends FrontendController
{

    use HasUpload;
   
    public function __construct()
    {
        parent::__construct();
    }


    public function index(Request $request) 
    {
        $this->checkPermission('advertisement_manage');
        $user = auth()->user();
       
        if(empty($user->user_plan) || (!empty($user->user_plan) && $user->user_plan?->end_date <= now())) {
            return redirect(route('plan'));
        }
        $ad = Advertisement::where('company_id',$user->company?->id)->orderBy('id', 'desc')->paginate(20);
        $data = [
            'rows'        => $ad,
            'menu_active' => 'manage_ads',
            'page_title'=>__("Advertisement Management")
        ];
        return view('Advertisement::frontend.layouts.manage-ads.manage-ads', $data);
    }

    public function createAd()
    {
        $this->checkPermission('advertisement_manage');
        $user = auth()->user();
        if(empty($user->user_plan) || (!empty($user->user_plan) && $user->user_plan?->end_date <= now())) {
            return redirect(route('plan'));
        }
       
        $data = [
            'positions'    => Advertisement::POSITION,
            'menu_active' => 'create_ads',
            'page_title' => __("Create Advertisement"),
            'is_user_page' => true
        ];
        return view('Advertisement::frontend.layouts.manage-ads.create-ads', $data);    
    }

    public function editAd(Request $request, $id){
        $this->checkPermission('advertisement_manage');
        $user = auth()->user();
        if(empty($user->user_plan) || (!empty($user->user_plan) && $user->user_plan?->end_date <= now())) {
            return redirect(route('plan'));
        }
        $row = Advertisement::where('id',$id)->with('countries')->first();
        $company_id = $user->company?->id ?? '';

        if (empty($row)) {
            return redirect(route('user.company.advertisement.manage.ads'));
        }elseif($company_id != $row->company_id){
            return redirect(route('user.company.advertisement.manage.ads'));
        }

        $data = [
            'row'  => $row,
            // 'positions'    => Advertisement::POSITION,
            'page_title' => __("Edit Advertisement: "). $row->title,
            'menu_active' => 'advertisement_manage',
            'is_user_page' => true
        ];
        return view('Advertisement::frontend.layouts.manage-ads.edit-ads', $data);
    }

    public function storeAd(Request $request, $id){
        $this->checkPermission('advertisement_manage');
        $user = auth()->user();
        if(empty($user->user_plan) || (!empty($user->user_plan) && $user->user_plan?->end_date <= now())) {
            return redirect(route('plan'));
        }
        if(!$user->checkCompanyProgress()) {
            return redirect(route('user.company.profile'))->with('error', __('Need to complete Company Profile before posting an Advertisement') );
        } 
        $check = Validator::make($request->input(), [
            'title' => 'required',
            'url' => 'required|url',
            'start_date' => 'required|date_format:Y/m/d',
            'end_date' => 'required|date_format:Y/m/d',
            'countries' => 'required|array|min:1',
            // 'position' => 'required',
            'banner' => 'required|integer'
        ]);

        if (!$check->validated()) {
            return back()->withInput($request->input());
        } 

        $bannerError = [];
        $banner = MediaFile::where('id', $request->banner)->first();
        if(empty($banner)) { $bannerError[] = 'Uploaded image for Advertisement Banner not found'; } 
        if(!empty($banner) && !in_array($banner->file_extension,['jpeg','jpg','png'])) { $bannerError[] = 'Banner must be of image type : jpeg, jpg or png'; } 
        if(!empty($banner) && ($banner->file_width !== Advertisement::WIDTH || $banner->file_height !== Advertisement::HEIGHT)) { $bannerError[] = 'Given banner height is '.$banner->file_height . ' px and width is '.$banner->file_width .' px. Banner must be exactly of height: '. Advertisement::HEIGHT.' px and width: '.Advertisement::WIDTH.' px' ; } 
        
        if(!empty($bannerError)) {
            return back()->withErrors($bannerError)->withInput($request->input());
        }
        

        if($id>0){
            $row = Advertisement::find($id);
            if (empty($row)) {
                return redirect(route('user.company.advertisement.manage.ads'));
            }
        }
        else{
            $row = new Advertisement();
            $row->status = "publish";
        }
        
        if(empty($request->input('create_user'))){
            $row->create_user = $user->id;
        }
        $row->company_id = $user->company?->id;
        $row->is_approved = true;

        $input = $request->input();
        $attr = [
            'title',
            'url',
            'banner',
            'start_date',
            'end_date',
            // 'position',
            'status',
            'create_user',
        ];
        
        $countries = [] ;
      

        $row->fillByAttr($attr, Arr::except($input,['countries']));

         // Check Plan
        if($id < 0 && $row->status == 'publish' and !$user->checkAdPlan()){
            return back()->with('error',__("Maximum published ads reached. Please buy more plan"));
        }

        $res = $row->saveOriginOrTranslation($request->query('lang'),true);

        if(!empty($request->input('countries'))) {
            foreach($input['countries'] as $country) {
                $countries[] = ['origin_id' => $row->id, 'country' => $country ,'created_at' => now(), 'updated_at' => now()];
            }
            if($id > 0) {
                AdvertisementCountry::where('origin_id',$row->id)->delete();
            }   
            AdvertisementCountry::insert($countries);
        }

       
       
        if ($res) {
            if($id > 0 ){
                return back()->with('success',  __('Advertisement updated') );
            }else{
                  return redirect(route('user.company.advertisement.edit.ads', ['id' => $row->id]))->with('success', __('Advertisement created') );
            }
        }
        
    }

    public function deleteAd(Request $request, $id){
        $this->checkPermission('advertisement_manage');

        $company_id = auth()->user()->company->id ?? '';
        $ad = Advertisement::where("id", $id)->where('company_id', $company_id)->first();
        if(!empty($ad)){
            AdvertisementCountry::where('origin_id',$ad->id)->delete();
            $ad->delete();
        }

        return redirect()->back()->with('success', __('Advertisement deleted successfully!'));
    }
  
}
