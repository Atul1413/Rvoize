<?php

    namespace Modules\Job\Listeners;

    use App\Notifications\PrivateChannelServices;
    use Modules\Job\Events\CandidateDeleteApplied;

    class SendNotifyDeleteAppliedListener
    {

        public function handle(CandidateDeleteApplied $event)
        {
            $row = $event->row;
            $user = $row->company->getAuthor ?? $row->jobInfo->user;
            $data = [
                'id' => $row->id,
                'event'   => 'CandidateDeleteApplied',
                'to'      => 'employer',
                'name' => $user->display_name ?? '',
                'avatar' => $row->candidateInfo->user->avatar_url ?? '',
                'link' => route("user.applicants"),
                'type' => 'apply_job',
                'message' => __(':name has withdrawn its application from the job :job', ['name' => $row->candidateInfo->user->getDisplayName() ?? '', 'job' => $row->jobInfo->title ?? ''])
            ];

            $user->notify(new PrivateChannelServices($data));
        }
    }
