# Projet_web
Création d'un site web dans un projet d'étude deuxieme année 

<?PHP
include_once "../config.php";
include_once "../cores/reclamationC.php";
$reclamationC=new reclamationC();
	$reclamationC->supprimerreclamation($_POST["id_reclamation"]);
	header('Location: ../reclamation.php');

?>
