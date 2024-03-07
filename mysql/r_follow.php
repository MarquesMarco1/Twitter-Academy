<?php
include('mysql.php');
session_start();
if ($_GET['id_user'] != $_GET['id_follow']) {
    $sql = $mysqlClient->prepare('INSERT INTO `follow`(`id_user`, `id_follow`, `time`) VALUES (:id_user,:id_follow,now())');
    $sql->execute([
        "id_user" => $_GET['id_user'],
        "id_follow" => $_GET['id_follow'],
    ]);
} else {
    echo "tu peux pas te follow";
}
