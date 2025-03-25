@extends('layouts.app')
<style>
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
@if(in_array(Auth::user()->role, ['Admin' ]))


<section>
    <div class="container py-5">
        <h1 class="mb-4 text-center">Liste des projets supprimés</h1>

        @if ($projets->isEmpty())
        <p class="text-center">Aucun projet supprimé.</p>
        @else
        <div class="row">
            @foreach ($projets as $projet)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ $projet->titre }}</h3>
                        <p class="card-text">{{ $projet->description }}</p>
                        <a href="{{ route('projets.restore', $projet->id) }}" class="btn btn-success">Restaurer</a>
                        <a href="{{ route('projets.forceDelete', $projet->id) }}" class="btn btn-danger">Supprimer définitivement</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <a href="{{ route('projets.index') }}" class="d-block mt-4">Retour à la liste des projets</a>
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