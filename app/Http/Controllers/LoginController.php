<?php
// app/Http/Controllers/LoginController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use views;

class LoginController extends Controller
{
    public function submit(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = Auth::user();
            $request->session()->put('role', $user->role);

            return redirect()->route('dashboard')->with('popup', 'Welcome ' . ucfirst($user->role) . '!');
        } else {
            return redirect()->route('login')->with('error', 'Invalid credentials')->withInput();
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
