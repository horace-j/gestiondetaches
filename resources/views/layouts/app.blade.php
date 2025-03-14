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

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">4</span>
                    </a><!-- End Notification Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have 4 new notifications
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-warning"></i>
                            <div>
                                <h4>Lorem Ipsum</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>30 min. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-x-circle text-danger"></i>
                            <div>
                                <h4>Atque rerum nesciunt</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>1 hr. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-check-circle text-success"></i>
                            <div>
                                <h4>Sit rerum fuga</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>2 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-info-circle text-primary"></i>
                            <div>
                                <h4>Dicta reprehenderit</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a href="#">Show all notifications</a>
                        </li>

                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-chat-left-text"></i>
                        <span class="badge bg-success badge-number">3</span>
                    </a><!-- End Messages Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                        <li class="dropdown-header">
                            You have 3 new messages
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>Maria Hudson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>4 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>Anna Nelson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>6 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>David Muldon</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>8 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="dropdown-footer">
                            <a href="#">Show all messages</a>
                        </li>

                    </ul><!-- End Messages Dropdown Items -->

                </li><!-- End Messages Nav -->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>Kevin Anderson</h6>
                            <span>Web Designer</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
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
                            <a class="nav-link collapsed" href="index.html">
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
                                        <i class="bi bi-circle"></i><span>Creer</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="components-accordion.html">
                                        <i class="bi bi-circle"></i><span>Accordion</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="components-badges.html" class="active">
                                        <i class="bi bi-circle"></i><span>Badges</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="components-breadcrumbs.html">
                                        <i class="bi bi-circle"></i><span>Breadcrumbs</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="components-buttons.html">
                                        <i class="bi bi-circle"></i><span>Buttons</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="components-cards.html">
                                        <i class="bi bi-circle"></i><span>Cards</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="components-carousel.html">
                                        <i class="bi bi-circle"></i><span>Carousel</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="components-list-group.html">
                                        <i class="bi bi-circle"></i><span>List group</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="components-modal.html">
                                        <i class="bi bi-circle"></i><span>Modal</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="components-tabs.html">
                                        <i class="bi bi-circle"></i><span>Tabs</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="components-pagination.html">
                                        <i class="bi bi-circle"></i><span>Pagination</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="components-progress.html">
                                        <i class="bi bi-circle"></i><span>Progress</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="components-spinners.html">
                                        <i class="bi bi-circle"></i><span>Spinners</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="components-tooltips.html">
                                        <i class="bi bi-circle"></i><span>Tooltips</span>
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



                            @if (Route::has('login'))
                            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                @auth
                                <!-- Nom de l'utilisateur connecté avec option de déconnexion au clic -->
                                <div style="display: inline-block; position: relative;">
                                    <span style="font-size: 18px; font-weight:bold; padding:5px; color:black; cursor: pointer;" id="user-name">
                                        {{ Auth::user()->name }}
                                    </span>

                                    <a href="/dashboard"
                                        style="font-size: 20px; font-weight:bold; text-decoration:none; padding:5px; color:black"
                                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">

                                        <span style="font-size: 10px;">
                                        </span>
                                    </a>

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