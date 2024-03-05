<?php


$sql = $mysqlClient->prepare('SELECT * FROM user ORDER BY RAND() LIMIT 5');
$sql->execute([
]);

$usersugg = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="right-sidebar">
      <input type="search" class="search-bar" placeholder="Search barre">
      <div class="suggestion tendance">

        <div class="tendance-list">
          <p>1 - Bien-etre - Tendance</p>
          <a href="#">#gratitude</a>
        </div>
        <div class="tendance-list">
          <p>2 - Politique - Tendance</p>
          <a href="#">#macron</a>
        </div>
        <div class="tendance-list">
          <p>3 - Jeux-video - Tendance</p>
          <a href="#">#fortnite</a>
        </div>
        <div class="tendance-list">
          <p>4 - Bien-etre - Tendance</p>
          <a href="#">#toujourfatigué</a>
        </div>
        <div class="tendance-list">
          <p>5 - Sport - Tendance</p>
          <a href="#">#PSG</a>
        </div>
        <div class="tendance-list">
          <p>6 - Sport - Tendance</p>
          <a href="#">#jeux-video</a>
        </div>
        <div class="tendance-list">
          <p>8 - Musique - Tendance</p>
          <a href="#">#damso</a>
        </div>
        <div class="tendance-list">
          <p>9 - Bien-etre - Tendance</p>
          <a href="#">#lamort</a>
        </div>
        <div class="tendance-list">
          <p>10 - Technologie - Tendance</p>
          <a href="#">#innovation</a>
        </div>
      </div>
      <div class="sugguser">
        <h1>Suggestion User</h1>
        <?php foreach ($usersugg as $users) : ?>
        <div class="profilpost background marging">
          <div class="photodeprofil">
            <img href="#" src="<?php echo $path ?><?php echo $users['profile_picture'] ?>" alt="photodeprofil">
          </div>
          <div class="infoprofilontwit">
            <div class="nomutilisateur">
              <a href="#"><?php echo $users['username'] ?></a>
            </div>
            <div class="pseudo">
              <a style="color:blue" href="<?php echo $path ?>Utilisateur/user_profil.php?id_user=<?php echo $users['at_user_name'] ?>"><?php echo $users['at_user_name'] ?></a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
       
      </div>
      <div>