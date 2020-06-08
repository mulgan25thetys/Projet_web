# Projet_web
Création d'un site web dans un projet d'étude deuxieme année 
<?PHP

include "../config.php";
include "../entities/sponsor.php";
include "../cores/sponsorC.php";
$id_sponsor=$_GET['id'];
if (isset($_POST['modif'])){
  $sponsorC=new sponsorC();
  //if (isset($_FILES['image'])){$image = file_get_contents($_FILES['image']['tmp_name']);}
  $sponsor=new sponsor($_POST['nom'],$_POST['prenom'],$_POST['adresse']);
  $sponsorC->modifiersponsor($sponsor,$id_sponsor);
  header('Location: ../sponsor.php');
}
?>
