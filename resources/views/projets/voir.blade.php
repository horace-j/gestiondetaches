@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ $projet->titre }}</h1>

    <div class="mb-3">
        <strong>Description :</strong>
        <p>{{ $projet->description }}</p>
    </div>

    <div class="mb-3">
        <strong>Date de début :</strong>
        <p>{{ $projet->date_debut }}</p>
    </div>

    <div class="mb-3">
        <strong>Date de fin :</strong>
        <p>{{ $projet->date_fin }}</p>
    </div>

    <div class="mb-4">
        <!-- Bouton pour modifier le projet -->
        <a href="{{ route('projets.edit', $projet->id) }}" class="btn btn-warning">Modifier</a>
        <!-- Formulaire pour supprimer logiquement le projet -->
        <form action="{{ route('projets.destroy', $projet->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment archiver ce projet ?')">
                Supprimer
            </button>
        </form>
    </div>

    <!-- Lien retour à la liste des projets -->
    <a href="{{ route('projets.index') }}" class="btn btn-secondary">Retour à la liste</a>
</div>
@endsection