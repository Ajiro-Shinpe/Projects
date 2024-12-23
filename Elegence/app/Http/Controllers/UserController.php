<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Show all users
    public function index()
    {
        $users = User::all(); // Fetch all users from the database
        return view('frontend.Admin', compact('users')); // Pass users to the view
    }

    // Delete user
    public function deleteUser($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'User deleted successfully.');
        }

        return redirect()->back()->with('error', 'User not found.');
    }
}
