<?php

namespace App\Listeners;

use App\Applications;
use App\Events\EmailRefereeTwo;
use App\References;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class EmailRefereeTwoListener implements ShouldQueue
{
    public $referee;
    /**
     * @var Applications
     */
    public $user;

    /**
     * Create the event listener.
     *
     * @param $referee
     */
    public function __construct(References $referee, Applications $user)
    {
        $this->referee = $referee;
        $this->user = $user;
    }

    /**
     * Handle the event.
     *
     * @param  EmailRefereeOne  $event
     * @return void
     */
    public function handle(EmailRefereeTwo $event)
    {
        // Handle data attributes
        $data = array(
            'worker'  => ucwords($event->user->first_name) .' '. ucwords($event->user->surname),
            'company' => $event->referee->company->name,
            'email'   => $event->referee->referee_email,
            'refereeName' => $event->referee->referee_name
        );
        // Send the email
        Mail::send('emails/applications/submission', $data, function( $message ) use ($data)
        {
            $message->to($data['email'])
                ->from(config('custom.noreplyemail'), 'Made Simple')
                ->subject('Reference Request');
        });
    }
}
