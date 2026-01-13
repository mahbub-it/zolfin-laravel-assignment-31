<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentProcessed;

class PaymentController extends Controller
{
    public function view()
    {
        return view('payment.view');
    }

    public function store()
    {
        // $code = rand(1000, 9999);

        // Mail::raw('Your verification code is ' . $code, function ($message) {
        //     $message->to('mahbub.webdev@gmail.com');
        //     $message->subject('Payment test with attachment Mail');
        //     $message->attach(public_path('/attachment/cat.jpg'));
        // });

        // return redirect()->back()->with('message', 'Payment Mail Sent Successfully');


        // Mail::send('emails.payment-processed', ['code' => $code], function ($message) {
        //     $message->to('mahbub.webdev@gmail.com');
        //     $message->subject('Payment test Mail');
        // });

        // return redirect()->back()->with('message', 'Payment Mail Sent Successfully');

        $user = User::find(54);

        Mail::to($user)->send(new PaymentProcessed($user));
        return redirect()->back()->with('message', 'Payment Mail Sent Successfully');
    }
}
