<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        if ($request->password == $request->repassword) {
            $user_error = User::where('username', $request->username)->first();
            if ($user_error == null) {
                $user = User::create([
                    'username'    => $request->username,
                    'email'       => $request->email,
                    'password'    => Hash::make($request->password),
                ]);

                Auth::login($user);
                $request->session()->regenerate();
                return redirect('/');
            } else {
                return view('auth.register', [
                    'error' => 'Please check your username'
                ]);
            }
        } else {
            return view('auth.register', [
                'error' => 'Please check your password'
            ]);
        }
    }


    public function login(Request $request)
    {

        $user = User::where('username', $request->username)->first();
        if ($user) {

            if (Hash::check($request->password, $user['password'])) {
                Auth::login($user);
                $request->session()->regenerate();
                return redirect('/');
            } else {
                return view('auth.login', [
                    'error' => 'Please check your password'
                ]);
            }
        } else {
            return view('auth.login', [
                'error' => 'Please check your username'
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
