<?php
session_start();
if (!isset($_SESSION['USER'])) {
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tweet academie</title>
  <link rel="stylesheet" href="style/accueil.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      function fetchTweets() {
        $.ajax({
          url: 'mysql/fetch_tweets.php',
          type: 'GET',
          dataType: 'json',
          success: function(data) {
            $('#tweets').empty();
            $.each(data, function(key, tweet) {
              $('#tweets').append(`<div class="post">
              <div> ` + tweet.username + `</div>
              <div> ` + tweet.at_user_name + `</div>
              <div> ` + tweet.content + `</div>
              <div> ` + tweet.time + `</div>
              <br>
              <a href="#">Retweet</a>
              <a href="#">Like</a>
              <a href="#">Comment</a>
              </div>`);
            });
          }
        });
      }
      fetchTweets();
      setInterval(fetchTweets, 5000);
    });
  </script>
</head>

<body>

  <div class="marging">
    <?php include('includes/left-sidebar.php') ?>
    <?php include('includes/main.php') ?>
    <?php include('includes/right-sidebar.php') ?>
  </div>

  <script src="dark.js"></script>
</body>

</html>