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
	
	$mdp = $dataPost['mdp'];
    $user = $dataPost['nom'];
    $prenom = $dataPost['prenom'];
    $mail = $dataPost['mail'];
    $pp = $dataPost['photoProfil'];
    


    echo '  
    <form method="post"  enctype="multipart/form-data" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                    </div> 
                    
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-2">
                                        <img  src='.$pp.' alt="pp" class="responsive" visibility:hidden>
                                        <br>

                                        <input type="file" name="photo" accept="image/*">

                                    </div>
                                </div>
                                    <br>

                                   

                                        <div class="row">
                                            <div class="col-md-5 ">
    
                                                <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">@</span>
                                                </div>
                                                <input type="text" name="nomU" class="form-control" value='.$user.' aria-label="Username" aria-describedby="basic-addon1">
                                                 </div>
                                            </div>
                                            <div class="col-md-5 ">

                                                <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Prénom :</span>
                                                </div>
                                                <input type="text" name="prenomU" class="form-control " value='.$prenom.' aria-label="Prenom" aria-describedby="basic-addon1">
                                                 </div>
                                            </div>
											<div class="col-md-10 ">

                                                <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Nouveau Mot de passe :</span>
                                                </div>
                                                <input type="text" name="mdpU" class="form-control " value='.$mdp.' aria-label="Mdp" aria-describedby="basic-addon1">
                                                 </div>
                                            </div>

                                            
                                        
                                        
                                            <div class="col-md-10">
                                                <a href="profilEdit.php"><button type="submit" class="btn  btn-success btn-block">Modifier</button></a> 
                                            </div>
                                        </div>
                                    </form>
                                    
                                <br>
                                               
';

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
                    </div> '; }

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


<!-- maj info profile -->
<?php

if(!empty($_POST['nomU']) && !empty($_POST['prenomU'])){
	
	$mdpUpdate = $_POST['mdpU'];
    $nomUpdate = $_POST['nomU'];
    $prenomUpdate = $_POST['prenomU'];
    $lastusername = $_SESSION['login'];
    
    //echo $nomUpdate;
    //echo $prenomUpdate;
	
    // maj nom prenom
	
    $sql = "Update personne set nom ='".$nomUpdate."' , prenom = '".$prenomUpdate."' where nom ='".$lastusername."';";
    $sql2 = "Update publication set user ='".$nomUpdate. "' where user = '".$lastusername."';";
	$sql3 = "Update personne set mdp = '".$mdpUpdate."' where nom ='".$lastusername."';";

    //echo $sql."<br> sql22   ".$sql2;

    $host='localhost';
    $user='root';
    $pass='';
    $dbname='DB_WEB';
    
    
        $conn = new mysqli($host, $user, $pass, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            echo "erreur";
        }

        if ($conn->query($sql) === TRUE) {
            //echo "New record created successfully";
            echo '<div class="alert alert-warning" role="alert">
            Profil mis à jour
              </div>' ;

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        if ($conn->query($sql2) === TRUE) {
            //echo "New record created successfully";
            echo '<div class="alert alert-warning" role="alert">
            Publications mise à jour
              </div>' ;

              //sleep(3);

                //header ('location: deconnexion.php');
                //echo "<meta http-equiv=refresh content=3;URL=deconnexion.php>";
                //session_start();
                $_SESSION['login']= $nomUpdate;
                echo "<meta http-equiv=refresh content=1;URL=profilEdit.php>";
              
        

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
		if ($conn->query($sql3) === TRUE) {
            //echo "New record created successfully";
            echo '<div class="alert alert-warning" role="alert">
            Profil mis à jour
              </div>' ;

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    //

    if(!empty($_FILES['photo']['tmp_name'])){
            $target_dir = "uploads/pp/";
            $target_file = $target_dir . uniqid() .basename($_FILES["photo"]["name"]) ; 
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            echo $imageFileType ;
            echo $target_file;
               
            

                // Check file size
                    if ($_FILES["photo"]["size"] > 5000000) {
                        echo "Sorry, your file is too large.";
                        $uploadOk = 0;
                    }
                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        $uploadOk = 0;
                    }
                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file )) {
                            //echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";

                            //echo '<p>La photo a bien été envoyée.</p>';

                            echo '<div class="alert alert-warning" role="alert">
                            La photo a bien été envoyée.
                            </div>' ;

                            echo '<img src="' .$target_file . '">';

                            echo'<p>'. $target_file .'<p>';

                                $user = $_SESSION["login"];                                
                                $photo = $target_file;

                                $sql3 = "Update personne set photoProfil ='".$target_file."' where nom ='".$lastusername."';";

                                //$sql = " INSERT INTO publication ( titre, description, user, photo) VALUES ('".$titre."', '".$description."', '".$user."',  '".$photo."') ;";
                                echo $sql3 ;
                            
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    }

                        $host='localhost';
                        $user='root';
                        $pass='';
                        $dbname='DB_WEB';
                        
                        
                            $conn = new mysqli($host, $user, $pass, $dbname);

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                                echo "erreur";
                            }

                            if ($conn->query($sql3) === TRUE) {
                                //echo "New record created successfully";
                                echo '<div class="alert alert-warning" role="alert">
                                Publication mise en ligne avec succès
                                </div>' ;

                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                            $conn->close();


    }
}
//


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