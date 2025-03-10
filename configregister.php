<?php
// Connexion à la base de données
$servername = "localhost";  // Remplace par ton serveur de base de données
$username = "root";         // Remplace par ton utilisateur
$password = "";             // Remplace par ton mot de passe
$dbname = "gestion_multi_taches"; // Remplace par ton nom de base de données

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Validation des données (ex : vérifier si l'email existe déjà)
    $sql_check_email = "SELECT * FROM users WHERE email = ?";
    $stmt_check = $conn->prepare($sql_check_email);
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();
    if ($result_check->num_rows > 0) {
        echo "L'email existe déjà. Veuillez en choisir un autre.";
        exit();
    }

    // Hashage du mot de passe
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Préparer la requête SQL avec des paramètres liés
    $sql = "INSERT INTO users (name, email, username, password, role, created_at) VALUES (?, ?, ?, ?, ?, NOW())";

    // Préparer la requête
    $stmt = $conn->prepare($sql);

    // Vérifier si la préparation a réussi
    if ($stmt === false) {
        die('Erreur de préparation de la requête: ' . $conn->error);
    }

    // Lier les paramètres à la requête
    $stmt->bind_param("sssss", $name, $email, $username, $hashed_password, $role);

    // Exécuter la requête
    if ($stmt->execute()) {
        // Redirection vers une page de succès ou connexion
        header("Location: pages-login.php"); // Rediriger vers la page de connexion après succès
        exit();
    } else {
        echo "Erreur: " . $stmt->error;
    }

    // Fermer la connexion
    $stmt->close();
    $conn->close();
}
?>
