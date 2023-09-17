<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\VilleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('liste-etudiants', [EtudiantController::class, 'index'])->name('etudiants.index');
Route::get('etudiants-create', [EtudiantController::class, 'create'])->name('etudiants.create');
Route::post('etudiants-create', [EtudiantController::class, 'store'])->name('etudiants.store');
Route::get('/liste-etudiants/{etudiant}', [EtudiantController::class, 'show'])->name('etudiants.show');
Route::get('/etudiants-edit/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiants.edit');
Route::put('/etudiants-edit/{etudiant}', [EtudiantController::class, 'update'])->name('etudiants.update');
Route::delete('/etudiants-edit/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiants.delete');