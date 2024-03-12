<?php
session_start();

error_reporting(E_ALL);
ini_set("display_errors", 1);

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
                    data: {
                        id: <?php echo $_GET['id'] ?>,
                    },
                    success: function(reussite, statut) {
                        for (let index = 0; index < reussite.length; index++) {
                            if (reussite[index].user_id == <?php echo $_SESSION['USER']['id'] ?>) {
                                body = "<div class='moi'>" + reussite[index].content + "</div>"
                            } else {
                                body = "<div class='autre'>" + reussite[index].content + "</div>"
                            }

                            $("#messages").append(body);
                        }
                    }
                });
            }
            chargeMsg();

            document.getElementById("myForm").onsubmit = function() {
                sendMessage()
            };

            function sendMessage() {
                var message = $("#msg").val();
                $.ajax({
                    url: 'ajax/send_messages.php',
                    type: 'POST',
                    data: {
                        id: <?php echo $_GET['id'] ?>,
                        message: message,
                    },
                    success: function(reussi, statut) {
                        console.log(reussi);
                    }
                });
            }
        })
    </script>

</head>

<body>
    <div id="messages"></div>
    <form action="" method="POST" id="myForm">
        <input type="text" name="msg" id="msg" placeholder="Votre message">
        <button type="submit">Envoyer</button>
    </form>
</body>

</html>