<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=enregistrement;charset=utf8', 'root', '');
	$voitures = $bdd -> prepare('SELECT * FROM voiture WHERE id_personne=?');
	$voitures -> execute(array($_SESSION["id"]));
	$voitures_copie = $bdd -> prepare('SELECT * FROM voiture WHERE id_personne=?');
	$voitures_copie -> execute(array($_SESSION["id"]));
	$voiture_existe = false;
	if ($test = $voitures_copie -> fetch())
		$voiture_existe = true;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Suppression de voiture</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="en_tete">
		<h2>Suppression de voiture</h2>
	</div>
	<div id="corps">
		<p id="demande">Sélectionnez les voitures à supprimer :</p>
		<?php
		if (!$voiture_existe){
			echo '<p>Vous n\'avez pas encore de voiture.</p>';
		}
		else{
			echo '<form method="post" action="suppression_traitement.php">';
			echo '<div id="voitures">';
			while ($voiture = $voitures -> fetch()){
		?>
		<div class="tableau_voiture">
			<table>
				<tr>
					<th>Marque</th>
					<th>Modèle</th>
					<th>Immatriculation</th>
				</tr>
				<tr>
					<td><?php echo $voiture['marque'];?></td>
					<td><?php echo $voiture['modele'];?></td>
					<td><?php echo $voiture['immatriculation'];?></td>
				</tr>
			</table>
			<p>
				<input type="checkbox" name=<?php echo '"'.$voiture["id"].'"';?> />
			</p>
		</div>
		<?php
		}
		echo '</div>';
		echo '<p><input type="submit" value="Supprimer" /></p>';
		echo '</form>';
		}
		?>
		<p id='retour'><a class='retour' href="accueil.php">Retour</a></p>
	</div>
</body>
</html>