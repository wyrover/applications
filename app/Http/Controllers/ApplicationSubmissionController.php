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
        if (App::environment('local')) {
            $segment = \Request::url();
            $search = ['http://', 'https://', '.applications', '.app', '/application'];
            $replace = ['', '', '', '', ''];
            $output = str_replace($search, $replace, $segment);
            $company = Company::where('url', $output)->first();
            $fields = Settings::where('company_id', '=', $company->id)->get();
            return view('applications.submission', compact('company', 'fields'));
        }
        if (App::environment('production')) {
            $segment = \Request::url();
            $search = ['http://', 'https://', '.madesimpleltd', '.co.uk', '/application'];
            $replace = ['', '', '', '', ''];
            $output = str_replace($search, $replace, $segment);
            $company = Company::where('url', $output)->first();
            $fields = Settings::where('company_id', '=', $company->id)->get();
            return view('applications.submission', compact('company', 'fields'));
        }
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
                       'contactable', 'accept_data_protection', 'company_id', 'employer_name3', 'job_title3', 'employer_start_date3', 'employer_end_date3', 'employer_responsibilities3', 'signed_by','code'
        ]));
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
        $ref->referee_name2 = $request->input('referee_name2');
        $ref->referee_company2 = $request->input('referee_company2');
        $ref->referee_email2 = $request->input('referee_email2');
        $ref->referee_relationship2 = $request->input('referee_relationship2');
        $ref->referee_start_date2 = $request->input('referee_start_date2');
        $ref->referee_end_date2 = $request->input('referee_end_date2');
        $ref->referee_current_employer2 = $request->input('referee_current_employer2');
        $ref->referee_contact2 = $request->input('referee_contact2');
        $ref->save();

        $application->reference_id = $ref->id;
        $application->company_id = $ref->company_id;
        $application->update();

        $settings = new Settings;
        $settings->company_id = $ref->company_id;
        $settings->application_id = $application->id;
        $settings->save();

        // Check if referee is contactable then
        $referee = $ref;

        if ($ref->referee_contact == 'Yes' && $ref->completed == 0){
            // Fire Event to send email to referee 1
            //event(new EmailRefereeOne($referee, $application));
            $data = array(
                'worker'  => ucwords($application->first_name) .' '. ucwords($application->surname),
                'company' => $ref->company->name,
                'email'   => $ref->referee_email,
                'refereeName' => $ref->referee_name,
                'code' => $application->code
            );
            // Send the email
            Mail::send('emails/applications/submission', $data, function( $message ) use ($data)
            {
                $message->to($data['email'])
                    ->from(config('custom.noreplyemail'), 'Made Simple')
                    ->subject('Reference Request');
            });
        }
        if ($ref->referee_contact2 == 'Yes' && $ref->completed == 0){
            // Fire Event to send email to referee 2
            //event(new EmailRefereeTwo($referee, $application));
            $data = array(
                'worker'  => ucwords($application->first_name) .' '. ucwords($application->surname),
                'company' => $ref->company->name,
                'email'   => $ref->referee_email,
                'refereeName' => $ref->referee_name,
                'code'    => $application->code
            );
            // Send the email
            Mail::send('emails/applications/submission', $data, function( $message ) use ($data)
            {
                $message->to($data['email'])
                    ->from(config('custom.noreplyemail'), 'Made Simple')
                    ->subject('Reference Request');
            });
        }
        flash()->success('Success', 'Thank you! Your submission has been successful and your referees emailed.');
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
            $search = ['http://', 'https://', '.madesimpleltd', '..co.uk', '/reference', '/'.\Request::segment(2)];
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
        $settings = Settings::where('company_id', $applicant->company_id)->get();

        return view('applications.submit', compact('code', 'applicant', 'settings'));
    }

    public function refereeSubmitted(Request $request)
    {
//        $code = $request->segment(2);
        //dd($request->all());
        $ref = new References;
        $ref->referee_name = $request->input('name');
        $ref->referee_start_date = $request->input('applicant_started');
        $ref->referee_end_date = $request->input('date_left');
        $ref->referee_email = $request->input('email_address');
        $ref->leaving = $request->input('reason_for_leaving');
        $ref->completed = 'Yes';
        $ref->save();

        $fields = Fields::create($request->except('_token','name','phone','position','email_address','applicant_started','date_left','reason_for_leaving','code'));
        //$settings = Settings::create($request->only('label', 'label2', 'label3', 'label4', 'label5', 'label6', 'label7', 'label8', 'label9', 'label10', 'company_id'));
        $settings = Settings::where('company_id', Auth::user()->company_id)->first();

        $settings->fields_id = $fields->id;
        $settings->update();


        $fields->settings_id = $settings->id;
        $fields->update();

        $company = Company::where('url', $request->segment(1))->first();
        dd($company);
        $ref->settings_id = $settings->id;
        $ref->company_id = ;
        $ref->update();

        flash()->success('Success', 'Thank you for submission');
        return redirect('/');
    }





}
