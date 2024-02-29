<?php
session_start();
include('../mysql/mysql.php');

$id_tweet = isset($_GET['id_tweet']) ? $_GET['id_tweet'] : null;
$sql = $mysqlClient->prepare('SELECT * FROM tweet t JOIN user u ON u.id = t.id_user WHERE t.id = :id');
$sql->execute(["id" => $id_tweet]);
$tweet = $sql->fetch(PDO::FETCH_ASSOC);

$tweets = '
<div class="post">
   <div class="profilpost">
     <div class="photodeprofil">
     <a style="color:blue;" href="Utilisateur/user_profil.php?id_user=' . $tweet['profile_picture'] . '"><img src="../' . $tweet['profile_picture'] . '" alt="photo de profil de ' . $tweet['username'] . '"> </a>
     </div>
     <div class="nomutilisateur">
       <a style="color:blue;" href="Utilisateur/user_profil.php?id_user=' . $tweet['at_user_name'] . '">' . $tweet['at_user_name'] . '</a>
     </div>
     <div class="option">
       <span class="gifclick">
         <a href="Homepage.html">
           <img src="../assets/icons8-points-de-suspension-30.png" alt="Main Logo">
         </a>
       </span>
     </div>
   </div>
   <div class="borderpostcontent">
     <div class="postcontent">
       <p>' . $tweet['content'] . '</p>
     </div>
   </div>
   <span class="gifclick">
     <a href="tweet/retweet.php?id_tweet=' . $tweet['id'] . '">
       <img src="../assets/icons8-twitter-entoure.gif" alt="Main Logo">
     </a>
   </span>
   <span class="gifclick">
     <a href="Homepage.html">
       <img src="../assets/icons8-aimer.gif" alt="Main Logo">
     </a>
   </span>
   <span class="gifclick">
     <a href="tweet/comment.php?id_tweet=' . $tweet['id'] . '">
       <img src="../assets/icons8-bulle.gif" alt="Main Logo">
     </a>
   </span>
</div>';

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
    <?php echo $tweets ?>
</body>
</html>
