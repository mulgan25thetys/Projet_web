# Projet_web
Création d'un site web dans un projet d'étude deuxieme année 
<?PHP
include_once "../config.php";
include_once "../entities/publicite.php";
include_once "../cores/publiciteC.php";
$image = file_get_contents($_FILES['image']['tmp_name']);
$publicite1 = new publicite($_POST['Titre'],$_POST['Description'],$image);

$publicite1C=new publiciteC();
$publicite1C->ajoutpublicite($publicite1);
header('Location: ../publicite.php');
//

?>
