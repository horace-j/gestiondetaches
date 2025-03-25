@extends('layouts.app')

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

    fieldset,
    legend {
        all: revert;
    }

    .reset {
        all: revert;
        border-radius: 15px;

    }
</style>
@section('content')

@if(in_array(Auth::user()->role, ['Admin', 'Superviseur', 'employer' ]))

<section>
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
                        @if($tache->statut != 'terminée')
                        <form action="{{ route('taches.toggleStatus', $tache->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success btn-sm">
                                Terminer
                            </button>
                        </form>
                        @else
                        <p style="font-size: 30px; text-align:center">✍🏻</p>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@else
<section class="py-5">
    <fieldset class="reset">
        <legend style="color: black; font-family:'Times New Roman', Times, serif; font-weight:bold; font-size:20px; " class="reset">Note d'information</legend>
        <div class="container ">
            <h6 style="text-align: end;"> Votre profil : <span>{{ Auth::user()->role }}</span> </h6>
            <p class="Infos" style="text-align:center; padding:20px;">
                <b style="text-decoration:underline; font-size:20px; "></b> <span style="text-align: justify; font-size:20px; ">L'accès au contenu de cette page est limité à certains profils. Votre profil actuel ne le permet pas.</span>
            </p>
            <!-- <p style="text-align:end !important;">
            <a href="/dashboard" class="btn btn-secondary">Retour au tableau de bord</a>
        </p> -->
        </div>
    </fieldset> <br>
</section>
@endif

@endsection