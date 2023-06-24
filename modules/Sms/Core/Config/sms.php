<?php
	return[
		'default' => env('SMS_DRIVER', ''),
		'nexmo'=>[
			'url'=>'https://rest.nexmo.com/sms/json',
			'from'=>env('SMS_NEXMO_FROM','Booking Core'),
			'key'=>env('SMS_NEXMO_KEY',''),
			'secret'=>env('SMS_NEXMO_SECRET',''),
		],
		'twilio'=>[
			'url'=>'https://api.twilio.com',
			'from'=>env('SMS_TWILIO_FROM','+12019480710'),
			'sid'=>env('SMS_TWILIO_ACCOUNTSID',''),
			'token'=>env('SMS_TWILIO_TOKEN',''),
		],
		'aquicksms' => [
			'url' => 'http://aquicksms.com/API/sms-api.php',
			'auth' => env('SMS_AQUICKSMS_AUTH', 'D!~7363OldbDTVDFK'),
			'entity_id' => env('SMS_AQUICKSMS_ENTITY', '1201160637699734120'),
			'template_id' => env('SMS_AQUICKSMS_TEMPLATE', '1207162695833282772'),
			'from' => env('SMS_AQUICKSMS_FROM','SEMPWR'),
		],
	];