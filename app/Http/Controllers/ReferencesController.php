<?php

namespace App\Http\Controllers;

use App\Applications;
use App\Events\ReferenceRequestEmail;
use App\References;
use App\Settings;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Fields;
use App\ReferenceFields;;
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


    public function submitReference($code)
    {

    }

    public function export(Request $request)
    {
        //$profile = Applications::where('reference_id', $request->segment(4))->first();
        $ref = References::where('id', '=', $request->segment(3))->first();
        $settings = Fields::where('references_id', '=', $request->segment(3))->first();
        $pdf = PDF::loadView('pdf.referee', compact('profile', 'ref', 'settings'));
        $name = ucwords($ref->first_name) . '-' . ucwords($ref->last_name) . ' references ';

        $pdfFilename = urlencode(strtolower($name . '-' . date('d-m-Y') . '.pdf'));
        return $pdf->download($pdfFilename);
    }


}
