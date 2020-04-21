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


<?php
include("../include/connect.inc.php");

if(isset($_GET['author']) AND !empty ($_GET['author'])){
    $getid = $_GET['author'];
    $nompersonne = $_SESSION['login'];
    //echo $nompersonne;
    $check = $conn->prepare('SELECT nom FROM personne WHERE nom=?');
    $check->execute(array($getid));

    if($check->rowCount()==1){

        $check_abo = $conn->prepare('SELECT id FROM abonnement WHERE nom_suivi = ? AND userAbonn= ?');
        $check_abo->execute(array($getid,$nompersonne));
        if($check_abo->rowCount()==1){

            $del = $conn->prepare('DELETE FROM abonnement WHERE nom_suivi = ? AND userAbonn= ?');
            $del->execute(array($getid, $nompersonne));
        }
        else{
            $ins = $conn->prepare('INSERT INTO abonnement (nom_suivi, userAbonn) VALUES (?, ?)');
            $ins->execute(array($getid, $nompersonne));
        }

        header('Location: '.$_SERVER['HTTP_REFERER']);
    }
}