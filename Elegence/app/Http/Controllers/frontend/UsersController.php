<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users; // Make sure this import is correct

class UsersController extends Controller
{
    public function index()
    {
        return view('frontend.Users');
    }

    public function Signup(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'gender'     => 'required|in:M,F,O',
            'contactNo'  => 'required|numeric',
            'DateOfBirth'=> 'required|date',
            'email'      => 'required|email|unique:users_data,email',
            'password'   => 'required|min:6',
        ]);

        Users::create([
            'first_name' => $request->input('first_name'),
            'last_name'  => $request->input('last_name'),
            'gender'     => $request->input('gender'),
            'contactNo'  => $request->input('contactNo'),
            'DateOfBirth'=> $request->input('DateOfBirth'),
            'email'      => $request->input('email'),
            'password'   => $request->input('password'),
        ]);

        return redirect('/')->with('success', 'Your account has been created successfully!');
    }

    public function ViewUsersData()
    {
        $users = Users::all();
        return view('frontend.Admin', compact('users'));
    }
}
