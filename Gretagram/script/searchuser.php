<?php
include("../include/connect.inc.php");
echo '<ul style=" border-width:2px; border-style:dotted; border-color:black; width:200px; margin-right:200px; margin-left:20px ; margin-top: -8px;  position: absolute; background: #fff; max-height: 225px;" >';
if (isset($_GET['user'])) {
    $user = trim($_GET['user']);    
    
    $req = $conn->prepare("SELECT * FROM personne WHERE nom LIKE ? LIMIT 10");
    $req->execute(array("$user%"));    

    while ($reqdata = $req->fetch()) {
        
        $nom = $reqdata['nom'];
        $prenom = $reqdata['prenom'];         
       echo '<button class="btn" style="margin-left:-20px"><div><li><a href="profil.php?nom=' .$nom . '">' . $prenom . ' ' . $nom . '</a></li></div></button>';
    }

    echo '<button class="btn"style="margin-left:-20px"><div><li><a href="searchPost.php?mot='.$user.'"> mot clé : ' . $user . '</a></li></div></button></ul>';
}
