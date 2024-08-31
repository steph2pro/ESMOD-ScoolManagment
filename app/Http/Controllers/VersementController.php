<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Versement;
use Illuminate\Http\Request;
//pour la date
use Carbon\Carbon;

class VersementController extends Controller
{
    /**
     * Affiche une liste de tous les versements.
     */
    public function index()
    {
        // Vérifier le rôle de l'utilisateur
        if (session('user')->role != 'Administrateur') {
            // Récupérer tous les versements des étudiants inscrits dans le même campus que l'utilisateur connecté
            $versements = Versement::whereHas('etudiant', function ($query) {
                $query->where('campus_id', session('campus')->id);
            })->with('etudiant')->get();
        } else {
            // Si l'utilisateur est un administrateur, récupérer tous les versements
            $versements = Versement::with('etudiant')->get();
        }

        // Retourner la vue avec les données
        return view('versement.versement', compact('versements'));
    }

    /**
     * Affiche le formulaire pour créer un nouveau versement.
     */
    public function create()
    {
        $etudiants=Etudiant::all();
        // Retourner la vue pour créer un nouveau versement
        return view('versement.versementAdd',compact("etudiants"));
    }

    /**
     * Enregistre un nouveau versement dans la base de données.
     */
    public function store(Request $request)
{
    // Validation des données
    $validatedData = $request->validate([
        'etudiant_id' => 'required|exists:etudiants,id',
        'objet_paiement' => 'required|string|max:255',
        'mode_paiement' => 'required|string|in:Espèce,Chèque,OM / MOMO',
        'montant' => 'required|numeric|min:0',
    ]);

    $dateActuelle = Carbon::now()->format('d-m-Y');

    // Création du versement
    $versement = Versement::create([
        'etudiant_id' => $validatedData['etudiant_id'],
        'objet_paiement' => $validatedData['objet_paiement'],
        'mode_paiement' => $validatedData['mode_paiement'],
        'montant' => $validatedData['montant'],
        'date_paiement' => $dateActuelle,
    ]);

    // Récupération de l'étudiant
    $etudiant = $versement->etudiant;

    // Mise à jour du montant total payé
    $totalVerse = $etudiant->versements->sum('montant');
    $montantInscription = $etudiant->scolarite->montant_inscription;
    $montantTotal = $etudiant->scolarite->montant_total;
    $resteAPayer = ($montantInscription + $montantTotal) - $totalVerse;

    // Mise à jour de la scolarité de l'étudiant
    $etudiant->scolarite->update([
        'montant_paye' => $totalVerse,
        'montant_restant' => $resteAPayer,
    ]);


        // Redirection avec un message de succès
        return redirect()->route('versement')->with('success', 'Versement effectué avec succès!');
    }

    /**
     * Affiche les détails d'un versement spécifique.
     */
    // public function show($id)
    // {
    //     // Récupérer le versement par son ID
    //     $versement = Versement::findOrFail($id);

    //     // Retourner la vue avec les données du versement
    //     return view('versements.show', compact('versement'));
    // }

    /**
     * Affiche le formulaire pour modifier un versement existant.
     */
    public function edit($id)
    {
        $versement = Versement::findOrFail($id);
        $etudiants = Etudiant::all(); // Assurez-vous que vous avez ce modèle

        return view('versement.versementEdit', compact('versement', 'etudiants'));
    }

    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'etudiant_id' => 'required|exists:etudiants,id',
            'objet_paiement' => 'required|string|max:255',
            'mode_paiement' => 'required|string',
            'montant' => 'required|numeric|min:0',
        ]);

        // Mise à jour du versement
        $versement = Versement::findOrFail($id);
        $versement->update($request->all());

        // Redirection avec un message de succès
        return redirect()->route('versement')->with('success', 'Le versement a été mis à jour avec succès.');
    }

    /**
     * Supprime un versement spécifique de la base de données.
     */
    public function destroy($id)
    {
        // Récupérer le versement par son ID
        $versement = Versement::findOrFail($id);

        // Supprimer le versement
        $versement->delete();

        // Rediriger vers la liste des versements avec un message de succès
        return redirect()->route('versement')->with('success', 'Versement supprimé avec succès.');
    }
}

