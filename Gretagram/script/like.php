<?php
include("../include/connect.inc.php");

if(isset($_GET['id']) AND !empty ($_GET['id'])){
    $getid = $_GET['id'];
    $nompersonne = $_GET['nom'];
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
