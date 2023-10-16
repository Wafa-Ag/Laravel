<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ForumPostController;
use App\http\Controllers\DocumentController;
use App\http\Controllers\LocalizationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| coains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});


/*Route::get('liste-etudiants', [EtudiantController::class, 'index'])->name('etudiants.index');
Route::get('etudiants-create', [EtudiantController::class, 'create'])->name('etudiants.create');
Route::post('etudiants-create', [EtudiantController::class, 'store'])->name('etudiants.store');
Route::get('/liste-etudiants/{etudiant}', [EtudiantController::class, 'show'])->name('etudiants.show');
Route::get('/etudiants-edit/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiants.edit');
Route::put('/etudiants-edit/{etudiant}', [EtudiantController::class, 'update'])->name('etudiants.update');
Route::delete('/etudiants-edit/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiants.delete');*/



Route::get('/login', [CustomAuthController::class, 'index'])->name('login'); 
Route::post('/login', [CustomAuthController::class, 'authentication'])->name( 'login.authentication'); 
Route::get('/registration', [CustomAuthController::class, 'create'])->name( 'user.registration'); 
Route::post('/registration-store', [CustomAuthController::class, 'store'])->name( 'user.store');
Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');


Route::get('/forum', [ForumPostController::class , 'index'])->name('forum.index')->middleware('auth');
Route::get('/post-create', [ForumPostController::class, 'create'])->name('forum.create')->middleware('auth');
Route::post('/post-create', [ForumPostController::class, 'store'])->name('forum.store')->middleware('auth');
Route::get('/forum/{forumPost}', [ForumPostController::class, 'show'])->name('forum.show')->middleware('auth');
Route::get('/posts-edit/{forumPost}', [ForumPostController::class, 'edit'])->name('forum.edit')->middleware('auth');
Route::put('/posts-edit/{forumPost}', [ForumPostController::class, 'update'])->name('forum.update')->middleware('auth');
Route::delete('/posts-edit/{forumPost}', [ForumPostController::class, 'destroy'])->name('forum.delete')->middleware('auth');



Route::get('/repertoire', [DocumentController::class , 'index'])->name('repertoire.index')->middleware('auth');
Route::get('/document-create', [DocumentController::class, 'create'])->name('repertoire.create')->middleware('auth');
Route::post('/document-create', [DocumentController::class, 'store'])->name('repertoire.store')->middleware('auth');
Route::get('/repertoire/{document}', [DocumentController::class, 'show'])->name('repertoire.show')->middleware('auth');
Route::get('/document-edit/{document}', [DocumentController::class, 'edit'])->name('repertoire.edit')->middleware('auth');
Route::put('/document-edit/{document}', [DocumentController::class, 'update'])->name('repertoire.update')->middleware('auth');
Route::delete('/document-edit/{document}', [DocumentController::class, 'destroy'])->name('repertoire.delete')->middleware('auth');
Route::get('/download/{file}', function ($file) {
    $path = storage_path('app/uploads/' . $file);
    return response()->download($path);
});

Route::get('/lang/{locale}', [LocalizationController::class, 'index'])->name('lang');



