<?php 
session_start();
if (!isset($_SESSION['USER'])) {
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tweet_academie</title>
  <link rel="stylesheet" href="style/accueil.css">
</head>

<body>
  
  <div class="marging">
    <a href="login.html">Login</a>
    <div class="sidebar">
      <div class="logo">
        <img src="assets/img/logo.png" alt="">
      </div>
      <a href="#" class="active">Accueil</a>
      <a href="#">Message</a>
      <a href="Utilisateur/user_profil.php?id_user=<?php echo $_SESSION['USER']['id']?>">Profil</a>
      <a href="Utilisateur/deconnexion.php">Deconnexion</a>
    </div>
    <div class="main-content">
    
        <form action="">
          <input type="submit" class="recommendation-button" value="Faire un post">
          <input type="text" name="tweet" id="tweet">
        </form>

      


      <div class="post">Post Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus reprehenderit inventore ex maiores eius dolor quam voluptatem aliquid ullam hic, pariatur deserunt vel, aliquam excepturi veniam facilis aperiam itaque quas.
        <img src="asset/chocolat.png" alt=""><br>
        <a href="#">Retweet</a>
        <a href="#">Like</a>
        <a href="#">Comment</a>
      </div>
      <div class="post">Post Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus reprehenderit inventore ex maiores eius dolor quam voluptatem aliquid ullam hic, pariatur deserunt vel, aliquam excepturi veniam facilis aperiam itaque quas.
        <img src="asset/chocolat.png" alt="">
      </div>
      <div class="post">Post Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus reprehenderit inventore ex maiores eius dolor quam voluptatem aliquid ullam hic, pariatur deserunt vel, aliquam excepturi veniam facilis aperiam itaque quas.
        <img src="asset/chocolat.png" alt="">
      </div>
      <div class="post">Post Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus reprehenderit inventore ex maiores eius dolor quam voluptatem aliquid ullam hic, pariatur deserunt vel, aliquam excepturi veniam facilis aperiam itaque quas.
        <img src="asset/chocolat.png" alt="">
      </div>
      <div class="post">Post Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus reprehenderit inventore ex maiores eius dolor quam voluptatem aliquid ullam hic, pariatur deserunt vel, aliquam excepturi veniam facilis aperiam itaque quas.
        <img src="asset/chocolat.png" alt="">
      </div>
      <div class="post">Post Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus reprehenderit inventore ex maiores eius dolor quam voluptatem aliquid ullam hic, pariatur deserunt vel, aliquam excepturi veniam facilis aperiam itaque quas.
        <img src="asset/chocolat.png" alt="">
      </div>
      <div class="post">Post</div>
      <div class="post">Post</div>
      <div class="post">Post</div>
      <div class="post">Post</div>
      <div class="post">Post</div>
      <div class="post">Post</div>
      <!-- Repeat for more posts -->
    </div>
    <div class="right-sidebar">
      <input type="search" class="search-bar" placeholder="Search barre">
      <div class="suggestion">Tendance</div>
      <div class="suggestion">Suggestion</div>
      <div class="suggestion">Condition</div>
      <div>
        <button class="suggestion" onclick="toggleMode()">Dark/Light</button></div>
    </div>
  </div>

  <script src="dark.js"></script>
</body>

</html>