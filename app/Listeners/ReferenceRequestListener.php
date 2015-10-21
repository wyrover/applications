<?php

namespace App\Listeners;

use App\Applications;
use App\Events\ReferenceRequestEmail;
use App\Mailers\AppMailer;
use App\References;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ReferenceRequestListener implements ShouldQueue
{

    use InteractsWithQueue;

    /**
     * @var user
     */
    public $user;

    /**
     * @var AppMailer
     */
    public $mailer;

    /**
     * Create a new event instance.
     *
     * @param $user
     * @param AppMailer $mailer
     */
    public function __construct(AppMailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  ReferenceRequestEmail  $event
     * @return void
     */
    public function handle(ReferenceRequestEmail $event)
    {
        // Handle Email Notification
        $companyId = Auth::user()->company_id;
        $cn = \App\Company::where('id', '=', $companyId)->first();

        if (! empty($event->user['email']) && $event->user['contact'] == 'Yes') {

            $data = array(
                'email' => $event->user['email'],
                'name' => $event->user['name'],
                'worker' => $event->user['first_name'] . ' ' . $event->user['surname'],
                'company' => $cn->name
            );
            // Send the email
            Mail::later(5, 'emails/references/request', $data, function ($message) use ($data) {
                $message->to($data['email'])
                    ->from('noreply@madesimple.co.uk')
                    ->subject('You have been selected to provide a reference');
            });
        }

        if (! empty($event->user['emailtwo']) && $event->user['contact2'] == 'Yes') {

            $data = array(
                'email' => $event->user['emailtwo'],
                'name' => $event->user['name2'],
                'worker' => $event->user['first_name'] . ' ' . $event->user['surname'],
                'company' => $cn->name
            );
            // Send the email
            Mail::later(5, 'emails/references/request2', $data, function ($message) use ($data) {
                $message->to($data['email'])
                    ->from('noreply@madesimple.co.uk')
                    ->subject('You have been selected to provide a reference');
            });
        }

        // Create record in applications table
        $application = $this->createNewApplication($event);

        // Create record in references table
        $referee = $this->createNewReference($event, $application);

        // Update Applications table with new reference ID
        $this->updateApplication($referee, $application);

    }

    /**
     * @param ReferenceRequestEmail $event
     * @return Applications
     */
    public function createNewApplication(ReferenceRequestEmail $event)
    {
        $application = new Applications;
        $application->first_name = $event->user['first_name'];
        $application->middle_name = $event->user['middle'];
        $application->surname = $event->user['surname'];
        $application->code = str_random(45);
        $application->save();
        return $application;
    }

    /**
     * @param ReferenceRequestEmail $event
     * @param $application
     * @return References
     */
    public function createNewReference(ReferenceRequestEmail $event, $application)
    {
        $referee = new References;
        $referee->applications_id = $application->id;
        $referee->company_id = Auth::user()->company_id;
        $referee->referee_name = $event->user['name'];
        $referee->referee_company = $event->user['company_name'];
        $referee->referee_email = $event->user['email'];
        $referee->referee_relationship = $event->user['relationship'];
        $referee->referee_current_employer = $event->user['employer'];
        $referee->referee_contact = $event->user['contact'];
        $referee->referee_name2 = $event->user['name2'];
        $referee->referee_company2 = $event->user['company_name2'];
        $referee->referee_email2 = $event->user['emailtwo'];
        $referee->referee_relationship2 = $event->user['relationship2'];
        $referee->referee_current_employer2 = $event->user['employer2'];
        $referee->referee_contact2 = $event->user['contact2'];
        $referee->completed = 0;
        $referee->save();
        return $referee;
    }

    /**
     * @param $referee
     * @param $application
     */
    public function updateApplication($referee, $application)
    {
        $application->reference_id = $referee->id;
        $application->update();
    }
}
