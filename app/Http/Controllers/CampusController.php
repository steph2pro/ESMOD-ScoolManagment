<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\Specialite;
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

    public function indexCE()
    {

        if (session('user')->role != "Administrateur") {
            // Récupérer le campus de l'utilisateur connecté
            $campusId = session('campus')->id;

            // Récupérer les spécialités et compter uniquement les étudiants pour le campus spécifié
            $specialites = Specialite::withCount(['etudiants' => function($query) use ($campusId) {
                $query->where('campus_id', $campusId);
            }])->get();


            // Récupérer le campus de l'utilisateur connecté
            $campusId = session('campus')->id;

            // Récupérer les étudiants avec leur scolarité pour le campus spécifique
            $campuses = Campus::with(['etudiants' => function($query) use ($campusId) {
                $query->where('campus_id', $campusId)->with('scolarite');
            }])->where('id', $campusId)->get();
            // Retourner la vue avec les spécialités filtrées
            return view('home', compact('specialites','campuses'));
        } else {
            // Récupère les campus avec le nombre d'étudiants associés
            $campuses = Campus::withCount('etudiants')->get();

            // Récupère les spécialités avec le nombre d'étudiants associés
            $specialites = Specialite::withCount('etudiants')->get();

            // Passe les données à la vue
            return view('home', compact('campuses', 'specialites'));
        }
    }

}
