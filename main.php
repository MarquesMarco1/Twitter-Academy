<?php
session_start();
include('database/database.php');
$verif = new functions;
$VerifBasique = $verif->creation_compte();
$verif->login();
?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tweet Academie</title>
    <link rel="stylesheet" href="style/main.css">
</head>

<body>
    <div class="conteneur">
        <div class="colonne1">
            <img src="assets/img/logo.jpg" alt="Logo">
        </div>
        <div class="colonne2">
            <button onclick="togglePopup1()" id="create">Créez votre compte</button>
            <button onclick="togglePopup2()" id="connect">Se connecter</button>
        </div>
    </div>
    <?php include('includes/nav.php'); ?>
    <?php include('includes/login/inscription.php'); ?>
    <?php include('includes/login/connexion.php'); ?>



    <script src="script.js"></script>
</body>

</html>