@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Modifier le projet</h1>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('projets.update', $projet->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="titre" class="form-label">Titre :</label>
            <input type="text" id="titre" name="titre" class="form-control" value="{{ $projet->titre }}" required>
            @error('titre') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description :</label>
            <textarea id="description" name="description" class="form-control">{{ $projet->description }}</textarea>
            @error('description') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="date_debut" class="form-label">Date de début :</label>
            <input type="date" id="date_debut" name="date_debut" class="form-control" value="{{ $projet->date_debut }}" required>
            @error('date_debut') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="date_fin" class="form-label">Date de fin :</label>
            <input type="date" id="date_fin" name="date_fin" class="form-control" value="{{ $projet->date_fin }}" required>
            @error('date_fin') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-secondary w-100">Mettre à jour</button>
    </form>

    <a href="{{ route('projets.index') }}" class="d-block mt-4">Retour à la liste des projets</a>
</div>
@endsection