@extends('layouts.app')

@section('title', 'Modifier une Tâche')

@section('content')
<div class="container py-5">
    <h1>Modifier la Tâche : {{ $tache->titre }}</h1>

    <form method="POST" action="{{ route('taches.update', $tache->id) }}">
        @csrf
        @method('PUT')

        <!-- Titre -->
        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" name="titre" class="form-control" value="{{ $tache->titre }}" required>
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4">{{ $tache->description }}</textarea>
        </div>

        <!-- Assigné à -->
        <div class="mb-3">
            <label for="user_id" class="form-label">Assigné à</label>
            <select name="user_id" class="form-select" required>
                @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ $tache->user_id == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Statut -->
        <div class="mb-3">
            <label for="statut" class="form-label">Statut</label>
            <select name="statut" class="form-select" required>
                <option value="en cours" {{ $tache->statut == 'en cours' ? 'selected' : '' }}>En cours</option>
                <option value="terminée" {{ $tache->statut == 'terminée' ? 'selected' : '' }}>Terminée</option>
            </select>
        </div>

        <!-- Bouton de soumission -->
        <button type="submit" class="btn btn-success w-100">Mettre à jour</button>
    </form>
</div>
@endsection