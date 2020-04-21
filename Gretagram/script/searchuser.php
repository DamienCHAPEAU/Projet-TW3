<?php
include("../include/connect.inc.php");
if (isset($_GET['user'])) {
    $user = trim($_GET['user']);    
    
    $req = $conn->prepare("SELECT * FROM personne WHERE nom LIKE ? LIMIT 10");
    $req->execute(array("$user%"));    

    while ($reqdata = $req->fetch()) {
        
        $nom = $reqdata['nom'];
        $prenom = $reqdata['prenom'];         
       echo '<li><a href="http://gretagram/profil.php?nom=' . $nom . '">' . $prenom . ' ' . $nom . '</a></li>';
    }
}
