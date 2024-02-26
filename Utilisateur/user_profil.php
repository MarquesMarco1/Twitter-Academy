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
</head>

<body>
    <?php if ($user_profil === $user_logged) : ?>
        <button>modifier profil</button>
    <?php endif; ?>
   <img src="<?php echo "../".$user['profile_picture'] ?>" alt="">
    <h1><?php echo $user['username'] ?> </h1>
    <p><?php echo $user['at_user_name'] ?> </p>
</body>

</html>