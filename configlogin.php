<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestion_multi_taches";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erreur de connexion: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Vérifier si l'utilisateur existe
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Vérifier le mot de passe
        if (password_verify($password, $user['password'])) {
            // Stocker les informations de l'utilisateur en session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Rediriger selon le rôle
            if ($user['role'] == 'admin') {
                // Si c'est un administrateur, rediriger vers le tableau de bord admin
                header("Location: admin_dashboard.php");
            } elseif ($user['role'] == 'user') {
                // Si c'est un utilisateur normal, rediriger vers son tableau de bord
                header("Location: user_dashboard.php");
            } else {
                // Si le rôle est autre, rediriger vers une page par défaut
                header("Location: default_dashboard.php");
            }
            exit();
        } else {
            header("Location: pages-error-404.php");
        }
    } else {
        header("Location: pages-error-404.php");

    }

    $stmt->close();
    $conn->close();
}
?>
