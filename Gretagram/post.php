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
    <br>




    <?php
    $param = $_GET['post'];
    $requetePost = "Select * FROM publication where photo = " . "'" . $param . "'" . ";";
    $prequetePost = $conn->prepare($requetePost);
    $prequetePost->execute();
    while ($dataPost = $prequetePost->fetch()) {

        $id = $dataPost['id'];
        $photo = $dataPost['photo'];
        $nom = $dataPost['user'];

        echo '
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
               <h4><a href="profil.php?nom=' . $nom . '" style="color:#34A200">@' . $nom . '</a></h4>
                <hr style="width: 100%; color: black; height: 1px; background-color:black;">

                <div class="row">
                    <div class="col-md-5">
                        <img src=' . $photo . ' alt="arbre" class=" img-thumbnail responsive">
                    </div>
                    
';
    }

    ?>
    <div class="col-md-7">
        <textarea readonly style="resize: none" class="form-control" rows="15">
        <?php
        $param = $_GET['post'];
        $requetePost = "Select * FROM commentaire where publication = " . "'" . $param . "'" . ";";
        //echo $requetePost;
        $prequetePost = $conn->prepare($requetePost);
        $prequetePost->execute();
        while ($dataPost = $prequetePost->fetch()) {

            $comm = $dataPost['message'];
            $nom = $dataPost['user'];
            $date = $dataPost['date'];

            echo '@' . $nom . ' : ' . $comm . "&#013;&#010 &#013;&#010";
            
        }
        ?> 
        </textarea>
    </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-2">

            <?php
                $like = $conn->prepare('SELECT id FROM jaime WHERE id_article= ?');
                $like->execute(array($id));
                $likes = $like->rowCount();
            ?>

            <a href="script/like.php?id=<?php echo $id; ?>"><?php echo $likes ?> J'aime</a> 
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-7">

            <form method="post" enctype="multipart/form-data">

                <div class="input-group mb-3">
                    <textarea name="newComm" class="form-control" placeholder="Ajouter un commentaire" aria-label="Recipient'."'".' s username" aria-describedby="basic-addon2"></textarea>
                    <div class="input-group-append">
                        <input type="submit" class="btn btn-outline-secondary" name="submit_commentaire" value="Envoyer">

                    </div>
                </div>

            </form>
        </div>
    </div>
    <div class="col-md-2"></div>
    </div>

    </div>

    <?php
    $photo = "";
    $id = $_GET['id'];
    $publi = $_GET['post'];

    if (!empty($_POST["newComm"]) && isset($_POST['submit_commentaire'])) {

        $newComm = $_POST['newComm'];
        $commSlash = addslashes($newComm);


        $sql = " INSERT INTO commentaire ( message, publication, user) VALUES ('" . $commSlash . "', '" . $publi . "', '" . $id . "') ;";
        echo $sql;

        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $dbname = 'DB_WEB';



        $conn = new mysqli($host, $user, $pass, $dbname);




        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            echo "erreur";
        }

        if ($conn->query($sql) === TRUE) {

            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();

        echo '<meta http-equiv="refresh" content="0">';
    }




    ?>

    <!--Fin Post-->
    <br>
    <!--Footer-->
    <footer class="containe-fluid footer">
        <i class="fa fa-copyright"> Gretagram 2020</i>
    </footer>
    <!--Fin Footer-->
</body>

</html>