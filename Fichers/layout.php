<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'Tableau de Bord'; ?></title>
    <link rel="stylesheet" href="/css/styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-blue-900 min-h-screen text-white p-5">
        <h2 class="text-2xl font-bold">Tableau de Bord</h2>
        <nav class="mt-5">
            <ul>
                <li class="mb-3"><a href="/" class="block p-2 bg-blue-700 rounded">🏠 Accueil</a></li>
                <li class="mb-3"><a href="/about.php" class="block p-2 hover:bg-blue-700 rounded">📋 À propos</a></li>
                <li class="mb-3"><a href="/contact.php" class="block p-2 hover:bg-blue-700 rounded">📧 Contact</a></li>
                <li class="mb-3"><a href="../Fichers/Tableau_de_bord.php" class="block p-2 hover:bg-blue-700 rounded">📧 bord</a></li>
            </ul>
        </nav>
    </aside>

    <!-- Contenu principal -->
    <main class="flex-1 p-5">
        <header class="flex justify-between items-center bg-white p-4 rounded shadow">
            <h1 class="text-2xl font-bold"><?php echo $title ?? 'Bienvenue !'; ?></h1>
            <button class="bg-red-500 text-white px-4 py-2 rounded">Déconnexion</button>
        </header>

        <!-- Contenu injecté dynamiquement -->
        <section class="mt-5">
            <?php echo $content; ?>
        </section>
    </main>

</body>

</html>