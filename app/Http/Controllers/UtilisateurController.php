<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\Utilisateur;

class UtilisateurController extends Controller
{
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

        // Chiffrer le mot de passe
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
        return view('utilisateur.utilisateurEdit', compact('utilisateur'));
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

        // Rediriger avec un message de succès
        return redirect()->route('utilisateur')->with('success', 'Spécialité mise à jour avec succès');
    }

    public function destroy($id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        $utilisateur->delete();

        return redirect()->route('utilisateur')->with('success', 'utilisateur supprimé avec succès');
    }

}
