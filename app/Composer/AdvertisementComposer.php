<?php

namespace App\Composer;

use App\User;
use Illuminate\Contracts\View\View;
use Modules\Advertisement\Models\Advertisement;
use Modules\Company\Models\Company;

class AdvertisementComposer
{

    public function compose(View $view)
    {
        $companyListWithActivePlans = [];
        $userWithCompanyActivePlan = User::select(['id','email','role_id'])
        ->whereHas('company')
        ->whereHas('user_plan')
        ->with([
            'user_plan' => function($query) {
                $query->where('end_date','<=',now()->format('Y-m-d H:i:s'))->where('status',1);
            },
            'company' => function($query) {
                $query->select('id','owner_id')->where('status','publish');
            }
        ])?->get()?->toArray() ?? [];

       foreach($userWithCompanyActivePlan as $user) {
            if(!empty($user['company'])) {
                $companyListWithActivePlans[] = $user['company']['id'];
            }
       } 
       
       $imageList = [];

       if(count($companyListWithActivePlans) > 0) {
            $advertisementList = Advertisement::with(['banner:id,file_path'])->where('is_approved', 1)
            ->where('status','publish')
            ->where('start_date', '<=', now()->format('Y-m-d H:i:s'))
            ->where('end_date', '>=', now()->format('Y-m-d H:i:s'))
            ->whereIn('company_id',$companyListWithActivePlans)
            ->orderBy('id','desc')->get()?->toArray() ?? [];

            $chunks = array_chunk($advertisementList, 1000);
            foreach ($chunks as $adList) {
                foreach ($adList as $ad) {
                    $imageList[$ad['position']][] = [
                        'title' => $ad['title'],
                        'url' => $ad['url'],
                        'banner' => asset('uploads/' .$ad['banner']['file_path']),
                    ];
                }
            }
        }

        $view->with([
            'banner' => $imageList,
        ]);
    }
}