<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tableau des Tâches </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body class="formulaire">

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="Tables.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">NiceAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed " href="form_projet.php">
          <i class="bi bi-menu-button-wide"></i>
          <span>Créer un projet</span>
        </a>
      </li>
      <!-- End  Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed " href="form_task.php">
          <i class="bi bi-menu-button-wide"></i>
          <span>Créer une tâche</span>
        </a>
      </li>
      <!-- End  Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed " href="tables_projet.php">
          <i class="bi bi-layout-text-window-reverse"></i>
          <span>Tables des projets</span>
        </a>
      </li>
      <!-- End  Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed " href="tables_task.php">
          <i class="bi bi-layout-text-window-reverse"></i>
          <span>Tables des tâches</span>
        </a>
      </li>
      <!-- End  Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Gestion des Tâches</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
          <li class="breadcrumb-item active"> Liste des tâches</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="card">
        <div class="card-body">
          <div class="row boutona">
            <h5 class="card-title">Liste des Tâches</h5>
            <div class="table-container">
              <!-- Ajouter le style CSS ici -->
              <style>
                /* Classe spécifique pour la description */
                .description-cell-fixed {
                  max-width: 150px !important;
                  /* Limite la largeur à 150px */
                  overflow: hidden !important;
                  /* Cache le texte qui dépasse */
                  text-overflow: ellipsis !important;
                  /* Ajoute "..." si le texte est trop long */
                  white-space: nowrap !important;
                  /* Empêche le texte de passer à la ligne */
                }
              </style>
              <table class="table table-hover" style="font-size: 12px;">
                <thead>
                  <tr>
                    <th>Tâche</th>
                    <th>Projet</th>
                    <th>Assigné à</th>
                    <th>Statut</th>
                    <th>Date limite</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // Connexion à la base de données
                  $servername = "localhost";
                  $username = "root";
                  $password = "";
                  $dbname = "gestion_multi_taches";

                  $conn = new mysqli($servername, $username, $password, $dbname);

                  if ($conn->connect_error) {
                    die("Échec de la connexion : " . $conn->connect_error);
                  }

                  // Récupérer l'ID de la tâche
                  if (isset($_GET['id'])) {
                    $task_id = $_GET['id'];

                    // Récupérer les détails de la tâche
                    $taskSql = "SELECT * FROM tasks WHERE task_id = ?";
                    $stmt = $conn->prepare($taskSql);
                    $stmt->bind_param("i", $task_id);
                    $stmt->execute();
                    $taskResult = $stmt->get_result();

                    if ($taskResult->num_rows > 0) {
                      $task = $taskResult->fetch_assoc();
                    } else {
                      echo "Tâche non trouvée.";
                      exit;
                    }

                    // Si le formulaire est soumis pour mettre à jour la tâche
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                      $title_task = $_POST['task_title'];
                      $assigned_to = $_POST['assigned_to'];
                      $status = $_POST['status'];
                      $end_date = $_POST['end_date'];

                      // Mettre à jour les données de la tâche
                      $updateSql = "UPDATE tasks SET task_title = ?, assigned_to = ?, status = ?, end_date = ? WHERE task_id = ?";
                      $updateStmt = $conn->prepare($updateSql);
                      $updateStmt->bind_param("ssssi", $title_task, $assigned_to, $status, $end_date, $task_id);

                      if ($updateStmt->execute()) {
                        echo "Tâche mise à jour avec succès!";
                        header("Location: dashboard.php");  // Redirection vers la page d'accueil ou la liste des tâches
                      } else {
                        echo "Erreur lors de la mise à jour de la tâche.";
                      }
                    }
                  } else {
                    echo "Aucune tâche sélectionnée.";
                    exit;
                  }
                  ?>

                  <form method="POST">
                    <label for="task_title">Titre de la tâche :</label><br>
                    <input type="text" name="task_title" value="<?php echo htmlspecialchars($task['task_title']); ?>" required><br><br>

                    <label for="assigned_to">Assigné à :</label><br>
                    <input type="text" name="assigned_to" value="<?php echo htmlspecialchars($task['assigned_to']); ?>" required><br><br>

                    <label for="status">Statut :</label><br>
                    <select name="status">
                      <option value="À faire" <?php echo ($task['status'] == 'À faire') ? 'selected' : ''; ?>>À faire</option>
                      <option value="En cours" <?php echo ($task['status'] == 'En cours') ? 'selected' : ''; ?>>En cours</option>
                      <option value="Terminé" <?php echo ($task['status'] == 'Terminé') ? 'selected' : ''; ?>>Terminé</option>
                    </select><br><br>

                    <label for="end_date">Date limite :</label><br>
                    <input type="date" name="end_date" value="<?php echo $task['end_date']; ?>" required><br><br>

                    <input type="submit" value="Mettre à jour la tâche">
                  </form>

                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </section>



    <!-- ======= Footer ======= -->


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>