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


@if(in_array(Auth::user()->role, ['Admin', 'Superviseur' ]))
<section>
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