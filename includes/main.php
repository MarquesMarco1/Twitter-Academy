<div class="mise-en-page">
  <div class="main-content">

    <div >
      <form action="./mysql/r_tweet.php" method="post" class="create-post">
        <h2>Faire un post</h2>
        <input id="txtTweet" type="text" name="tweet" id="tweet" id="postContent" rows="4" cols="50" placeholder="Quoi de neuf ?">
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