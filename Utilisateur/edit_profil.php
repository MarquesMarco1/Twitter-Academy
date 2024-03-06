<?php
session_start();
if ($_GET['id_user'] == $_SESSION['USER']['id']) {
    echo "good";
} else {
    $var = $_SESSION['USER']['at_user_name'];
    header('Location: user_profil.php?id_user=' . $var);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="username">username :</label>
        <input type="text" name="username" id="username" value="<?php echo $_SESSION['USER']['username'] ?>">
        <label for="at_user_name">at_user_name :</label>
        <input type="text" name="at_user_name" id="at_user_name" value="<?php echo $_SESSION['USER']['at_user_name'] ?>">
        <label for="bio">bio :</label>
        <input type="text" name="bio" id="bio" value="<?php echo $_SESSION['USER']['bio'] ?>">
        <label for="city">city :</label>
        <input type="text" name="city" id="city" value="<?php echo $_SESSION['USER']['city'] ?>">
        <label for="campus">city :</label>
        <input type="text" name="campus" id="campus" value="<?php echo $_SESSION['USER']['campus'] ?>">
    </form>
</body>
</html>