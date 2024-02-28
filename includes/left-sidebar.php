<?php 
include('path.php');
?>

<div class="sidebar">
    <div class="logo">
        <img src="assets/img/Logo2.png" alt="">
    </div>
    <a href= "<?php echo $path ?>accueil.php" >Accueil</a>
    <a href="#">Message</a>
    <a href="<?php echo $path ?>Utilisateur/user_profil.php?id_user=<?php echo $_SESSION['USER']['id'] ?>">Profil</a>
    <a href="<?php echo $path ?>Utilisateur/deconnexion.php">Déco</a>
    <div class="profil">
        <img src="asset/chocolat.png" alt="Profil" class="image-profil">
        <div class="nom-profil">@nomutilisateur</div>
        <div class="bio-profil">Votre bio ici</div>
      </div>
</div>