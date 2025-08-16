<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            session(['is_admin' => true]);
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Invalid credentials!');
    }

    public function logout()
    {
        session()->forget('is_admin');
        return redirect()->route('admin.login');
    }
}
