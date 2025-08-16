<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Volunteer;
use Illuminate\Support\Facades\Hash;

class VolunteerAuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.volunteer-login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('volunteer')->attempt($request->only('email', 'password'))) {
            return redirect()->route('volunteer.profile');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }



    //sign up  
    public function showRegisterForm()
    {
        return view('auth.volunteer-register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:volunteers,email',
            'password' => 'required|min:6|confirmed'
        ]);

        $volunteer = \App\Models\Volunteer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('volunteer.login.form')->with('success', 'Registration successful! Please login.');
    }
}
