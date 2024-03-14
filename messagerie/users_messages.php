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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../style/accueil.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            function chargeMsg() {
                $.ajax({
                    url: 'ajax/old_messages.php',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        id: <?php echo $_GET['id'] ?>,
                    },
                    success: function (reussite, statut) {
                        $('#messages').empty();
                        for (let index = 0; index < reussite.length; index++) {
                            if (reussite[index].user_id == <?php echo $_SESSION['USER']['id'] ?>) {
                                body = "<div class='talk right'> <p>" + reussite[index].content + " </p> <img src='<?php echo $path ?>" + reussite[index].pp + "'></div>"
                            } else {
                                body = "<div class='talk left'> <img src='<?php echo $path ?>" + reussite[index].pp + "'><p> " + reussite[index].content + " </p></div>"
                            }

                            $("#messages").append(body);
                        }
                    }
                });
            }
            chargeMsg();


            $('#myForm').on('submit', function (e) {
                e.preventDefault();
                var message = $("#msg").val();

                $.ajax({
                    url: 'ajax/send_messages.php',
                    type: 'POST',
                    data: {
                        id: <?php echo $_GET['id'] ?>,
                        message: message,
                    },
                    success: function (reussi, statut) {
                        console.log(reussi);
                    }
                });
            })

            setInterval(chargeMsg, 5000);
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
    <div class="marging">

        <?php include('../includes/path.php') ?>

        <div class="mise-en-page">
            <div>
                <h1> <img src="<?php echo $path, $convInfo['picture'] ?>">
                    <?php echo $convInfo['name'] ?>
                </h1>
                <a href="users_convo.php">Retour</a>
                <button onclick="togglePopup()" id="editGroup">Editer le groupe</button>

                <?php
                $getEdit = $_POST;
                if (isset($getEdit['changeName']) && !empty($getEdit['changeName'])) {
                    $query = $mysqlClient->prepare("UPDATE convo SET name = :name WHERE id = :id");
                    $query->execute([
                        'name' => $getEdit['changeName'],
                        'id' => $_GET['id'],
                    ]);
                }
                if (isset($getEdit['changeImg']) && !empty($getEdit['changeImg'])) {
                    $query = $mysqlClient->prepare("UPDATE convo SET picture = :img WHERE id = :id");
                    $query->execute([
                        'img' => $getEdit['changeImg'],
                        'id' => $_GET['id'],
                    ]);
                }
                ?>

                <div id="popup-overlay">
                    <div class="popup-content">
                        <form action="" method="post">
                            <h2>Editer le groupe</h2>

                            <a href="javascript:void(0)" onclick="togglePopup()" class="popup-exit">Fermer</a>
                            <label for="changeName">Changer le nom du groupe :</label>
                            <input type="text" name="changeName" id="changeName"> <br>
                            <label for="changeImg">Changer la photo du groupe :</label>
                            <input type="file" name="changeImg" id="changeImg"> <br>
                            <button type="submit">Editer</button>
                        </form>
                    </div>
                </div>

                <div class="jetest">
                <div id="messages">

                </div>
                </div>

                <form method="POST" id="myForm">
                    <input type="text" name="msg" id="msg" placeholder="Votre message">
                    <input type="submit" value="Envoyer" id='submitDelete'>
                </form>
                <script src="script.js"></script>
                <script>
                    lamort = document.getElementById('submitDelete');
                    msg = document.getElementById('msg');

                    lamort.addEventListener('click', function () {
                        setTimeout(function () {
                            msg.value = "";
                        }, 100);
                    })
                    
                </script>
            </div>
        </div>
        <?php include('../includes/left-sidebar.php') ?>
    </div>

</body>

</html>