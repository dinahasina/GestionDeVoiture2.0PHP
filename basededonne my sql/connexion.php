<?php
	session_start();
	$_SESSION['conn_insc'] = 'conn';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Se connecter</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<div id="en_tete">
			<h2>Connexion</h2>
		</div>
		<div id="corps">
			<form method="post" action="accueil.php">
				<p>
					<label for="pseudo">Votre pseudo :</label><br/>
					<input type="text" name="pseudo" id="pseudo" size="30" autocomplete="off" required />
				</p>
				<p>
					<label for="password">Votre mot de passe :</label><br/>
					<input type="password" name="password" id="password" size="30" required />
				</p>

				<p id='authentification'><?php if (isset($_SESSION['authentification'])) echo $_SESSION['authentification'];?></p> 

				<p>
					<input type="submit" value="OK" />
				</p>
			</form>
			<p id='retour'><a class="retour" href="index.php">Retour</a></p>
		</div>
	</body>
</html>