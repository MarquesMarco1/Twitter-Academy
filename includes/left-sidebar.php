<?php 
session_start();
include('path.php');

?>

<div class="sidebar">
      <div class="nav-top">
        <div class="logo">
          <img src="<?php echo $path ?>assets/Logo2.png" alt="">
        </div>
        <a href="<?php echo $path ?>accueil.php" class="active"><img src="<?php echo $path ?>assets/icons8-accueil-30.png" alt=""><p>Accueil</p></a>
        
        <a href="messagerie/users_convo.php"><img src="<?php echo $path ?>assets/icons8-message-50.png" alt=""><p>Message</p></a>
        
        <a href="<?php echo $path ?>Utilisateur/user_profil.php?id_user=<?php echo $_SESSION['USER']['at_user_name'] ?>"><img src="<?php echo $path ?>assets/icons8-utilisateur-24.png" alt=""><p>Profil</p></a>
        <a href="<?php echo $path ?>Utilisateur/deconnexion.php"><img src="<?php echo $path ?>assets/icons8-points-de-suspension-30.png" alt=""><p>Plus</p></a>
      </div>
      <div class="profil">
        <img src="<?php echo $path . $_SESSION['USER']['pp'] ?>" alt="Profil" class="image-profil">
        <div>
          <div class="nom-user"><?php echo $_SESSION['USER']['username'] ?></div>
          <div class="nom-profil"><?php echo $_SESSION['USER']['at_user_name'] ?></div>
        </div>
      </div>

    </div>