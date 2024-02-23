<?php
class functions
{

    public function creation_compte()
    {
        if (!isset($_POST['verif_bot'])) {
            $bytes = random_bytes(2);
            $VerifBasique = bin2hex($bytes);
        }

        if ($_POST['verif_bot'] === $_POST['hidden_verif']) {
            if (isset($_POST['verif_bot'])) {
                $verif = new functions;
                $verif->creation_compte_sql();
            }
        } else {
            $_SESSION['MESSAGE_ERREUR'] = "code bot pas bon";
        }
        return $VerifBasique;
    }

    public function creation_compte_sql()
    {
        if ($_POST['password'] === $_POST['passwordcheck']) {
            if (strlen($_POST['password']) >= 6) {
                $sql = $mysqlClient->prepare('SELECT * FROM user WHERE mail = :email');
                $sql->execute([
                    "email" => $_POST['email'],
                ]);
                $email_verif = $sql->fetch(PDO::FETCH_ASSOC);
                if (!isset($email_verif['id'])) {
                    $sql = $mysqlClient->prepare('SELECT * FROM user WHERE at_user_name = :at_user_name');
                    $sql->execute([
                        "at_user_name" => "@" . $_POST['username'],
                    ]);
                    $at_user_name_verif = $sql->fetch(PDO::FETCH_ASSOC);
                    if (!isset($at_user_name_verif['id'])) {

                        $directory = "assets/save_image_user/";
                        $filecount = count(glob($directory . "*"));
                        move_uploaded_file($_FILES['imageToUpload']['tmp_name'], "assets/save_image_user/" . $filecount . $_FILES['imageToUpload']['name']);

                        $sql = $mysqlClient->prepare('INSERT INTO `user`(`username`, `at_user_name`, `profile_picture`, `bio`, `banner`, `mail`, `password`, `birthdate`, `private`, `creation_time`, `city`, `campus`) VALUES (:username, :at_username, :pp, null, "assets/img/banner.png", :mail, :password, :date, 0,NOW(),null,null);');
                        $sql->execute([
                            "username" => $_POST['username'],
                            "at_username" => "@" . $_POST['username'],
                            "mail" => $_POST['email'],
                            "pp" => "assets/save_image_user/" . $filecount . $_FILES['imageToUpload']['name'],
                            "date" => $_POST['date'],
                            "password" => hash("ripemd160", $_POST['password'], FALSE),
                        ]);
                        $_SESSION['MESSAGE_ERREUR'] = "good";
                    } else {
                        $_SESSION['MESSAGE_ERREUR'] = "deja le @";
                    }
                } else {
                    $_SESSION['MESSAGE_ERREUR'] = "déjà la email";
                }
            } else {
                $_SESSION['MESSAGE_ERREUR'] = "mdp trop petit";
            }
        } else {
            $_SESSION['MESSAGE_ERREUR'] = "mdp check pas bon";
        }
    }
    public function login()
    {
        include('mysql.php');
        if (isset($_POST['login'])) {
            $sql = $mysqlClient->prepare('SELECT * FROM user WHERE mail = :email OR at_user_name = :username');
            $sql->execute([
                "username" => "@" . $_POST['username'],
                "email" => $_POST['username'],
            ]);
            $user = $sql->fetch(PDO::FETCH_ASSOC);

            if (isset($user['id'])) {
                if ($user['password'] == hash("ripemd160", $_POST['password'], FALSE)) {
                    $_SESSION['USER'] = [
                        "id" => $user['id'],
                        "username" => $user['username'],
                        "pp" => $user['profile_picture'],
                    ];
                } else {
                    $_SESSION['MESSAGE_ERREUR'] = "mdp pas bon";
                }
            } else {
                $_SESSION['MESSAGE_ERREUR'] = "pas email trouver";
            }
        }
    }
}
