<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=enregistrement;charset=utf8', 'root', '');
	$personnes = $bdd -> query('SELECT * FROM personne');
	$pseudo_pris = false;
	while ($personne = $personnes -> fetch())
	{
		if ($_POST['pseudo'] == $personne['pseudo'] AND $personne['id'] != $_SESSION['id'])
		{
			$_SESSION['pseudo_pris_modif'] = '"' . $_POST['pseudo'] . '" : Pseudo déjà pris. Réessayez.';
			$pseudo_pris = true;
			header('Location: profil.php');
			break;
		}
	}
	if (!$pseudo_pris)
	{
		$requete = $bdd -> prepare('UPDATE personne SET nom=:nom, prenom=:prenom, adresse=:adresse, cin=:cin, pseudo=:pseudo, password=:password WHERE id=:id');
		$requete -> execute(array(
			'nom' => $_POST['nom'],
			'prenom' => $_POST['prenom'],
			'adresse' => $_POST['adresse'],
			'cin' => $_POST['cin'],
			'pseudo' => $_POST['pseudo'],
			'password' => $_POST['password'],
			'id' => $_SESSION['id']
		));
		$_SESSION['prenom'] = $_POST['prenom'];
	}
	header('Location: accueil.php');
?>