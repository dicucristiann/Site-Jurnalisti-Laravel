<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            // Regulile de validare
        ]);

        // Crearea utilizatorului
        $user = User::create([
            // Datele utilizatorului
        ]);

        // Logarea automată a utilizatorului, etc.

        return redirect()->intended('dashboard'); // Schimbă cu ruta dorită
    }
}

