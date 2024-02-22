<?php 
class functions {

    public function verification_utilisateur_bot() {
        if (!isset($_POST['verif_bot'])) {
            $bytes = random_bytes(2);
            $VerifBasique = bin2hex($bytes);
        }
        
        if ($_POST['verif_bot'] === $_POST['hidden_verif']) {
            if (isset($_POST['verif_bot'])) {
                echo "bon";
            }
        } else {
            echo "pas bon";
        }
        return $VerifBasique;
    }
}

