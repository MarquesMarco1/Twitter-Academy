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
    <form action="../mysql/r_edit_profil.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value="<?php echo $_SESSION['USER']['id'] ?>">
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
        <input type="hidden" name="action" value="allchange">

        <input type="submit" value="Modifier le compte">
    </form>
    <form action="../mysql/r_edit_profil.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value="<?php echo $_SESSION['USER']['id'] ?>">
        <label for="imageToUpload">pp :</label>
        <input type="hidden"  name="action" value="ppchange">
        <input type="file" name="imageToUpload" id="imageToUpload">
        <input type="submit" value="Modifier la pp">
    </form>
    <form action="../mysql/r_edit_profil.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value="<?php echo $_SESSION['USER']['id'] ?>">
        <input type="hidden"  name="action" value="bannerchange">
        <label for="imageToUploadBanner">banner :</label>
        <input type="file" name="imageToUploadBanner" id="imageToUploadBanner">

        <input type="submit" value="Modifier la bannière">
    </form>
    <?php echo $_SESSION['USER']['banner'] ?>
</body>

</html>