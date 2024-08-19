<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\SpecialiteController;
use App\Http\Controllers\UtilisateurController;
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

// routes/web.php
// Route::get('/', function () {
//     return view('home');
// })->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    });
});



Route::get('/etudiant',[EtudiantController::class, 'index'])->name('etudiant');
Route::get('/etudiantAdd',[EtudiantController::class, 'create'])->name('etudiant.create');
Route::post('/etudiantAd', [EtudiantController::class, 'store'])->name('etudiant.store');

Route::get('/etudiant/{id}/edit', [EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::put('/etudiant/{id}', [EtudiantController::class, 'update'])->name('etudiant.update');
Route::delete('/etudiant/{id}', [EtudiantController::class, 'destroy'])->name('etudiant.destroy');


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
Route::get('/utilisateurAdd', function () {
    return view('utilisateur.utilisateurAdd');
})->name('utilisateurAdd');
//route pour traiter le formulaire
Route::post('/utilisateurAd', [UtilisateurController::class, 'store'])->name('utilisateur.store');

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

Route::get('/synthesis', function () {
    return view('synthesis');
})->name('synthesis');

Route::get('/logout', function () {
    // Your logout logic
    return redirect('/');
})->name('logout');


