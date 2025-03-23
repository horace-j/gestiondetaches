@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Créer mon profil employé</h2>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('employer.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" name="nom" value="{{ old('nom') }}" required>
            @error('nom') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" name="prenom" value="{{ old('prenom') }}" required>
            @error('prenom') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="tel" class="form-label">Téléphone</label>
            <input type="text" class="form-control" name="tel" value="{{ old('tel') }}" required>
            @error('tel') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="mail" class="form-label">Email</label>
            <input type="email" class="form-control" name="mail" value="{{ Auth::user()->email }}" readonly>
            @error('mail') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="lien_linkedin" class="form-label">Lien LinkedIn (optionnel)</label>
            <input type="url" class="form-control" name="lien_linkedin" value="{{ old('lien_linkedin') }}">
            @error('lien_linkedin') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control" name="adresse" value="{{ old('adresse') }}" required>
            @error('adresse') <small class="text-danger">{{ $message }}</small> @enderror
        </div>


        <div class="mb-3">
            <label for="profession" class="form-label">profession</label>
            <input type="text" class="form-control" name="profession" value="{{ old('profession') }}" required>
            @error('profession') <small class="text-danger">{{ $message }}</small> @enderror
        </div>



        <div class="mb-3">
            <label for="a_propos" class="form-label">À propos</label>
            <textarea class="form-control" name="a_propos" rows="3">{{ old('a_propos') }}</textarea>
            @error('a_propos') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="ifu" class="form-label">IFU (optionnel)</label>
            <input type="text" class="form-control" name="ifu" value="{{ old('ifu') }}">
            @error('ifu') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Photo de profil (optionnel)</label>
            <input type="file" class="form-control" name="image" accept="image/*">
            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100">Créer mon profil</button>
    </form>
</div>
@endsection