<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tweet academie</title>
    <link rel="stylesheet" href="style/accueil.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <div class="marging">


        <div class="mise-en-page">
            <div class="main-content">
                <div class="create-post">
                    <h2>Faire un post</h2>
                    <textarea id="postContent" rows="4" cols="50" placeholder="Quoi de neuf ?"></textarea>
                    <br>
                    <button id="publishPost">Publier</button>
                </div>
                <div class="post">
                    <div class="profilpost">
                        <div class="photodeprofil">
                            <img src="asset/Capture d’écran 2024-02-28 à 10.29.55.png" alt="photodeprofil">
                        </div>
                        <div class="infoprofilontwit">
                            <div class="nomutilisateur">
                                <a>Sophie Lefebvre</a>
                            </div>
                            <div class="pseudo">
                                <a>@SosoLFB</a>
                            </div>
                        </div>
                        <div class="option">
                            <span class="gifclick">


                            </span>
                        </div>
                    </div>
                    <div class="borderpostcontent">
                        <div class="postcontent">
                            <p>Juste observé le coucher de soleil le plus magnifique depuis le sommet de la montagne. Il y a quelque
                                chose de si paisible à être en harmonie avec la nature. 🌄 N'oubliez pas de prendre un moment pour
                                apprécier les petites beautés autour de vous. #nature #gratitude.
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
                                    <p>2873</p>
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
            </div>

            <!-- <button class="suggestion" onclick="toggleMode()">Dark/Light</button> -->
        </div>
    </div>


    <script src="dark.js"></script>
</body>

</html>