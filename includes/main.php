<div class="mise-en-page">
  <div class="main-content">

    <div>
      <form action="mysql/r_tweet.php" method="post" class="create-post">
        <h2>Faire un post</h2>
        <input name="txtTweet" id="txtTweet" placeholder="Quoi de neuf ?" >
        <div class="result-box">

        </div>
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
  <script src="autocompletion.js"></script>
</div>