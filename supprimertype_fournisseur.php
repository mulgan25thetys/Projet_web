# Projet_web
Création d'un site web dans un projet d'étude deuxieme année 
<?PHP
include_once "../config.php";
include_once "../cores/type_fournisseurC.php";
$type_fournisseurC=new type_fournisseurC();
	$type_fournisseurC->supprimertype_fournisseur($_POST["id_type"]);
	header('Location: ../type_fournisseur.php');

?>
