<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Tableau de Bord' }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicons -->
    <link href="{{ asset('/images/LOGO.png') }}" rel="icon">
    <link href="{{ asset('/images/LOGO.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Styles personnalisés -->
    <style>
        /* Fond blanc pour le body */
        body {
            background-color: #FFFFFF;
            color: #333333;
        }

        /* Couleur grise pour les boutons */
        .btn-custom {
            background-color: #808080;
            color: #FFFFFF;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }

        .btn-custom:hover {
            background-color: #606060;
            transform: scale(1.05);
        }

        /* Couleur grise pour les liens */
        a {
            color: #808080;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
        }

        a:hover {
            color: black !important;
            font-weight: bold !important;
            text-decoration: underline;
        }

        /* En-tête gris */
        header {
            background-color: #808080;
            color: #FFFFFF;
            padding: 15px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }

        /* Pied de page gris foncé */
        footer {
            background-color: #202020;
            color: #D3D3D3;
            text-align: center;
            padding: 10px;
            margin-top: 20px;
        }

        /* Sidebar avec fond blanc et texte gris */
        aside#sidebar {
            background-color: #FFFFFF;
            color: #808080;
        }

        /* Éléments interactifs dans la sidebar */
        aside#sidebar .nav-link {
            color: #808080;
        }

        aside#sidebar .nav-link:hover {
            background-color: #F0F0F0;
            color: #606060;
        }

        /* Boutons dans le header */
        .header .btn {
            background-color: #808080;
            color: #FFFFFF;
            border: none;
        }

        .header .btn:hover {
            background-color: #606060;
        }

        /* Badges */
        .badge {
            background-color: #808080;
            color: #FFFFFF;
        }

        /* Dropdowns */
        .dropdown-menu {
            background-color: #FFFFFF;
            border: 1px solid #808080;
        }

        .dropdown-item {
            color: #808080;
        }

        .dropdown-item:hover {
            background-color: #F0F0F0;
            color: #606060;
        }

        /* Styles pour le formulaire de déconnexion */
        #logout-form {
            display: none;
            position: absolute;
            top: 25px;
            left: 0;
            background: white;
            border: 1px solid #ddd;
            padding: 5px;
            border-radius: 5px;
            z-index: 10;
        }

        #logout-form button {
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            color: black;
            background: none;
            border: none;
            cursor: pointer;
        }

        #logout-form button:hover {
            color: #606060;
        }

        .actived {
            color: white !important;
            /* Texte en blanc */
            background-color: grey;
            /* Fond en gris */
            padding: 5px 10px;
            /* Ajouter un peu d'espace autour du texte */
            border-radius: 4px;
            /* Arrondir les coins */
            text-decoration: none !important;
            /* Supprimer le soulignement du lien */
        }

        li a:hover {
            color: white;
            /* Texte en blanc au survol */
            background-color: darkgrey;
            /* Fond en gris foncé au survol */
        }
    </style>
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="/home" class=" d-flex align-items-center">
                <img src="/images/LOGO.png" height="60px" alt="">
                <span class="d-none d-lg-block">PROMANAGE</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->



        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">




                <li class="mx-5 ">



                    @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                        <!-- Nom de l'utilisateur connecté avec option de déconnexion au clic -->
                        <div style="display: inline-block; position: relative;">
                            <span style="font-size: 18px; font-weight:bold; padding:5px; color:black; cursor: pointer;" id="user-name">
                                {{ Auth::user()->name }}
                            </span>



                            <!-- Bouton de déconnexion (affiché au clic) -->
                            <form method="POST" action="/logout" style="display:none; position: absolute; top: 25px; left: 0; background: white; border: 1px solid #ddd; padding: 5px; border-radius: 5px; z-index: 10;" id="logout-form">
                                @csrf
                                <button type="submit"
                                    style="font-size: 16px; font-weight:bold; text-decoration:none; color:black; background:none; border:none; cursor:pointer;"
                                    class="hover:text-red-600">
                                    Déconnexion
                                </button>
                            </form>
                        </div>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const userName = document.getElementById('user-name');
                                const logoutForm = document.getElementById('logout-form');

                                // Affiche ou cache le formulaire de déconnexion lors du clic
                                userName.addEventListener('click', () => {
                                    if (logoutForm.style.display === 'none' || logoutForm.style.display === '') {
                                        logoutForm.style.display = 'block';
                                    } else {
                                        logoutForm.style.display = 'none';
                                    }
                                });

                                // Cache le formulaire si on clique ailleurs sur la page
                                document.addEventListener('click', (e) => {
                                    if (!userName.contains(e.target) && !logoutForm.contains(e.target)) {
                                        logoutForm.style.display = 'none';
                                    }
                                });
                            });
                        </script>
                        @else
                        <!-- Lien pour se connecter -->
                        <a href="/dashboard"
                            style="font-size: 20px; font-weight:bold; text-decoration:none; padding:5px; color:black"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">

                            <span style="font-size: 10px;">
                            </span>
                        </a>

                        <!-- Lien pour s'enregistrer -->
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            style="font-size: 20px; font-weight:bold; text-decoration:none; padding:5px; color:black"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        </a>
                        @endif
                        @endauth
                    </div>
                    @endif

                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">

                <!-- ======= Sidebar ======= -->
                <aside id="sidebar" class="sidebar">

                    <ul class="sidebar-nav" id="sidebar-nav">

                        <li class="nav-item">

                            <a class="nav-link collapsed" href="/home">
                                <i class="bi bi-grid"></i>
                                <span>Dashboard</span>
                            </a>
                        </li><!-- End Dashboard Nav -->

                        <li class="nav-item">
                            <a class="nav-link " data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                                <i class="bi bi-menu-button-wide"></i><span>Utilisateur</span><i class="bi bi-chevron-down ms-auto"></i>
                            </a>
                            <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                                <li>
                                    <a href="/employer/create">
                                        <i class="bi bi-circle"></i><span>Ajouter votre profil</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('profile') }}" class="{{ Route::is('profile') ? 'actived' : '' }}">
                                        <i class="bi bi-circle"></i><span>Votre profile</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('liste') }}" class="{{ Route::is('liste') ? 'actived' : '' }}">
                                        <i class="bi bi-circle"></i><span> Listes des employers </span>
                                    </a>
                                </li>



                            </ul>
                        </li><!-- End Components Nav -->


                        <li class="nav-item">
                            <a class="nav-link " data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                                <i class="bi bi-menu-button-wide"></i><span>taches</span><i class="bi bi-chevron-down ms-auto"></i>
                            </a>
                            <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">

                                <li>
                                    <a href="{{ route('projets.create') }}" class="{{ Route::is('projets.create') ? 'actived' : '' }}">
                                        <i class="bi bi-circle"></i><span>Ajouter un projets</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('projets.index') }}" class="{{ Route::is('projets.index') ? 'actived' : '' }}">
                                        <i class="bi bi-circle"></i><span> Listes des projets </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('liste') }}" class="{{ Route::is('liste') ? 'actived' : '' }}">
                                        <i class="bi bi-circle"></i><span> Listes des employers </span>
                                    </a>
                                </li>



                            </ul>
                        </li><!-- End Components Nav -->




                        <li class="nav-item">
                            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                                <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
                            </a>
                            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                                <li>
                                    <a href="forms-elements.html">
                                        <i class="bi bi-circle"></i><span>Form Elements</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="forms-layouts.html">
                                        <i class="bi bi-circle"></i><span>Form Layouts</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="forms-editors.html">
                                        <i class="bi bi-circle"></i><span>Form Editors</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="forms-validation.html">
                                        <i class="bi bi-circle"></i><span>Form Validation</span>
                                    </a>
                                </li>
                            </ul>
                        </li><!-- End Forms Nav -->

                        <li class="nav-item">
                            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                                <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
                            </a>
                            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                                <li>
                                    <a href="tables-general.html">
                                        <i class="bi bi-circle"></i><span>General Tables</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="tables-data.html">
                                        <i class="bi bi-circle"></i><span>Data Tables</span>
                                    </a>
                                </li>
                            </ul>
                        </li><!-- End Tables Nav -->

                        <li class="nav-item">
                            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                                <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
                            </a>
                            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                                <li>
                                    <a href="charts-chartjs.html">
                                        <i class="bi bi-circle"></i><span>Chart.js</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="charts-apexcharts.html">
                                        <i class="bi bi-circle"></i><span>ApexCharts</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="charts-echarts.html">
                                        <i class="bi bi-circle"></i><span>ECharts</span>
                                    </a>
                                </li>
                            </ul>
                        </li><!-- End Charts Nav -->

                        <li class="nav-item">
                            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                                <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
                            </a>
                            <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                                <li>
                                    <a href="icons-bootstrap.html">
                                        <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="icons-remix.html">
                                        <i class="bi bi-circle"></i><span>Remix Icons</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="icons-boxicons.html">
                                        <i class="bi bi-circle"></i><span>Boxicons</span>
                                    </a>
                                </li>
                            </ul>
                        </li><!-- End Icons Nav -->

                        <li class="nav-heading">Pages</li>

                        <li class="nav-item">
                            <a class="nav-link collapsed" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>Profile</span>
                            </a>
                        </li><!-- End Profile Page Nav -->

                        <li class="nav-item">
                            <a class="nav-link collapsed" href="pages-faq.html">
                                <i class="bi bi-question-circle"></i>
                                <span>F.A.Q</span>
                            </a>
                        </li><!-- End F.A.Q Page Nav -->

                        <li class="nav-item">
                            <a class="nav-link collapsed" href="pages-contact.html">
                                <i class="bi bi-envelope"></i>
                                <span>Contact</span>
                            </a>
                        </li><!-- End Contact Page Nav -->

                        <li class="nav-item">
                            <a class="nav-link collapsed" href="pages-register.html">
                                <i class="bi bi-card-list"></i>
                                <span>Register</span>
                            </a>
                        </li><!-- End Register Page Nav -->

                        <li class="nav-item">
                            <a class="nav-link collapsed" href="pages-login.html">
                                <i class="bi bi-box-arrow-in-right"></i>
                                <span>Login</span>
                            </a>
                        </li><!-- End Login Page Nav -->

                        <li class="nav-item">
                            <a class="nav-link collapsed" href="pages-error-404.html">
                                <i class="bi bi-dash-circle"></i>
                                <span>Error 404</span>
                            </a>
                        </li><!-- End Error 404 Page Nav -->

                        <li class="nav-item">





                        </li><!-- End Blank Page Nav -->

                    </ul>

                </aside><!-- End Sidebar-->

            </div>
            <div class="col-md-10">

                <div class="container py-5  ">
                    @yield('content')
                </div>

            </div>
        </div>
    </div>


    <footer>
        &copy; 2025 - Tous droits réservés
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>