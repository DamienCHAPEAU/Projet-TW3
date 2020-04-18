<?php
include("../include/connect.inc.php");

if(isset($_GET['id']) AND !empty ($_GET['id'])){
    $getid = $_GET['id'];
    $personneid = 0;
    $check = $conn->prepare('SELECT id FROM publication WHERE id=?');
    $check->execute(array($getid));

    if($check->rowCount()==1){

        $check_like = $conn->prepare('SELECT id FROM jaime WHERE id_article = ? AND id_personne= ?');
        $check_like->execute(array($getid,$personneid));
        if($check_like->rowCount()==1){
            $del = $conn->prepare('DELETE FROM jaime WHERE id_article = ? AND id_personne = ?');
            $del->execute(array($getid, $personneid));
        }
        else{
            $ins = $conn->prepare('INSERT INTO jaime (id_article, id_personne) VALUES (?, ?)');
            $ins->execute(array($getid, $personneid));
        }

        header('Location: '.$_SERVER['HTTP_REFERER']);
    }
}
