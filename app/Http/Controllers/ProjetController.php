<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $projets = Projet::all();
        return view('projets.index', compact('projets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('projets.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
        ]);

        Projet::create($request->all());

        return redirect()->route('projets.index')->with('success', 'Projet créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //

        $projet = Projet::with('taches')->findOrFail($id);
        return view('projets.show', compact('projet'));
    }
    public function details($id)
    {
        //

        $projet = Projet::with('taches')->findOrFail($id);
        return view('projets.voir', compact('projet'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit($id)
    {
        $projet = Projet::findOrFail($id);
        return view('projets.edit', compact('projet'));
    }


    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
        ]);

        $projet = Projet::findOrFail($id);
        $projet->update($request->all());

        return redirect()->route('projets.index')->with('success', 'Projet mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $projet = Projet::findOrFail($id);
        $projet->delete();

        return redirect()->route('projets.index')->with('success', 'Projet supprimé avec succès.');
    }
    /* Afficher les projets delete */
    public function trasheds()
    {
        $projets = Projet::onlyTrashed()->get();
        return view('projets.trashed', compact('projets'));
    }
    /* Restaurer */

    public function restore($id)
    {
        $projet = Projet::onlyTrashed()->findOrFail($id); // Récupère uniquement les projets supprimés
        $projet->restore();

        return redirect()->route('projets.index')->with('success', 'Projet restauré avec succès.');
    }


    public function forceDelete($id)
    {
        $projet = Projet::withTrashed()->findOrFail($id);
        $projet->forceDelete();

        return redirect()->route('projets.trashed')->with('success', 'Projet supprimé définitivement.');
    }
}
