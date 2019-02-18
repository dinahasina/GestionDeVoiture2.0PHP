<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=enregistrement;charset=utf8', 'root', '');
	$req = $bdd -> prepare('DELETE from voiture WHERE id_personne=?');
	$req -> execute(array($_SESSION['id']));
	$req = $bdd -> prepare('DELETE from personne WHERE id=?');
	$req -> execute(array($_SESSION['id']));
	header('Location: index.php');
?>