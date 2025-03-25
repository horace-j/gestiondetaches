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

<section>

    @if(in_array(Auth::user()->role, ['Admin' ]))

    <div class="container mt-5">
        <h1 class="text-center mb-4">Liste des utilisateurs</h1>
        <!-- Bouton de création d'utilisateur -->


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

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>


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

</section>


@endsection