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
										<div class="col-md-5">
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
                                                <input type="text" name="pseudoU" class="form-control" value="" aria-label="pseudo" aria-describedby="basic-addon1">
                                                 </div>
                                            </div>
											
                                            <div class="col-md-6 ">

                                                <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Prénom :</span>
                                                </div>
                                                <input type="text" name="prenomU" class="form-control " value="" aria-label="Prenom" aria-describedby="basic-addon1">
                                                 </div>
                                            </div>
										
											<div class="col-md-7 ">
                                                <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Nom :</span>
                                                </div>
                                                <input type="text" name="nomU" class="form-control " value="" aria-label="nom" aria-describedby="basic-addon1">
                                                 </div>
                                            </div>
											
											<div class="col-md-7 ">
                                                <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Age :</span>
                                                </div>

                                             <!--   <input type="text" name="ageU" class="form-control " placeholder="Entrer votre age" aria-label="age" aria-describedby="basic-addon1"> -->

                                                <input type="text" name="ageU" class="form-control " value="" aria-label="age" aria-describedby="basic-addon1">

                                                 </div>
                                            </div>
											
											<div class="col-md-8 ">
                                                <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Adresse mail :</span>
                                                </div>
                                                <input type="text" name="mailU" class="form-control " value="" aria-label="mail" aria-describedby="basic-addon1">

                                                 </div>
                                            </div>

                                            <div class="col-md-10 ">

                                                <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Mot de passe :</span>
                                                </div>

                                                <input type="text" name="mdpU" class="form-control " value="" aria-label="Mdp" aria-describedby="basic-addon1">

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
 
	$mdp = $_POST['mdpU'];
    $nom = $_POST['nomU'];
    $prenom = $_POST['prenomU'];
    $pseudo = $_POST['pseudoU'];
	$age = $_POST['ageU'];
    $mail = $_POST['mailU'];
	
if(!empty($mdp) && !empty($nom)&& !empty($prenom) && !empty($pseudo) && !empty($age) && !empty($mail)){
	
	
	echo "toto";
	
	$sql = "INSERT INTO personne (nomUtilisateur, nom, prenom,dtN,mail,mdp,photoProfil) VALUES ('".$pseudo."', '".$nom."','".$prenom."', '".$age."','".$mail."','".$mdp."',' ')";
	
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