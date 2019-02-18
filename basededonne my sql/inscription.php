<?php
	session_start();
	$_SESSION['conn_insc'] = 'insc';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>S'inscrire</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<div id="en_tete">
			<h2>Inscription</h2>
		</div>
		<div id="corps">
			<p id="demande">Veuillez saisir vos informations</p>
			<form id="inscription" method="post" action="accueil.php">
				<p>
					<label for="nom">Votre nom</label>
					<input type="text" name="nom" id="nom" placeholder="Ex : Dupont" size="40" autocomplete="off" required />
				</p>
				<p>
					<label for="prenom">Votre prénom</label>
					<input type="text" name="prenom" id="prenom" placeholder="Ex : Jean" size="40" autocomplete="off" required />
				</p>
				<p>
					<label for="adresse">Votre adresse</label>
					<input type="text" name="adresse" id="adresse" placeholder="Ex : Rue du Paradis" size="40" autocomplete="off" required />
				</p>
				<p>
					<label for="cin">Votre C.I.N</label>
					<input type="text" name="cin" id="cin" placeholder="Ex : 123456789012" size="40" autocomplete="off" required />
				</p>
				<p>
					<label for="pseudo">Votre pseudo (pour vous connecter)</label>
					<input type="text" name="pseudo" id="pseudo" placeholder="Ex : JDup" size="40" autocomplete="off" required />
					<label id="pseudo_pris" for="pseudo" <?php if (isset($_SESSION['pseudo_pris_style'])) echo $_SESSION["pseudo_pris_style"]; ?>><?php if (isset($_SESSION['pseudo_pris'])) echo $_SESSION["pseudo_pris"]; ?></label>
				</p>
				<p>
					<label for="password">Votre mot de passe</label>
					<input type="password" name="password" id="password" size="40" required />
				</p>
				<p>
					<input type="submit" value="OK" />
				</p>
			</form>
			<p id="retour"><a class="retour" href="index.php">Retour</a></p>
		</div>
	</body>
</html>