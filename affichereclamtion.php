# Projet_web
Création d'un site web dans un projet d'étude deuxieme année 

<?PHP
include_once "config.php";
include_once "cores/reclamationC.php";
$reclamation1C=new reclamationC();
$listereclamations=$reclamation1C->afficherreclamation();

foreach($listereclamations as $row){
	?>
	<tr>
	<td><?PHP echo ""; ?></td>
	<td><?PHP echo $row['id_reclamation']; ?></td>
	<td><?PHP echo $row['nom']; ?></td>
	<td><?PHP echo $row['email']; ?></td>
	<td><?PHP echo $row['libelle']; ?></td>
	<td><?PHP echo $row['objet']; ?></td>
	<td><?PHP echo $row['date_reclamation']; ?></td>
	<td><?PHP 
	if ($row['etat']==0) {
		?>
		<span class="badge badge-warning">En attente</span>
		<?php
	}
	elseif ($row['etat']==1) {
		?>
		<span class="badge badge-success">Acceptée</span>
		<?php
	}
	else{
	?>
		<span class="badge badge-danger">Rejeté</span>
		<?php } ?></td>
	</td><?PHP 
	if ($row['etat']==0) {
		?>
	<td><a href="etatreclamation.php?id=<?PHP echo $row['id_reclamation']; ?>&etat=2&email=lesliebrielle.yepdomonthe@esprit.tn">
	<input type="button" name="" class="btn btn-danger" value="Rejeter"></a></td>
	<td><a href="etatreclamation.php?id=<?PHP echo $row['id_reclamation']; ?>&etat=1&email=lesliebrielle.yepdomonthe@esprit.tn">
	<input type="button" name="" class="btn btn-primary" value="Accepter"></a></td>
	</tr>
	<?PHP
}else{ ?>
	<td><form method="POST" action="views/supprimerreclamation.php">
	<input type="submit" name="supprimer" class="btn btn-danger" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['id_reclamation']; ?>" name="id_reclamation">
	</form>
	</td>
	<?php
}
}
?>
</table>
