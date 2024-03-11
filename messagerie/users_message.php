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

    <?php
    $getData = $_POST;
    if (isset($getData['memberSearch']) && !empty($getData['memberSearch'])) {
        if (isset($getData['nameConv'])) {
            $nameConv = $getData['nameConv'];
            if (isset($getData['imgConv'])) {
                $imgConv = $getData['imgConv'];
            } else {
                $imgConv = "NULL";
            }
        } else {
            $nameConv = "Conversation";
        }

        $query = $mysqlClient->prepare("INSERT INTO convo (name, picture) VALUES (:name, :img)");
        $query->execute([
            "name" => $nameConv,
            "img" => $imgConv,
        ]);

        $query = $mysqlClient->prepare("SELECT id FROM convo ORDER BY id DESC LIMIT 1");
        $query->execute([]);
        $Conv = $query->fetch(PDO::FETCH_ASSOC);

        array_push($getData['memberSearch'], $_SESSION['USER']['id']);
        foreach ($getData['memberSearch'] as $getMember) {
            $query = $mysqlClient->prepare("INSERT INTO convo_users (id_convo, id_user, time) VALUES (:id_convo, :id_user, now())");
            $query->execute([
                "id_convo" => $Conv['id'],
                "id_user" => $getMember,
            ]);
        }


        // Insérer dans bdd > id_convo, id_user + time
    } else {
        echo "Il faut sélectionner au moins une personne.";
    }

    ?>

    <div id="popup-overlay">
        <div class="popup-content">
            <form action="" method="post">
                <h2>Nouveau message</h2>

                <input type="search" name="searchUser" id="searchUser" placeholder="Cherche un membre" onkeyup="search_user()">


                <?php
                $query = $mysqlClient->prepare("SELECT DISTINCT username, at_user_name, profile_picture, id FROM user 
                                                WHERE id != :id_user");
                $query->execute([
                    'id_user' => $_SESSION['USER']['id'],
                ]);
                $catchUser = $query->fetchAll(PDO::FETCH_ASSOC);

                if ($catchUser) :
                    foreach ($catchUser as $Users) : ?>
                        <div class="membres">
                            <input type="checkbox" name="memberSearch[]" id="memberSearch" value="<?php echo $Users['id'] ?>">
                            <label for="memberSearch"><?php echo $Users['username'] ?></label>
                        </div>
                    <?php endforeach ?>
                <?php else :
                    echo "pas d'user.";
                endif;
                ?>

                <a href="javascript:void(0)" onclick="togglePopup()" class="popup-exit">Fermer</a>
                <label for="nameConv">Nom du groupe :</label>
                <input type="text" name="nameConv" id="nameConv">
                <label for="imgConv">Photo de groupe :</label>
                <input type="url" name="imgConv" id="imgConv">
                <input type="submit" value="Créer un groupe">
            </form>
        </div>
    </div>

    <input type="search" name="searchUserConv" id="searchUserConv" placeholder="Cherche des messages privés" onkeyup="search_conv()">

    <section id="main-mess">
        <?php
        $query = $mysqlClient->prepare("SELECT DISTINCT c.* FROM convo c 
                                        JOIN convo_users cu ON cu.id_convo = c.id 
                                        WHERE cu.id_user = :id_user
                                        ");
        $query->execute([
            'id_user' => $_SESSION['USER']['id'],
        ]);
        $catchMessage = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($catchMessage) :
            foreach ($catchMessage as $message) : ?>
                <a href="users_convo.php?id=<?php echo $message['id'] ?>">
                    <div class="messages"><img src="<?php echo $message['picture'] ?>"><?php echo $message['name'] ?>.</div>
                </a>

            <?php endforeach ?>
        <?php else :
            echo "pas de conversation.";
        endif;
        ?>
    </section>



    <script src="script.js"></script>
</body>

</html>