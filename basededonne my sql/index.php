<?php
	session_start();
	$_SESSION['authentification'] = '';
	$_SESSION['pseudo_pris'] = '';
	$_SESSION['pseudo_pris_style'] = '';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style.css" />
		<title>Bienvenue</title>
	</head>
	<body>
		<div id="en_tete">
			<h1>Bienvenue</h1>
			<p>Ici c'est la gestion des personnes et voitures</p>
		</div>
		<div id="corps">
			<p id="demande">Veuillez vous connecter ou vous inscrire</p>
			<p class="choix"><a class='index' href="connexion.php">Se connecter</a></p>
			<p class="choix"><a class='index' href="inscription.php">S'inscrire</a></p>
		</div>
	</body>
</html>