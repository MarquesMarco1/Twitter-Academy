<?php

include("../../mysql/mysql.php");

$query = $mysqlClient->prepare("SELECT id FROM convo JOIN convo_users cu ON convo.id = cu.id_convo WHERE id_user = :id_user ORDER BY id DESC");
$query->execute([
    'id_user' => $_SESSION['USER']['id'],
]);

$conv = null;

while($refreshConv = $query->fetch(PDO::FETCH_ASSOC)) {
    $conv .= "<div id=\"" . $refreshConv['id']. "\">";
}

echo $conv;