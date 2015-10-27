<?php

namespace App\Http\Controllers;

use App\Applications;
use App\Events\ReferenceRequestEmail;
use App\References;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ReferencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $refs = References::where('company_id', Auth::user()->company_id)->paginate(config('custom.per_page'));
        return view('references.list', compact('refs'));
    }

    public function create()
    {
        $settings = Settings::where('company_id', '=', Auth::user()->company_id)->where('application_id', '=', 1)->get();

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


}
