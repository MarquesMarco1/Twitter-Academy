<?php
session_start();
include('mysql.php');
include('../includes/path.php');
$sql = $mysqlClient->prepare('SELECT count(u.id) as count FROM tweet t JOIN user u ON u.id = t.id_user WHERE t.id_response = :id ORDER BY t.id DESC');
$sql->execute(["id" => $_GET['id_tweet']]);
$comments = $sql->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($comments);
?>