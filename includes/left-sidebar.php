<?php 
include('path.php');
?>

<div class="sidebar">
    <div class="logo">
        <img src="assets/img/logo.png" alt="">
    </div>
    <a href= "<?php echo $path ?>accueil.php" >Accueil</a>
    <a href="#">Message</a>
    <a href="<?php echo $path ?>Utilisateur/user_profil.php?id_user=<?php echo $_SESSION['USER']['at_user_name'] ?>">Profil</a>
    <a href="<?php echo $path ?>Utilisateur/deconnexion.php">Déco</a>
</div>