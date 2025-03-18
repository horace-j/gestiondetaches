@extends('layouts.app')
<style>
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        opacity: 0.9;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        opacity: 1;
    }

    /* Couleurs adoucies */
    .bg-primary {
        background-color: #4A90E2 !important;
    }

    .bg-success {
        background-color: #5CB85C !important;
    }

    .bg-warning {
        background-color: #F0AD4E !important;
    }

    .bg-danger {
        background-color: #D9534F !important;
    }
</style>

@section('content')
<section>
    <div class="pagetitle">
        <h1>Tableau de Bord</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                <li class="breadcrumb-item active">Tableau de Bord</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <!-- Carte pour le nombre d'utilisateurs -->
            <div class="col-lg-3">
                <div class="card bg-primary text-white animate__animated animate__fadeInLeft">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-users"></i> Utilisateurs</h5>
                        <p class="card-text">{{ $usersCount }}</p>
                        <small>Total des utilisateurs inscrits</small>
                    </div>
                </div>
            </div>

            <!-- Carte pour le nombre d'employés -->
            <div class="col-lg-3">
                <div class="card bg-success text-white animate__animated animate__fadeInDown">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-briefcase"></i> Employés</h5>
                        <p class="card-text">{{ $employersCount }}</p>
                        <small>Total des employés enregistrés</small>
                    </div>
                </div>
            </div>

            <!-- Carte pour le nombre de projets -->
            <div class="col-lg-3">
                <div class="card bg-warning text-dark animate__animated animate__fadeInUp">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-project-diagram"></i> Projets</h5>
                        <p class="card-text">{{ $projetsCount }}</p>
                        <small>Total des projets créés</small>
                    </div>
                </div>
            </div>

            <!-- Carte pour le nombre de tâches -->
            <div class="col-lg-3">
                <div class="card bg-danger text-white animate__animated animate__fadeInRight">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-tasks"></i> Tâches</h5>
                        <p class="card-text">{{ $tachesCount }}</p>
                        <small>Total des tâches assignées</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tableau pour les tâches par projet -->
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="card animate__animated animate__fadeIn">
                    <div class="card-body">
                        <h5 class="card-title">Tâches par Projet</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Projet</th>
                                    <th>Nombre de Tâches</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tachesParProjet as $projet)
                                <tr class="animate__animated animate__fadeIn">
                                    <td>{{ $projet->titre }}</td>
                                    <td>{{ $projet->taches_count }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<!-- Inclure FontAwesome pour les icônes -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- Inclure Animate.css pour les animations -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<!-- Script pour activer les animations au scroll -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const cards = document.querySelectorAll('.animate__animated');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add(entry.target.dataset.animation);
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.5
        });

        cards.forEach(card => {
            observer.observe(card);
        });
    });
</script>
@endsection