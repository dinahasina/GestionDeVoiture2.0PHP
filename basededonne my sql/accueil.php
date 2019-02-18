<?php 
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=enregistrement;charset=utf8', 'root', '');
	$personnes = $bdd -> query('SELECT * FROM personne');
	if ($_SESSION['conn_insc']=='insc')
	{
		$pseudo_pris = false;
		while ($personne = $personnes -> fetch())
		{
			if ($_POST['pseudo'] == $personne['pseudo'] OR $_POST['pseudo'] == 'root')
			{
				$_SESSION['pseudo_pris'] = '"' . $_POST['pseudo'] . '" : Pseudo déjà pris. Réessayez.';
				$_SESSION['pseudo_pris_style'] ="style='display: block'";
				$pseudo_pris = true;
				header('Location: inscription.php');
				break;
			}
		}
		if (!$pseudo_pris)
		{
			$requete = $bdd -> prepare('INSERT INTO personne(nom, prenom, adresse, cin, pseudo, password) VALUES(:nom, :prenom, :adresse, :cin, :pseudo, :password)');
			$requete -> execute(array(
				'nom' => $_POST['nom'],
				'prenom' => $_POST['prenom'],
				'adresse' => $_POST['adresse'],
				'cin' => $_POST['cin'],
				'pseudo' => $_POST['pseudo'],
				'password' => $_POST['password']
			));
			$personnes = $bdd -> query('SELECT * FROM personne');
			while ($personne = $personnes -> fetch())
			{
				if ($_POST['pseudo'] == $personne['pseudo'])
				{
					$_SESSION['prenom'] = $personne['prenom'];
					$_SESSION['id'] = $personne['id'];
					break;
				}
			}
		}
	}
	else if ($_SESSION['conn_insc'] == 'conn')
	{	
		$pseudo = $_POST['pseudo'];
		$password = $_POST['password'];
		$authentification = false;
		while ($personne = $personnes -> fetch())
		{
			if ($pseudo == $personne['pseudo'] AND $password == $personne['password'])
			{
				$authentification = true;
				$_SESSION['prenom'] = $personne['prenom'];
				$_SESSION['id'] = $personne['id'];
				break;
			}
		}
		if (!$authentification)
		{
			if ($pseudo == 'root' AND $password == 'root')
				header('Location: root.php');
			else{
				$_SESSION['authentification'] = 'Le pseudo ou le mot de passe est incorrect.';
				header('Location: connexion.php');
			}
		}
	}
	$personnes -> closeCursor();
	$_SESSION['conn_insc'] = '';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Accueil</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<div id="en_tete">
			<h1>Accueil</h1>
			<p>Bonjour <?php echo $_SESSION['prenom']; ?></p>
		</div>
		<div id="corps">
			<p id="demande">Que voulez-vous faire :</p>
			<div id="liste_choix">
				<p class="choix"><a class="choix_accueil" href="personnes.php">Voir les personnes inscrites et leurs voitures</a></p>
				<p class="choix"><a class="choix_accueil" href="ajout_voiture.php">Ajouter une voiture</a></p>
				<p class="choix"><a class="choix_accueil" href="transfert_voiture.php">Transférer une voiture</a></p>
				<p class="choix"><a class="choix_accueil" href="suppression.php">Supprimer une voiture</a></p>
				<p class="choix"><a class="choix_accueil" href="profil.php">Modifier son profil</a></p>
				<p class="choix"><a class="choix_accueil" href="quitter.php">Se supprimer de l'enregistrement</a></p>
				<p class="choix"><a class="choix_accueil" href="index.php">Quitter votre session</a></p>
			</div>
		</div>
	</body>
</html>