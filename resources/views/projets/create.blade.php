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
        <h1 class="mb-4">Créer un nouveau projet</h1>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('projets.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="titre" class="form-label">Titre :</label>
                <input type="text" id="titre" name="titre" class="form-control" required>
                @error('titre') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description :</label>
                <textarea id="description" name="description" class="form-control"></textarea>
                @error('description') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="date_debut" class="form-label">Date de début :</label>
                <input type="date" id="date_debut" name="date_debut" class="form-control" required>
                @error('date_debut') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="date_fin" class="form-label">Date de fin :</label>
                <input type="date" id="date_fin" name="date_fin" class="form-control" required>
                @error('date_fin') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-secondary w-100">Créer</button>
        </form>

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