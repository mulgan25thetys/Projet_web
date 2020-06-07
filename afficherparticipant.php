# Projet_web
Création d'un site web dans un projet d'étude deuxieme année 

?PHP
include_once "config.php";
include_once "cores/participantC.php";
$participant1C=new participantC();
$listeparticipants=$participant1C->afficherparticipant();

foreach($listeparticipants as $row){
	?>
	<tr>
	<td><?PHP echo ""; ?></td>
	<td><?PHP echo $row['code_client']; ?></td>
	<td><?PHP echo $row['id_event']; ?></td>
	<td><form method="POST" action="views/supprimerparticipant.php">
	<input type="submit" name="supprimer" class="btn btn-danger" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['code_client']; ?>" name="code_client">
	</form>
	</td>
	</tr>
	<?PHP
}
?>
</table>
