<?PHP
include_once "config.php";
include_once "cores/CadeauC.php";
$Cadeau1C=new CadeauC();
$listeCadeaus=$Cadeau1C->afficherCadeaus();

//var_dump($listeCadeaus->fetchAll());
foreach($listeCadeaus as $row){
	?>
	<tr>
		<td></td>
	<td><?PHP echo $row['id_cadeau']; ?></td>
	<td><?PHP echo $row['type']; ?></td>
	<td><?PHP echo $row['prix']; ?></td>
	<td><?PHP echo $row['quantite']; ?></td>
	<td><form method="POST" action="views/supprimerCadeau.php">
	<input type="submit" name="supprimer" class="btn btn-danger" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['id_cadeau']; ?>" name="id_cadeau">
	</form>
	</td>
	<td><a href="modifierCadeau.php?id_cadeau=<?PHP echo $row['id_cadeau']; ?>">
	<input type="button" name="" class="btn btn-warning" value="Modifier"></a></td>
	</tr>
	
	<?PHP
}
?>
