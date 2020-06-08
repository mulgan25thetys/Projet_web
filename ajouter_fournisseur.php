# Projet_web
Création d'un site web dans un projet d'étude deuxieme année 
<?PHP
include_once "../config.php";
include_once "../entities/fournisseur.php";
include_once "../cores/fournisseurC.php";
require '../PHPMailerAutoload.php';
include_once '../phpmailer/class.phpmailer.php';
include_once '../phpmailer/class.smtp.php';
                        require '../credential.php';

                        $mail = new PHPMailer;

                        // $mail->SMTPDebug = 4;                               // Enable verbose debug output

                        $mail->isSMTP();                                      // Set mailer to use SMTP
                        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                        $mail->SMTPAuth = true;                               // Enable SMTP authentication
                        $mail->Username = EMAIL;                 // SMTP username
                        $mail->Password = PASS;                           // SMTP password
                        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                        $mail->Port = 587;                                    // TCP port to connect to

                        $mail->setFrom(EMAIL, 'Naturalium');
                        $mail->addAddress($_POST['email']);     // Add a recipient

                        $mail->addReplyTo(EMAIL);
                        
                        $mail->isHTML(true);
                        $mail->Subject = "Compte créé avec succès";
                        $mail->Body    = "Bonjour Mr/Mme ".$_POST['Nom']." ".$_POST['prenom']." votre compte a ete cree avec succès. Merci pour votre fidelité";
                        $mail->AltBody = "Bonjour Mr/Mme ".$_POST['Nom']." ".$_POST['prenom']." votre compte a ete cree avec succès. Merci pour votre fidelité";
                        
                        

                        if(!$mail->send()) {
                            echo 'Erreur echec';
                            echo 'Mail Erreur: ' . $mail->ErrorInfo;
                        } else {
                            echo 'Email Envoie';
                        }
/*$image = file_get_contents($_FILES['image']['tmp_name']);*/
$fournisseur1 = new fournisseur($_POST['Nom'],$_POST['prenom'],$_POST['adresse'],$_POST['email'],$_POST['categorie']);

$fournisseur1C=new fournisseurC();
$fournisseur1C->ajouterfournisseur($fournisseur1);
header('Location: ../fournisseur.php');
//*/

?>
