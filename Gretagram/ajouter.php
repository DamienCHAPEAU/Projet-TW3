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
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top">
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
                <li class="nav-item active">
                    <a class="nav-link disabled" href="ajouter.php">Ajouter</a>
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
    <!--Post-->
    <div class="container" allign=center>

        <!-- <form method="post"  enctype="multipart/form-data" ACTION="script/newPost.php"> -->
        <div class="row">
            <div class="col-5">

                <form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                    <br>
                    Localisation:
                    <br><br>
                    <input type="text" disabled name="addressForm" size="40" maxlength="40" value="<?php if (isset($_POST['adrr'])) {
                                                                                                        echo $_POST['adrr'];
                                                                                                    } ?>">
                    <hr>


                    <br>
                    Titre:
                    <br>
                    <input type="text" name="titre" size="20" maxlength="20">
                    <br>
                    <br>
                    Description:
                    <br>
                    <input type="text" name="description" size="20" maxlength="20">
                    <br>

                    <br>
                    <br>
                    Photo:
                    <br>
                    <input type="file" name="photo" accept="image/*">
                    <br>
                    <br>
                    <input type="submit" name="general" value="Envoyer">
                </form>

            </div>
            <div class="mb-5">
                <br>

                Recherchez votre localisation:
                <br>
                <br>
                <form method="post" action="API.php">
                    <input type="text" name="localisation" size="20" maxlength="20">
                    <input type="submit" name="adresse" value="search">
                    <hr>
                </form>
            </div>

        </div>
        <hr>
        <?php

        if (isset($_SESSION["lat"])) {
            $latitude = $_SESSION["lat"];
            $longitude = $_SESSION["long"];
            $addressePost = addslashes($_SESSION['adresse']);
            //echo $_POST['adrr'];
        }




        if (isset($_POST['general'])) {

            /* verif localisation
        if(!isset($_POST['addressForm'])){
            if(empty($_POST['addressForm'])){

                echo '<div class="alert alert-warning" role="alert">
                veuillez saisir une localisation
                </div>' ;

            }
        }
        */


            if (!empty($_FILES['photo']['tmp_name'])) {
                $target_dir = "uploads/";
                $target_file = $target_dir . uniqid() . basename($_FILES["photo"]["name"]);

                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                //echo $imageFileType ;


                // Check if image file is a actual image or fake image
                if (!empty($_POST["Envoyer"])) {
                    $check = getimagesize($_FILES["photo"]["tmp_name"]);
                    if ($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                }

                // Check if file already exists
                if (file_exists($target_file)) {
                    echo $target_file . "Sorry, file already exists.";
                    $uploadOk = 0;
                }
                // Check file size
                if ($_FILES["photo"]["size"] > 5000000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if (
                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif"
                ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                        //echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";

                        //echo '<p>La photo a bien été envoyée.</p>';

                        echo '<div class="alert alert-warning" role="alert">
            La photo a bien été envoyée.
              </div>';

                        echo '<img src="' . $target_file . '">';

                        //echo'<p>'. $target_file .'<p>';


                        if (empty($_POST["titre"]) || empty($_POST["description"])) {

                            echo '<div class="alert alert-warning" role="alert">
                tout les champs ne sont pas rempli
                  </div>';
                        }

                        $titre = $_POST["titre"];
                        $user = $_SESSION["login"];
                        $description = $_POST["description"];
                        $photo = $target_file;
                        /*$latitude = $_POST["lat"];
                        $longitude = $_POST["long"];
                        $addressePost = $_POST['addressForm'];
                        */



                        $sql = " INSERT INTO publication ( titre, description, user, photo, lat, longitude, adrrFormated ) VALUES ('" . $titre . "', '" . $description . "', '" . $user . "',  '" . $photo . "', '" . $latitude . "', '" . $longitude . "', '" . $addressePost . "' ) ;";
                        //echo $sql ;

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
                            //echo "New record created successfully";
                            echo '<div class="alert alert-warning" role="alert">
                                            Publication mise en ligne avec succès
                                            </div>';
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }

                        $conn->close();
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            } else {

                echo '<div class="alert alert-warning" role="alert">
                                Vous n' . "'" . 'avez pas importer d' . "'" . 'image
                                </div>';
            }
        } else {

            echo '<div class="alert alert-warning" role="alert">
                                Entrez tout les champs et envoyez votre publication
                                </div>';
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