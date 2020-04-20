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
	echo '<a href="deconnexion.php">Déconnexion</a><br><br>';
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


<?php
    if(!empty($_POST['localisation'])){
            include('script/AbstractGeocoder.php');
            include('script/Geocoder.php');
            // use OpenCage\Geocoder;
            //$query = "82 Clerkenwell Road, London";
            $query =$_POST['localisation'];
            //echo $query." : ";
            $key = "bec909a0b798469dbc78ac4ab5afe18b";
            $geocoder = new OpenCage\Geocoder\Geocoder($key);
            $result = $geocoder->geocode($query);
            //print_r($result['results'][0]);
            $first = ($result['results'][0]);
            //print $first['geometry']['lat'] . ',' . $first['geometry']['lng'] . ' ; ' . $first['formatted'] . "\n";

                $lat = $first['geometry']['lat'];
                $long =$first['geometry']['lng'] ;
                $adrrFormated = $first['formatted'];

                $_SESSION['lat'] = $lat;
                $_SESSION['long'] = $long;
                $_SESSION['adresse'] = $adrrFormated;
    }else {
        header ('location: ajouter.php');
    }
//echo $adrrFormated;

   /* echo '
    <form method="post" action="ajouter.php">
    <input type="text"  name="lat" size="20" maxlength="20" value="'.$lat.'"><br>
    <input type="text"  name="long" size="20" maxlength="20" value="'.$long.'"><br>
    <input type="text"   name="adrr" size="40" maxlength="40" value="'.$adrrFormated.'">
    <input type="submit" name="adresse" class="btn btn-success" value="valider">
    <input type="button" name="adresse" class="btn btn-warning" value="annuler">
    </form>   
    ';*/

?>
    <body>
    <form method="post" action="ajouter.php">
        <input type="text" disabled name="lat" size="20" maxlength="20" value="<?php echo $lat; ?>"><br>
        <input type="text" disabled name="long" size="20" maxlength="20" value="<?php echo $long; ?>"><br>
        <input type="text"   name="adrr" size="100" maxlength="40" value="<?php echo $adrrFormated; ?>">
        <input type="submit" name="adresse" class="btn btn-success" value="valider">
        <a href="ajouter.php"><input type="button" name="adresse" class="btn btn-warning" value="annuler"></a>
    </form>
    </body>
</html>