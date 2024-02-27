<?php
include('mysql.php');
include('../includes/path.php');
$sql = $mysqlClient->prepare('SELECT u.id as user_id, t.id as tweet_id, t.content, t.time, u.username, u.at_user_name, u.profile_picture FROM tweet t JOIN user u ON u.id = t.id_user ORDER BY t.id DESC');
$sql->execute([]);
$tweets = $sql->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($tweets);
?>