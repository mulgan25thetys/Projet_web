# Projet_web
Création d'un site web dans un projet d'étude deuxieme année 
<?PHP
include_once "config.php";
include_once "cores/publiciteC.php";
$publicite1C=new publiciteC();
$listepublicites=$publicite1C->afficherpublicite();

foreach($listepublicites as $row){
	?>
	<tr>
	<td><a href="apercu.php?id_img=<?PHP echo $row['id_pub']; ?>" target=_blanc><img src="apercu.php?id_img=<?PHP echo $row['id_pub']; ?>" class="image"></a></td>
	<td><?PHP echo $row['id_pub']; ?></td>
	<td><?PHP echo $row['titre']; ?></td>
	<td><?PHP echo $row['description']; ?></td>
	<td><form method="POST" action="views/supprimerpublicite.php">
	<input type="submit" name="supprimer" class="btn btn-danger" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['id_pub']; ?>" name="id_pub">
	</form>
	</td>
	<td><a href="modifierpublicite.php?id=<?PHP echo $row['id_pub']; ?>">
	<input type="button" name="" class="btn btn-warning" value="Modifier"></a></td>
	</tr>
	<?PHP
}
?>
</table>

