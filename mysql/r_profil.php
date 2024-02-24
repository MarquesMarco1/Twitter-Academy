<?php

class profil {
    public function getUser($getIdUser) {
        include('mysql.php');
            $sql = $mysqlClient->prepare('SELECT * FROM user WHERE id = :id'); // connexion avec login ou email
            $sql->execute([
                "id" => $getIdUser,
            ]);
            $user = $sql->fetch(PDO::FETCH_ASSOC);
            return $user;
    }
}