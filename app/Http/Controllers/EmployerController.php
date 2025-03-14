<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employer;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user(); // Récupérer l'utilisateur connecté                   

        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'tel' => 'required|string|unique:employers,tel',
            'mail' => 'required|email|unique:employers,mail',
            'lien_linkedin' => 'nullable|url',
            'adresse' => 'required|string',
            'profession' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'a_propos' => 'nullable|string',
            'ifu' => 'nullable|string'
        ]);

        // Enregistrer l'employé
        $employer = Employer::create([
            'user_id' => $user->id,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'tel' => $request->tel,
            'mail' => $request->mail,
            'lien_linkedin' => $request->lien_linkedin,
            'adresse' => $request->adresse,
            'profession' => $request->profession,
            'image' => $request->image ? $request->file('image')->store('images/employers', 'public') : null,
            'a_propos' => $request->a_propos,
            'ifu' => $request->ifu
        ]);

        return redirect()->route('profile')->with('success', 'Profil employé créé.');
    }
}
