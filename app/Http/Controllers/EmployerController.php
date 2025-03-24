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
        $user = Auth::user();

        // Vérifier si l'utilisateur a déjà un profil employé
        if (Employer::where('mail', $user->email)->exists()) {
            return redirect()->back()->with('error', 'Vous avez déjà un compte employé.');
        }

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



    public function listes()
    {
        $employers = Employer::all();
        return view('utilisateur.show', compact('employers'));
    }


    // Afficher l'utilisateur lié à l'email de l'employer
    public function show()
    {
        // Récupérer l'email de l'utilisateur connecté
        $user = Auth::user();

        // Chercher l'employer associé à cet utilisateur par son email
        $employer = Employer::where('mail', $user->email)->first();

        // Si l'employer existe
        if ($employer) {
            // Récupérer l'utilisateur lié à cet employé
            $userLinkedToEmployer = User::find($employer->user_id);

            // Retourner la vue avec l'utilisateur et l'employer
            return view('fichers.profile', compact('user', 'userLinkedToEmployer', 'employer'));
        }

        // Si aucun employé n'est trouvé
        return redirect()->route('profile')->with('error', 'Aucun employé trouvé pour cet utilisateur.');
    }
}
