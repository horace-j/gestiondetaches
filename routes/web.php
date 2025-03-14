<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\EmployerController;
use Illuminate\Support\Facades\Auth;

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



// Page d'accueil
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


Route::get('/home', [RegisteredUserController::class, 'homes'])->name('home');

// Route de déconnexion
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');



Route::middleware(['auth'])->group(function () {
    Route::get('/profile', function () {
        return view('fichers.profile', ['employer' => Auth::user()->employer]);
    })->name('profile');

    Route::post('/employer/create', [EmployerController::class, 'store'])->name('employer.store');
});

Route::get('/employer/create', function () {
    return view('employer.create');
})->middleware('auth')->name('employer.create');
