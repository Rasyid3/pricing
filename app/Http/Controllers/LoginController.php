<?php
// app/Http/Controllers/LoginController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use views;

class LoginController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard')->with('success', 'Login successful!');
        } else {
            return redirect()->route('login')->withErrors(['email' => 'Invalid credentials']);
        }
    }
}
