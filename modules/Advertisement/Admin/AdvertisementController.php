<?php
namespace Modules\Advertisement\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\AdminController;
use Modules\Advertisement\Models\Advertisement;
use Modules\Advertisement\Models\AdvertisementCountry;

class AdvertisementController extends AdminController
{
    public function __construct()
    {
        $this->setActiveMenu('admin/module/advertisement');
        if(!is_admin()){
            $this->middleware('verified');
        }
        parent::__construct();
    }

    public function index(Request $request)
    {
        $this->checkPermission('advertisement_manage_others');
        $adList = Advertisement::query()->with(['companies','countries','banner']);
        $username = $request->query('s');
        if (!empty($username)) {
            $adList->where(function($query) use($username){
                $query->where('title', 'LIKE', '%' . $username . '%');
                $query->orWhere('url', 'LIKE', '%' . $username . '%');
            });
        }

        if (!empty($request->query('status'))) {
            $adList->where('status',  $request->query('status'));
        }


        $adList->orderBy('id','desc');

        $data = [
            'rows'        => $adList->paginate(20),
            'breadcrumbs' => [
                [
                    'name' => __('Advertisement'),
                    'url'  => 'admin/module/advertisement'
                ],
                [
                    'name'  => __('All'),
                    'class' => 'active'
                ],
            ],
            'page_title'=>__("Advertisement Management")
        ];
        return view('Advertisement::admin.list-ads',$data);
    }

    public function bulkEdit(Request $request)
    {
        $this->checkPermission('advertisement_manage_others');
        $ids = $request->input('ids');
        $action = $request->input('action');
        if (empty($ids) or !is_array($ids)) {
            return redirect()->back()->with('error', __('No items selected!'));
        }
        if (empty($action)) {
            return redirect()->back()->with('error', __('Please select an action!'));
        }
        if ($action == "delete") {
            foreach ($ids as $id) {
                if($id == Auth::id()) continue;
                $ad = Advertisement::where("id", $id)->first();
                if(!empty($ad)){
                   $ad->countries()->delete();
                   $ad->delete();
                }
            }
        } 
        return redirect()->back()->with('success', __('Update success!'));
    }

    public function approveAd(Request $request)
    {
        $ad_id = $request->input('ad_id');
        $approve = $request->input('approve');
        if (empty($ad_id)) {
            return $this->sendError(__('No Advertisement value given!'));
        }
        if (empty($approve)) {
            return $this->sendError(__('No approve value given!'));
        }

        $ad = Advertisement::where("id", $ad_id)->first();
        if(!empty($ad)){ 
            $ad->update(['is_approved' => $approve]);
        } else {
            return $this->sendError(__('No Advertisement found!'));
        }
        $text = $approve == 'true' ? 'approved' : 'disapproved';

        return $this->sendSuccess(__($ad->title. ' advertisement '. $text .' successfully!'));
    }

}
