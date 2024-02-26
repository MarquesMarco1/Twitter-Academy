<?php
session_start();
if (!isset($_SESSION['USER'])) {
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tweet academie</title>
  <link rel="stylesheet" href="style/accueil.css">
</head>

<body>

  <div class="marging">
    <?php include('includes/left-sidebar.php') ?>
    <?php include('includes/main.php') ?>
    <?php include('includes/right-sidebar.php') ?>
  </div>

  <script src="dark.js"></script>
</body>

</html>