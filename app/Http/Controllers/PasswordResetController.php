<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PasswordResetController extends Controller
{
    public function showResetForm()
    {
        return view('auth.reset-password');
    }

    public function reset(Request $request)
    {
        $request->validate([
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('login')->with('success', 'Password successfully reset.');
    }
}
