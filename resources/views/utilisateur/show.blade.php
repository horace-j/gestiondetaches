@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4 py-4">Liste des projets</h1>

    <div class="row">
        @foreach ($employers as $employer)
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-lg rounded-3 hover-card">
                <div class="card-body text-center">
                    <div class="position-relative">
                        <img src="{{ asset('storage/' . $employer->image) }}"
                            class="rounded-circle border border-3 border-primary mb-3"
                            alt="Profile" width="120px" height="120px">
                    </div>

                    <h5 class="fw-bold">{{ $employer->nom }} {{ $employer->prenom }}</h5>
                    <p class="text-muted mb-2">{{ $employer->profession }}</p>

                    <div class="text-start mt-3">
                        <p><strong>Mail :</strong> <span class="text-muted">{{ $employer->mail }}</span></p>
                        <p><strong>Téléphone :</strong> <span class="text-muted">{{ $employer->tel }}</span></p>
                        <p><strong>Adresse :</strong> <span class="text-muted">{{ $employer->adresse }}</span></p>
                        <p><strong>IFU :</strong> <span class="text-muted">{{ $employer->ifu }}</span></p>
                        <p><strong>LinkedIn :</strong> <a href="{{ $employer->lien_linkedin }}" target="_blank">{{ $employer->lien_linkedin }}</a></p>

                        <p><strong>À propos :</strong></p>
                        <p class="text-muted text-justify" style="text-align: justify;">{{ $employer->a_propos }}</p>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-outline-primary btn-sm">Voir profil</button>
                        <button class="btn btn-outline-secondary btn-sm">Contacter</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
    }
</style>
@endsection