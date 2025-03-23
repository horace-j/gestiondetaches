@extends('layouts.app')

@section('content')
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
@endsection