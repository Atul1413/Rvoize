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
        $sender ='SEMPWR';
        $auth='D!~7363OldbDTVDFK';
        $entity_id = '1201160637699734120';
        $template_id = '1207162695833282772';
        $todayDate = Carbon::now();
        
        $users = User::select(['id','first_name','last_name','email','phone','phone_verified_at'])
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
                        'name' => $user->first_name . ' '. $user->last_name,
                        'mobile' => str_replace("+","",$user->phone),
                        'days' => $days,
                    ];
                }
                
            }
        }

       
        foreach($alertList as $user) {

            // $msg = urlencode('Dear '.$user['name'] .', Your plan is going to expire in '.$user['days']); 
            $msg = urlencode('Welcome to eMpower. Your OTP for the user registration is '.$user['days']); 
            
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
