<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class NewPasswordController extends Controller
{
    /**
     * Affiche le formulaire de réinitialisation du mot de passe.
     */
    public function create($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    /**
     * Met à jour le mot de passe de l'utilisateur.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $status = Password::reset(
            $validated,
            function ($user) use ($validated) {
                $user->forceFill([
                    'password' => bcrypt($validated['password']),
                ])->save();
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', 'Votre mot de passe a été réinitialisé.');
        }

        throw ValidationException::withMessages(['email' => [trans($status)]]);
    }
}
