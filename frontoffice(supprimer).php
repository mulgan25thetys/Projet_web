<?php
include '../core/ligne_commandecore.php';
  	$lignecmdc=new lignecommandecore();
  if (isset($_GET['id'])) {
  	# code...
  	
  	$test=$lignecmdc->supprimerligne($_GET['id']);
  	if ($test==true) {
  		# code...
  		header('Location: afficher.php');
  	}
  }
?>
