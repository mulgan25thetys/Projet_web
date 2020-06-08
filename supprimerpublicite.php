# Projet_web
Création d'un site web dans un projet d'étude deuxieme année 
<?PHP
include_once "../config.php";
include_once "../cores/publiciteC.php";
$publiciteC=new publiciteC();
	$publiciteC->supprimerpublicite($_POST["id_pub"]);
	header('Location: ../publicite.php');

?>
