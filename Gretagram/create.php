<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();
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
	
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/styleHome.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php
    include("include/connect.inc.php");
    ?>
</head>
<!--Contenu-->

<body>
<section id="">
		<div class="container">
		<div class="styleLogo"><h4><a href = "login.php">Gretagram</h4></div></a>
		
			
		</div>
</section>
  
<?php    
    echo '  
    <form method="post"  enctype="multipart/form-data" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-15">
                    </div> 
                    
                            <div class="col-md-15">
                                <div class="row">
                                    <div class="col-md-1">
                                    </div>
										<div class="col-md-2">
											<img  src="img/pp.png" alt="pp" class="responsive" visibility:hidden>
											<br>
											<input type="file" name="photo" accept="image/*">

										</div>
									</div>
                                    <br>

                                        <div class="row">
                                            <div class="col-md-5 ">
    
                                                <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Pseudo :</span>
                                                </div>
                                                <input type="text" name="pseudoU" class="form-control" placeholder="Entrer un pseudo" aria-label="pseudo" aria-describedby="basic-addon1">
                                                 </div>
                                            </div>
											
                                            <div class="col-md-6 ">

                                                <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Prénom :</span>
                                                </div>
                                                <input type="text" name="prenomU" class="form-control " placeholder="Entrer votre prenom" aria-label="Prenom" aria-describedby="basic-addon1">
                                                 </div>
                                            </div>
										
											<div class="col-md-7 ">
                                                <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Nom :</span>
                                                </div>
                                                <input type="text" name="nomU" class="form-control " placeholder="Entrer votre nom" aria-label="nom" aria-describedby="basic-addon1">
                                                 </div>
                                            </div>
											
											<div class="col-md-7 ">
                                                <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Date de naissance : :</span>
                                                </div>
                                                <input type="text" name="dtNU" class="form-control " placeholder="aaaa-mm-jj" aria-label="age" aria-describedby="basic-addon1">

                                                 </div>
                                            </div>
											
											<div class="col-md-8 ">
                                                <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Adresse mail :</span>
                                                </div>
                                                <input type="text" name="mailU" class="form-control " placeholder="ex : coby.bernard@xyz.com" aria-label="mail" aria-describedby="basic-addon1">

                                                 </div>
                                            </div>

                                            <div class="col-md-10 ">

                                                <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Mot de passe :</span>
                                                </div>

                                                <input type="text" name="mdpU" class="form-control " placeholder="Entrer un mot de passe" aria-label="Mdp" aria-describedby="basic-addon1">

                                                 </div>
                                            </div>
                                        
                                        
                                            <div class="col-md-10">
                                                <a href="profilEdit.php"><button type="submit" class="btn  btn-success btn-block">Confirmer</button></a> 
                                            </div>
                                        </div>
                                    </form>
                                    
                                <br>                                             
';
 ?>
 
<!-- création profile -->
 <?php
	
if(!empty($_POST['mdpU']) && !empty($_POST['nomU'])&& !empty($_POST['prenomU']) && !empty($_POST['pseudoU']) && !empty($_POST['dtNU']) && !empty($_POST['mailU'])){
	$mdp = $_POST['mdpU'];
	$nom = $_POST['nomU'];
    $prenom = $_POST['prenomU'];
    $pseudo = $_POST['pseudoU'];
	$dtN = $_POST['dtNU'];
    $mail = $_POST['mailU'];
	
	$sql = "INSERT INTO personne (nomUtilisateur, nom, prenom,dtN,mail,mdp,photoProfil) VALUES ('".$pseudo."', '".$nom."','".$prenom."', '".$dtN."','".$mail."','".$mdp."',' ')";
	
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
		/*echo '<div class="alert alert-warning" role="alert">
		Profil mis à jour
		  </div>' ;*/

	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
	}
else{
	echo '<div class="alert alert-warning" role="alert">
							Veuillez remplir tout les champs requis.
                            </div>' ;
}
	// photo de profil
	
	
	   if(!empty($_FILES['photo']['tmp_name'])){
            $target_dir = "uploads/pp/";
            $target_file = $target_dir . uniqid() .basename($_FILES["photo"]["name"]) ; 
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            //echo $imageFileType ;
            //echo $target_file;

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

                            /*echo '<div class="alert alert-warning" role="alert">
                            La photo a bien été envoyée.
                            </div>' ;*/

                            //echo '<img src="' .$target_file . '">';

                            //echo'<p>'. $target_file .'<p>';
                               
                                $photo = $target_file;

                                $sql3 = "Update personne set photoProfil ='".$target_file."' where nom ='".$nom."';";

                                //$sql = " INSERT INTO publication ( titre, description, user, photo) VALUES ('".$titre."', '".$description."', '".$user."',  '".$photo."') ;";
                                //echo $sql3 ;
                            
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
                                Profil crée avec succès
                                </div>' ;
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                            $conn->close();
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
</body>

</html>