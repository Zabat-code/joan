<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, false)) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Inicio de sesión exitoso',
                    'redirect' => route('dashboard'),
                    'user' => [
                        'name' => Auth::user()->name,
                        'email' => Auth::user()->email,
                    ]
                ], 200);
            }

            return redirect()->intended('dashboard');
        }
        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => 'Las credenciales proporcionadas son incorrectas.',
                'errors' => [
                    'email' => ['Las credenciales son incorrectas.']
                ]
            ], 422);
        }
        return back()->withErrors([
            'email' => 'Las credenciales son incorrectas.',
        ])->onlyInput('email');

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
