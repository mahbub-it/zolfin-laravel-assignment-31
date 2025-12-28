<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
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
        // Check for upload errors that happened at the system level
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            if (!$file->isValid()) {
                $errorCode = $file->getError();
                $errorMessage = $file->getErrorMessage();

                \Illuminate\Support\Facades\Log::error("Registration Upload Failed: Code $errorCode - $errorMessage");

                if ($errorCode === UPLOAD_ERR_NO_TMP_DIR) {
                    return back()->with('error', 'Server Error: Missing temporary folder. Please contact administrator.');
                }

                return back()->withErrors(['photo' => "Upload failed: $errorMessage"]);
            }
        }

        $info = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'username' => 'required',
            'password' => 'required|min:8',
            'photo' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = $request->password;

        $photo_name = time() . '-' . $request->file('photo')->getClientOriginalName();
        $request->file('photo')->storeAs('/public/images', $photo_name);

        $user->photo = $photo_name;

        if ($user->save()) {

            Auth::login($user);

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
        $request->validate([
            'login_id' => 'required',
            'password' => 'required|min:8',
        ]);

        $login_type = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $login_type => $request->login_id,
            'password' => $request->password
        ];

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

