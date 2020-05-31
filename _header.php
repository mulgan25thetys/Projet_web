<?php 
 require 'panier.php';
 require 'session_verif_front.php';
 require 'db.class.php';
 $db=new DB();
 
 $panier = new panier($db);

?>
