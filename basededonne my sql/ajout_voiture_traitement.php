<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=enregistrement;charset=utf8','root','');
	$req = $bdd -> prepare('INSERT INTO voiture (marque, modele, immatriculation, id_personne) VALUES(?, ?, ?, ?)');
	$req -> execute(array($_POST['marque'], $_POST['modele'], $_POST['immatriculation'], $_SESSION['id']));
	header('Location: ajout_voiture.php');
?>