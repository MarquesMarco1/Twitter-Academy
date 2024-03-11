<?php 
session_start();
echo $_GET['id'] . "<br/>";

include('../mysql/mysql.php');

$query = $mysqlClient->prepare("SELECT messages.*, user.username FROM messages JOIN user ON user.id = messages.id_user WHERE id_convo = :id");
$query->execute([
    'id' => $_GET['id'],
]);
$getConv = $query->fetchAll(PDO::FETCH_ASSOC);

foreach($getConv as $getMsg) {
    if ($getMsg['id_user'] == $_SESSION['USER']['id']) 
        echo "Moi : " . $getMsg['content'] . "<br>";
     else 
        echo  $getMsg['username'] . " : " . $getMsg['content'] . "<br>";
 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
    $(document).ready(async function() {
      await fetch(tweet)

      async function fetch(tweet) {
        var tweet = [];
        async function fetch(tweet) {
          await $.ajax({
            url: 'mysql/fetch_tweets.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
              $('#tweets').empty();
              $.each(data, function(key, tweete) {
                tweet.push(tweete);
              });
            }
          });
        }
      }

      tweet = []
      setInterval(fetch, 10000, tweet);
    });

    </script>
</body>
</html>

