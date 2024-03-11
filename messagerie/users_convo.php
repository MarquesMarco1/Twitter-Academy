<?php
session_start();
echo $_GET['id'] . "<br/>";

include('../mysql/mysql.php');

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messagerie</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            function chargeMsg() {
                $.ajax({
                    url: 'ajax/old_messages.php',
                    type: 'GET',
                    dataType: 'json',
                });
            }
            chargeMsg();

        });



        // AJAX utilisé pour l'accueil (tweets)
        /*         $(document).ready(async function() {
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
                }); */
    </script>

</head>

<body>

</body>

</html>