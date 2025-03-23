@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Section du projet -->
    <div class="bg-light p-4 rounded shadow-sm mb-5">
        <h1 class="display-4 text-primary mb-3">{{ $projet->titre }}</h1>
        <p style="" class="lead mb-4">{{ $projet->description }}</p>
        <p style="font-size:15px;" class="text-muted"><strong>Progression:</strong> <span class="text-success">{{ $projet->progression }}%</span></p>
    </div>

    <!-- Tâches du projet dans un tableau -->
    <div>
        <h2 class="mt-5 mb-3">Tâches</h2>
        <a href="{{ route('taches.create', $projet->id) }}" class="btn btn-primary btn-sm flex-grow-1">
            <i class="fas fa-plus me-1"></i> Ajouter une autre tâche
        </a> <br>
    </div>
    <table class="py-4 table table-striped table-bordered">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Statut</th>
                <th>Assigné à</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projet->taches as $tache)
            <tr>
                <td>{{ $tache->titre }}</td>
                <td class="description-column">{{ $tache->description }}</td>
                <td>
                    <span class="badge badge-{{ $tache->statut == 'terminée' ? 'success' : 'warning' }}">
                        {{ ucfirst($tache->statut) }}
                    </span>
                </td>
                <td style="font-weight: bold; ">{{ $tache->user ? strtoupper($tache->user->name) : 'NON ASSIGNÉ' }}</td>

                <td>
                    <form action="{{ route('taches.toggleStatus', $tache->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-{{ $tache->statut == 'terminée' ? 'warning' : 'success' }} btn-sm">
                            {{ $tache->statut == 'terminée' ? 'Reprendre' : 'Terminer' }}
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    /* Limiter la largeur de la colonne Description sans couper le texte */
    .description-column {
        max-width: 300px;
        /* Limite la largeur de la description (tu peux ajuster la valeur ici) */
        word-wrap: break-word;
        /* Permet au texte de s'ajuster à la largeur et passer à la ligne suivante si nécessaire */
        white-space: normal;
        /* Permet au texte de s'enrouler sur plusieurs lignes si nécessaire */
    }
</style>
@endsection