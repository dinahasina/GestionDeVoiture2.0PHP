<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=enregistrement;charset=utf8', 'root', '');
	$req = $bdd -> prepare('DELETE FROM voiture WHERE id=?');
	$voitures = $bdd -> prepare('SELECT * FROM voiture WHERE id_personne=?');
	$voitures -> execute(array($_SESSION["id"]));
	while ($voiture = $voitures -> fetch()){
		if ($_POST[$voiture["id"]]){
			$req -> execute(array($voiture["id"]));
		}
	}
	header('Location: suppression.php');
?>