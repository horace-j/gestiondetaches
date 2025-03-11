<?php
// Définir le titre de la page
$title = "Accueil - Mon Projet PHP";

// Démarrer la capture de sortie
ob_start();
?>

<section class="bg-white p-5 rounded shadow-md">
    <h2 class="text-xl font-bold mb-4">📋 Liste des Tâches</h2>

    <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
        <thead class="bg-blue-900 text-white">
            <tr>
                <th class="p-3">ID</th>
                <th class="p-3">Tâche</th>
                <th class="p-3">Statut</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-gray-100">
            <tr class="border-b border-gray-300">
                <td class="p-3">1</td>
                <td class="p-3">Réunion d'équipe</td>
                <td class="p-3">En cours</td>
                <td class="p-3">
                    <button class="bg-yellow-500 text-white px-3 py-1 rounded">Modifier</button>
                </td>
            </tr>
            <tr class="border-b border-gray-300">
                <td class="p-3">2</td>
                <td class="p-3">Rapport mensuel</td>
                <td class="p-3">Terminé</td>
                <td class="p-3">
                    <button class="bg-yellow-500 text-white px-3 py-1 rounded">Modifier</button>
                </td>
            </tr>
        </tbody>
    </table>
</section>

<section class="bg-white p-5 mt-5 rounded shadow-md">
    <h2 class="text-xl font-bold mb-4">📝 Ajouter une Tâche</h2>

    <form action="/submit" method="post" class="space-y-4">
        <div>
            <label for="task" class="block font-semibold">Tâche :</label>
            <input type="text" id="task" name="task" required
                class="w-full p-2 border rounded">
        </div>

        <div>
            <label for="status" class="block font-semibold">Statut :</label>
            <select id="status" name="status" class="w-full p-2 border rounded">
                <option value="À faire">À faire</option>
                <option value="En cours">En cours</option>
                <option value="Terminé">Terminé</option>
            </select>
        </div>

        <input type="submit" value="Ajouter"
            class="bg-blue-600 text-white px-4 py-2 rounded cursor-pointer">
    </form>
</section>

<?php
// Récupérer le contenu capturé et le stocker dans la variable $content
$content = ob_get_clean();

// Inclure le fichier de mise en page
include 'layout.php';
?>