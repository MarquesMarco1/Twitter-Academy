<?php
session_start();
if (!isset($user['id'])) {
    echo "CETTE UTILISATEUR EXISTE PAS";
    return;
}

$sql = $mysqlClient->prepare('SELECT u.*, t.content, t.id as tweet_id, t.time FROM tweet t JOIN user u ON u.id = t.id_user WHERE t.id_user = :id AND t.id_quoted_tweet IS NULL AND t.id_response IS NULL ORDER BY t.id DESC');
$sql->execute([
    "id" => $user['id'],
]);
$tweets = $sql->fetchAll(PDO::FETCH_ASSOC);
?>



<div class="mise-en-page">
    <div class="main-content">
        <div class="container">
            <section class="twitterprofile">
                <div class="headerprofileimage">
          
                    <img src="<?php echo $path . $user['profile_picture'] ?>" id="headerimage">
                    <img src="<?php echo $path . $user['profile_picture'] ?>" id="profilepic">
                    <div class="editprofile">Edit Profile</div>
                </div>
                <div class="bio">
                    <div class="handle">
                        <h3><?php echo $user['username'] ?></h3>
                        <span><?php echo $user['at_user_name'] ?></span>
                    </div>
                    <p><?php echo $user['bio'] ?></p>
                    <span> <i class="fa fa-location-arrow"></i> <?php echo $user['city'] ?> <i class="fa fa-birthday-cake" aria-hidden="true"></i> <?php echo $user['birthdate'] ?></span>
                    <br> <span><i class="fa fa-calendar"></i> <?php echo $user['creation_time'] ?> </span> 
                    <div class="follow">
                        <div class="followers"><span>Following</span></div>
                        <div><span>Followers</span></div>
                    </div>
                </div>
            </section>

            <section class="tweets">
                <div class="heading">
                    <p>Tweets</p>
                    <p>Tweets and Replies</p>
                    <p>Medias</p>
                    <p>Likes</p>
                </div>
            </section>
            <section class="mytweets">
                <?php foreach ($tweets as $tweet) : ?>
                <div class="post">
                    <div class="profilpost">
                        <div class="photodeprofil">
                            <img src="<?php echo $path . $tweet['profile_picture'] ?>" alt="photodeprofil">
                        </div>
                        <div class="infoprofilontwit">
                            <div class="nomutilisateur">
                                <a><?php echo $tweet['username'] ?></a>
                            </div>
                            <div class="pseudo">
                                <a><?php echo $tweet['at_user_name'] ?></a>
                            </div>
                        </div>
                    </div>

                    <div class="borderpostcontent">
                        <div class="postcontent">
                            <p><?php echo $tweet['content'] ?>
                            </p>
                        </div>
                       
                    </div>
                    <p><?php echo $tweet['time'] ?></p>
                    <div class="smalllink">
                        <span class="gifclick">
                            <a href="../tweet/retweet.php?id_tweet=<?php echo $tweet['tweet_id'] ?>">
                                <img src="../assets/icons8-twitter-entoure.gif" alt="Main Logo">
                                <div class="nombredeRT">
                                    <p>0</p>
                                </div>
                            </a>
                        </span>
                        <span class="gifclick">
                            <a href="Homepage.html">
                                <img src="../assets/icons8-aimer.gif" alt="Main Logo">
                                <div class="nombredelike">
                                    <p>0</p>
                                </div>
                            </a>
                        </span>
                        <span class="gifclick">
                             <a href="../tweet/comment.php?id_tweet=<?php echo $tweet['tweet_id'] ?>">
                                <img src="../assets/icons8-bulle.gif" alt="Main Logo">
                                <div class="nombredecom">
                                    <p>0</p>
                                </div>
                            </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </section>
        </div>

    </div>


    <!-- <button class="suggestion" onclick="toggleMode()">Dark/Light</button> -->
</div>
