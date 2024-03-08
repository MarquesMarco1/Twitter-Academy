<?php
include('../mysql/mysql.php');

$sql = $mysqlClient->prepare("SELECT t.content  FROM tweet t WHERE t.content LIKE CONCAT('%', '#', :hashtag, '%')");
$sql->execute([
    'hashtag' => $_GET['hashtag'],
]);
$hashtag = $sql->fetchAll(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/accueil.css">
</head>
<body>
    <?php include('../includes/left-sidebar.php');
    ?>
    
<div class="mise-en-page">
    <div class="main-content">
    <?php 
    foreach ($hashtag as $hashtag) {
        echo $hashtag['content'] . "<br>";
    };
    ?>
    </div></div>
    <?php
    include('../includes/right-sidebar.php');
    ?>
    
</body>
</html>
