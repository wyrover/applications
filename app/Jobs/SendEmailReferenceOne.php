<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailReferenceOne extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * @var
     */
    protected $event;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($event)
    {
        $this->event = $event;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle($event)
    {
        $data = array(
            'worker' => ucwords($event->user->first_name) . ' ' . ucwords($event->user->surname),
            'company' => $event->referee->company->name,
            'email' => $event->referee->referee_email,
            'refereeName' => $event->referee->referee_name
        );
        // Send the email
        Mail::send('emails/applications/submission', $data, function ($message) use ($data) {
            $message->to($data['email'])
                ->from(config('custom.noreplyemail'), 'Made Simple')
                ->subject('Reference Request');
        });
    }
}
