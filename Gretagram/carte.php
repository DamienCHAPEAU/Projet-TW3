<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Gretagram</title>

    <!--Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <!--FontAwesome-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" href="index.php">
            <img src="img/G.png" alt="Logo" style="width:50px;">
            Gretagram</a>
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="ajouter.php">Ajouter</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./profil.php">Profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="carte.php">Carte</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search">
            <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>
    <!--Fin Nav-->
    <br>




    </div>
    <!--Fin Post-->
    <br>
    <!--Footer-->
    <footer class="containe-fluid footer">
        <i class="fa fa-copyright"> Gretagram 2020</i>
    </footer>
    <!--Fin Footer-->
</body>

<script type="text/javascript">
    collapse.show;
</script>

</html>