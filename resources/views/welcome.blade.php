<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promanage - Accueil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        /* Animation pour l'image (oscillation infinie) */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .animated-image {
            animation: float 3s ease-in-out infinite;
        }

        /* Style pour la section hero */
        .hero-section {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 100px 0;
        }

        /* Style pour les cartes de fonctionnalités */
        .feature-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-white text-gray-800">
    <!-- Header -->
    <div class="container">
        <header class="p-5 -md flex justify-between items-center">
            <img src="images/LOGO.png" alt="Gestion de projets" style="height: 100px !important;">

            <nav>
                <ul class=" flex space-x-6">
                    <li><a href="/" class=" text-3xl font-bold hover:text-gray-500">Accueil</a></li>

                </ul>
            </nav>
            <a href="/login" class="px-4 py-2 bg-gray-700 text-white rounded-md hover:bg-gray-600">Connexion</a>
        </header>
    </div>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container mx-auto px-6 flex flex-col md:flex-row items-center justify-between">
            <div class="md:w-1/2">
                <h2 class="text-4xl font-bold mb-6">Gérez vos projets en toute fluidité </h2>
                <p class="text-gray-600 mb-8">Promanage simplifie l'organisation et la collaboration au sein de notre entreprise pour une meilleure productivité.</p>
                <a href="/login" class="px-6 py-3 bg-gray-700 text-white rounded-md hover:bg-gray-600">Accéder à l'outil</a>
            </div>
            <div class="md:w-1/2 mt-10 md:mt-0">
                <img src="images/bac.webp" alt="Gestion de projets" class="animated-image w-full rounded-lg shdow-lg">
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center p-5">
        <p>&copy; 2025 Promanage. Tous droits réservés.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>