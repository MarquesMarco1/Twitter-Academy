<?php
include('mysql.php');

$sql = $mysqlClient->prepare('SELECT * FROM tweet'); 
$sql->execute([
]);
$tweets = $sql->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($tweets);
?>