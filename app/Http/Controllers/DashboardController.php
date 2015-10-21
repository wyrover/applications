<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
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
        if (Auth::user()->role != 'Admin'){
            return view('dashboard');
        }
        else {
            $accounts = User::where('role', '!=', 'Admin')->paginate(10);
            return view('admin.dashboard', compact('accounts'));
        }
    }
}
