<?php

namespace App\Http\Controllers;

use App\Notifications;
use App\NotificationUser;
use App\User;
use App\Company;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Show Dashboard View
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $segment = \Request::url();
        $search = ['http://', 'https://', '.madesimpleltd', '.co.uk', '/' . \Request::segment(1)];
        $replace = ['', '', '', '', ''];
        $output = str_replace($search, $replace, $segment);
        $company = Company::where('user_id', Auth::user()->id);

        if (Auth::check() && Auth::user()->role != 'Admin' || $company == $output){

            //$user = Auth::user();
            //$listOfNotificationIdsUserHasSeen = $user->notifications->lists('id');
            $notifications = Notifications::all();
//            $user = Auth::user();
//            $listOfNotificationIdsUserHasSeen = $user->notifications->lists('id');
//            $notifications = DB::table('notifications')
//                ->whereNotIn('id', $listOfNotificationIdsUserHasSeen)->get();
//            dd($notifications);

            return view('dashboard', compact('notifications'));
        }
        if (Auth::check() && Auth::user()->role == 'Admin') {
            $accounts = User::where('role', '!=', 'Admin')->paginate(10);
            return view('admin.dashboard', compact('accounts'));
        }
        return true;
    }

    public function updateNotifications(Request $request)
    {
        $id = Auth::id();
        $input = $request->all();
        Notifications::find($input['banner_id'])->users()->attach(User::find($id));
//        DB::table('notification_user')
//            ->where('user_id', $id)
//            ->update(['read' => 1]);
        $nu = NotificationUser::where('user_id', '=', Auth::user()->id)->first();
        $nu->read = 1;
        $nu->update();

        return redirect()->back();
    }

}
