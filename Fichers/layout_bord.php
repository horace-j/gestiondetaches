<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'Tableau de Bord'; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-blue-900 min-h-screen text-white p-5">
        <h2 class="text-2xl font-bold">Tableau de Bord</h2>
        <nav class="mt-5">
            <ul>
                <li class="mb-3"><a href="#" class="block p-2 bg-blue-700 rounded">🏠 Accueil</a></li>
                <li class="mb-3"><a href="#" class="block p-2 hover:bg-blue-700 rounded">📋 Tâches</a></li>
                <li class="mb-3"><a href="#" class="block p-2 hover:bg-blue-700 rounded">👤 Utilisateurs</a></li>
                <li class="mb-3"><a href="#" class="block p-2 hover:bg-blue-700 rounded">⚙️ Paramètres</a></li>
                <li class="mb-3"><a href="../Fichers/index.php" class="block p-2 hover:bg-blue-700 rounded">Accueil</a></li>
            </ul>
        </nav>
    </aside>

    <!-- Contenu principal -->
    <main class="flex-1 p-5">
        <section>
            <?php echo $content; // Correction ici 
            ?>
        </section>
    </main>

</body>

</html>