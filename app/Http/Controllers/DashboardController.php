<?php

namespace App\Http\Controllers;

use App\User;
use App\Company;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show Dashboard View
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (App::environment('local')) {
            $segment = \Request::url();
            $search = ['http://', 'https://', '.applications', '.app', '/' . \Request::segment(1)];
            $replace = ['', '', '', '', ''];
            $output = str_replace($search, $replace, $segment);
            $company = Company::where('user_id', Auth::user()->id);
        }
        if (App::environment('production')) {
            $segment = \Request::url();
            $search = ['http://', 'https://', '.madesimpleltd', '.co.uk', '/' . \Request::segment(1)];
            $replace = ['', '', '', '', ''];
            $output = str_replace($search, $replace, $segment);
            $company = Company::where('user_id', Auth::user()->id);
        }

        if (Auth::check() && Auth::user()->role != 'Admin' || $company == $output){
            return view('dashboard');
        }
        if (Auth::check() && Auth::user()->role == 'Admin') {
            $accounts = User::where('role', '!=', 'Admin')->paginate(10);
            return view('admin.dashboard', compact('accounts'));
        }
        return true;
    }
}
