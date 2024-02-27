<?php 
session_start();
include('../mysql/mysql.php');
include('../includes/path.php');

$sql = $mysqlClient->prepare('SELECT id_user, id_tweet FROM retweet WHERE id_user = :id_user AND id_tweet = :id_tweet');
$sql->execute([
    "id_user" => $_SESSION['USER']['id'],
    "id_tweet" => $_GET['id_tweet']
]);
$UserReTweet = $sql->fetch(PDO::FETCH_ASSOC);

if (isset($UserReTweet['id_user'])) {
    echo "trouver";
} else {
    echo "pas teoyuver";
}