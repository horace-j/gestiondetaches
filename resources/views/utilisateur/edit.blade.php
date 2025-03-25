@extends('layouts.app')
<style>
    label {
        margin: 15px;
        font-size: 15px;
        font-weight: bold;
    }

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
                        <input type="hidden" name="name" value="{{ $user->name }}">
                        <span class="form-control">{{ $user->name }}</span>
                    </div>

                    <!-- Champ email (non modifiable) -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="hidden" name="email" value="{{ $user->email }}">
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