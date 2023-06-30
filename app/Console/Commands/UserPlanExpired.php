<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class UserPlanExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:renew_alert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'SMS alert to Users a day before plan expiry date';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $alertList = [];
        $sender ='RVOIZE';
        $auth='D!~917611WaKexhcs';
        $entity_id = '1201168656871072404';
        $template_id = '1207168784833816051';
        $todayDate = Carbon::now();
        
        $users = User::select(['id','name','phone','phone_verified_at'])
                ->whereHas('userPlans')
                ->whereNotNull(['phone','phone_verified_at'])
                ->with(['userPlans'])
                ->get();

        foreach($users as $user) {
            foreach($user->userPlans as $plan) {
                $endDate = $plan->end_date;
                $days = $endDate->diffInDays($todayDate);
                if($todayDate->lt($endDate) && ($days === 10 || $days === 15)) {
                    $alertList[] = [
                        'name' => $user->name,
                        'mobile' => str_replace("+","",$user->phone),
                        'date' => $plan->end_date->format('jS M Y h:i:A'),
                    ];
                }
                
            }
        }

       
        foreach($alertList as $user) {
            $msg = urlencode('Hello, '. $user['name'] .'. Your current plan with Rvoize is expiring on '.$user['date'].'. Renew your plan to keep enjoying the benefits of our premium services. Thank you! RVOIZE');
           
            $url = 'http://aquicksms.com/API/sms-api.php?auth='.$auth.'&msisdn='.$user['mobile'].'&senderid='.$sender.'&entity_id='.$entity_id.'&template_id='.$template_id.'&message='.$msg;  // API URL
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
                Log::warning("SMS-Alert Error :".$exception->getMessage());

            }
        }
    }
}
