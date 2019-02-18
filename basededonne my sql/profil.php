<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=enregistrement;charset=utf8', 'root', '');
	$personnes = $bdd -> prepare('SELECT * FROM personne WHERE id=?');
	$personnes -> execute(array($_SESSION["id"]));
	$personne = $personnes -> fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modification profil</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="en_tete">
		<h2>Modification du profil</h2>
	</div>
	<div id="corps">
		<p id="demande">Modifiez les champs des caractéristiques de votre profil :</p>
		<form method="post" action="profil_traitement.php">
			<p>
				<label for="nom">Votre nom :<br/></label>
				<input type="text" name="nom" id="nom" value=<?php echo $personne["nom"];?> size="40" autocomplete="off" required />
			</p>
				<label for="prenom">Votre prénom :<br/></label>
				<input type="text" name="prenom" id="prenom" value=<?php echo $personne["prenom"];?> size="40" autocomplete="off" required />
			<p>
			</p>
				<label for="adresse">Votre adresse :<br/></label>
				<input type="text" name="adresse" id="adresse" value=<?php echo $personne["adresse"];?> size="40" autocomplete="off" required />
			<p>
			</p>
				<label for="cin">Votre C.I.N :<br/></label>
				<input type="text" name="cin" id="cin" value=<?php echo $personne["cin"];?> size="40" autocomplete="off" required/>
			<p>
			</p>
				<label for="pseudo">Votre pseudo (pour vous connecter) :<br/></label>
				<input type="text" name="pseudo" id="pseudo" value=<?php echo $personne["pseudo"];?> size="40" autocomplete="off" required />
				<label for="pseudo"><?php if (isset($_SESSION['pseudo_pris_modif'])) echo $_SESSION['pseudo_pris_modif']; ?></label>
			<p>
			</p>
				<label for="password">Votre mot de passe :<br/></label>
				<input type="text" name="password" id="password" value=<?php echo $personne["password"];?> size="40" autocomplete="off" required />
			<p>
				<input type="submit" value="Modifier" />
			</p>
		</form>
		<p id="retour"><a class="retour" href="accueil.php">Retour</a></p>
	</div>
</body>
</html>