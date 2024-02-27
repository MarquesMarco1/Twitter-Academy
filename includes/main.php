<div class="main-content">

  <form action="./mysql/r_tweet.php" method="post">
    <input type="submit" class="recommendation-button" value="Faire un post">
    <input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['USER']['id'] ?>">
    <input type="text" name="tweet" id="tweet">
  </form>
  <div id="tweets">
    <!-- Les tweets seront affichés ici -->
  </div>


</div>