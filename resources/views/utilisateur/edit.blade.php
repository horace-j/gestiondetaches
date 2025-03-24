@extends('layouts.app')
<style>
    label {
        margin: 15px;
        font-size: 15px;
        font-weight: bold;
    }
</style>
@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Modifier l'utilisateur</h1>

    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-body">
                <!-- Champ nom (non modifiable) -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <span class="form-control">{{ $user->name }}</span>
                </div>

                <!-- Champ email (non modifiable) -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <span class="form-control">{{ $user->email }}</span>
                </div>

                <!-- Champ rôle (modifiable) -->
                <div class="mb-3">
                    <label for="role" class="form-label">Rôle</label>
                    <select id="role" name="role" class="form-select" required>
                        @foreach ($roles as $role)
                        <option value="{{ $role }}" {{ $user->role == $role ? 'selected' : '' }}>
                            {{ ucfirst($role) }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Bouton de soumission -->
                <div class="text-center">
                    <button type="submit" class="btn btn-secondary">Mettre à jour l'utilisateur</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection