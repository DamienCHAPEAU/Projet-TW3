
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

if(isset($_GET['id']) AND !empty ($_GET['id'])){
    $getid = $_GET['id'];
    $nompersonne = $_SESSION['login'];
    echo $nompersonne;
    $check = $conn->prepare('SELECT id FROM publication WHERE id=?');
    $check->execute(array($getid));

    if($check->rowCount()==1){

        $check_like = $conn->prepare('SELECT id FROM jaime WHERE id_article = ? AND nom_personne= ?');
        $check_like->execute(array($getid,$nompersonne));
        if($check_like->rowCount()==1){
            $del = $conn->prepare('DELETE FROM jaime WHERE id_article = ? AND nom_personne = ?');
            $del->execute(array($getid, $nompersonne));
        }
        else{
            $ins = $conn->prepare('INSERT INTO jaime (id_article, nom_personne) VALUES (?, ?)');
            $ins->execute(array($getid, $nompersonne));
        }

        header('Location: '.$_SERVER['HTTP_REFERER']);
    }
}
