<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Metoda pentru afișarea formularului de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Metoda pentru procesarea datelor de login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirecționează în funcție de rol
            return redirect()->intended('dashboard'); // Modifică această linie conform logicii tale
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }
    //// Metoda pentru logout
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidarea sesiunii curente
        $request->session()->invalidate();

        // Regenerarea token-ului CSRF
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
