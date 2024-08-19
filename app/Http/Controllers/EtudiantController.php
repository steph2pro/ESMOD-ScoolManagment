<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\Etudiant;
use App\Models\Scolarite;
use App\Models\Specialite;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    //
    public function create()
{
    $specialites = Specialite::all();
    $campus = Campus::all();

    return view('etudiant.etudiantAdd', compact('specialites', 'campus'));
}
public function store(Request $request)
{
    // Valider les données du formulaire
    $validatedData = $request->validate([
        'nom_prenom' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'mobile' => 'required|string|max:15',
        'sexe' => 'required|string|max:10',
        'specialite_id' => 'required|integer|exists:specialites,id',
        'campus_id' => 'required|integer|exists:campuses,id',
        'annee_scolaire' => 'required|string|max:255',
        'montant_inscription' => 'required|numeric|min:0',
        'frais_scolarite' => 'required|numeric|min:0',
    ]);

    // Récupérer la spécialité pour obtenir le montant total des frais de scolarité
    $specialite = Specialite::findOrFail($request->specialite_id);
    //dd( $validatedData['montant_inscription']);
    // Créer une nouvelle scolarité
    $scolarite = Scolarite::create([
        'annee_scolaire' => $request->annee_scolaire,
        'montant_total' => $specialite->frais_scolarite,
        'montant_paye' => $request->frais_scolarite,
        'montant_restant'=>$specialite->frais_scolarite - $request->frais_scolarite,
        'montant_inscription' => $validatedData['montant_inscription'],
    ]);

    // Générer le matricule
    $orderNumber = Etudiant::count() + 1;
    $formattedOrderNumber = str_pad($orderNumber, 4, '0', STR_PAD_LEFT);
    $matricule = 'CM-ESMOD-' . $request->annee_scolaire . '-' . $formattedOrderNumber;

    // Créer un nouvel étudiant
    $etudiant = Etudiant::create([
        'matricule' => $matricule,
        'nom_prenom' => $request->nom_prenom,
        'sexe' => $request->sexe,
        'email' => $request->email,
        'mobile' => $request->mobile,
        'utilisateur_id' => 1, //auth()->user()->id Assurez-vous que l'utilisateur est authentifié
        'campus_id' => $request->campus_id,
        'specialite_id' => $request->specialite_id,
        'scolarite_id' => $scolarite->id,
    ]);

    return redirect()->route('etudiant')->with('success', 'Étudiant ajouté avec succès.');
}

public function index()
{
    $etudiants = Etudiant::with('scolarite')->get();
    return view('etudiant.etudiant', compact('etudiants'));
}

public function edit($id)
{
    $etudiant = Etudiant::with('scolarite')->findOrFail($id);
    $specialites = Specialite::all();
    $campus = Campus::all();
    return view('etudiant.etudiantEdit', compact('etudiant', 'specialites', 'campus'));
}

public function update(Request $request, $id)
{
    // Valider les données du formulaire
    $validatedData = $request->validate([
        'nom_prenom' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'mobile' => 'required|string|max:15',
        'sexe' => 'required|string|max:10',
        'specialite_id' => 'required|integer|exists:specialites,id',
        'campus_id' => 'required|integer|exists:campuses,id',
        'annee_scolaire' => 'required|string|max:255',
        'frais_inscription' => 'required|numeric|min:0',
        'frais_scolarite_paye' => 'required|numeric|min:0',
    ]);

    // Récupérer l'étudiant et la scolarité associée
    $etudiant = Etudiant::findOrFail($id);
    $scolarite = $etudiant->scolarite;
    // dd(Specialite::findOrFail($request->specialite_id)->frais_scolarite);
    // Mettre à jour les données de la scolarité
    $scolarite->update([
        'annee_scolaire' => $request->annee_scolaire,
        'montant_inscription' => $request->frais_inscription,
        'montant_paye' => $request->frais_scolarite_paye,
        'montant_total' => Specialite::findOrFail($request->specialite_id)->frais_scolarite,
        'montant_restant' => Specialite::findOrFail($request->specialite_id)->frais_scolarite - $request->frais_scolarite_paye,
    ]);

    // Mettre à jour les données de l'étudiant
    $etudiant->update([
        'nom_prenom' => $request->nom_prenom,
        'sexe' => $request->sexe,
        'email' => $request->email,
        'mobile' => $request->mobile,
        'campus_id' => $request->campus_id,
        'specialite_id' => $request->specialite_id,
    ]);

    return redirect()->route('etudiant')->with('success', 'Étudiant mis à jour avec succès.');
}
public function destroy($id)
{
    // Récupérer l'étudiant avec sa scolarité associée
    $etudiant = Etudiant::with('scolarite')->findOrFail($id);

    // Supprimer l'étudiant
    $etudiant->delete();
    // Supprimer la scolarité associée si elle existe
    if ($etudiant->scolarite) {
        $etudiant->scolarite->delete();
    }


    // Redirection avec un message de succès
    return redirect()->route('etudiant')->with('success', 'Étudiant et scolarité supprimés avec succès');
}




}
