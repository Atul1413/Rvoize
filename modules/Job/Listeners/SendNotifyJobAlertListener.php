<?php

namespace Modules\Job\Listeners;

use App\Notifications\PrivateChannelServices;
use App\User;

class SendNotifyJobAlertListener
{

    public function handle($notificationDetails)
    {
        $data = $notificationDetails->row;
        $user = User::find($data['id']);
        if(!empty($user)) {
            $user->notify(new PrivateChannelServices($data));
        }
    }
    }
