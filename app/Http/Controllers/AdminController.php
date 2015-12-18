<?php

namespace App\Http\Controllers;

use App\Company;
use App\Notifications;
use App\ReferenceFields;
use App\Settings;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    /**
     * Store new account
     *
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $pass = $request->input('password');
        $user->role = 'Owner';
        if (! empty($pass)) {
            $user->password = bcrypt($pass);
        }
        $user->save();

        // Create Company
        $company = new Company;
        $company->name = $request->input('company_name');
        $company->email = $request->input('company_email');
        $company->address1 = $request->input('address1');
        $company->address2 = $request->input('address2');
        $company->city = $request->input('city');
        $company->postcode = $request->input('postcode');
        $company->url = strtolower(str_replace(' ','', $request->input('company_name')));
        $company->save();

        $user->company_id = $company->id;
        $user->update();

        $company->user_id = $user->id;
        $company->update();

        $settings = new Settings;
        $settings->application_id = 1;
        $settings->references_id = 0;
        $settings->company_id = $company->id;
        $settings->save();

        $refs = new ReferenceFields;
        $refs->settings_id = $settings->id;
        $refs->company_id = $company->id;
        $refs->save();

        $options = new Settings;
        $options->references_id = 1;
        $options->application_id = 0;
        $options->company_id = $company->id;
        $options->save();

        flash()->success('Success', 'Account successfully created');
        return back();
    }

    /**
     * Edit account form
     * @param $id
     */
    public function edit(Request $request)
    {
        $user = User::where('id', '=', $request->segment(3))->first();
        return view('admin.editAccount', compact('user'));
    }

    /**
     * Update account form
     * @param $id
     */
    public function update(Request $request)
    {
        $user = User::where('id', '=', $request->segment(4))->first();

        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $pass = $request->input('password');
        $user->role = 'Owner';
        if (! empty($pass)) {
            $user->password = bcrypt($pass);
        }
        $user->update();

        // Create Company
        $company = Company::where('id', $user->company_id)->first();
        $company->name = $request->input('company_name');
        $company->email = $request->input('company_email');
        $company->address1 = $request->input('address1');
        $company->address2 = $request->input('address2');
        $company->city = $request->input('city');
        $company->postcode = $request->input('postcode');
        $company->url = strtolower(str_replace(' ','', $request->input('company_name')));
        $company->update();

        flash()->success('Success', 'Account successfully updated');
        return redirect('dashboard');
    }

    /**
     * Delete a account
     *
     */
    public function delete(Request $request)
    {
        $user = User::where('id', '=', $request->segment(3))->first();
        Company::where('id', $user->company_id)->delete();
        $user->delete();

        flash()->info('Account Deleted', 'Account successfully removed');
        return redirect('dashboard');
    }

    public function notification()
    {
        return view('notifications.index');
    }

    public function storeNotification(Request $request)
    {
        Notifications::create($request->all());

        flash()->success('Success', 'Notification successfully saved. All users will be notified.');
        return back();
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
