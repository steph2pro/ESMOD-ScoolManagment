<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Crypt;
class UtilisateurController extends Controller
{

    public function create()
    {

        $campus = Campus::all();

        return view('utilisateur.utilisateurAdd', compact( 'campus'));
    }


    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'sexe' => 'required|string|max:255',
            'password' => 'required|min:8',
        ]);

        // Chiffrer le mot de passeuse

// $encryptedPassword = Crypt::encrypt($validatedData['password']);

        $validatedData['password'] = Hash::make($validatedData['password']);
//dd($validatedData);
        // Créer un nouveau utilisateur
        Utilisateur::create($validatedData);

        // Rediriger avec un message de succès
        return redirect()->route('utilisateur')->with('success', 'utilisateur ajouté avec succès');
    }

    public function index()
    {
        // Récupérer tous les utilisateur
        $utilisateurs = Utilisateur::all();

        // Passer les données à la vue
        return view('utilisateur.utilisateur', compact('utilisateurs'));
    }

    // Afficher le formulaire d'édition
    public function edit($id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        $campus = Campus::all();

        return view('utilisateur.utilisateurEdit', compact('utilisateur','campus'));
    }

    // Mettre à jour la spécialité dans la base de données
    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'sexe' => 'required|string|max:255',
            'password' => 'required|min:8',
        ]);

        // Trouver la spécialité par ID et mettre à jour
        $utilisateur = Utilisateur::findOrFail($id);

        // Chiffrer le mot de passe
        $validatedData['password'] = Hash::make($validatedData['password']);

        $utilisateur->update([
            'nom' => $validatedData['nom'],
            'email' => $validatedData['email'],
            'role' => $validatedData['role'],
            'sexe' => $validatedData['sexe'],
            'password' => $validatedData['password'],
        ]);
        if (session('user')->role != "Administrateur") {
            // Rediriger avec un message de succès
            return redirect()->route('utilisateur.show',session("user")->id)->with('success', 'information modifier avec succès');
        } else {
            // Rediriger avec un message de succès
            return redirect()->route('utilisateur')->with('success', 'Utilisateur mise à jour avec succès');
        }
    }

    public function show($id)
    {
        $utilisateur = Utilisateur::findOrFail($id); // Récupère l'utilisateur par son ID
        return view('utilisateur.profil', compact('utilisateur'));
    }

    public function destroy($id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        $utilisateur->delete();

        return redirect()->route('utilisateur')->with('success', 'utilisateur supprimé avec succès');
    }

}
