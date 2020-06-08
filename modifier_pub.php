# Projet_web
Création d'un site web dans un projet d'étude deuxieme année 
<?PHP

include "../config.php";
include "../entities/publicite.php";
include "../cores/publiciteC.php";
$id_pub=$_GET['id'];
if (isset($_POST['modif'])){
  $publiciteC=new publiciteC();
  if (isset($_FILES['image'])){$image = file_get_contents($_FILES['image']['tmp_name']);}
  $publicite=new publicite($_POST['Titre'],$_POST['Description'],$image);
  $publiciteC->modifierpublicite($publicite,$id_pub);
  header('Location: ../publicite.php');
}
?>
