<?php

namespace App\Http\Controllers;

use App\Applications;
use App\Fields;
use App\ReferenceFields;
use App\References;
use App\Settings;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PDF;

class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Applications::where('company_id', Auth::user()->company_id)->where('app_only', '=', 'true')->orderBy('created_at', 'DESC')->paginate(10);
        //$refs = References::where('company_id', Auth::user()->company_id)->get();
        return view('applications.index', compact('applications','refs'));
    }

    /**
     * Export PDF application form
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function exportApplication(Request $request)
    {
        $name = 'application';
        $pdfFilename = urlencode(strtolower($name . '-' . date('d-m-Y') . '.pdf'));
        $ref = References::where('applications_id', '=', $request->segment(4))->first();
        $refOne = References::where('id', $request->input('ref_one'))->first();
        $refTwo = References::where('id', $request->input('ref_two'))->first();
        $settings = Settings::where('company_id', '=', Auth::user()->company_id)->where('references_id','=', 0)->first();
        $custom = Fields::where('settings_id', $settings->id)->where('application_id', '=', $request->segment(4))->get();

        $pdf = PDF::loadView('pdf.application', compact('refOne', 'refTwo', 'ref', 'custom', 'settings'));
        return $pdf->download($pdfFilename);
    }

    /**
     * Export profile PDF
     *
     * @param Request $request
     * @return mixed
     */
    public function exportProfile(Request $request)
    {
        $profile = Applications::where('id', $request->segment(3))->first();
        $pdf = PDF::loadView('pdf.profile', compact('profile'));
        $name = $profile->first_name . '-' . $profile->surname . '-profile-';
        $pdfFilename = urlencode(strtolower($name . '-' . date('d-m-Y') . '.pdf'));
        return $pdf->download($pdfFilename);
    }

    public function exportReferee(Request $request)
    {
        $profile = Applications::where('reference_id', $request->segment(4))->first();
        $ref = References::where('id', '=', $request->segment(4))->first();
        $settings = Fields::where('references_id', '=', $request->segment(4))->first();
        $pdf = PDF::loadView('pdf.referee', compact('profile', 'ref', 'settings'));
        $name = ucwords($profile->first_name) . '-' . ucwords($profile->surname) . ' references ';

        $pdfFilename = urlencode(strtolower($name . '-' . date('d-m-Y') . '.pdf'));
        return $pdf->download($pdfFilename);
    }

    public function exportRefereeTwo(Request $request)
    {
        $profile = Applications::where('reference_two_id', $request->segment(4))->first();
        $ref = References::where('id', '=', $request->segment(4))->first();
        $settings = Fields::where('references_id', '=', $request->segment(4))->first();

        $pdf = PDF::loadView('pdf.refereetwo', compact('profile', 'ref', 'settings','custom'));
        $name = $profile->first_name . '-' . $profile->surname . '-references-';

        $pdfFilename = urlencode(strtolower($name . '-' . date('d-m-Y') . '.pdf'));
        return $pdf->download($pdfFilename);
    }


    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $apps = Applications::where('id', '=' , $id)->first();
        $apps->delete();
        flash()->success('Success', "Application successfully removed");
        return redirect('/applications');

    }

}
