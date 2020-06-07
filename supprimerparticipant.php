# Projet_web
Création d'un site web dans un projet d'étude deuxieme année 

<?PHP
include_once "../config.php";
include_once "../cores/participantC.php";
$participantC=new participantC();
	$participantC->supprimerparticipant($_POST["code_client"]);
	header('Location: ../participant.php');

?>
