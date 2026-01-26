<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Hash;



class LoginController extends Controller
{
    public function register()
    {
        return view('authentication.register', [
            'title' => 'Register'
        ]);
    }

    public function registerPost(Request $request)
    {
        $info = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',

        ]);

        $user = new User();

        $user->name = $request->name;
        $user->username = $request->username;

        $photo_name = time() . '-' . $request->file('photo')->getClientOriginalName();
        $request->file('photo')->storeAs('/public/images', $photo_name);

        $user->photo = $photo_name;
        $user->email = $request->email;
        $user->password = $request->password;


        if ($user->save()) {

            event(new Registered($user));

            Auth::attempt(['email' => $request->email, 'password' => $request->password]);

            return redirect('/dashboard')->with('message', 'User Created Successfully...');
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard', [
            'title' => 'Dashboard'
        ]);
    }
    public function login()
    {
        return view('authentication.login', [
            'title' => 'Login'
        ]);

    }

    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect('dashboard')->with('message', 'Login Successfully');
        } else {
            return redirect('login')->with('wrong', 'The provided credentials do not match our records.');
        }

    }
    public function signout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'Logout Successfully');
    }

    //Email Verify
    public function emailNotice()
    {
        return 'You must verify your email first 24:28';
    }

    public function emailVerify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect('/dashboard')->with('message', 'Email Verified Successfully');
    }

}

// public function goToDB($data)
// {
//     return User::create([
//         'name' => $data['name'],
//         'username' => $data['username'],
//         'photo' => $data['photo'],
//         'email' => $data['email'],
//         'password' => bcrypt($data['password']),
//     ]);
// }
// }

// dd($information);

// $user = new User;
// $user->name = $request->name;
// $user->username = $request->username;
// $user->photo = $request->photo;
// $user->email = $request->email;
// $user->password = bcrypt($request->password);
// $user->save();
// return redirect('/register')->with('message', 'User Created Successfully');

