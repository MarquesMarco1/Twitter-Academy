<?php
session_start();
include('mysql.php');

$cl = strlen($_POST['tweet']);

if ($cl <= 140) {
    $sql = $mysqlClient->prepare('INSERT INTO `tweet`(`id_user`, `id_response`, `time`, `content`, `id_quoted_tweet`) VALUES (:id, :response, NOW(), :content, :id_quote_tweet)');
    $sql->execute([
        "id" => $_POST['id_user'],
        "response" => NULL,
        "content" => $_POST['tweet'],
        "id_quote_tweet" => NULL,
    ]);
}

 header("Location: ../accueil.php");
