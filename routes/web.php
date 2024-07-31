<?php

use App\Http\Controllers\CampusController;
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

// routes/web.php
Route::get('/', function () {
    return view('home');
})->name('dashboard');

Route::get('/students', function () {
    return view('students');
})->name('students');

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


