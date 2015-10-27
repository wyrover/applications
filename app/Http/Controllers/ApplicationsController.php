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
        $applications = Applications::where('company_id', Auth::user()->company_id)->paginate(10);
        
        $ref = References::where('applications_id', $applications->reference_id)->first();
        return view('applications.index', compact('applications','ref'));
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
        $settings = Settings::where('company_id', '=', Auth::user()->company_id)->where('references_id','=', 1)->first();
        $custom = Fields::where('settings_id', $settings->id)->where('references_id', '=', $request->segment(4))->get();

        $pdf = PDF::loadView('pdf.application', compact('ref', 'custom', 'settings'));
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
        $settings = Settings::where('company_id', '=', Auth::user()->company_id)->where('references_id','=', 1)->first();
        $custom = Fields::where('settings_id', $settings->id)->where('references_id', '=', $request->segment(4))->get();
        $pdf = PDF::loadView('pdf.referee', compact('profile', 'ref', 'settings','custom'));
        $name = ucwords($profile->first_name) . '-' . ucwords($profile->surname) . ' references ';

        $pdfFilename = urlencode(strtolower($name . '-' . date('d-m-Y') . '.pdf'));
        return $pdf->download($pdfFilename);
    }

    public function exportRefereeTwo(Request $request)
    {
        $profile = Applications::where('id', $request->segment(4))->first();
        $ref = References::where('applications_id', '=', $request->segment(4))->first();
        $settings = Settings::where('company_id', '=', $ref->company_id)->where('application_id', '!=', '0')->first();
        $custom = ReferenceFields::where('id', $settings->id)->get();
        $pdf = PDF::loadView('pdf.refereetwo', compact('profile', 'ref', 'settings','custom'));
        $name = $profile->first_name . '-' . $profile->surname . '-references-';

        $pdfFilename = urlencode(strtolower($name . '-' . date('d-m-Y') . '.pdf'));
        return $pdf->download($pdfFilename);
    }


    public function delete(Request $request)
    {
        $id = $request->input('id');
        $apps = Applications::where('id', '=' , $id)->first();
        $apps->delete();
        flash()->success('Success', "Application successfully removed");
        return redirect('/applications');

    }

}
