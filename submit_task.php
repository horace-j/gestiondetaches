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
    if (isset($_POST['task_title'], $_POST['project_id'], $_POST['assigned_to'], $_POST['end_date'])) {
        // Récupérer les données du formulaire
        $task_title = $_POST['task_title'];
        $project_id = $_POST['project_id'];
        $assigned_to = $_POST['assigned_to'];
        $end_date = $_POST['end_date'];

        // Débogage : Afficher les données récupérées pour vérifier
        echo "<pre>";
        var_dump($_POST); // Voir ce qui est envoyé dans le formulaire
        echo "</pre>";

        // Requête SQL d'insertion
        $sql = "INSERT INTO tasks (task_title, project_id, assigned_to, end_date)
                VALUES (?, ?, ?, ?)";

        // Préparer la requête préparée
        $stmt = $conn->prepare($sql);

        // Vérifier si la préparation de la requête échoue
        if ($stmt === false) {
            die('Erreur de préparation de la requête : ' . $conn->error);
        }

        // Lier les paramètres
        $stmt->bind_param("ssss", $task_title, $project_id, $assigned_to, $end_date);

        // Exécuter la requête
        if ($stmt->execute()) {
            // Rediriger après l'ajout du projet
            header("Location: tables_task.php");
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
// Exemple de mise à jour du statut d'une tâche
if (isset($_POST['task_id'], $_POST['status'])) {
    $task_id = $_POST['task_id'];
    $status = $_POST['status']; // "completed" par exemple

    // Connexion à la base de données
    $conn = new mysqli("localhost", "root", "", "gestion_multi_taches");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Mettre à jour le statut de la tâche
    $sql = "UPDATE tasks SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $task_id);
    $stmt->execute();
    
    // Maintenant, mettre à jour la progression du projet
    update_project_progress($conn, $task_id);
    
    $stmt->close();
    $conn->close();
}
function update_project_progress($conn, $task_id) {
    // Trouver le projet lié à cette tâche
    $sql = "SELECT project_id FROM tasks WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $task_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $project_id = $row['project_id'];
    
    // Calculer le nombre de tâches terminées pour ce projet
    $sql = "SELECT COUNT(*) AS total_tasks FROM tasks WHERE project_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $project_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $total_tasks = $row['total_tasks'];
    
    $sql = "SELECT COUNT(*) AS completed_tasks FROM tasks WHERE project_id = ? AND status = 'completed'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $project_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $completed_tasks = $row['completed_tasks'];
    
    // Calculer la progression
    $progress = ($total_tasks > 0) ? ($completed_tasks / $total_tasks) * 100 : 0;
    
    // Mettre à jour la progression du projet
    $sql = "UPDATE projects SET progress = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("di", $progress, $project_id);
    $stmt->execute();
    
    $stmt->close();
}

