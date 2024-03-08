<?php
include('mysql/mysql.php');

$sql = $mysqlClient->prepare("SELECT t.content  FROM tweet t JOIN hashtag_list hl WHERE t.content LIKE CONCAT('%', '#', hl.hashtag, '%')");
$sql->execute([]);
$hashtag = $sql->fetchAll(PDO::FETCH_ASSOC);


$sql = $mysqlClient->prepare("SELECT hl.hashtag, COUNT(*) as count FROM tweet t  JOIN hashtag_list hl ON t.content LIKE CONCAT('%', '#', hl.hashtag, '%') GROUP BY hl.hashtag");
$sql->execute([]);
$hashtag2 = $sql->fetchAll(PDO::FETCH_ASSOC);

foreach ($hashtag2 as $hashtag) {
    echo $hashtag['hashtag'] . " : " . $hashtag['count'] . '<br>';
}
