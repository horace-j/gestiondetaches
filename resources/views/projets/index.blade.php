@extends('layouts.app')

@section('content')

@if(in_array(Auth::user()->role, ['Admin', 'Superviseur' ]))


<section>
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
</section>
@elseif(in_array(Auth::user()->role, ['employer']))

<section>
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
                            {{--
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
                            --}}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>


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