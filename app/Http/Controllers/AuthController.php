<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('incidencias.index');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nick' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('nick', 'password');

        if (Auth::attempt(['nick' => $credentials['nick'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect()->route('incidencias.index');
        }

        return redirect()->route('login')->withErrors(['nick' => 'No coincide con bdd'])->withInput($request->only('nick'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}