# Projet_web
Création d'un site web dans un projet d'étude deuxieme année 
<?PHP
include_once "config.php";
include_once "cores/type_fournisseurC.php";
$type_fournisseur1C=new type_fournisseurC();
$listetype_fournisseurs=$type_fournisseur1C->affichertype_fournisseur();

foreach($listetype_fournisseurs as $row){
	?>
	<tr>
	<td><?PHP echo ""; ?></td>
	<td><?PHP echo $row['id_type']; ?></td>
	<td><?PHP echo $row['type']; ?></td>
	<td><form method="POST" action="views/supprimertype_fournisseur.php">
	<input type="submit" name="supprimer" class="btn btn-danger" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['id_type']; ?>" name="id_type">
	</form>
	</td>
	<td><a href="modifiertype_fournisseur.php?id=<?PHP echo $row['id_type']; ?>">
	<input type="button" name="" class="btn btn-warning" value="Modifier"></a></td>
	</tr>
	<?PHP
}
?>
</table>

