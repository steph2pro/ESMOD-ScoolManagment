<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialite;
class SpecialiteController extends Controller
{
    //


    /**
     * Enregistrer une nouvelle spécialité.
     */
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'libele' => 'required|string|max:255',
            'scolarite' => 'required|numeric|min:0',
            'inscription' => 'required|numeric|min:0',
        ]);

        // Créer un nouveau spécialité avec les données validées
        Specialite::create([
            'libele' => $validatedData['libele'],
            'frais_scolarite' => $validatedData['scolarite'],
            'frais_inscription' => $validatedData['inscription'],
        ]);

        // Rediriger avec un message de succès
        return redirect()->route('specialite')->with('success', 'Spécialité ajoutée avec succès');
    }
    public function index()
    {
        // Récupérer tous les specialite
        $specialites = Specialite::all();

        // Passer les données à la vue
        return view('specialite.specialite', compact('specialites'));
    }
    // Afficher le formulaire d'édition
    public function edit($id)
    {
        $specialite = Specialite::findOrFail($id);
        return view('specialite.specialiteEdit', compact('specialite'));
    }

    // Mettre à jour la spécialité dans la base de données
    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'libele' => 'required|string|max:255',
            'scolarite' => 'required|numeric|min:0',
            'inscription' => 'required|numeric|min:0',
        ]);

        // Trouver la spécialité par ID et mettre à jour
        $specialite = Specialite::findOrFail($id);
        $specialite->update([
            'libele' => $validatedData['libele'],
            'frais_scolarite' => $validatedData['scolarite'],
            'frais_inscription' => $validatedData['inscription'],
        ]);

        // Rediriger avec un message de succès
        return redirect()->route('specialite')->with('success', 'Spécialité mise à jour avec succès');
    }
    public function destroy($id)
    {
        $specialite = Specialite::findOrFail($id);
        $specialite->delete();

        return redirect()->route('specialite')->with('success', 'specialite supprimé avec succès');
    }
}
