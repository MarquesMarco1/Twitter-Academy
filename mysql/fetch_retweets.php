<?php
include('mysql.php');
include('../includes/path.php');
$sql = $mysqlClient->prepare('SELECT u.id as user_id, t.id as tweet_id, t.content, t.time, u.username, u.at_user_name, u.profile_picture, t.id_quoted_tweet FROM user u JOIN tweet t ON t.id_user = u.id WHERE t.id = 36');
$sql->execute([]);
$tweets = $sql->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($tweets);
?>