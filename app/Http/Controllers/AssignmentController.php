<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\AssignmentScore;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ScoreNotification;

class AssignmentController extends Controller
{
    public function single_assignment()
    {
        return view('students.assignment');
    }

    public function assignment_score()
    {
        // Mail::raw('You have got score', function ($message) {
        //     $message->to('ccitworld@gmail.com')->subject('Assignment Score');
        // });

        $user = User::find(54);

        $score = request('score');

        // Notification::send($user, new ScoreNotification($score));
        // return redirect()->back()->with('success', 'Score sent successfully');

        $user->notify(new ScoreNotification($score));
        return redirect()->back()->with('success', 'Score sent successfully');
    }
}
