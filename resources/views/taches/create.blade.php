@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1>Ajouter une tâche pour le projet: {{ $projet->titre }}</h1>

    @if(session('success'))
    <p class="text-success">{{ session('success') }}</p>
    @endif

    <form action="{{ route('taches.store', $projet) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="titre" class="form-label">Titre :</label>
            <input type="text" id="titre" name="titre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description :</label>
            <textarea id="description" name="description" class="form-control" rows="4"></textarea>
        </div>

        <div class="mb-3">
            <label for="statut" class="form-label">Statut :</label>
            <select id="statut" name="statut" class="form-select">
                <option selected value="en cours">En cours</option>
                <option value="terminer">Terminé</option>
                <option value="annuler">Annuler</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="date_limite" class="form-label">Date limite :</label>
            <input type="date" id="date_limite" name="date_limite" class="form-control">
        </div>

        <div class="mb-3">
            <label for="user_id" class="form-label">Assigné à :</label>
            <select id="user_id" name="user_id" class="form-select">
                @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-secondary w-100">Ajouter Tâche</button>
    </form>

    <a href="{{ route('projets.show', $projet) }}" class="d-block mt-4 btn">Retour au projet</a>
</div>
@endsection