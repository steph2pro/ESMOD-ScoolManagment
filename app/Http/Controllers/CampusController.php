<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use Illuminate\Http\Request;

class CampusController extends Controller
{
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
        ]);

        // Créer un nouveau campus
        Campus::create($validatedData);

        // Rediriger avec un message de succès
        return redirect()->route('campus')->with('success', 'Campus ajouté avec succès');
    }
    public function index()
    {
        // Récupérer tous les campus
        $campuses = Campus::all();

        // Passer les données à la vue
        return view('campus.campus', compact('campuses'));
    }
    //methode pour recuperer les infos d'un campus
    public function edit($id)
    {
        $campus = Campus::findOrFail($id);
        return view('campus.campusEdit', compact('campus')); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
        ]);

        $campus = Campus::findOrFail($id);
        $campus->update($request->all());

        return redirect()->route('campus')->with('success', 'Campus modifié avec succès');
    }
    public function destroy($id)
    {
        $campus = Campus::findOrFail($id);
        $campus->delete();

        return redirect()->route('campus')->with('success', 'Campus supprimé avec succès');
    }
}
