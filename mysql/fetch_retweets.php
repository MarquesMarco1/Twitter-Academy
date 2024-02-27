<?php
include('mysql.php');
include('../includes/path.php');
$idQuotedTweet = isset($_GET['id_quoted_tweet']) ? $_GET['id_quoted_tweet'] : null;
$sql = $mysqlClient->prepare('SELECT u.id as user_id, t.id as tweet_id, t.content, t.time, u.username, u.at_user_name, u.profile_picture, t.id_quoted_tweet FROM user u JOIN tweet t ON t.id_user = u.id WHERE t.id = 53');
$sql->execute([
    "id" => 53,
]);
$tweets = $sql->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($tweets);
?>