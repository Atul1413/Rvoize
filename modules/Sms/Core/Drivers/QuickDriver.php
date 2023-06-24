<?php

namespace Modules\Sms\Core\Drivers;
use Modules\Sms\Core\Exceptions\SmsException;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;

class QuickDriver extends Driver
{

    protected $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function send()
    {
    	
		$sender =  $this->config['from'];
        $mob = $this->config['mob'];
        $auth= $this->config['auth'];
        $entity_id =  $this->config['entity_id'];
        $template_id = $this->config['template_id'];
        $otp = random_int(100000, 999999);


        $msg = urlencode('Welcome to eMpower. Your OTP for the user registration is '. $otp); 
        
        $url = 'http://aquicksms.com/API/sms-api.php?auth='.$auth.'&msisdn='.$mob.'&senderid='.$sender.'&entity_id='.$entity_id.'&template_id='.$template_id.'&message='.$msg;  // API URL
        

	    $curl = $this->quickCurl($url);
	    $result = json_decode($curl,true);
		if($result['status'] == 'success' && $result['code'] == 100) { 
			return $result;
		} else {
	    	throw new SmsException($result['desc'] ?? '');
	    }
		
    }
    
    public function quickCurl($url){
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // change to 1 to verify cert
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		$result = curl_exec($ch);
	    curl_close($ch);
	    return $result;
	}


}