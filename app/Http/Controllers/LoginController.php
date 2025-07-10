<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function halamanlogin()
    {
        return view('admin.login');
    }

    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only('username', 'password'))) {
            // Authentication successful
            $user = Auth::user();

            switch ($user->level) {
                case 'admin':
                    return redirect()->route('home-admin');
                case 'complaint':
                    return redirect()->route('home-admin');
                case 'submission':
                    return redirect()->route('home-admin');
                case 'ktp':
                    return redirect()->route('home-admin');
                case 'tax':
                    return redirect()->route('home-admin');
                case 'user':
                default:
                    return redirect()->route('home');
            }
        } else {
            // Authentication failed
            return redirect()->route('login')->withErrors(['loginError' => 'Invalid credentials']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
