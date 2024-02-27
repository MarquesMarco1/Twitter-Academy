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
                <a style="color:blue;" href="Utilisateur/user_profil.php?id_user=` + tweet.at_user_name + `">   <img src="` + tweet.profile_picture + `" alt="photodeprofil"> </a>
                </div>
                <div class="nomutilisateur">
                  <a style="color:blue;" href="Utilisateur/user_profil.php?id_user=` + tweet.at_user_name + `">` + tweet.at_user_name + `</a>
                </div>
                <div class="option">
            <span class="gifclick">
              <a href="Homepage.html">
                <img src="assets/icons8-points-de-suspension-30.png" alt="Main Logo">
              </a>
            </span>
          </div>
              </div>
              <div class="borderpostcontent">
              <div class="postcontent">
                <p>` + tweet.content.replace(/@(\w+)/g, "<a href='Utilisateur/user_profil.php?id_user=@$1'>@$1</a>") + `</p>
              </div>
            </div>
            <span class="gifclick">
              <a href="tweet/retweet.php?id_tweet=`+ tweet.tweet_id + `">
                <img src="assets/icons8-twitter-entoure.gif" alt="Main Logo">
              </a>
            </span>
            <span class="gifclick">
              <a href="Homepage.html">
                <img src="assets/icons8-aimer.gif" alt="Main Logo">
              </a>
            </span>
            <span class="gifclick">
              <a href="Homepage.html">
                <img src="assets/icons8-bulle.gif" alt="Main Logo">
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