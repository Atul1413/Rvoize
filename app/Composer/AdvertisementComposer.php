<?php

namespace App\Composer;

use App\User;
use Illuminate\Contracts\View\View;
use Modules\Advertisement\Models\Advertisement;
use Modules\Company\Models\Company;
use Torann\GeoIP\Facades\GeoIP;

class AdvertisementComposer
{

    public function compose(View $view)
    {

        $companyListWithActivePlans = [];
        $imageList = [];
      
        $location = geoip()?->getLocation()->iso_code ?? "IN";
        $userWithCompanyActivePlan = User::select(['id','email','role_id'])
        ->whereHas('user_plan')
        ->whereHas('company',function($query) {
            $query->select('id','owner_id')->where('status','publish');
        })->with('company:id,owner_id')?->get()?->toArray() ?? [];
        
        foreach($userWithCompanyActivePlan as $user) {
                if(!empty($user['company'])) {
                    $companyListWithActivePlans[] = $user['company']['id'];
                }
        } 

    
       if(count($companyListWithActivePlans) > 0) {
        
            $advertisementList = Advertisement::with(['banner:id,file_path'])
            ->where('is_approved', 1)
            ->where('status','publish')
            ->whereDate('start_date', '<=', now()->format('Y-m-d'))
            ->whereDate('end_date', '>=', now()->format('Y-m-d'))
            ->whereIn('company_id',$companyListWithActivePlans)
            ->whereHas('countries', function($query) use($location) {
                $query->where('country',$location);
             })
            ->orderBy('id','desc')->get()?->toArray() ?? [];
          
            $chunks = array_chunk($advertisementList, 1000);
            foreach ($chunks as $adList) {
                foreach ($adList as $ad) {
                    // $imageList[$ad['position']][] = [
                    if(isset($ad['banner']['file_path'])) {
                        $imageList[] = [
                            'title' => $ad['title'] ?? '',
                            'url' => $ad['url'] ?? '',
                            'banner' => asset('uploads/' .$ad['banner']['file_path']),
                        ];
                    }
                }
            }
        }
        // dd($imageList);
        $view->with([
            'banner' => $imageList,
        ]);
    }
}
