<?php

// app/Http/Controllers/Auth/LoginController.php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentification réussie
            $user = Auth::user();
            $request->session()->put('user', $user);  // Stocke les informations de l'utilisateur dans la session

            return redirect()->intended('/dashboard');
        }

        // Authentification échouée
        return redirect()->back()->with('error', 'information erroner');
    }
    // deconnexion
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

}
