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
    $param = htmlspecialchars($_GET['post']); //TODO

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

    ?>
    <div class="col-md-7">
        <!-- <textarea readonly style="resize: none" class="form-control " rows="15">  -->
        <div class="overflow-auto p-3 mb-3 mb-md-0 mr-md-3 bg-light" style="max-width: 480px; max-height: 400px;">

            <?php
            $param = $_GET['post'];
            $requetePost = "Select * FROM commentaire where publication = " . "'" . $param . "'" . "Order by date DESC;";
            //echo $requetePost;
            $prequetePost = $conn->prepare($requetePost);
            $prequetePost->execute();
            while ($dataPost = $prequetePost->fetch()) {

                $comm = $dataPost['message'];
                $commhtmlspecial = htmlspecialchars($comm);
                $nom = $dataPost['user'];
                $date = $dataPost['date'];

                //echo '@' . $nom . ' : ' . $comm . "&#013;&#010 &#013;&#010";
                echo '<a href ="profil.php?nom=' . $nom . '" style="color:#34A200" >@' . $nom . '</a> : ' . $commhtmlspecial . '<br><hr>   ';
            }
            ?>

        </div>
        <!-- </textarea> -->
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

            <a href="script/like.php?id=<?php echo $id; ?>&nom=<?php echo $_SESSION['login']; ?>"><?php echo $likes ?> J'aime</a>
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
    $id = $_SESSION['login'];
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