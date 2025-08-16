<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DonorAuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.donor-login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('donor')->attempt($request->only('email', 'password'))) {
            return redirect()->route('donor.profile');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }



    //sign up 
    public function showRegisterForm()
    {
        return view('auth.donor-register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:donors,email',
            'password' => 'required|min:6|confirmed'
        ]);

        $donor = \App\Models\Donor::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);


        return redirect()->route('donor.login.form')->with('success', 'Registration successful! Please login.');
    }
}
