<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
{
    public function send(Request $request)
    {
        $input = $request->all();
        $data = array(
            'name' => $input['name'],
            'tel'  => $input['tel'],
            'email' => $input['email'],
            'comments' => $input['message']
        );
        // Send the email
        Mail::send('emails/support', $data, function( $message ) use ($data)
        {
            $message->to(config('custom.admin_email'))
                ->from($data['email'])
                ->subject('Applications App - Support Request');
        });
        flash()->success('Thank you!', 'We have received your support request.');
        return back();
    }
}
