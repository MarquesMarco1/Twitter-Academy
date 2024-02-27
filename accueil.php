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
              $('#tweets').append(`
              <div class="post">
              <div class="profilpost">
                <div class="photodeprofil">
                  <img src="`+ tweet.profile_picture +`" alt="photodeprofil">
                </div>
                <div class="nomutilisateur">
                  <a style="color:blue;" href="Utilisateur/user_profil.php?id_user=`+ tweet.user_id +`">`+ tweet.at_user_name +`</a>
                </div>
              </div>
              <div class="borderpostcontent">
              <div class="postcontent">
                <p>`+ tweet.content +`</p>
              </div>
            </div>
            <span class="gifclick">
              <a href="Homepage.html">
                <img src="asset/icons8-twitter-entouré.gif" alt="Main Logo">
              </a>
            </span>
            <span class="gifclick">
              <a href="Homepage.html">
                <img src="asset/icons8-aimer.gif" alt="Main Logo">
              </a>
            </span>
            <span class="gifclick">
              <a href="Homepage.html">
                <img src="asset/icons8-bulle.gif" alt="Main Logo">
              </a>
            </span>
          </div>
        `);
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