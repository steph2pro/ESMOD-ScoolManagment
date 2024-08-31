<?php

// app/Http/Controllers/Auth/LoginController.php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Campus;
use App\Models\Etudiant;
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
    //     // Valider les données du formulaire
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|string',
    //     ]);

    //     // Tenter d'authentifier l'utilisateur
    //     $credentials = $request->only('email', 'password');
    //     //dd($credentials);
    //     if (Auth::guard('web')->attempt($credentials)) { // Utilisation du guard par défaut
    //         // Authentification réussie
    //         $user = Auth::guard('web')->user(); // Récupère l'utilisateur connecté

    //         // Stocke les informations de l'utilisateur dans la session
    //         $request->session()->put('user', $user);

    //         if ($user->role != "Administrateur") {
    //             // Extraire le nom du campus à partir du rôle
    //             $nom = explode(',', $user->role);
    //             $nom_campus = trim($nom[1]);

    //             // Rechercher le campus correspondant dans la base de données
    //             $campus = Campus::where('nom', $nom_campus)->first();
    //             // Stocker les informations du campus dans une variable de session
    //             $request->session()->put('campus', $campus);

    //         }



    //         return redirect()->route('dashboard');
    //     }

    //     // Authentification échouée
    //     return redirect()->back()->with('error', 'information erroner: email ou mot de pass incorect');
    // }

    public function login(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        // Vérifier les informations dans la table utilisateurs
        if (Auth::guard('web')->attempt($credentials)) {
            // Authentification réussie
            $user = Auth::guard('web')->user();

            // Stocker les informations de l'utilisateur dans la session
            $request->session()->put('user', $user);

            if ($user->role != "Administrateur") {
                // Extraire le nom du campus à partir du rôle
                $nom = explode(',', $user->role);
                $nom_campus = trim($nom[1]);

                // Rechercher le campus correspondant dans la base de données
                $campus = Campus::where('nom', $nom_campus)->first();

                // Stocker les informations du campus dans une variable de session
                $request->session()->put('campus', $campus);
            }

            return redirect()->route('dashboard');
        }

        // Si l'authentification échoue, vérifier dans la table des étudiants
        $etudiant = Etudiant::where('email', $request->email)->first();
        // dd($etudiant);

        if ($etudiant && $etudiant->mot_de_pass == $request->password) {
            // Authentification réussie pour un étudiant
            $request->session()->put('etudiant', $etudiant);


            return redirect()->route('dashboardEtudiant',$etudiant->id);
            dd($request->password);
            // Stocker les informations de l'étudiant dans la session
        }

        // Authentification échouée pour les deux cas
        return redirect()->back()->with('error', 'Informations incorrectes : email ou mot de passe incorrect');
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
