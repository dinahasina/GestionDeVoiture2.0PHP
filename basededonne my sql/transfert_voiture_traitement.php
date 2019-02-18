<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=enregistrement;charset=utf8', 'root', '');
	$mes_voitures = $bdd -> prepare('SELECT * FROM voiture WHERE id_personne=?');
	$mes_voitures -> execute(array(
		$_SESSION['id']));
	$req = $bdd -> prepare('UPDATE voiture SET id_personne=? WHERE id_personne=? AND id=?');
	while ($voiture = $mes_voitures -> fetch()){
		if ($_POST[$voiture['id']]){
			$req -> execute(array(
				$_POST['personne'],
				$_SESSION['id'],
				$voiture['id']
				));
		}
	}
	header('Location: transfert_voiture.php');
?>