# Projet_web
Création d'un site web dans un projet d'étude deuxieme année 

<?PHP
include_once "../config.php";
include_once "../entities/reclamation.php";
include_once "../cores/reclamationC.php";
/*$image = file_get_contents($_FILES['image']['tmp_name']);*/
$reclamation1 = new reclamation($_POST['Nom'],$_POST['Email'],$_POST['Libelle'],$_POST['Objet'],$_POST['Date'],$_POST['Etat']);

$reclamation1C=new reclamationC();
$reclamation1C->ajoutereclamation($reclamation1);
header('Location: ../reclamation.php');
//*/

?>
