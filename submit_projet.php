<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestion_multi_taches"; // Remplace par ton nom de base de données

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si toutes les clés existent dans $_POST
    if (isset($_POST['title_project'], $_POST['description_project'], $_POST['created_at'], $_POST['end_date'], $_POST['chef_de_projet'])) {
        // Récupérer les données du formulaire
        $title_project = $_POST['title_project'];
        $description_project = $_POST['description_project'];
        $created_at = $_POST['created_at'];
        $end_date = $_POST['end_date'];
        $chef_de_projet = $_POST['chef_de_projet'];
        $progress = 0; // La progression initiale est à 0 (cela peut être mis à jour après avec les tâches)

        // Débogage : Afficher les données récupérées pour vérifier
        echo "<pre>";
        var_dump($_POST); // Voir ce qui est envoyé dans le formulaire
        echo "</pre>";

        // Requête SQL d'insertion
        $sql = "INSERT INTO projects (title_project, description_project, created_at, end_date,chef_de_projet, progress)
                VALUES (?, ?, ?, ?, ?, ?)";

        // Préparer la requête préparée
        $stmt = $conn->prepare($sql);

        // Vérifier si la préparation de la requête échoue
        if ($stmt === false) {
            die('Erreur de préparation de la requête : ' . $conn->error);
        }

        // Lier les paramètres
        $stmt->bind_param("sssssi", $title_project, $description_project, $created_at, $end_date, $chef_de_projet, $progress);

        // Exécuter la requête
        if ($stmt->execute()) {
            // Rediriger après l'ajout du projet
            header("Location: tables_projet.php");
        } else {
            // Débogage : Afficher l'erreur de l'exécution de la requête
            echo "Erreur lors de l'ajout du projet : " . $stmt->error;
        }

        // Fermer la requête
        $stmt->close();
    } else {
        echo "Certains champs sont manquants dans le formulaire.";
    }

    // Fermer la connexion
    $conn->close();
}
