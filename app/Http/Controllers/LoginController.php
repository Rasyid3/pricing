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
        // Validate the request
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Authenticate the user
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Redirect to the dashboard
            return redirect()->route('dashboard')->with('success', 'Login successful!');
        } else {
            // Redirect back to the login page with an error message
            return redirect()->route('login')->withErrors(['email' => 'Invalid credentials']);
        }
    }
}
