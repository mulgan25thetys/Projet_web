
 <?php
 if (isset($_POST['envoyer'])) {
 	# code...
 	if (filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL)) {
 		# code...
 		
 		if (mail($_POST['mail'],$_POST['objet'],$_POST['message'])) {
 			# code...
 			echo "Message envoyé!";
 		}
 		else
 		{
 			echo "Message non envoyé!";
 		}
 	}
 }
?>
  