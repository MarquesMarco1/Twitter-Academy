<?php
session_start();
$user_profil = $_GET['id_user'];
$user_logged = $_SESSION['USER']['id'];



include('../mysql/r_profil.php');
$verif = new profil;
$user = $verif->getUser($user_profil);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/accueil.css">
</head>

<body>
    <div class="marging">
        <?php include('../includes/left-sidebar.php') ?>
        <?php include('../includes/profil.php') ?>
        <?php include('../includes/right-sidebar.php') ?>
    </div>
</body>

</html>