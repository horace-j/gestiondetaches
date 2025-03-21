@extends('layouts.app')

@section('content')
<div class="container  py-5">
    <div class="card shadow-lg p-5">
        <h1 style=" font-size:50px; text-align:center" st class="mb-4">{{ $projet->titre }}</h1>

        <div class="mb-3 ">
            <strong style="font-size: 30px;">Description :</strong>
            <p style="text-align: justify; font-size:15px; ">{{ $projet->description }}</p>
        </div>
        <div style="display: flex; justify-content:space-around">
            <div>
                <div class="mb-3">
                    <strong style="font-size:18px;">Date de début :</strong>
                    <p style="font-size: 16px;">{{ $projet->date_debut }}</p>
                </div>
            </div>
            <div>
                <div class="mb-3">
                    <strong style="font-size:18px;">Date de fin :</strong>
                    <p style="font-size: 16px;">{{ $projet->date_fin }}</p>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <div style="display: flex;">
                <div>
                    <!-- Bouton pour modifier le projet -->
                    <a href="{{ route('projets.edit', $projet->id) }}" class="btn btn-warning">Modifier</a>
                </div>
                <div>
                    <!-- Formulaire pour supprimer logiquement le projet -->
                    <form action="{{ route('projets.destroy', $projet->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mx-4" onclick="return confirm('Voulez-vous vraiment supprimer ce projet ?')">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Lien retour à la liste des projets -->
        <a href="{{ route('projets.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </div>
</div>
@endsection