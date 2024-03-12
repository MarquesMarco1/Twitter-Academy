<?php
session_start();

include('../mysql/mysql.php');
include('../includes/path.php');
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
                        $('#messages').empty();
                        for (let index = 0; index < reussite.length; index++) {
                            if (reussite[index].user_id == <?php echo $_SESSION['USER']['id'] ?>) {
                                body = "<div class='moi'> <img src='<?php echo $path ?>" + reussite[index].pp + "'> " + reussite[index].content + " </div>"
                            } else {
                                body = "<div class='autre'> <img src='<?php echo $path ?>" + reussite[index].pp + "'> " + reussite[index].content + " </div>"
                            }

                            $("#messages").append(body);
                        }
                    }
                });
            }
            chargeMsg();


            $('form').on('submit', function(e) {
                e.preventDefault();
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
            })

            setInterval(chargeMsg, 50);
        })
    </script>

    <?php
    $query = $mysqlClient->prepare("SELECT * FROM convo WHERE id = :id");
    $query->execute([
        'id' => $_GET['id'],
    ]);
    $convInfo = $query->fetch(PDO::FETCH_ASSOC);
    ?>
</head>

<body>
    <h1> <img src="<?php echo $path, $convInfo['picture'] ?>" alt="Logo conversation"> <?php echo $convInfo['name'] ?></h1>
    <a href="users_convo.php">Retour</a>

    <div id="messages"></div>
    <form method="POST">
        <input type="text" name="msg" id="msg" placeholder="Votre message">
        <input type="submit" value="Envoyer">
    </form>
</body>

</html>