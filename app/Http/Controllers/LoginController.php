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
            // Check the role of the authenticated user
            $user = Auth::user();
            // Store role in session
            $request->session()->put('role', $user->role);
            // if ($user->role === 'admin') {
            //     // Redirect to the admin dashboard
            //     return redirect()->route('dashboard')->with('role', 'admin')->with('popup', 'Welcome Admin!');
            // } else {
            //     // Redirect to the user dashboard
            //     return redirect()->route('dashboard')->with('role', 'user')->with('popup', 'Welcome User');
            // }

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
