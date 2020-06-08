# Projet_web
Création d'un site web dans un projet d'étude deuxieme année 
<?PHP
include_once "../config.php";
include_once "../entities/sponsor.php";
include_once "../cores/sponsorC.php";
/*$image = file_get_contents($_FILES['image']['tmp_name']);*/
$sponsor1 = new sponsor($_POST['Nom'],$_POST['prenom'],$_POST['adresse']);

$sponsor1C=new sponsorC();
$sponsor1C->ajoutersponsor($sponsor1);
header('Location: ../sponsor.php');
//*/

?>
