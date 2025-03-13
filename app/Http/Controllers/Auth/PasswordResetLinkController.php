<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordResetLinkController extends Controller
{
    /**
     * Affiche le formulaire de demande de réinitialisation de mot de passe.
     */
    public function create()
    {
        return view('auth.forgot-password');
    }

    /**
     * Envoie le lien de réinitialisation du mot de passe.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink($request->only('email'));

        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __('Un lien de réinitialisation a été envoyé à votre email.'))
            : back()->withErrors(['email' => __('Impossible d\'envoyer un lien de réinitialisation à cette adresse email.')]);
    }
}
