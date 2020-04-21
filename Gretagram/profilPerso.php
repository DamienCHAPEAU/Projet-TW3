<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();

// On récupère nos variables de session
if (isset($_SESSION['login']) && isset($_SESSION['mdp'])) {

	// On teste pour voir si nos variables ont bien été enregistrées
	echo '<html>';
	echo '<head>';
	echo '<title>Page de notre section membre</title>';
	echo '</head>';

	echo '<body>';
    //echo 'Votre login est '.$_SESSION['login'].' et votre mot de passe est '.$_SESSION['mdp'].'.';
    echo 'Votre login est '.$_SESSION['login'];
	echo '<br />';

	// On affiche un lien pour fermer notre session
	echo '<a href="deconnexion.php">Déconnexion</a>';
}
else {
    //echo 'Les variables ne sont pas déclarées.';
    header ('location: login.php?message=erreur');
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
        <div class="styleLogo"><h4>Gretagram</h4></div></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="ajouter.php">Ajouter</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link disabled" href="profil.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="discover.php">Discover</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="carte.php">Carte</a>
                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Rechercher">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
            </form>
        </div>
    </nav>
    <!--Fin Nav-->

    <br>
    <br>
    <br>
<?php

$nomU = $_SESSION['login'];

$requetePost = "Select * FROM personne where nom = '$nomU' ;";
$prequetePost = $conn->prepare($requetePost);
$prequetePost->execute();
while ($dataPost = $prequetePost->fetch()) {

    $user = $dataPost['nom'];
    $prenom = $dataPost['prenom'];
    $mail = $dataPost['mail'];
    $pp = $dataPost['photoProfil'];
    
    $requetePost = "Select count(*) as nbpubli FROM publication where user = '$nomU' ;";
    $prequetePost = $conn->prepare($requetePost);
    $prequetePost->execute();
    while ($dataPost = $prequetePost->fetch()) {

        $nombrePubli = $dataPost['nbpubli'];

    

        echo '
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-2">


                                    <img src='.$pp.' alt="pp" class="responsive" visibility:hidden>

                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-3">
                                                Nom : @'.$user. $prenom .'
                                            </div>
                                            <div class="col-md-3">
                                            </div>

                                            <div class="col-md-3">
                                                <a href="profilEdit.php"><button type="button" class="btn btn-light">Modifier</button></a>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                '.$nombrePubli.' publications
                                            </div>
                                            <div class="col-md-4">';

                                            $requetePost = "Select count(*) as nbAbonn FROM abonnement where nom_suivi = '$user' ;";
                                            $compteur_abonn = $conn->prepare($requetePost);
                                            $compteur_abonn->execute();
                                            while ($dataPost = $compteur_abonn->fetch()) {

                                                echo $dataPost['nbAbonn'].' abonnés';
                                            }

                                            echo'    
                                            </div>
                                            <div class="col-md-4">';
                                            
                                                $requetePost = "Select count(*) as nbAbonnement FROM abonnement where userAbonn = '$user' ;";
                                            $compteur_abonn = $conn->prepare($requetePost);
                                            $compteur_abonn->execute();
                                            while ($dataPost = $compteur_abonn->fetch()) {

                                                echo $dataPost['nbAbonnement'].' abonnements';
                                            } 

                                            echo'
                                                </div>
                                                <br>
                                                <br>
                                                <div class="col-md-6">
                                                <a href= "carte.php?userSpecifi='.$user.'"><button class="btn btn-info">voir mes publications sur la carte</button></a>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                    </div>
                                </div>
                                <br>
                                <br>
                                
                    
    ';
    }

echo '<div class="row"> ';
}
                     
                        $requetePost2 = "Select * FROM publication where user = '$nomU' order by datepubli DESC;";
                        $prequetePost2 = $conn->prepare($requetePost2);
                        $prequetePost2->execute();
                        
                        while ($dataPost2 = $prequetePost2->fetch()) {
                        
                            $photo = $dataPost2['photo'];

                    echo '
                    
                    <div class=" col-md-3 thumbnail">
                    <a href="post.php?post='.$photo.'"><img src="'.$photo.'" alt="Nature" style="height:100% weight:50%" class=" imgStyle img-thumbnail align-middle"></a>
                    </div>




     '; }

     echo'
                        </div>
                        <br>
                       
                        <br>

                    </div>
                    <div class="col-md-3">
                    </div>
                </div>
            </div>';
 ;

    ?>
    </div>
    <!--Fin Post-->
    <br>
    <!--Footer-->
    <footer class="containe-fluid footer">
        <i class="fa fa-copyright"> Gretagram 2020</i>
    </footer>
    <!--Fin Footer-->
</body>

</html>