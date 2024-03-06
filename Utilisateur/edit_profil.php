<?php
session_start();
if ($_GET['id_user'] == $_SESSION['USER']['id']) {
    echo "good";
} else {
    $var = $_SESSION['USER']['at_user_name'];
    header('Location: user_profil.php?id_user=' . $var);
}