<?php
// Définir le titre de la page
$title = "Tableau de bord";

// Démarrer la capture de sortie
ob_start();
?>

<!-- Statistiques -->
<section class="grid grid-cols-3 gap-4 mt-5">
    <div class="bg-white p-5 rounded shadow text-center">
        <h3 class="text-lg font-bold">📌 Tâches</h3>
        <p class="text-3xl font-bold text-blue-600">24</p>
    </div>
    <div class="bg-white p-5 rounded shadow text-center">
        <h3 class="text-lg font-bold">👥 Utilisateurs</h3>
        <p class="text-3xl font-bold text-green-600">12</p>
    </div>
    <div class="bg-white p-5 rounded shadow text-center">
        <h3 class="text-lg font-bold">✅ Terminées</h3>
        <p class="text-3xl font-bold text-orange-600">15</p>
    </div>
</section>

<!-- Tableau des Tâches -->
<section class="mt-5">
    <h2 class="text-xl font-bold mb-3">📋 Liste des Tâches</h2>
    <table class="w-full bg-white rounded shadow">
        <thead class="bg-blue-600 text-white">
            <tr>
                <th class="p-4 text-left">ID</th>
                <th class="p-4 text-left">Tâche</th>
                <th class="p-4 text-left">Statut</th>
                <th class="p-4 text-left">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b hover:bg-gray-100">
                <td class="p-4">1</td>
                <td class="p-4">Créer un nouveau module</td>
                <td class="p-4 text-green-600">En cours</td>
                <td class="p-4">
                    <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 transition">Supprimer</button>
                </td>
            </tr>
            <tr class="border-b hover:bg-gray-100">
                <td class="p-4">2</td>
                <td class="p-4">Corriger les bugs</td>
                <td class="p-4 text-orange-600">À faire</td>
                <td class="p-4">
                    <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 transition">Supprimer</button>
                </td>
            </tr>
        </tbody>
    </table>
</section>

<?php
// Récupérer le contenu capturé et le stocker dans la variable $content
$content = ob_get_clean();

// Inclure le fichier de mise en page
include 'layout_bord.php';
?>