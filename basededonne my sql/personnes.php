<?php
	$bdd = new PDO('mysql:host=localhost;dbname=enregistrement;charset=utf8','root','');
	$personnes = $bdd -> query('SELECT * FROM personne');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Liste des personnes</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		<div id="en_tete">
			<h2>Liste des personnes</h2>
			<p>Informations sur les personnes ainsi que leurs voitures</p>
		</div>
		<div id="corps">
			<p id="demande">Voici la liste des personnes :</p>
			<div id="tout">
				<?php
				while ($personne = $personnes -> fetch()) 
				{
				?>
				<div class="personne_voiture">
					<div class="tableau_personne" id=<?php echo '"tableau_personne' . $personne["id"] . '"';?>>
						<table>
							<tr>
								<th>Prénom</th>
								<th>Nom</th>
								<th>Adresse</th>
								<th>C.I.N</th>
							</tr>
							<tr>
								<td><?php echo $personne['prenom'];?></td>
								<td><?php echo $personne['nom'];?></td>
								<td><?php echo $personne['adresse'];?></td>
								<td><?php echo $personne['cin'];?></td>
							</tr>
						</table>
					</div>
					<?php
					$voitures = $bdd -> prepare('SELECT * FROM voiture WHERE id_personne=?');
					$voitures -> execute(array($personne['id']));
					if ($avoir_voiture = $voitures -> fetch())
					{
						$nombre_voiture = 1;
						while ($avoir_voiture = $voitures -> fetch()){
							$nombre_voiture += 1;
						}
					?>
					<input type="button" value="+ voitures<?php echo '(' . $nombre_voiture . ')';?>" id=<?php echo '"bouton' . $personne["id"] . '"';?> />
					<?php
					}
					?>
					<div class="tableau_voiture" id=<?php echo '"tableau_voiture' . $personne["id"] . '"';?>>
						<?php
						$mes_voitures = $bdd -> prepare('SELECT * FROM voiture WHERE id_personne=?');
						$mes_voitures -> execute(array($personne['id']));
						while ($ma_voiture = $mes_voitures -> fetch()) 
						{
						?>
						<div class="voiture" id=<?php echo '"tableau_voiture' . $personne["id"] . $ma_voiture["id"] . '"'; ?>>
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
						?>
					</div>
				</div>
				<script type="text/javascript">
					var bouton<?php echo $personne["id"];?> = document.getElementById(<?php echo '"bouton' . $personne["id"] . '"';?>),
						tableau_voiture<?php echo $personne["id"];?> = document.getElementById(<?php echo '"tableau_voiture' . $personne["id"] . '"';?>);
					tableau_voiture<?php echo $personne["id"];?>.style.display = 'none';
					bouton<?php echo $personne["id"];?>.addEventListener('click', function(){
						if (tableau_voiture<?php echo $personne["id"];?>.style.display == 'none'){
							tableau_voiture<?php echo $personne["id"];?>.style.display = 'block';
							bouton<?php echo $personne["id"];?>.value = '- voitures<?php echo '(' . $nombre_voiture . ')';?>';
						}
						else{
							tableau_voiture<?php echo $personne["id"];?>.style.display = 'none';
							bouton<?php echo $personne["id"];?>.value = '+ voitures<?php echo '(' . $nombre_voiture . ')';?>';
						}
					});
				</script>
				<?php
				}
				?>
			</div>
			<p id="retour"><a class="retour" href="accueil.php">Retour</a></p>
		</div>
	</body>
</html>