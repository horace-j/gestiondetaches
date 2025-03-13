<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Application</title>
    <!-- Ajouter vos styles CSS ici -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>

    <!-- Header -->
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Accueil</a></li>
                <li><a href="{{ route('about') }}">À propos</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Contenu de la page -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Mon Application. Tous droits réservés.</p>
    </footer>

    <!-- Ajouter vos scripts JS ici -->
    <script src="{{ mix('js/app.js') }}"></script>

</body>

</html>