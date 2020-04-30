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



<?php
    $param = htmlspecialchars($_GET['id']); //TODO

     $requetePost = "Select count(*) as nbLike FROM jaime where id = (Select id from publication where photo=" . "'" . $param . "'" . ");";
     $prequetePost = $conn->prepare($requetePost);
     $prequetePost->execute();
     while ($dataPost = $prequetePost->fetch()) {

       $nbLikePost = $dataPost['nbLike'];

            $requetePost2 = "Select * FROM publication where photo=" . "'" . $param . "'" . ";";
            $prequetePost2 = $conn->prepare($requetePost2);
            $prequetePost2->execute();
            while ($dataPost2 = $prequetePost2->fetch()) {
                $nbVuePost = $dataPost2['nbVue'];
                

                $dataPoints = array( 
                array("label"=>"Nombre de vue avec like", "y"=>$nbLikePost),
                array("label"=>"Nombre de vue totale", "y"=>$nbVuePost)
                );

                $requetePost3 = "Select AVG(nbVue) as nbAVG FROM publication where user=" . "'" . $_SESSION['login'] . "'" . ";";
                $prequetePost3 = $conn->prepare($requetePost3);
                $prequetePost3->execute();
                while ($dataPost3 = $prequetePost3->fetch()) {

                        $nbVueAVG = $dataPost3['nbAVG'];

                        $requetePost4 = "Select AVG(nbVue) as nbAVGtot FROM publication ;";
                        $prequetePost4 = $conn->prepare($requetePost4);
                        $prequetePost4->execute();
                        while ($dataPost4 = $prequetePost4->fetch()) {
                            $nbVueAVGtot = $dataPost4['nbAVGtot'];

                        $dataPoints2 = array( 
                        array("label"=>"Nombre de vue moyen sur vos publication", "y"=>$nbVueAVG),
                        array("label"=>"Nombre de vue moyen des publication sur gretagram", "y"=>$nbVueAVGtot),
                        array("label"=>"Nombre de vue sur cette publication", "y"=>$nbVuePost)
                        );
                    }
                    }
        }
        }
 
?>

<script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Nombre de vue en fonction du nombre de like"
	},
	subtitles: [{
		text: "2020"
	}],
	data: [{
		type: "pie",
		yValueFormatString: "#,##0.00\"\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 

 
var chart2 = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	title: {
		text: "Nombre de vue en fonction de votre nombre de vue moyen"
	},
	subtitles: [{
		text: "2020"
	}],
	data: [{
		type: "column",
		yValueFormatString: "#,##0.00\"\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});
chart2.render();
 
}

</script>

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
                <li class="nav-item">
                    <a class="nav-link" href="profilPerso.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="discover.php">Discover</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="carte.php">Carte</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" id="search-user" placeholder="Rechercher">
            </form>
            <div style="margin-top: 20px">
                <div id="result-search">
                    <ul style="list-style: none;"></ul>
                </div>
            </div>
        </div>
    </nav>
    <!--Fin Nav-->
    <br>
    <br>
    <br>
    <br>

    <?php
    $param = htmlspecialchars($_GET['id']); //TODO

    $requetePost = "Select * FROM publication where photo = " . "'" . $param . "'" . ";";
    $prequetePost = $conn->prepare($requetePost);
    $prequetePost->execute();
    while ($dataPost = $prequetePost->fetch()) {

        $id = $dataPost['id'];
        $photo = $dataPost['photo'];
        $nom = $dataPost['user'];
        $titre = $dataPost['titre'];

        echo '
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
               <h4>' . $titre . ' by <a href="profil.php?nom=' . $nom . '" style="color:#34A200">@' . $nom . '</a></h4>
                <hr style="width: 100%; color: black; height: 1px; background-color:black;">

                <div class="row">
                    <div class="col-md-5">
                        <img src="' . $photo . '" alt="" class=" img-thumbnail responsive">
                    </div>
                    
';
    }
    

    $requetePost = "Select count(*) as nbCom FROM commentaire where publication = " . "'" . $param . "'" . ";";
    $prequetePost = $conn->prepare($requetePost);
    $prequetePost->execute();
    while ($dataPost = $prequetePost->fetch()) {

        $nbCommentaire = $dataPost['nbCom'];
    echo '
    <div class="row">
    <div class="col-md-10">nombre de commentaire : '.$nbCommentaire.'
    
    ';

    }


    $requetePost = "Select count(*) as nbLike FROM jaime where id_article = (Select id from publication where photo=" . "'" . $param . "'" . ");";
    $prequetePost = $conn->prepare($requetePost);
    $prequetePost->execute();
    while ($dataPost = $prequetePost->fetch()) {
        $nbLikePost = $dataPost['nbLike'];
        echo'
        
        </div><br>
            <div class="col-md-10">        nombre de like : '.$nbLikePost.'       </div>

        ';
    }


        $requetePost = "Select * FROM publication where photo=" . "'" . $param . "'" . ";";
        $prequetePost = $conn->prepare($requetePost);
        $prequetePost->execute();
        while ($dataPost = $prequetePost->fetch()) {
            $nbVuePost = $dataPost['nbVue'];
            echo '
                <div class="col-md-10">        nombre de vue : '.$nbVuePost.'        </div>
            </div>
            ';
        }
    ?>
    </div>
    <br>

    <div id="chartContainer" style="height: 370px; width: 100%;"></div> 
    <div id="chartContainer2" style="height: 370px; width: 100%;"></div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>



    </div>

    
    <br>
    <?php
    $param = htmlspecialchars($_GET['id']);
        echo '<div align=left><a href="post.php?post='.$param.'">retour à la publication</a></div>';

    ?>
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