<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'name' => 'required|unique:users|max:255',
            'username' => 'required|unique:users',
            'photo' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = User::create($info);

        if ($user = User::create($info)) {
            Auth::login($user);
            return redirect('/dashboard')->with('message', 'User Created Successfully');
        }
    }

    public function dashboard()
    {
        return view('authentication.dashboard', [
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

            return redirect('/dashboard')->with('message', 'Login Successfully');
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

