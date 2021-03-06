<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start();

// On récupère nos variables de session
if (isset($_SESSION['login']) && isset($_SESSION['mdp'])) {

    // On teste pour voir si nos variables ont bien été enregistrées
    echo '<html>';
    echo '<head>';
    echo '<title>Page de notre section membre</title>';
    echo '</head>';

    echo '<body>';
    //echo 'Votre login est '.$_SESSION['login'].' et votre mot de passe est '.$_SESSION['mdp'].'.';
    echo 'Votre login est ' . $_SESSION['login'];
    echo '<br />';

    // On affiche un lien pour fermer notre session
    echo '<a href="deconnexion.php">Déconnexion</a>';
} else {
    //echo 'Les variables ne sont pas déclarées.';
    header('location: login.php?message=erreur');
}
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Gretagram</title>

    <!--Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <!--FontAwesome-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <!--JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- Include des fonctons pouvant être utilisées + connexion BD-->
    <?php
    include("include/connect.inc.php");
    ?>
</head>



<!--Contenu-->

<body>
    <!--Nav-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">
            <div class="styleLogo">
                <h4>Gretagram</h4>
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="ajouter.php">Ajouter</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link " href="profil.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="discover.php">Discover</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="carte.php">Carte</a>
                </li>

            </ul>
            <div class="md-form">
            
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2 mdb-autocomplete" type="text" id="search-user" placeholder="Rechercher">
            </form>
                <div style="margin-top: 0px">
                    <div id="result-search">
                        <ul style="list-style: none;"></ul>
                    </div>
                </div>

            </div>
        </div>
    </nav>
    <!--Fin Nav-->


    <br>
    <!--Post-->
    
    <div class="container">
   <h4>Résultat de la recherche par mot clé : <?php echo $_GET['mot']; ?></h4>
   <br>
   <br>
   <br>

        <?php

        //$requetePost = "Select * FROM publication order by datepubli DESC";
        //$requetePost = "Select * FROM publication  where user in (Select nom_suivi from abonnement where userAbonn='".$_SESSION['login']."') or user='".$_SESSION['login']."' order by datepubli DESC";
        $requetePost = "Select * FROM publication  where tag like '%".$_GET['mot']."%' or description like '%".$_GET['mot']."%'";
        //echo $requetePost;
        $prequetePost = $conn->prepare($requetePost);
        $prequetePost->execute();
        if($prequetePost->rowCount()==0){
            echo '<div class="row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-8">
                            <p>Aucun résultat de recherche découvrez des utilisateurs dans <a href="http://gretagram/discover.php">Discover !</a></p>
                        </div>
                        <div class="col-md-1">
                        </div>
                    </div>';
        }
        while ($dataPost = $prequetePost->fetch()) {
            $user = $dataPost['user'];
            $titre = $dataPost['titre'];
            $description = $dataPost['description'];
            $nbLike = $dataPost['nblike'];
            $image = $dataPost['photo'];


            $requetePost2 = "Select * FROM personne where nom = '" . $user . "'";
            $prequetePost2 = $conn->prepare($requetePost2);
            $prequetePost2->execute();
            while ($dataPost2 = $prequetePost2->fetch()) {
                $pp = $dataPost2['photoProfil'];

                echo '
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6 fond">
                        <br>
                            <h5>' . $titre . ' by <a href ="profil.php?nom=' . $user . '" style="color:#34A200" ><img class="imgStyle img-thumbnail" src="' . $pp . '" width="45px" > @' . $user . ' </a></h5>
                            <hr style="width: 100%; color: black; height: 1px; background-color:black;">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <a href="post.php?post=' . $image . '"><img src="' . $image . '" width="100%" ></a>
                                    </div>
                                    <div class="row">
                                        <br>                                        
                                    </div>
                                </div>
                                <div class="col-md-2">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <br>
                ';
            }
        }
        ?>
    </div>
    <!--Fin Post-->
    <br>
    <!--Footer-->
    <footer class="containe-fluid footer">
        <i class="fa fa-copyright"> Gretagram 2020</i>
    </footer>
    <!--Fin Footer-->
    <!--Script JS-->
    <script>
        $(document).ready(function() {
            $('#search-user').keyup(function() {
                $('#result-search ul').html('');
                var utilisateur = $(this).val();
                if (utilisateur != "") {
                    $.ajax({
                        type: 'GET',
                        url: 'script/searchuser.php',
                        data: 'user=' + encodeURIComponent(utilisateur),
                        success: function(data) {                            
                            if (data != "") {
                                $('#result-search ul').append(data);
                            } else {
                                document.getElementById('result-search').innerHTML = "<div style='font-size: 20px; text-align: center'; margin-top: 10px;>Aucun utilisateur</div>";
                            }
                        }
                    });
                }

            });
        });
    </script>
</body>

</html>