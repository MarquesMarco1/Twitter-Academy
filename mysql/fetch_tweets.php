<?php
include('mysql.php');

$sql = $mysqlClient->prepare('SELECT t.content, t.time, u.username, u.at_user_name FROM tweet t JOIN user u ON u.id = t.id_user ORDER BY t.id DESC'); 
$sql->execute([
]);
$tweets = $sql->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($tweets);
?>