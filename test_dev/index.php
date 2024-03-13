<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Test</title>

    <?php
include('../mysql/mysql.php');

    $query = $mysqlClient->prepare("SELECT at_user_name FROM user");
    $query->execute();
    $users = $query->fetchAll(PDO::FETCH_ASSOC);

    ?>
    
</head>
<body>
    <h2>User/Hastag</h2>

<input type="text" id="myInput" placeholder="Search">
<script>

const input = document.getElementById("myInput")
input.onkeydown = myFunction
function myFunction(e) {
if (e.key == "#") {
console.log("hastag");
<ul id="myUL">
<?php foreach($users as $user) : ?>
    <li><?php echo $user['at_user_name']?></li>
<?php endforeach?>
</ul>
} else if (e.key == "@") {
console.log("arobase");
} else {
console.log("rien");
}
}


</script>
</body>
</html>