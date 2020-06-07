# Projet_web
Création d'un site web dans un projet d'étude deuxieme année 

<?PHP
include_once "../config.php";
include_once "../entities/participant.php";
include_once "../cores/participantC.php";
/*$image = file_get_contents($_FILES['image']['tmp_name']);*/
$participant1 = new participant($_POST['code_client'],$_POST['id_event']);

$participant1C=new participantC();
$participant1C->ajouterparticipant($participant1);
header('Location: ../participant.php');
//*/

?>
