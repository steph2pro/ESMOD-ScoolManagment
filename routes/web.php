<?php

use App\Http\Controllers\CampusController;
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

Route::get('/specialite', function () {
    return view('specialite.specialite');
})->name('specialite');
Route::get('/specialiteAdd', function () {
    return view('specialite.specialiteAdd');
})->name('specialiteAdd');

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


