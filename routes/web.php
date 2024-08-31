<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\CampusEtudController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\SpecialiteController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\VersementController;
use App\Models\Etudiant;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });
//route de connexion
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
// deconnection
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/logoutPage', [LoginController::class, 'showLogoutForm'])->name('logoutPage');

// routes/web.php
// Route::get('/', function () {
//     return view('home');
// })->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware('auth');


    Route::get('/moi/{id}', [EtudiantController::class,'show'])->name('dashboardEtudiant');
Route::middleware('auth')->group(function () {
    Route::get('/', [CampusController::class,'indexCE'])->name('dashboard');
    // Route::get('/campuses', [CampusController::class, 'index'])->name('campuses.index');




    Route::get('/etudiant',[EtudiantController::class, 'index'])->name('etudiant');
    Route::get('/etudiantAdd',[EtudiantController::class, 'create'])->name('etudiant.create');
    Route::post('/etudiantAd', [EtudiantController::class, 'store'])->name('etudiant.store');
    Route::get('/etudiantEtat', [EtudiantController::class, 'etat'])->name('etudiant.etat');
    Route::get('/etudiant/{id}', [EtudiantController::class, 'show'])->name('etudiant.show');

    Route::get('/etudiant/{id}/edit', [EtudiantController::class, 'edit'])->name('etudiant.edit');
    Route::put('/etudiant/{id}', [EtudiantController::class, 'update'])->name('etudiant.update');
    Route::delete('/etudiant/{id}', [EtudiantController::class, 'destroy'])->name('etudiant.destroy');
    Route::get('/etudiant/{id}/recu', [EtudiantController::class, 'recu'])->name('etudiant.recu');
    //versement

    Route::get('/versement',[VersementController::class, 'index'])->name('versement');
    Route::get('/versementAdd',[VersementController::class, 'create'])->name('versement.create');
    Route::post('/versementAd', [VersementController::class, 'store'])->name('versement.store');
    Route::get('/versementEtat', [VersementController::class, 'etat'])->name('versement.etat');

    Route::get('/versement/{id}/edit', [VersementController::class, 'edit'])->name('versement.edit');
    Route::put('/versement/{id}', [VersementController::class, 'update'])->name('versement.update');
    Route::delete('/versement/{id}', [VersementController::class, 'destroy'])->name('versement.destroy');

    Route::get('/users', function () {
        return view('users');
    })->name('users');

    Route::get('/specialite', [SpecialiteController::class, 'index'])->name('specialite');
    Route::get('/specialiteAdd', function () {
        return view('specialite.specialiteAdd');
    })->name('specialiteAdd');
    //route pour traiter le formulaire
    Route::post('/specialiteAd', [SpecialiteController::class, 'store'])->name('specialite.store');

    Route::get('/specialite/{id}/edit', [SpecialiteController::class, 'edit'])->name('specialite.edit');
    Route::put('/specialite/{id}', [SpecialiteController::class, 'update'])->name('specialite.update');
    Route::delete('/specialite/{id}', [SpecialiteController::class, 'destroy'])->name('specialite.destroy');

    //utilisateur
    Route::get('/utilisateur', [UtilisateurController::class, 'index'])->name('utilisateur');
    Route::get('/utilisateurAdd', [UtilisateurController::class, 'create'])->name('utilisateurAdd');
    //route pour traiter le formulaire
    Route::post('/utilisateurAd', [UtilisateurController::class, 'store'])->name('utilisateur.store');
    Route::get('/utilisateur/{id}', [UtilisateurController::class, 'show'])->name('utilisateur.show');
    Route::get('/utilisateur/{id}/edit', [UtilisateurController::class, 'edit'])->name('utilisateur.edit');
    Route::put('/utilisateur/{id}', [UtilisateurController::class, 'update'])->name('utilisateur.update');
    Route::delete('/utilisateur/{id}', [UtilisateurController::class, 'destroy'])->name('utilisateur.destroy');

    //campus
    Route::get('/campus', [CampusController::class, 'index'])->name('campus');
    //route pour afficher le formulaire
    Route::get('/campusAdd', function () {
        return view('campus.campusAdd');
    })->name('campusAdd');
    //route pour traiter le formulaire
    Route::post('/campusAd', [CampusController::class, 'store'])->name('campus.store');

    Route::get('/campus/{id}/edit', [CampusController::class, 'edit'])->name('campus.edit');
    Route::put('/campus/{id}', [CampusController::class, 'update'])->name('campus.update');
    Route::delete('/campus/{id}', [CampusController::class, 'destroy'])->name('campus.destroy');

    //liste

    Route::get('/liste', [EtudiantController::class, 'liste'])->name('liste');


//FIN DU controlleur de connectivite

});

Route::get('/logout', function () {
    // Your logout logic
    return redirect('/');
})->name('logout');


