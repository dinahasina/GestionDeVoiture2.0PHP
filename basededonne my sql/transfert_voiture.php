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
	$personnes = $bdd -> query('SELECT * FROM personne');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Transfert de voiture</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="en_tete">
		<h2>Transfert de voiture</h2>
	</div>
	<div id="corps">
	<div class="transfert_tout">
	<div class="liste_voitures">
		<p id="demande">Voici la liste de vos voitures :</p>
		<?php
		if (!$voiture_existe)
			echo "<p>Vous n'avez pas encore de voiture.</p>";
		else{
		echo "<p>Sélectionnez les voitures que vous voulez transférer :</p>";
		echo '<div id="voitures">';
		echo '<form method="post" action="transfert_voiture_traitement.php">';
		while ($ma_voiture = $mes_voitures -> fetch()){
		?>
			<div class="transfert_tableau_voiture">
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
				<p>
					<input type="checkbox" name="<?php echo $ma_voiture['id'];?>"  />
				</p>
			</div>
		<?php
		}
		echo '</div></div>';
		echo '<div class="transfert_formulaire">';
		echo '<p id="demande">Sélectionnez la personne à qui transférer les voitures :</p>';
		echo '<div id="personnes">';
		echo '<div id=bloc_personnes>';
		while ($personne = $personnes -> fetch()){
			if ($personne['id'] != $_SESSION['id']){
		?>
			<p id="personne<?php echo $personne['id'];?>">
				<input type="radio" id="<?php echo $personne['id']?>" name="personne" value="<?php echo $personne['id'];?>" required/>
				<label for="<?php echo $personne['id'];?>"><?php echo $personne['prenom'] . ' ' . $personne['nom'];?></label>
			</p>
		<?php
		}}
		echo '</div></div>';
		echo '<p><input type="submit" value="Transférer" /></p>';
		echo '</div>';
		?>
		</form>
		</div>
		<?php
		}
		?>
		<p id="retour"><a class="retour" href="accueil.php">Retour</a></p>
	</div>
	</div>
</body>
</html>