<?php
session_start();
$user_profil = $_GET['id_user'];
$user_logged = $_SESSION['USER']['id'];
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
</body>

</html>