<?php
session_start();
include('mysql.php');
include('../includes/path.php');

//  if ($_FILES['imageToUpload']['size'] < 5 * MB) {  // si le photo de profil fait - 5MB

$directory = "../assets/save_image_user/";
$filecount = count(glob($directory . "*"));


if (isset($_FILES['imageToUpload'])) {
    unlink("../" . $_SESSION['USER']['pp']);
    move_uploaded_file($_FILES['imageToUpload']['tmp_name'], "../assets/save_image_user/" . $filecount . $_FILES['imageToUpload']['name']);  // ajoute la photo de profil dans un dossier
}

$sql = $mysqlClient->prepare('UPDATE `user` SET username = :username, at_user_name = :at_user_name, profile_picture = :imageToUpload, bio = :bio, banner = :banner, mail = :mail, private = :private, city = :city, campus = :campus WHERE id = :id'); // connexion avec login ou email
$sql->execute([
    "id" => $_POST['id'],
    "username" => $_POST['username'],
    "at_user_name" => $_POST['at_user_name'],
    "imageToUpload" => "assets/save_image_user/" . $filecount . $_FILES['imageToUpload']['name'],
    "bio" => $_POST['bio'],
    "banner" => "test",
    "mail" => "test",
    "private" => 0,
    "city" => $_POST['city'],
    "campus" => $_POST['campus'],

]);

      
    //} else {
    //    $_SESSION['MESSAGE_ERREUR'] = "image +5mb";
    //}



// 