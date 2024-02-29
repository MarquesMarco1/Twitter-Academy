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
    /* $(document).ready(function() {
      function fetchTweets() {
        $.ajax({
          url: 'mysql/fetch_tweets.php',
          type: 'GET',
          dataType: 'json',
          success: function(data) {
            //récup tous les tweets  : [{id: 12, text: "tettete"}, {id: 14}]
            $('#tweets').empty();
            $.each(data, function(rt, key, tweet) {
                rt.push = (tweet); 
            })
          }
        })
      };
      if (tweet.id_quoted_tweet != null) {
        // foreach du tableau tweets : pour chaque id tu fais request ajax
        const rtResponse = $.ajax({
          url: `mysql/fetch_retweets.php?id_quoted_tweet=` + tweet.id_quoted_tweet + ``,
          type: 'GET',
          data: {
            id_quoted_tweet: tweet.id_quoted_tweet
          },
          dataType: 'json',
          success: function(json) {
            // rt.push(json[0].id)
            // rt = json[0].id
          },
        });
      }

      console.log(rt);
      fetchTweets();
      setInterval(fetchTweets, 5000);
    }); */
    $(document).ready(async function() {
      var tweet = [];
      var body;
      await fetch(tweet)

      async function fetch(tweet) {
        var tweet = [];
        async function fetchTweets(tweet) {
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

        await fetchTweets(tweet);

        for (let index = 0; index < tweet.length; index++) {
          let tweets = tweet[index];
          body = tweets.username + " | ID tweet : " + tweets.tweet_id + " | Content :" + tweets.content + "<br>";
          $('#tweets').append(body);

          if (tweets.id_quoted_tweet != null) {
            await fetchRetweet(tweets, function(retweet) {
              body = retweet.username + " | tweet rt id:" + retweet.tweet_id + " | Content : " +  retweet.rt_content +"<br>";
              //console.log(retweet);
              $('#tweets').append(body);
             // console.log(body)
            });
          }
        
        }

        async function fetchRetweet(tweets, callback) {
         await $.ajax({
            url: "mysql/fetch_retweets.php",
            type: 'GET',
            data: {
              id_quoted_tweet: tweets.id_quoted_tweet
            },
            dataType: 'json',
            success: function(json) {
              callback(json[0]);
            }
          });
        }
      }

      tweet = []
      setInterval(fetch, 15000, tweet);
    });



    //fetchRetweets();


    /*  console.log(rt);
               // console.log(rt[0]);
               let body = `
                                   <div class="post">
                                   <div class="profilpost">
                                     <div class="photodeprofil">
                                     <a style="color:blue;" href="Utilisateur/user_profil.php?id_user=` + tweet.at_user_name + `"><img src="` + tweet.profile_picture + `" alt="photo de profil de ` + tweet.at_user_name + ` "> </a>
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
                                     <p>    ` + rt + ` </p>
                                   </div>
                                 </div>
                                 <span class="gifclick">
                                   <a href="tweet/retweet.php?id_tweet=` + tweet.tweet_id + `">
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
                               `;
                     $('#tweets').append(`` + body + ``);
             });

           }

       
       } */
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