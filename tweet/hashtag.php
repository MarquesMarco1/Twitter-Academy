<?php
include('../mysql/mysql.php');

$sql = $mysqlClient->prepare("SELECT t.content  FROM tweet t WHERE t.content LIKE CONCAT('%', '#', :hashtag, '%')");
$sql->execute([
    'hashtag' => $_GET['hashtag'],
]);
$hashtag = $sql->fetchAll(PDO::FETCH_ASSOC);


foreach ($hashtag as $hashtag) {
    echo $hashtag['content'] . "<br>";
}
