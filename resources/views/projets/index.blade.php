@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5 display-4 fw-bold">Liste des projets</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($projets as $projet)
        <div class="col">
            <div class="card h-100 shadow-lg border-0">
                <div class="card-header bg-white border-0 py-3">
                    <h3 class="card-title mb-0">
                        <a href="{{ route('projets.voire', $projet->id) }}" class="text-decoration-none text-dark fw-bold">{{ $projet->titre }}</a>
                    </h3>
                </div>
                <div class="card-body">
                    <p class="card-text text-muted">{{ Str::limit($projet->description, 200) }}</p>
                </div>
                <div class="card-footer bg-white border-0 py-3">
                    <div class="d-flex flex-wrap gap-2">
                        <!-- Bouton Ajouter une tâche -->
                        <a href="{{ route('taches.create', $projet->id) }}" class="btn btn-primary btn-sm flex-grow-1">
                            <i class="fas fa-plus me-1"></i> Ajouter une tâche
                        </a>

                        <!-- Bouton Évolution -->
                        <a href="{{ route('projets.show', $projet) }}" class="btn btn-info btn-sm flex-grow-1">
                            <i class="fas fa-chart-line me-1"></i> Évolution
                        </a>

                        <!-- Bouton Modifier -->
                        <a href="{{ route('projets.edit', $projet->id) }}" class="btn btn-warning btn-sm flex-grow-1">
                            <i class="fas fa-edit me-1"></i> Modifier
                        </a>

                        <!-- Bouton Supprimer -->
                        <form action="{{ route('projets.destroy', $projet->id) }}" method="POST" class="flex-grow-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm w-100" onclick="return confirm('Voulez-vous vraiment supprimer ce projet ?')">
                                <i class="fas fa-trash me-1"></i> Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Bouton pour voir les projets supprimés -->
    <div class="text-center mt-5">
        <a href="{{ route('projets.trashed') }}" class="btn btn-dark btn-lg">
            <i class="fas fa-trash-restore me-2"></i> Voir les projets supprimés
        </a>
    </div>
</div>
@endsection