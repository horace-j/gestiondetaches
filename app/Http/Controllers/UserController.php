<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // Afficher la liste des utilisateurs
    public function index()
    {
        $users = User::all();  // Récupérer tous les utilisateurs
        return view('utilisateur.index', compact('users'));
    }

    // Afficher le formulaire pour créer un nouvel utilisateur
    public function create()
    {
        return view('utilisateur.create');
    }

    // Sauvegarder un nouvel utilisateur
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:user,admin,superviseur,employer', // Le rôle doit être parmi ces valeurs
        ]);

        // Création de l'utilisateur
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès.');
    }

    // Afficher le formulaire pour éditer un utilisateur
    public function edit(User $user)
    {
        // Définir les rôles possibles
        $roles = ['user', 'admin', 'superviseur', 'employer'];
        return view('utilisateur.edit', compact('user', 'roles'));
    }

    // Mettre à jour un utilisateur
    public function update(Request $request, User $user)
    {
        // Validation des données
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed', // Le mot de passe est facultatif mais peut être mis à jour
            'role' => 'required|in:user,admin,superviseur,employer', // Le rôle doit être parmi ces valeurs
        ]);

        // Mise à jour de l'utilisateur
        $user->name = $validated['name'];
        $user->email = $validated['email'];



        $user->role = $validated['role'];
        $user->save();

        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    // Supprimer un utilisateur
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
