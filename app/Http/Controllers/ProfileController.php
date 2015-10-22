<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Show authorised user (who's logged in) their profile in a form
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $company = Company::where('user_id', Auth::user()->id)->first();
        dd($company);
        return view('profile.form', compact('user', 'company'));
    }

    /**
     * Update the users profile
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find($request->input('user_id'));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        if ($request->input('password') != '') {
            $user->password = bcrypt($request->input('password'));
        }
        $user->update();

        $company = Company::where('user_id', $request->input('user_id'))->first();
        $company->name = $request->input('company_name');
        $company->description = $request->input('company_description');
        $company->phone = $request->input('company_phone');
        $company->email = $request->input('company_email');
        $company->address1 = $request->input('company_address');
        $company->address2 = $request->input('company_address2');
        $company->city = $request->input('company_city');
        $company->postcode = $request->input('company_postcode');
        if ($request->hasFile('logo')){
            $file = $request->file('logo');
            $name = Str::random(25).'.'.$file->getClientOriginalExtension();
            $image = Image::make($request->file('logo')->getRealPath())->resize(210, 113, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->save(public_path() . '/uploads/' . $name);
            $company->logo = $name;
        }
        $company->update();

        flash()->success('Success', 'Profile updated');
        return back();
    }
}
