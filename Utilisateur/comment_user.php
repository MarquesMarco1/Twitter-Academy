<?php
$sql = $mysqlClient->prepare('SELECT u.*, t.content, t.id as tweet_id, t.time, t.id_response FROM tweet t JOIN user u ON u.id = t.id_user WHERE t.id_user = :id AND t.id_response IS NOT NULL ORDER BY t.id DESC');
$sql->execute([
    "id" => $user['id'],
]);
$tweets = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="mytweets">
    <?php foreach ($tweets as $tweet) : ?>
        <?php 
            
            $sql = $mysqlClient->prepare('SELECT u.*, t.content, t.id as tweet_id, t.time, t.id_response FROM tweet t JOIN user u ON u.id = t.id_user WHERE t.id = :id');
            $sql->execute([
                "id" => $tweet['id_response'],
            ]);
            $response = $sql->fetch(PDO::FETCH_ASSOC);
            
            
        ?>
        <div class="post">
            <div class="post">
                <div class="profilpost">
                    <div class="photodeprofil">
                        <img src="<?php echo $path . $response['profile_picture'] ?>" alt="photodeprofil">
                    </div>
                    <div class="infoprofilontwit">
                        <div class="nomutilisateur">
                            <a><?php echo $response['username'] ?></a>
                        </div>
                        <div class="pseudo">
                            <a><?php echo $response['at_user_name'] ?></a>
                        </div>
                    </div>
                </div>

                <div class="borderpostcontent">

                    <div class="postcontent">
                        <p><?php echo $response['content'] ?>
                        </p>
                    </div>

                </div>
                <p><?php echo $response['time'] ?></p>
                <div class="smalllink">

                </div>
            </div>
            </p>
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