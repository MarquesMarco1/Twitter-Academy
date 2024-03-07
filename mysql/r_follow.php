<?php
include('mysql.php');
$sql = $mysqlClient->prepare('INSERT INTO `follow`(`id_user`, `id_follow`, `time`) VALUES (:id_user,:id_follow,now())');
$sql->execute([
    "id_user" => $_GET['id_user'],
    "id_follow" => $_GET['id_follow'],
]);