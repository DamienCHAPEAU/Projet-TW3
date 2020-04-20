<!-- W3hubs.com - Download Free Responsive Website Layout Templates designed on HTML5 CSS3,Bootstrap which are 100% Mobile friendly. w3Hubs all Layouts are responsive cross browser supported, best quality world class designs. -->
<!DOCTYPE html>
<html>
<head>
	<title>Instagram Mobile Login Page In Bootstrap 4 - W3hubs.com</title>
	<meta charset="utf-8">
	<meta name="description" content="w3hubs.com">
  <meta name="author" content="w3hubs.com">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/styleHome.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
    include("include/connect.inc.php");
    ?>

</head>
<body>
	<section id="">
		<div class="container">
		
			<h1>Gretagram</h1>
			<form action="#" method="POST">
			 <div class="form-group">
			   
			    <input type="name" name="login" class="form-control" placeholder="Phone number,username, or email test : Coby | Coby">
			  </div>
			  <div class="form-group">
			   
			    <input type="password" name="mdp" class="form-control" placeholder="Password">
			  </div>
			  <input type="submit" class="btn btn-primary" value="Log In">
			</form>
			<h4>OR</h4>
			
			<p><a href="#">Forget Password</a></p>
</div>
			<div class="box">
				<p>Don't have account? <a href="create.php">Sign up</a></p>
			</div>
		
	
	</section>
	
	<?php
// On définit un login et un mot de passe de base pour tester notre exemple. Cependant, vous pouvez très bien interroger votre base de données afin de savoir si le visiteur qui se connecte est bien membre de votre site

if(!empty($_GET['message'])){

	echo '<div class="alert alert-warning" role="alert">
	Erreur de connexion !
	  </div>' ;

}

$host_name = "localhost";
$database = "db_web";
$db_user_name = "root";
$db_password = "";
// connexion
$link = mysqli_connect($host_name, $db_user_name, $db_password, $database);

/* Vérification de la connexion */
if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
}else{
	//echo "connected";
}


// on teste si nos variables sont définies
	if (isset($_POST['login']) && isset($_POST['mdp'])) {

				$query = "Select * FROM personne where nom = " . "'" . $_POST['login'] . "'" . " and mdp =" . "'" .$_POST['mdp']."'"." ;";
				$result = mysqli_query($link,$query);
				//echo $query;
				$rows = mysqli_num_rows($result);
					
				// on vérifie si la requete donne un resultat
				if ($rows==1) {
					// dans ce cas, tout est ok, on peut démarrer notre session

					// on la démarre :)
					session_start ();
					// on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
					$_SESSION['login'] = $_POST['login'];
					$_SESSION['mdp'] = $_POST['mdp'];

					// on redirige notre visiteur vers une page de notre section membre
					header ('location: index.php');
				}
				else {
					//echo $query;
					//echo $rows;
					// Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
					//echo '<body onLoad="alert(\'Membre non reconnu...\')">';

					echo '<div class="alert alert-warning" role="alert">
					Erreur de connexion !
				 	 </div>' ;

					// puis on le redirige vers la page d'accueil
					//echo '<meta http-equiv="refresh" content="0;URL=login.php">';
				}
			
			}
			else {
				//echo 'Les variables du formulaire ne sont pas déclarées.';
			}

	
?>


</body>
</html>