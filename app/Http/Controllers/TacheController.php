<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use Illuminate\Http\Request;
use App\Models\Projet;
use App\Models\User;
use Illuminate\Support\Str;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Projet $projet)
    {
        $users = User::all();
        return view('taches.create', compact('projet', 'users'));
    }


    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request, Projet $projet)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'statut' => 'required|in:annuler,en cours,terminer',
            'date_limite' => 'nullable|date',
            'user_id' => 'nullable|exists:users,id'
        ]);

        Tache::create([
            'id' => Str::uuid(),
            'titre' => $request->titre,
            'description' => $request->description,
            'statut' => $request->statut,
            'date_limite' => $request->date_limite,
            'projet_id' => $projet->id,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('projets.show', $projet)->with('success', 'Tâche ajoutée avec succès.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Tache $tache)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tache $tache)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tache $tache)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tache $tache)
    {
        //
    }
    public function toggleStatus($id)
    {
        $tache = Tache::findOrFail($id);

        // Basculer le statut de la tâche
        if ($tache->statut == 'en cours') {
            $tache->statut = 'terminée';
        } else {
            $tache->statut = 'en cours';
        }

        $tache->save();

        return back()->with('success', 'Statut mis à jour.');
    }
}
