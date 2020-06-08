# Projet_web
Création d'un site web dans un projet d'étude deuxieme année 
<?PHP
include_once "../config.php";
include_once "../entities/type_fournisseur.php";
include_once "../cores/type_fournisseurC.php";
/*$image = file_get_contents($_FILES['image']['tmp_name']);*/
$type_fournisseur1 = new type_fournisseur($_POST['type']);

$type_fournisseur1C=new type_fournisseurC();
$type_fournisseur1C->ajoutertype_fournisseur($type_fournisseur1);
header('Location: ../type_fournisseur.php');
//*/

?>
