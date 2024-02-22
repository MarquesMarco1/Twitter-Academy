<?php
class functions
{

    public function creation_compte()
    {
        session_start();
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
        session_start();
        include('mysql.php');
        if ($_POST['password'] === $_POST['passwordcheck']) {
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
                    $sql = $mysqlClient->prepare('INSERT INTO `user`(`username`, `at_user_name`, `profile_picture`, `bio`, `banner`, `mail`, `password`, `birthdate`, `private`, `creation_time`, `city`, `campus`) VALUES (:username, :at_username, "assets/img/user.jpg", null, "assets/img/banner.jpg", :mail, :password,null,null,NOW(),null,null);');
                    $sql->execute([
                        "username" => $_POST['username'],
                        "at_username" => "@" . $_POST['username'],
                        "mail" => $_POST['email'],
                        "password" => $_POST['password'],
                    ]);
                    $_SESSION['MESSAGE_ERREUR'] = "good";
                } else {
                    $_SESSION['MESSAGE_ERREUR'] = "deja le @";
                }
            } else {
                $_SESSION['MESSAGE_ERREUR'] = "déjà la email";
            }
        } else {
            $_SESSION['MESSAGE_ERREUR'] = "mdp check pas bon";
        }
    }
    public function login()
    {
        include('mysql.php');
        session_start();
        if (isset($_POST['login'])) {
            $sql = $mysqlClient->prepare('SELECT * FROM user WHERE mail = :email OR at_user_name = :username');
            $sql->execute([
                "username" => "@" . $_POST['username'],
                "email" => $_POST['username'],
            ]);
            $email_verif = $sql->fetch(PDO::FETCH_ASSOC);

            if (isset($email_verif['id'])) {
                $_SESSION['MESSAGE_ERREUR'] = " trouver";
            } else {
                $_SESSION['MESSAGE_ERREUR'] = "pas email trouver";
            }
        }
    }
}
