<?php
session_start();
include('database/database.php');
$verif = new functions;
$VerifBasique = $verif->creation_compte();
$verif->login();
include('includes/erreur.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <form method="post">
        <label for="username">Nom Utilisateur :</label>
        <input type="text" name="username" id="username" required>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required>
        <label for="passwordcheck">Retapez votre mot de passe :</label>
        <input type="password" name="passwordcheck" id="passwordcheck">
        <input type="hidden" name="register" id="register">
        <div>
            <label for="verif_bot">Taper <?php echo $VerifBasique ?> :</label>
            <input type="text" name="verif_bot" id="verif_bot">
            <input type="hidden" name="hidden_verif" value="<?php echo $VerifBasique ?>">
        </div>
        <input type="submit" value="Crée le compte">
    </form>
    <form method="post">
        <label for="username">Nom Utilisateur ou Email :</label>
        <input type="text" name="username" id="username" required>
        <label for="password">password :</label>
        <input type="password" name="password" id="password" required>
        <input type="hidden" name="login" id="login">
        <input type="submit" value="Login">
    </form>
</body>

</html>