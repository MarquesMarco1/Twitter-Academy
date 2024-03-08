<?php session_start();

echo $_SESSION['USER']['id'];

error_reporting(E_ALL);
ini_set("display_errors", 1);

include('../mysql/mysql.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Messagerie</title>
</head>

<body>
    <h1>Messages</h1>
    <button onclick="togglePopup()" id="createMessage">Nouveau message</button>

    <div id="popup-overlay">
        <div class="popup-content">
            <form action="" method="post">
                <h2>Nouveau message</h2>

                <input type="search" name="searchUser" id="searchUser" placeholder="Cherche un membre" onkeyup="search_user()">
                

                <?php
                $query = $mysqlClient->prepare("SELECT DISTINCT username, at_user_name, profile_picture FROM user 
                                                WHERE id != :id_user");
                $query->execute([
                    'id_user' => $_SESSION['USER']['id'],
                ]);
                $catchUser = $query->fetchAll(PDO::FETCH_ASSOC);

                if ($catchUser) :
                    foreach ($catchUser as $Users) : ?>
                        <div class="membres">
                        <input type="checkbox" name="memberSearch" id="memberSearch">
                            <label for="memberSearch"><?php echo $Users['username'] ?></label>
                        </div>
                    <?php endforeach ?>
                <?php else :
                    echo "pas d'user.";
                endif;
                ?>

                <a href="javascript:void(0)" onclick="togglePopup()" class="popup-exit">Fermer</a>
                <input type="submit" value="Créer un groupe">
            </form>
        </div>
    </div>

    <input type="search" name="searchUserConv" id="searchUserConv" placeholder="Cherche des messages privés" onkeyup="search_conv()">

    <section id="main-mess">
        <?php
        $query = $mysqlClient->prepare("SELECT DISTINCT c.*, messages.content, messages.time FROM convo c 
                                        JOIN convo_users cu ON cu.id_convo = c.id 
                                        JOIN messages ON messages.id_convo = c.id
                                        WHERE cu.id_user = :id_user
                                        ORDER BY messages.time DESC");
        $query->execute([
            'id_user' => $_SESSION['USER']['id'],
        ]);
        $catchMessage = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($catchMessage) :
            foreach ($catchMessage as $message) : ?>
                <div class="messages"><img src="<?php echo $message['picture'] ?>"><?php echo $message['name'] ?>. Message : <?php echo $message['content'] ?></div>
            <?php endforeach ?>
        <?php else :
            echo "pas de conversation.";
        endif;
        ?>
    </section>



    <script src="script.js"></script>
</body>

</html>