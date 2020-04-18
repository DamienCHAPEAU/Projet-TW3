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
            <img src="img/G.png" alt="Logo" style="width:50px;">
            Gretagram</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="ajouter.php">Ajouter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profil.php">Profil</a>
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-2">
                        <img src="img/pp.png" alt="pp" class="responsive">
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-3">
                                Nom
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="btn btn-light">S'abonner</button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                6 publications
                            </div>
                            <div class="col-md-4">
                                12 abonnés
                            </div>
                            <div class="col-md-4">
                                400 abonnements
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                    </div>
                </div>
                <br>
                <br>

                <div class="row">
                    <div class="col-md-4">
                        <a href="post.php"><img src="img/tilleul-arbre.jpg" alt="arbre" class="responsive"></a>
                    </div>
                    <div class="col-md-4">
                        <img src="img/tilleul-arbre.jpg" alt="arbre" class="responsive">
                    </div>
                    <div class="col-md-4">
                        <img src="img/tilleul-arbre.jpg" alt="arbre" class="responsive">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <img src="img/tilleul-arbre.jpg" alt="arbre" class="responsive">
                    </div>
                    <div class="col-md-4">
                        <img src="img/tilleul-arbre.jpg" alt="arbre" class="responsive">
                    </div>
                    <div class="col-md-4">
                        <img src="img/tilleul-arbre.jpg" alt="arbre" class="responsive">
                    </div>
                </div>
                <br>

            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div>
    <br>
    <!--Fin Post-->
    <br>
    <!--Footer-->
    <footer class="containe-fluid footer">
        <i class="fa fa-copyright"> Gretagram 2020</i>
    </footer>
    <!--Fin Footer-->
	<h1>ok<h1>
</body>



</html>