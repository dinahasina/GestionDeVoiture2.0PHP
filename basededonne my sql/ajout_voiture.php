<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=enregistrement;charset=utf8','root','');
	$mes_voitures = $bdd -> prepare('SELECT * FROM voiture WHERE id_personne=?');
	$mes_voitures -> execute(array(
		$_SESSION['id'])); 
	$mes_voitures_copie = $bdd -> prepare('SELECT * FROM voiture WHERE id_personne=?');
	$mes_voitures_copie -> execute(array(
		$_SESSION['id'])); 
	$voiture_existe = false;
	if ($first = $mes_voitures_copie -> fetch())
		$voiture_existe = true;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Ajout de voiture</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		<div id="en_tete">
			<h2>Ajout de voiture</h2>
		</div>
		<div id="corps">
			<div class="ajout_tout">
			<div class="liste_voitures">
			<?php
				if (!$voiture_existe)
					echo '<p id="demande">Vous n\'avez pas encore de voiture.</p>';
				else
				{
					echo '<p id="demande">Voici la liste de vos voitures actuelles :</p>';
					echo '<div class="voitures">';
					while ($ma_voiture = $mes_voitures -> fetch())
					{
			?>
					<div class="tableau_voiture">
						<table>
							<tr>
								<th>Marque</th>
								<th>Modèle</th>
								<th>Immatriculation</th>
							</tr>
							<tr>
								<td><?php echo $ma_voiture['marque'];?></td>
								<td><?php echo $ma_voiture['modele'];?></td>
								<td><?php echo $ma_voiture['immatriculation'];?></td>
							</tr>
						</table>
					</div>
			<?php
					}
				echo '</div>';
				}
			?>
			</div>
			<div class="ajout_formulaire">
			<p id="demande">Remplissez le formulaire :</p>
			<form method="post" action="ajout_voiture_traitement.php">
				<p>
					<label for="marque">Marque de la voiture :</label><br/>
					<input type="text" name="marque" id="marque" placeholder="Ex : Peugeot" size="40" autocomplete="off" required />
				</p>
				<p>
					<label for="modele">Modèle de la voiture :</label><br/>
					<input type="text" name="modele" id="modele" placeholder="Ex : 206" size="40" autocomplete="off" required />
				</p>
				<p>
					<label for="marque">Immatriculation de la voiture :</label><br/>
					<input type="text" name="immatriculation" id="immatriculation" placeholder="Ex : 7777MA" size="40" autocomplete="off" required />
				</p>
				<p>
					<input type="submit" value="Ajouter" />
				</p>
			</form>
			</div>
			</div>
			<p id="retour"><a class="retour" href="accueil.php">Retour</a></p>
		</div>
	</body>
</html> 