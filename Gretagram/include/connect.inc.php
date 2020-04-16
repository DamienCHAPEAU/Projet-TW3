<?php 
	/* Fichier de connexion à la base de données */

	$host='localhost';
	$user='root';
	$pass='';
	$dbname='DB_WEB';
	
	try{

		$conn = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=UTF8',$user,$pass,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

	}catch(PDOException $e){
		echo "Erreur: ".$e->getMessage()."</br>";
		die();
	}

?>

