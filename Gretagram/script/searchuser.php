<?php
include("../include/connect.inc.php");
if (isset($_GET['user'])) {
    $user = trim($_GET['user']);    
    
    $req = $conn->prepare("SELECT * FROM personne WHERE nom LIKE ? LIMIT 10");
    $req->execute(array("$user%"));    

    while ($reqdata = $req->fetch()) {
        
        $nom = $reqdata['nom'];
        $prenom = $reqdata['prenom'];         
       echo '<ul style="border-width:2px; border-style:dotted; border-color:black; margin-right:-12; margin-top: -8;  position: absolute; background: #fff; max-height: 225px;" ><button class="btn"><div><li><a href="profil.php?nom=' .$nom . '">' . $prenom . ' ' . $nom . '</a></li></div></button></ul>';
    }
}
