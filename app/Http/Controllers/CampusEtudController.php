<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

    use App\Models\Campus;
    use App\Models\Etudiant;
class CampusEtudController extends Controller
{
    //

public function index()
{
    // Récupérer tous les campus avec le nombre d'étudiants
    $campuses = Campus::withCount('etudiants')->get();

    return view('home', compact('campuses'));
}

}
