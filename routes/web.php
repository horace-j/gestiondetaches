<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\EmployerController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\TacheController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;


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

Route::get('/', function () {
    return view('welcome');
});




// Routes d'authentification (login, register, reset password, etc.)
Route::middleware('guest')->group(function () {
    // Inscription
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    // Connexion
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    // Mot de passe oublié
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

    // Réinitialisation du mot de passe
    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
});


Route::get('/home', [DashboardController::class, 'homes'])->name('home');


// Route de déconnexion
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');



Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [EmployerController::class, 'show'])->name('profile');

    Route::post('/employer/create', [EmployerController::class, 'store'])->name('employer.store');
});

Route::get('/employer/create', function () {
    return view('employer.create');
})->middleware('auth')->name('employer.create');

Route::get('/projets/{id}/details', [ProjetController::class, 'details'])->name('projets.voire');


/* Projet et taches */
Route::get('/projets/create', [ProjetController::class, 'create'])->name('projets.create');
Route::get('/projets/trashed', [ProjetController::class, 'trasheds'])->name('projets.trashed');

Route::get('/projets', [ProjetController::class, 'index'])->name('projets.index');
Route::get('/projets/{id}', [ProjetController::class, 'show'])->name('projets.show');


Route::put('/taches/{id}/toggle-status', [TacheController::class, 'toggleStatus'])->name('taches.toggleStatus');
Route::post('/projets', [ProjetController::class, 'store'])->name('projets.store');

Route::get('/projets/{projet}/taches/create', [TacheController::class, 'create'])->name('taches.create');
Route::post('/projets/{projet}/taches', [TacheController::class, 'store'])->name('taches.store');
Route::get('/liste', [EmployerController::class, 'listes'])->name('liste');

Route::get('/projets/{id}/edit', [ProjetController::class, 'edit'])->name('projets.edit');
Route::put('/projets/{id}', [ProjetController::class, 'update'])->name('projets.update');
Route::delete('/projets/{id}', [ProjetController::class, 'destroy'])->name('projets.destroy');

Route::put('/projets/{id}/restore', [ProjetController::class, 'restore'])->name('projets.restore');

Route::get('/projets/{id}/restore', [ProjetController::class, 'restore'])->name('projets.restore');
Route::get('/projets/{id}/force-delete', [ProjetController::class, 'forceDelete'])->name('projets.forceDelete');



// Afficher la liste des utilisateurs
Route::get('users', [UserController::class, 'index'])->name('users.index');

// Créer un nouvel utilisateur (affiche le formulaire)
Route::get('users/create', [UserController::class, 'create'])->name('users.create');

// Sauvegarder un nouvel utilisateur
Route::post('users', [UserController::class, 'store'])->name('users.store');

// Afficher le formulaire de modification d'un utilisateur
Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

// Mettre à jour un utilisateur
Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');

// Supprimer un utilisateur
Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');


Route::post('/notifications/read', [ProjetController::class, 'markAsRead'])->name('notifications.read');



Route::post('/notifications/read-single', [ProjetController::class, 'markAsRead'])->name('notifications.read.single');
