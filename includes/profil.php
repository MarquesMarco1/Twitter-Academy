<?php
session_start();
if (!isset($user['id'])) {
    echo "CETTE UTILISATEUR EXISTE PAS";
    return;
}
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
                    <p> que la mort la mort et que la mort </p>
                    <span> <i class="fa fa-location-arrow"></i> Porte de l'enfer <i class="fa fa-birthday-cake" aria-hidden="true"></i> 06/06/1966</span>
                    <br> <span><i class="fa fa-calendar"></i> 02/2021</span>
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
                <div class="post">
                    <div class="profilpost">
                        <div class="photodeprofil">
                            <img src="asset/Capture d’écran 2024-02-28 à 10.30.34.png" alt="photodeprofil">
                        </div>
                        <div class="infoprofilontwit">
                            <div class="nomutilisateur">
                                <a>Jean Dupont</a>
                            </div>
                            <div class="pseudo">
                                <a>@JeanD</a>
                            </div>
                        </div>
                    </div>

                    <div class="borderpostcontent">
                        <div class="postcontent">
                            <p>Incroyable de voir comment la technologie évolue si rapidement ! Aujourd'hui, j'ai eu l'opportunité
                                d'essayer les lunettes de réalité augmentée les plus récentes et c'était comme être propulsé dans le
                                futur. Quelles innovations attendez-vous le plus ? #technologie #innovation.
                            </p>
                        </div>
                    </div>
                    <div class="smalllink">
                        <span class="gifclick">
                            <a href="Homepage.html">
                                <img src="asset/icons8-twitter-entouré.gif" alt="Main Logo">
                                <div class="nombredeRT">
                                    <p>26</p>
                                </div>
                            </a>
                        </span>
                        <span class="gifclick">
                            <a href="Homepage.html">
                                <img src="asset/icons8-aimer.gif" alt="Main Logo">
                                <div class="nombredelike">
                                    <p>478</p>
                                </div>
                            </a>
                        </span>
                        <span class="gifclick">
                            <a href="Homepage.html">
                                <img src="asset/icons8-bulle.gif" alt="Main Logo">
                                <div class="nombredecom">
                                    <p>10</p>
                                </div>
                            </a>
                    </div>
                </div>
                <div class="post">
                    <div class="profilpost">
                        <div class="photodeprofil">
                            <img src="asset/Capture d’écran 2024-02-28 à 10.30.34.png" alt="photodeprofil">
                        </div>
                        <div class="infoprofilontwit">
                            <div class="nomutilisateur">
                                <a>Jean Dupont</a>
                            </div>
                            <div class="pseudo">
                                <a>@JeanD</a>
                            </div>
                        </div>
                    </div>

                    <div class="borderpostcontent">
                        <div class="postcontent">
                            <p>Incroyable de voir comment la technologie évolue si rapidement ! Aujourd'hui, j'ai eu l'opportunité
                                d'essayer les lunettes de réalité augmentée les plus récentes et c'était comme être propulsé dans le
                                futur. Quelles innovations attendez-vous le plus ? #technologie #innovation.
                            </p>
                        </div>
                    </div>
                    <div class="smalllink">
                        <span class="gifclick">
                            <a href="Homepage.html">
                                <img src="asset/icons8-twitter-entouré.gif" alt="Main Logo">
                                <div class="nombredeRT">
                                    <p>26</p>
                                </div>
                            </a>
                        </span>
                        <span class="gifclick">
                            <a href="Homepage.html">
                                <img src="asset/icons8-aimer.gif" alt="Main Logo">
                                <div class="nombredelike">
                                    <p>478</p>
                                </div>
                            </a>
                        </span>
                        <span class="gifclick">
                            <a href="Homepage.html">
                                <img src="asset/icons8-bulle.gif" alt="Main Logo">
                                <div class="nombredecom">
                                    <p>10</p>
                                </div>
                            </a>
                    </div>
                </div>
            </section>
        </div>

    </div>


    <!-- <button class="suggestion" onclick="toggleMode()">Dark/Light</button> -->
</div>
