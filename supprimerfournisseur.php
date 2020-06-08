# Projet_web
Création d'un site web dans un projet d'étude deuxieme année 
<?PHP
include_once "../config.php";
include_once "../cores/fournisseurC.php";
$fournisseurC=new fournisseurC();
	$fournisseurC->supprimerfournisseur($_POST["id_fournisseur"]);
	header('Location: ../fournisseur.php');

?>
