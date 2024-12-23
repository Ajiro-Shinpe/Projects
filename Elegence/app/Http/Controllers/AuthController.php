<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    // Show signup form
    public function showSignupForm() {
        return view('frontend.auth.signup');
    }

    // Handle signup
    public function signup(Request $request) {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required',
            'contactNo' => 'required|numeric',
            'DateOfBirth' => 'required|date',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'contactNo' => $request->contactNo,
            'DateOfBirth' => $request->DateOfBirth,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Account created successfully! Please login.');
    }

    // Show login form
    public function showLoginForm() {
        return view('frontend.auth.login');
    }

    // Handle login
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/')->with('success', 'Login successful!');
        }

        return back()->withErrors(['email' => 'Invalid email or password.']);
    }
}
