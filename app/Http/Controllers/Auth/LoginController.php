<?php

// app/Http/Controllers/Auth/LoginController.php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Utilisateur;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function showLogoutForm()
    {
        return view('auth.logout');
    }

    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
    //         // Authentification réussie
    //         $user = Auth::user();
    //         $request->session()->put('user', $user);  // Stocke les informations de l'utilisateur dans la session

    //         return redirect()->intended('/dashboard');
    //     }

    //     // Authentification échouée
    //     return redirect()->back()->with('error', 'information erroner');
    // }
    public function login(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Tenter d'authentifier l'utilisateur
        $credentials = $request->only('email', 'password');
        //dd($credentials);
        if (Auth::guard('web')->attempt($credentials)) { // Utilisation du guard par défaut
            // Authentification réussie
            $user = Auth::guard('web')->user(); // Récupère l'utilisateur connecté

            // Stocke les informations de l'utilisateur dans la session
            $request->session()->put('user', $user);

            return redirect()->route('dashboard');
        }

        // Authentification échouée
        return redirect()->back()->with('error', 'information erroner');
    }
    // deconnexion
    public function logout(Request $request)
    {
        // Déconnexion de l'utilisateur
        Auth::logout();

        // Invalide la session
        $request->session()->invalidate();

        // Regénère le token de session pour éviter les attaques CSRF
        $request->session()->regenerateToken();

        // Redirige vers la page de connexion ou la page d'accueil
        return redirect('/login')->with('success', 'Vous êtes déconnecté.');
    }

}
