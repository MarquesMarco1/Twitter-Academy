<?php
include('mysql/mysql.php');

$sql = $mysqlClient->prepare("SELECT t.content  FROM tweet t JOIN hashtag_list hl WHERE t.content LIKE CONCAT('%', '#', hl.hashtag, '%')");
$sql->execute([]);
$hashtag = $sql->fetchAll(PDO::FETCH_ASSOC);


foreach ($hashtag as $hashtag) {
    echo $hashtag['content'];
}
