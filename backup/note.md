# Class 26 Notes

## Code
- php artisan make:controller PaymentController
- Route::get('make-payment', [PaymentController::class, 'view']);

<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function view()
    {
        return view('payment.view');
    }

    public function store()
    {
        $code = rand(1000, 9999);

        Mail::raw('Your verification code is ' . $code, function ($message) {
            $message->to('mahbub.webdev@gmail.com');
            $message->subject('Payment test Mail');
        });

        return redirect()->back()->with('message', 'Payment Mail Sent Successfully');
    }
}

-------------------------------------------------------------

- php artisan make:mail PaymentProcessed

-------------------------------------------------------------
- php artisan vendor:publish --tag=laravel-mail
- php artisan make:mail PaymentReceived --markdown=emails.payment-received
-------------------------------------------------------------

- php artisan make:controller AssignmentController
- php artisan make:mail AssignmentScore
- php artisan make:notification ScoreNotification

-------------------------------------------------------------

- php artisan notifications:table
- php artisan migrate
- php artisan make:controller NotificationController
- php artisan vendor:publish --tag=laravel-notifications
-------------------------------------------------------------

## Class 27 Notes
# Code
- php artisan down
- php artisan up
- php artisan down --redirect=https://dreamwebdev.com
- php artisan down --secret="0171449728201974497282-Dream-web-dev"
- php artisan down --secret="0171449728201974497282-Dream-web-dev" --redirect="https://dreamwebdev.com"
- link: http://google.dreamwebdev.com/0171449728201974497282-Dream-web-dev
- php artisan down --secret="0171449728201974497282-Dream-web-dev" --redirect="https://dreamwebdev.com"

----------------------------------------------------
- link: https://google.dreamwebdev.com/0171449728201974497282-Dream-web-dev
--------------------------------------------------------------





