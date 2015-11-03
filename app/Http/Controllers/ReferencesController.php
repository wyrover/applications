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
        event(new ReferenceRequestEmail($user));
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
        $url = Company::where('url', $output)->first();
        $company = Company::where('id', $url->company_id)->first();

        $referee =  References::where('code', $code)->first();
        return view('references.submit', compact('referee', 'company'));
    }

    public function postReference(Request $request)
    {

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


}
