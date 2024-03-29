<?php

namespace App\Http\Controllers;

use App\Applications;
use App\Company;
use App\Fields;
use App\ReferenceFields;
use App\Settings;
use App\Events\EmailRefereeOne;
use App\Events\EmailRefereeTwo;
use App\Http\Requests\CreateNewApplicationRequest;
use App\References;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ApplicationSubmissionController extends Controller
{

    /**
     * Show application form for new submissions
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $segment = \Request::url();
        $search = ['http://', 'https://', '.madesimpleapp', '.co.uk', '/application'];
        $replace = ['', '', '', '', ''];
        $output = str_replace($search, $replace, $segment);
        $company = Company::where('url', $output)->first();

        $field = Settings::where('company_id', '=', $company->id)->where('application_id','=', 1)->first();

        return view('applications.submission', compact('company', 'field'));
    }

    /**
     * Store new application form submission
     *
     * @param \Illuminate\Http\CreateNewApplicationRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNewApplicationRequest $request)
    {
        // Create New Application
        $application = Applications::create($request->only(['first_name' , 'middle_name' , 'surname', 'address_line1', 'address_line2', 'city', 'postcode', 'telephone', 'visa_valid_to', 'mobile', 'email',
                       'ni_number', 'driver', 'endorsements', 'vehicle_access', 'right_to_work', 'evidence_right_to_work', 'comments', 'education', 'employer_name', 'job_title', 'employer_start_date',
                       'employer_end_date', 'employer_responsibilities', 'employer_name2', 'job_title2', 'employer_start_date2', 'employer_end_date2', 'employer_responsibilities2', 'health_info',
                       'criminal_convictions', 'convictions_comments', 'next_of_kin_name', 'next_of_kin_address', 'next_of_kin_telephone', 'next_of_kin_mobile', 'next_of_kin_relationship', 'created_at', 'updated_at',
                       'accept_data_protection', 'app_only', 'employment_gaps', 'company_id', 'employer_name3', 'job_title3', 'employer_start_date3', 'employer_end_date3', 'employer_responsibilities3', 'signed_by','code'
        ]));

        $application->contactable = json_encode($request->input('contactable'));
        // Create New Reference
        $ref = new References;
        $ref->company_id = $request->input('company_id');
        $ref->applications_id = $application->id;
        $ref->references_id = $request->input('reference_id');
        $ref->referee_name = $request->input('referee_name');
        $ref->referee_company = $request->input('referee_company');
        $ref->referee_email = $request->input('referee_email');
        $ref->referee_relationship = $request->input('referee_relationship');
        $ref->referee_start_date = $request->input('referee_start_date');
        $ref->referee_end_date = $request->input('referee_end_date');
        $ref->referee_current_employer = $request->input('referee_current_employer');
        $ref->referee_contact = $request->input('referee_contact');
        $ref->code = str_random(40);
        $ref->settings_id = $request->input('settings_id');
        $ref->save();


//        $settings = new Settings;
//        $settings->company_id = $ref->company_id;
//        $settings->application_id = $application->id;
//        $settings->save();

        $fields = Fields::create($request->only('label', 'label2', 'label3', 'label4', 'label5', 'label6', 'label7', 'label8', 'label9', 'label10','answer', 'answer2', 'answer3', 'answer4', 'answer5', 'answer6', 'answer7', 'answer8', 'answer9', 'answer10'));
        $fields->settings_id = $request->input('settings_id');
        $fields->update();

        // Check if referee is contactable then
        $referee = $ref;

        if ($request->input('referee_contact') == 'Yes'){
            // Fire Event to send email to referee 1
            //event(new EmailRefereeOne($referee, $application));
            $data = array(
                'worker'  => ucwords($application->first_name) .' '. ucwords($application->surname),
                'company' => $ref->company->name,
                'email'   => $ref->referee_email,
                'refereeName' => $ref->referee_name,
                'code' => $ref->code
            );
            // Send the email
            Mail::send('emails/applications/submission', $data, function( $message ) use ($data)
            {
                $message->to($data['email'])
                    ->from(config('custom.noreplyemail'), 'Made Simple')
                    ->subject('Reference Request');
            });
            $application->reference_id = $ref->id;
            $application->company_id = $ref->company_id;
            $application->code = $ref->code;
            $application->app_only = 'true';
            $application->update();
        }
        if ($request->input('referee_contact2') == 'Yes'){
//            $applicationtwo = Applications::create($request->only(['first_name' , 'middle_name' , 'surname', 'address_line1', 'address_line2', 'city', 'postcode', 'telephone', 'visa_valid_to', 'mobile', 'email',
//                'ni_number', 'driver', 'endorsements', 'vehicle_access', 'right_to_work', 'evidence_right_to_work', 'comments', 'education', 'employer_name', 'job_title', 'employer_start_date',
//                'employer_end_date', 'employer_responsibilities', 'employer_name2', 'job_title2', 'employer_start_date2', 'employer_end_date2', 'employer_responsibilities2', 'health_info',
//                'criminal_convictions', 'convictions_comments', 'next_of_kin_name', 'next_of_kin_address', 'next_of_kin_telephone', 'next_of_kin_mobile', 'next_of_kin_relationship', 'created_at', 'updated_at',
//                'accept_data_protection', 'company_id', 'employer_name3', 'job_title3', 'employer_start_date3', 'employer_end_date3', 'employer_responsibilities3', 'signed_by','code'
//            ]));
//            $applicationtwo->contactable = json_encode($request->input('contactable'));

            $reftwo = new References;
            $reftwo->company_id = $request->input('company_id');
            $reftwo->applications_id = $application->id;
            $reftwo->references_id = $request->input('reference_id');
            $reftwo->referee_name = $request->input('referee_name2');
            $reftwo->referee_company = $request->input('referee_company2');
            $reftwo->referee_email = $request->input('referee_email2');
            $reftwo->referee_relationship = $request->input('referee_relationship2');
            $reftwo->referee_start_date = $request->input('referee_start_date2');
            $reftwo->referee_end_date = $request->input('referee_end_date2');
            $reftwo->referee_current_employer = $request->input('referee_current_employer2');
            $reftwo->referee_contact2 = $request->input('referee_contact2');
            $reftwo->code = str_random(40);
            $reftwo->settings_id = $request->input('settings_id');
            $reftwo->save();

            $application->reference_two_id = $reftwo->id;
            $application->company_id = $request->input('company_id');
            $application->code_two = $reftwo->code;
            $application->update();

            $data = array(
                'worker'  => ucwords($application->first_name) .' '. ucwords($application->surname),
                'company' => $ref->company->name,
                'email'   => $request->input('referee_email2'),
                'refereeName' => $reftwo->referee_name,
                'code'    => $reftwo->code
            );
            // Send the email
            Mail::send('emails/applications/submissiontwo', $data, function( $message ) use ($data)
            {
                $message->to($data['email'])
                    ->from(config('custom.noreplyemail'), 'Made Simple')
                    ->subject('Reference Request');
            });

        }
        $fields->application_id = $application->id;
        $fields->update();

        flash()->success('Success', 'Thank you! Your submission has been successful and referees emailed.');
        return back();
    }

    public function reference()
    {
        if (App::environment('local')) {
            $segment = \Request::url();
            $search = ['http://', 'https://', '.applications', '.app', '/reference', '/' . \Request::segment(2)];
            $replace = ['', '', '', '', '', ''];
            $output = str_replace($search, $replace, $segment);
            $company = Company::where('url', $output)->first();
            $code = \Request::segment(2);
            $user = Applications::where('code', $code)->first();
            $settings = Settings::where('company_id', '=', $company->id)->where('references_id', '!=', 0)->get();

            return view('references.index', compact('company', 'user', 'settings'));
        }
        if (App::environment('production')) {
            $segment = \Request::url();
            $search = ['http://', 'https://', '.madesimpleapp', '.co.uk', '/reference', '/'.\Request::segment(2)];
            $replace = ['','','','','',''];
            $output = str_replace($search, $replace, $segment);
            $company = Company::where('url', $output)->first();
            $code = \Request::segment(2);
            $user = Applications::where('code', $code)->first();
            $settings = Settings::where('company_id', '=', $company->id)->where('references_id', '!=', 0)->get();

            return view('references.index', compact('company', 'user', 'settings'));
        }
        return true;
    }

    public function postReference(Request $request)
    {
        $applicant = Applications::where('code', $request->segment(2))->first();
        $settings = Settings::where('company_id', $applicant->company_id)->where('references_id', '=', 1)->get();
        $company = Company::where('id', $applicant->company_id)->first();
        $referee =  References::where('code', $request->segment(2))->first();
        return view('applications.submit', compact('company', 'applicant', 'settings', 'referee'));
    }

    public function refereeSubmitted(Request $request)
    {
        $code = $request->segment(2);
        $ref = References::where('id', $request->input('referee_id'))->first();
        $ref->referee_name = $request->input('name');
        $ref->referee_start_date = $request->input('applicant_started');
        $ref->referee_end_date = $request->input('date_left');
        $ref->referee_email = $request->input('email_address');
        $ref->position = $request->input('position');
        $ref->leaving = $request->input('reason_for_leaving');
        $ref->re_employ = $request->input('re_employ');
        $ref->completed = 'Yes';
        $ref->update();

        $fields = Fields::create($request->except('_token','referee_id','first_name', 'middle_name', 'surname','name','phone','position','email_address','applicant_started','date_left','reason_for_leaving','code', 're_employ'));
        $settings = Settings::where('id', $ref->settings_id)->first();

        $settings->fields_id = $fields->id;
        $settings->update();

        $apps = Applications::where('code', $code)->first();
        $apps->app_only = 'true';
        $apps->reference_id = $ref->id;
        $apps->update();

        $fields->settings_id = $settings->id;
        $fields->references_id = $ref->id;
        $fields->update();

        $segment = \Request::url();
        $search = ['http://', 'https://', '.madesimpleapp', '.co.uk/', \Request::segment(1) .'/', \Request::segment(2).'/', \Request::segment(3)];
        $replace = ['', '', '', '', '', '', ''];
        $output = str_replace($search, $replace, $segment);
        $company = Company::where('url', $output)->first();

        $ref->settings_id = $settings->id;
        $ref->company_id = $company->id;
        $ref->applications_id = $apps->id;
        $ref->update();


        flash()->success('Success', 'Thank you for submission');
        return redirect('/');
    }

    public function postReferenceTwo(Request $request)
    {
        $applicant = Applications::where('code_two', $request->segment(2))->first();
        $settings = Settings::where('company_id', $applicant->company_id)->where('references_id', '=', 1)->get();
        $company = Company::where('id', $applicant->company_id)->first();
        $referee =  References::where('code', $request->segment(2))->first();

        return view('applications.submit_two', compact('company', 'applicant', 'settings', 'referee'));
    }

    public function refereeSubmittedTwo(Request $request)
    {
        $code = $request->segment(2);
        $refTwo = References::where('id', $request->input('referee_id'))->first();
        $refTwo->referee_name = $request->input('name');
        $refTwo->referee_start_date = $request->input('applicant_started');
        $refTwo->referee_end_date = $request->input('date_left');
        $refTwo->referee_email = $request->input('email_address');
        $refTwo->position = $request->input('position');
        $refTwo->leaving = $request->input('reason_for_leaving');
        $refTwo->completedtwo = 'Yes';
        $refTwo->re_employ = $request->input('re_employ');
        $refTwo->update();

        $fields = Fields::create($request->except('_token','re_employ','referee_id','first_name', 'middle_name', 'surname','name','phone','position','email_address','applicant_started','date_left','reason_for_leaving','code'));
        //$settings = Settings::create($request->only('label', 'label2', 'label3', 'label4', 'label5', 'label6', 'label7', 'label8', 'label9', 'label10', 'company_id'));
        $settings = Settings::where('id', $refTwo->settings_id)->first();

        $settings->fields_id = $fields->id;
        $settings->update();

        $apps = Applications::where('code', $code)->first();
        $apps->reference_two_id = $refTwo->id;
        $apps->update();

        $fields->settings_id = $settings->id;
        $fields->references_id = $refTwo->id;
        $fields->update();

        $segment = \Request::url();
        $search = ['http://', 'https://', '.madesimpleapp', '.co.uk/', \Request::segment(1) .'/', \Request::segment(2).'/', \Request::segment(3)];
        $replace = ['', '', '', '', '', '', ''];
        $output = str_replace($search, $replace, $segment);
        $company = Company::where('url', $output)->first();

        $refTwo->settings_id = $settings->id;
        $refTwo->company_id = $company->id;
        $refTwo->applications_id = $apps->id;
        $refTwo->update();

        flash()->success('Success', 'Thank you for submission');
        return redirect('/');
    }





}
