<?php
include('mysql.php');
include('../includes/path.php');

$sql = $mysqlClient->prepare('SELECT u.* FROM user u JOIN tweet t ON t.id_user = u.id WHERE t.id = :id');
$sql->execute([
    "id" => $_GET['id_quoted_tweet'],
]);
$tweets = $sql->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($tweets);
