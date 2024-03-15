<?php

include('../mysql/mysql.php');
$sql = $mysqlClient->prepare('SELECT hashtag FROM hashtag_list LIMIT 5');
$sql->execute([]);
$hashtag_list = $sql->fetchAll(PDO::FETCH_ASSOC);

foreach ($hashtag_list as $hashtag_lists) {
  $var = str_replace('"', ' ', $hashtag_lists['hashtag']);
  $usernames[] = "#" . $var;
}
?>
<script>
  $(function() {
    var availableTags = <?= json_encode($usernames); ?>

    $("#tweet").autocomplete({
      source: availableTags
    });
  });
</script>
<div class="mise-en-page">
  <div class="main-content">

    <div>
      <form action="./mysql/r_tweet.php" method="post" class="create-post">
        <h2>Faire un post</h2>
        <input name="tweet" id="tweet" placeholder="Quoi de neuf ?">
        <div id="txtCountTweet" class="counter">0</div>
        <br>
        <input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['USER']['id'] ?>">
        <button id="publishPost">Publier</button>
      </form>

    </div>

    <div id="tweets">

    </div>
  </div>
  <script src="tweet/tweet.js"></script>
</div>