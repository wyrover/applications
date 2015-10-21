<?php

namespace App\Http\Controllers;

use App\ReferenceFields;
use App\Settings;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Settings::where('company_id', '=', Auth::user()->company_id)->first();
        $ref = Settings::where('company_id', '=', Auth::user()->company_id)->first();
        return view('settings.index', compact('setting', 'ref'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $setting = Settings::create($request->except('references_id', '_token'));
//        flash()->success('Success', 'Settings successfully saved');
//        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->updateSettingById($request);
        flash()->success('Success', 'Settings successfully saved');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * @param Request $request
     */
    public function updateSettingById(Request $request)
    {
        $setting = Settings::find($request->segment(2));
        $setting->label = $request->input('label');
        $setting->hide = $request->input('hide');
        $setting->mandatory = $request->input('mandatory');
        $setting->type = $request->input('type');
        $setting->options = $request->input('options');
        $setting->label2 = $request->input('label2');
        $setting->hide2 = $request->input('hide2');
        $setting->mandatory2 = $request->input('mandatory2');
        $setting->type2 = $request->input('type2');
        $setting->options2 = $request->input('options2');
        $setting->label3 = $request->input('label3');
        $setting->hide3 = $request->input('hide3');
        $setting->mandatory3 = $request->input('mandatory3');
        $setting->type3 = $request->input('type3');
        $setting->options3 = $request->input('options3');
        $setting->label4 = $request->input('label4');
        $setting->hide4 = $request->input('hide4');
        $setting->mandatory4 = $request->input('mandatory4');
        $setting->type4 = $request->input('type4');
        $setting->options4 = $request->input('options4');
        $setting->label5 = $request->input('label5');
        $setting->hide5 = $request->input('hide5');
        $setting->mandatory5 = $request->input('mandatory5');
        $setting->type5 = $request->input('type5');
        $setting->options5 = $request->input('options5');
        $setting->label6 = $request->input('label6');
        $setting->hide6 = $request->input('hide6');
        $setting->mandatory6 = $request->input('mandatory6');
        $setting->type6 = $request->input('type6');
        $setting->options6 = $request->input('options6');
        $setting->label7 = $request->input('label7');
        $setting->hide7 = $request->input('hide7');
        $setting->mandatory7 = $request->input('mandatory7');
        $setting->type7 = $request->input('type7');
        $setting->options7 = $request->input('options7');
        $setting->label8 = $request->input('label8');
        $setting->hide8 = $request->input('hide8');
        $setting->mandatory8 = $request->input('mandatory8');
        $setting->type8 = $request->input('type8');
        $setting->options8 = $request->input('options8');
        $setting->label9 = $request->input('label9');
        $setting->hide9 = $request->input('hide9');
        $setting->mandatory9 = $request->input('mandatory9');
        $setting->type9 = $request->input('type9');
        $setting->options9 = $request->input('options9');
        $setting->label10 = $request->input('label10');
        $setting->hide10 = $request->input('hide10');
        $setting->mandatory10 = $request->input('mandatory10');
        $setting->type10 = $request->input('type10');
        $setting->options10 = $request->input('options10');
        $setting->update();
    }

    public function updateRefs($id, Request $request)
    {
        $setting = Settings::find($request->segment(3));
        $setting->label = $request->input('label');
        $setting->hide = $request->input('hide');
        $setting->mandatory = $request->input('mandatory');
        $setting->type = $request->input('type');
        $setting->options = $request->input('options');
        $setting->label2 = $request->input('label2');
        $setting->hide2 = $request->input('hide2');
        $setting->mandatory2 = $request->input('mandatory2');
        $setting->type2 = $request->input('type2');
        $setting->options2 = $request->input('options2');
        $setting->label3 = $request->input('label3');
        $setting->hide3 = $request->input('hide3');
        $setting->mandatory3 = $request->input('mandatory3');
        $setting->type3 = $request->input('type3');
        $setting->options3 = $request->input('options3');
        $setting->label4 = $request->input('label4');
        $setting->hide4 = $request->input('hide4');
        $setting->mandatory4 = $request->input('mandatory4');
        $setting->type4 = $request->input('type4');
        $setting->options4 = $request->input('options4');
        $setting->label5 = $request->input('label5');
        $setting->hide5 = $request->input('hide5');
        $setting->mandatory5 = $request->input('mandatory5');
        $setting->type5 = $request->input('type5');
        $setting->options5 = $request->input('options5');
        $setting->label6 = $request->input('label6');
        $setting->hide6 = $request->input('hide6');
        $setting->mandatory6 = $request->input('mandatory6');
        $setting->type6 = $request->input('type6');
        $setting->options6 = $request->input('options6');
        $setting->label7 = $request->input('label7');
        $setting->hide7 = $request->input('hide7');
        $setting->mandatory7 = $request->input('mandatory7');
        $setting->type7 = $request->input('type7');
        $setting->options7 = $request->input('options7');
        $setting->label8 = $request->input('label8');
        $setting->hide8 = $request->input('hide8');
        $setting->mandatory8 = $request->input('mandatory8');
        $setting->type8 = $request->input('type8');
        $setting->options8 = $request->input('options8');
        $setting->label9 = $request->input('label9');
        $setting->hide9 = $request->input('hide9');
        $setting->mandatory9 = $request->input('mandatory9');
        $setting->type9 = $request->input('type9');
        $setting->options9 = $request->input('options9');
        $setting->label10 = $request->input('label10');
        $setting->hide10 = $request->input('hide10');
        $setting->mandatory10 = $request->input('mandatory10');
        $setting->type10 = $request->input('type10');
        $setting->options10 = $request->input('options10');
        $setting->update();

        flash()->success('Success', 'Settings successfully saved');
        return back();
    }
}
