<?php
namespace Modules\Advertisement\Controllers;

use Illuminate\Http\Request;
use Modules\Advertisement\Models\Advertisement;
use Modules\FrontendController;
use Modules\Media\Traits\HasUpload;

class AdvertisementController extends FrontendController
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
        $this->checkPermission('advertisement_manage');
        if(!auth()->user()->checkCompanyProgress()) {
            return redirect(route('user.company.profile'))->with('error', __('Need to complete Company Profile before posting a job') );
        }

        $row = new Advertisement();
        $row->fill([
            'status' => 'publish',
        ]);
        $data = [
            'row'         => $row,
            'positions'    => Advertisement::POSITION,
            'menu_active' => 'create_ads',
            'page_title' => __("Create Advertisement"),
            'is_user_page' => true
        ];
        return view('Advertisement::frontend.layouts.manage-ads.edit-ads', $data);    
    }

    public function storeAd(Request $request, $id){
        $this->checkPermission('advertisement_manage');

        $check = Validator::make($request->input(), [
            'title' => 'required',
            'url' => 'required|url',
            'start_date' => 'required|date_format:Y/m/d',
            'end_date' => 'required|date_format:Y/m/d',
            'location' => 'required',
            'position' => 'required',
        ]);

        if (!$check->validated()) {
            return back()->withInput($request->input());
        }
        

        if($id>0){
            $row = Advertisement::find($id);
            if (empty($row)) {
                return redirect(route('user.manage.jobs'));
            }
        }else{

            $row = new Advertisement();
            $row->status = "publish";
        }

        $input = $request->input();
        $attr = [
            'title',
            'url',
            'banner',
            'company_id',
            'start_date',
            'end_date',
            'position',
            'priority',
            'status',
            'is_approved',
            'create_user',
            'update_user',
        ];
        
        $input['is_approved'] = 1;
        $row->fillByAttr($attr, $input);

        // Check Plan
        if($row->status == 'publish' and !auth()->user()->checkJobPlan()){
            return back()->with('error',__("Maximum published items reached. Please buy more plan"));
        }

        
        if(empty($request->input('create_user'))){
            $row->create_user = auth()->user()->id;
        }

        
    }
  
}
