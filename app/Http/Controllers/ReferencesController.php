<?php

namespace App\Http\Controllers;

use App\Applications;
use App\Company;
use App\Events\ReferenceRequestEmail;
use App\References;
use App\Settings;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Fields;
use App\ReferenceFields;
use PDF;

class ReferencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $refs = References::where('company_id', Auth::user()->company_id)->where('reference_only', '=', 1)->paginate(config('custom.per_page'));
        return view('references.list', compact('refs'));
    }

    public function create()
    {
        $settings = Settings::where('company_id', '=', Auth::user()->company_id)->where('references_id', '=', 1)->get();
        return view('references.create', compact('settings'));
    }

    public function store(Request $request)
    {
        $user = $request->all();
        $referee = new References;
        $referee->company_id = Auth::user()->company_id;
        $referee->code = str_random(40);
        $referee->first_name = $request->input('first_name');
        $referee->last_name = $request->input('surname');
        $referee->referee_name = $request->input('name');
        $referee->referee_company = $request->input('company_name');
        $referee->referee_email = $request->input('email');
        $referee->reference_only = '1';
        $referee->ip_address = $request->ip();
        $referee->save();

        $companyId = Auth::user()->company_id;
        $cn = \App\Company::where('id', '=', $companyId)->first();

        if (! empty($request->input('email') && $request->input('contact') == 'Yes')) {

            $data = array(
                'email' => $request->input('email'),
                'name' => $request->input('name'),
                'worker' => $request->input('first_name') . ' ' . $request->input('surname'),
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

        if (! empty($request->input('emailtwo') && $request->input('contact2') == 'Yes')) {

            $refereetwo = new References;
            $refereetwo->company_id = Auth::user()->company_id;
            $refereetwo->first_name = $request->input('first_name');
            $refereetwo->last_name = $request->input('surname');
            $refereetwo->code = str_random(40);
            $refereetwo->referee_name = $request->input('name2');
            $refereetwo->referee_company = $request->input('company_name2');
            $refereetwo->referee_email = $request->input('emailtwo');
            $refereetwo->referee_contact = $request->input('contact2');
            $refereetwo->completedtwo = 'No';
            $refereetwo->reference_only = '1';
            $refereetwo->ip_address = $request->ip();
            $refereetwo->save();

            $data = array(
                'emailtwo' => $request->input('emailtwo'),
                'name' => $request->input('name2'),
                'worker' => $request->input('first_name') . ' ' . $request->input('surname'),
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
        flash()->success('Success','Reference request has been sent');
        return redirect('/references');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->segment(2);
        References::find($id)->delete();
        Applications::where('reference_id', $id)->delete();
        flash()->success('Success', 'Record successfully deleted');
        return back();
    }

    /**
     * Submit Reference
     *
     * @param Request $request
     */
    public function submitReference(Request $request)
    {
        $code = $request->segment(2);
        $segment = \Request::url();
        $search = ['http://', 'https://', '.madesimpleltd', '.co.uk/', \Request::segment(1) .'/', \Request::segment(2).'/', \Request::segment(3)];
        $replace = ['', '', '', '', '', '', ''];
        $output = str_replace($search, $replace, $segment);
        $company = Company::where('url', $output)->first();
        $referee =  References::where('code', $code)->first();
        $settings = Settings::where('company_id', $company->id)->where('references_id', '=', 1)->get();
        return view('references.submit', compact('referee', 'company','code','settings'));
    }

    public function postReference(Request $request)
    {
        $ref = References::where('id', $request->input('reference_id'))->first();
        $ref->referee_name = $request->input('name');
        $ref->referee_start_date = $request->input('applicant_started');
        $ref->referee_end_date = $request->input('date_left');
        $ref->referee_email = $request->input('email_address');
        $ref->position = $request->input('position');
        $ref->leaving = $request->input('reason_for_leaving');
        $ref->completed = 'Yes';
        $ref->update();


        $fields = Fields::create($request->except('_token','reference_id','first_name', 'middle_name', 'surname','name','phone','position','email_address','applicant_started','date_left','reason_for_leaving','code'));
        $ref->settings_id = $fields->id;
        $ref->update();

        flash()->success('Success', 'Thank you for submission');
        return redirect('/');
    }

    /**
     * Export PDF
     *
     * @param Request $request
     * @return mixed
     */
    public function export(Request $request)
    {
        $profile = References::where('company_id', Auth::user()->company_id)->first();
        $ref = References::where('id', '=', $request->segment(3))->first();
        $settings = Fields::where('references_id', '=', $request->segment(3))->first();
        $pdf = PDF::loadView('references.pdf', compact('profile', 'ref', 'settings'));
        $name = ucwords($ref->first_name) . '-' . ucwords($ref->last_name) . ' references ';

        $pdfFilename = urlencode(strtolower($name . '-' . date('d-m-Y') . '.pdf'));
        return $pdf->download($pdfFilename);
    }

    public function createNewReferenceTwo($request)
    {
        $refereetwo = new References;
        $refereetwo->company_id = Auth::user()->company_id;
        $refereetwo->first_name = $request->input('first_name');
        $refereetwo->last_name = $request->input('surname');
        $refereetwo->code = str_random(40);
        $refereetwo->referee_name = $request->input('name2');
        $refereetwo->referee_company = $request->input('company_name2');
        $refereetwo->referee_email = $request->input('emailtwo');
        $refereetwo->referee_contact = $request->input('contact2');
        $refereetwo->completedtwo = 'No';
        $refereetwo->save();
    }


}
