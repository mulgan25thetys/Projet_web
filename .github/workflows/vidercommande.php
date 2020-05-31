<?php
  if (isset($_GET['vider'])) {
       include 'ligne_commandecore.php';
       $comdc=new lignecommandecore();
       $comdc->vidercommande();
       header('Location: tablescommandes.php');
   }
?>