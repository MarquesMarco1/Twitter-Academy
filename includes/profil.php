
    <div class="flexcontainer">
        <div class="middlecontainer">
            <section class="headsec">
            </section>
            <section class="twitterprofile">
                <div class="headerprofileimage">
                    <img id="headerimage" src="https://res.cloudinary.com/dowrygm9b/image/upload/v1570267399/laptop-3174729_yiprzu.jpg" alt="">
                    <img id="profilepic" src="<?php include('path.php');  echo $path . $user['profile_picture'] ?>" alt="">
                    <?php if ($user_profil === $user_logged) : ?>
                        <div class="editprofile">Edit Profile</div>
                    <?php endif; ?>

                </div>
                <div class="bio">
                    <div class="handle">
                        <h3><?php echo $user['username'] ?></h3>
                        <span><?php echo $user['at_user_name'] ?></span>
                    </div>
                    <p>Bio</p>
                    <span> <i class="fa fa-location-arrow "></i> Localisation <a href="#"> <i class="fa fa-birthday-cake" aria-hidden="true"></i> Anniversaire</span>
                    <br> <span><i class="fa fa-calendar"></i> Date de création (mois/an)</span>
                    <div class="nawa">
                        <div class="followers"><span>Following</span></div>
                        <div><span>Followers</span></div>
                    </div>
                </div>
            </section>

            <section class="tweets">
                <div class="heading">
                    <p>Tweets</p>
                    <p>Tweets and Replies</p>
                    <p>Media</p>
                    <p>Likes</p>
                </div>
            </section>
            <section class="mytweets">
                <div class="avi">Pp du mec</div>
                <div class="tweetbody">
                    <div>Username, @, date tweet</div>
                    <div class="tweetcontent">Tweet</div>
                </div>
            </section>
        </div>
    </div>
