<?php
session_start();
include('mysql.php');
include('database/database.php');
$verif = new functions;
$VerifBasique = $verif->creation_compte();
$verif->login();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <?php
    include('includes/erreur.php');
    include('includes/nav.php');
    include('includes/login/inscription.php');
    include('includes/login/connexion.php');
    ?>
</body>

</html>