<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\Etudiant;
use App\Models\Scolarite;
use App\Models\Specialite;
use App\Models\Versement;
use Illuminate\Http\Request;
//pour la date
use Carbon\Carbon;
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


    // Générer le numéro d'ordre
    $orderNumber = Etudiant::count() + 1;
    $formattedOrderNumber = str_pad($orderNumber, 2, '0', STR_PAD_LEFT);

    // Récupérer l'abréviation de la spécialité
    $specialite = Specialite::find($request->specialite_id);
    $abreviationSpecialite = $specialite->abreviation;

    // Récupérer les troisième et quatrième caractères de l'année scolaire
    $anneeScolairePart = substr($request->annee_scolaire, 2, 2);

    // Générer le matricule
    $matricule = 'ESMOD' . $formattedOrderNumber . ''. $abreviationSpecialite . '' . $anneeScolairePart;

    // Créer un nouvel étudiant
    $etudiant = Etudiant::create([
        'matricule' => $matricule,
        'nom_prenom' => $request->nom_prenom,
        'sexe' => $request->sexe,
        'email' => $request->email,
        'mobile' => $request->mobile,
        'mot_de_pass' => 'temp', // Valeur temporaire
        'utilisateur_id' => session('user')->id, // Assurez-vous que l'utilisateur est authentifié
        'campus_id' => $request->campus_id,
        'specialite_id' => $request->specialite_id,
        'scolarite_id' => $scolarite->id,
    ]);
    // Générer le mot de passe
    $mot_de_pass = $etudiant->generatePassword();

    // Mettre à jour l'étudiant avec le mot de passe généré
    $etudiant->mot_de_pass = $mot_de_pass;
    $etudiant->save();

    // Créer le versement  pour l'iscription
    $dateActuelle = Carbon::now()->format('d-m-Y');

    $versement = Versement::create([
        'montant' => $validatedData['montant_inscription'],
        'objet_paiement' => "inscription",
        'mode_paiement' => "especes",
        'date_paiement'=>$dateActuelle,
        'etudiant_id' => $etudiant->id,
    ]);
    if ($request->frais_scolarite > 0) {
        $versement = Versement::create([
            'montant' => $request->frais_scolarite,
            'objet_paiement' => "1 iere tranche",
            'mode_paiement' => "especes",
            'date_paiement'=>$dateActuelle,
            'etudiant_id' => $etudiant->id,
        ]);
    }

    return redirect()->route('etudiant')->with('success', 'Étudiant ajouté avec succès.');
}

public function index()
{
    if(session('user')->role == "Administrateur"){
        // Récupère tous les campus avec les étudiants et leur scolarité
        $campuses = Campus::with(['etudiants.scolarite'])->get();

        // Retourne la vue avec les données
    return view('etudiant.etudiant', compact('campuses'));
    }else{
        // Récupérer le campus de l'utilisateur connecté
        $campusId = session('campus')->id;

        // Récupérer les étudiants avec leur scolarité pour le campus spécifique
        $campuses = Campus::with(['etudiants' => function($query) use ($campusId) {
            $query->where('campus_id', $campusId)->with('scolarite');
        }])->where('id', $campusId)->get();
        // Retourne la vue avec les données
    return view('etudiant.etudiant', compact('campuses'));

    }

}
// public function etat()
// {
//     $etudiants = Etudiant::with('scolarite')->get();
//     return view('etudiant.etudiantEtat', compact('etudiants'));
// }
public function etat()
{
    if (session('user')->role != "Administrateur") {
        // Récupérer le campus de l'utilisateur connecté
        $campusId = session('campus')->id;

        // Récupérer les étudiants avec leur scolarité pour le campus spécifique
        $campuses = Campus::with(['etudiants' => function($query) use ($campusId) {
            $query->where('campus_id', $campusId)->with('scolarite');
        }])->where('id', $campusId)->get();
        // Retourne la vue avec les données
        return view('etudiant.etudiantEtat', compact('campuses'));
    } else {
        // Récupère tous les campus avec les étudiants et leur scolarité
        $campuses = Campus::with(['etudiants.scolarite'])->get();
        // Retourne la vue avec les données
        return view('etudiant.etudiantEtat', compact('campuses'));
    }

}


public function edit($id)
{
    $etudiant = Etudiant::with('scolarite')->findOrFail($id);
    $specialites = Specialite::all();
    $campus = Campus::all();
    return view('etudiant.etudiantEdit', compact('etudiant', 'specialites', 'campus'));
}
public function show($id)
{
    // Récupérer l'étudiant par son ID
    $etudiant = Etudiant::with(['utilisateur', 'campus', 'specialite', 'scolarite', 'versements'])->findOrFail($id);
    if (session('user')) {
        // Retourner une vue avec les informations de l'étudiant
        return view('etudiant.etudiantInfo', compact('etudiant'));

    } else {
        // Retourner une vue avec les informations de l'étudiant
        return view('etudiant.etudiantInfoEtu', compact('etudiant'));
    }

}


public function recu($id)
{
    // Récupérer l'étudiant avec ses relations
    $etudiant = Etudiant::with('specialite', 'scolarite', 'versements')->findOrFail($id);

    // Calculer le montant total des paiements et le reste à payer
    $totalVersements = $etudiant->versements->sum('montant');
    $sommeDue = ($etudiant->scolarite->montant_total + $etudiant->scolarite->montant_inscription) - $totalVersements;

    // Convertir le montant total des versements en lettres en utilisant la méthode du modèle
    $totalVersementsEnLettres = $etudiant->convertNumberToWords($totalVersements);

    // Passer les données à la vue
    return view('etudiant.recu', compact('etudiant', 'totalVersements', 'sommeDue', 'totalVersementsEnLettres'));
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

//liste
public function liste(Request $request)
{
    // Récupérer toutes les spécialités pour la liste déroulante
    $specialites = Specialite::all();

    // Filtrer les étudiants en fonction de la spécialité sélectionnée
    $query = Etudiant::query();

    // Si l'utilisateur n'est pas administrateur, filtrer par le campus de l'utilisateur
    if (session('user')->role != "Administrateur") {
        $query->where('campus_id', session('campus')->id);
    }

    if ($request->filled('specialite_id')) {
        $query->where('specialite_id', $request->input('specialite_id'));
    }

    if ($request->filled('search')) {
        $search = $request->input('search');
        $query->where(function($q) use ($search) {
            $q->where('nom_prenom', 'like', "%$search%")
              ->orWhere('matricule', 'like', "%$search%")
              ->orWhere('email', 'like', "%$search%");
        });
    }

    // Trier les étudiants par nom et prénom de manière alphabétique
    $etudiants = $query->orderBy('nom_prenom', 'asc')->get();

    return view('liste.liste', compact('etudiants', 'specialites'));
}




public function destroy($id)
{
    // Récupérer l'étudiant avec sa scolarité associée
    $etudiant = Etudiant::with('scolarite')->findOrFail($id);
// Supprimer les versements associés
     $etudiant->versements()->delete();
    // Supprimer l'étudiant
    $etudiant->delete();
    // Supprimer la scolarité associée si elle existe
    if ($etudiant->scolarite) {
        $etudiant->scolarite->delete();
    }



    // Redirection avec un message de succès
    return redirect()->route('etudiant')->with('success', 'Étudiant supprimés avec succès ainsi que les information associer tel que la scolarité et les versements ');
}




}
