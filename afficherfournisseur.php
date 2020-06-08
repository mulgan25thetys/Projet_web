# Projet_web
Création d'un site web dans un projet d'étude deuxieme année 
<?PHP
include_once "config.php";
include_once "cores/fournisseurC.php";
$fournisseur1C=new fournisseurC();
$listefournisseurs=$fournisseur1C->afficherfournisseur();

foreach($listefournisseurs as $row){
	?>
	<tr>
	<td><?PHP echo ""; ?></td>
	<td><?PHP echo $row['id_fournisseur']; ?></td>
	<td><?PHP echo $row['nom']; ?></td>
	<td><?PHP echo $row['prenom']; ?></td>
	<td><?PHP echo $row['adresse']; ?></td>
	<td><?PHP echo $row['email']; ?></td>
    <td><?PHP echo $row['categorie']; ?></td>
	<td><form method="POST" action="views/supprimerfournisseur.php">
	<input type="submit" name="supprimer" class="btn btn-danger" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['id_fournisseur']; ?>" name="id_fournisseur">
	</form>
	</td>
	<td><a href="modifierfournisseur.php?id=<?PHP echo $row['id_fournisseur']; ?>">
	<input type="button" name="" class="btn btn-warning" value="Modifier"></a></td>
	</tr>
	<?PHP
}
?>
</table>
