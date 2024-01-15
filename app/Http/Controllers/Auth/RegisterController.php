<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users', // Assuming 'username' is unique in 'users' table
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:journalist,editor,reader', // Validates against the listed roles
        ]);

        // Create the user
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            // Add other fields like email, name, etc., if needed
        ]);

        // Logarea automată a utilizatorului, etc.

        return redirect()->intended('dashboard'); // Schimbă cu ruta dorită
    }
}

