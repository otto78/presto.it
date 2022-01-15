<?php

namespace App\Http\Controllers;

use App\Mail\ThankYouMail;
use App\Mail\WorkWithUsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static function registerConfirmation(Request $request){
        $user = $request->input('name');
        $email = $request->input('email');
        $user_contact=compact('user', 'email');

        Mail::to($email)->send(new ThankYouMail($user_contact));
    }
    
    
    
    public function workWithUsSubmit(Request $request){
        $user = Auth::user()->name;
        $email = Auth::user()->email;
        $message = $request->input('message');

        $user_contact = compact('user', 'email', 'message');

        Mail::to($email)->send(new WorkWithUsMail($user_contact));

        return redirect(route('home'));
    }
}
