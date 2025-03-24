@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Liste des utilisateurs</h1>

    <!-- Bouton de création d'utilisateur -->
    <div class="mb-3 text-end">
        <a href="{{ route('users.create') }}" class="btn btn-success">Créer un utilisateur</a>
    </div>

    <!-- Table des utilisateurs -->
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="badge 
                                @if($user->role == 'admin') bg-danger 
                                @elseif($user->role == 'superviseur') bg-warning 
                                @elseif($user->role == 'employer') bg-info 
                                @else bg-secondary 
                                @endif">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td class="text-center">
                            <!-- Bouton Modifier -->
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Modifier</a>

                            <!-- Formulaire de suppression -->
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
</div>
@endsection