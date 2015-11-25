<?php

namespace App\Listeners;

use App\Applications;
use App\Events\ReferenceRequestEmail;
use App\Fields;
use App\Mailers\AppMailer;
use App\References;
use App\Settings;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ReferenceRequestListener implements ShouldQueue
{

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
        // Create record in applications table
        //$application = $this->createNewApplication($event);

        // Create record in references table
        $referee = $this->createNewReference($event);

        // Update Applications table with new reference ID
        //$this->updateApplication($referee, $application);

        // Create settings fields/options
        $settings = new Fields;
        //$settings->application_id = $referee->id;
        $settings->references_id = $referee->id;
        $settings->label = $event->user['label'];
        $settings->label2 = $event->user['label2'];
        $settings->label3 = $event->user['label3'];
        $settings->label4 = $event->user['label4'];
        $settings->label5 = $event->user['label5'];
        $settings->label6 = $event->user['label6'];
        $settings->label7 = $event->user['label7'];
        $settings->label8 = $event->user['label8'];
        $settings->label9 = $event->user['label9'];
        $settings->label10 = $event->user['label10'];
        if (! empty($event->user['answer'])) { $settings->answer = $event->user['answer']; }
        if (! empty($event->user['answer2'])) { $settings->answer2 = $event->user['answer2']; }
        if (! empty($event->user['answer3'])) { $settings->answer3 = $event->user['answer3']; }
        if (! empty($event->user['answer4'])) { $settings->answer4 = $event->user['answer4']; }
        if (! empty($event->user['answer5'])) { $settings->answer5 = $event->user['answer5']; }
        if (! empty($event->user['answer6'])) { $settings->answer6 = $event->user['answer6']; }
        if (! empty($event->user['answer7'])) { $settings->answer7 = $event->user['answer7']; }
        if (! empty($event->user['answer8'])) { $settings->answer8 = $event->user['answer8']; }
        if (! empty($event->user['answer9'])) { $settings->answer9 = $event->user['answer9']; }
        if (! empty($event->user['answer10'])) { $settings->answer10 = $event->user['answer10']; }
        $settings->save();

        $referee->settings_id = $settings->id;
        $referee->update();

        if (! empty($event->user['email']) && $event->user['contact'] == 'Yes') {

            $data = array(
                'email' => $event->user['email'],
                'name' => $event->user['name'],
                'worker' => $event->user['first_name'] . ' ' . $event->user['surname'],
                'company' => $cn->name,
                'code' => $referee->code
            );
            // Send the email
            Mail::send('emails/references/request', $data, function ($message) use ($data) {
                $message->to($data['email'])
                    ->from('noreply@madesimpleltd.co.uk')
                    ->subject('You have been selected to provide a reference');
            });
        }

        if (! empty($event->user['emailtwo']) && $event->user['contact2'] == 'Yes') {
            $refereetwo = $this->createNewReferenceTwo($event);
            $data = array(
                'emailtwo' => $event->user['emailtwo'],
                'name' => $event->user['name2'],
                'worker' => $event->user['first_name'] . ' ' . $event->user['surname'],
                'company' => $cn->name,
                'code' => $refereetwo->code
            );
            // Send the email
            Mail::send('emails/references/request2', $data, function ($message) use ($data) {
                $message->to($data['emailtwo'])
                    ->from('noreply@madesimpleltd.co.uk')
                    ->subject('You have been selected to provide a reference');
            });
        }
    }

    /**
     * @param ReferenceRequestEmail $event
     * @param $application
     * @return References
     */
    public function createNewReference(ReferenceRequestEmail $event)
    {
        $referee = new References;
        $referee->company_id = Auth::user()->company_id;
        $referee->code = str_random(40);
        $referee->first_name = $event->user['first_name'];
        //$referee->middle_name = $event->user['middle'];
        $referee->last_name = $event->user['surname'];
        $referee->referee_name = $event->user['name'];
        $referee->referee_company = $event->user['company_name'];
        $referee->referee_email = $event->user['email'];
        //$referee->referee_relationship = $event->user['relationship'];
        $referee->referee_current_employer = $event->user['employer'];
        $referee->referee_contact = $event->user['contact'];
        $referee->completed = 'No';
        $referee->app_only = '1';
        $referee->save();
        return $referee;
    }

    public function createNewReferenceTwo(ReferenceRequestEmail $event)
    {
        $refereetwo = new References;
        $refereetwo->company_id = Auth::user()->company_id;
        $refereetwo->first_name = $event->user['first_name'];
       // $refereetwo->middle_name = $event->user['middle'];
        $refereetwo->last_name = $event->user['surname'];
        $refereetwo->code = str_random(40);
        $refereetwo->referee_name = $event->user['name2'];
        $refereetwo->referee_company = $event->user['company_name2'];
        $refereetwo->referee_email = $event->user['emailtwo'];
        $refereetwo->referee_relationship = $event->user['relationship2'];
        $refereetwo->referee_current_employer = $event->user['employer2'];
        $refereetwo->referee_contact = $event->user['contact2'];
        $refereetwo->completedtwo = 'No';
        $refereetwo->app_only = '1';
        $refereetwo->save();
        return $refereetwo;
    }


}
