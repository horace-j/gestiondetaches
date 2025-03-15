@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 style="text-align: center;" class="mb-4 py-4">Liste des projets</h1>

    <div class="row">
        @foreach ($projets as $projet)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">
                        <a href="{{ route('projets.show', $projet->id) }}" class="text-decoration-none">{{ $projet->titre }}</a>
                    </h3>
                    <p class="card-text">{{ $projet->description }}</p>
                    <a href="{{ route('taches.create', $projet->id) }}" class="btn btn-secondary mb-3">Ajouter une tâche</a>
                    <a href="{{ route('projets.show', $projet) }}" class="d-block mt-4 btn btn-secondary"> Evolution </a>


                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection