<?PHP
class ClientC {
function afficherClient ($Client){
		echo "Nom: ".$Client->getNom()."<br>";
		echo "Prénom: ".$Client->getPrenom()."<br>";
		echo "Email: ".$Client->getEmail()."<br>";
		echo "Credit: ".$Client->getCredit()."<br>";
		echo "Pwd: ".$Client->getPwd()."<br>";
	}
	/*function calculerSalaire($employe){
		echo $employe->getNbHeures() * $employe->getTarifHoraire();
	}*/
	function ajouterClient($Client){
		$sql="insert into Client (nom,prenom,email,credit,pwd,cadeau) values (:nom,:prenom,:email,:credit,:pwd,:cadeau)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $nom=$Client->getNom();
        $prenom=$Client->getPrenom();
        $email=$Client->getEmail();
        $credit=$Client->getCredit();
        $pwd=$Client->getPwd();
        $cadeau=$Client->getCadeau();
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':email',$email);
		$req->bindValue(':credit',$credit);
		$req->bindValue(':pwd',$pwd);
		$req->bindValue(':cadeau',$cadeau);
		
            $req->execute();
           
        }
        catch (Exception $c){
            echo 'Erreur: '.$c->getMessage();
        }
		
	}
	
	function afficherClients(){
		//$sql="SElECT * From Client c inner join formationphp.Client a on c.code_client= a.code_client";
		$sql="SElECT * From Client";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerClient($code_client){
		$sql="DELETE FROM Client where code_client= :code_client";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':code_client',$code_client);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $c){
            die('Erreur: '.$c->getMessage());
        }
	}
	function modifierClient($Client,$code_client){
		$sql="UPDATE Client SET nom=:nom,prenom=:prenom,email=:email, pwd=:pwd, credit=:credit cadeau=:cadeau WHERE code_client=:code_client";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $nom=$Client->getNom();
        $prenom=$Client->getPrenom();
        $email=$Client->getEmail();
        $credit=$Client->getCredit();
        $pwd=$Client->getPwd();
        $cadeau=$Client->getCadeau();
		$datas = array(':nom'=>$nom,':prenom'=>$prenom,':email'=>$email, ':code_client'=>$code_client,':credit'=>$credit,':pwd'=>$pwd,':cadeau'=>$cadeau);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':email',$email);
		$req->bindValue(':code_client',$code_client);
		$req->bindValue(':credit',$credit);
		$req->bindValue(':pwd',$pwd);
		$req->bindValue(':cadeau',$cadeau);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $c){
            echo " Erreur ! ".$c->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererClient($code_client){
		$sql="SELECT * from Client where code_client=$code_client";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $c){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherClient($email,$pwd){
		$sql="SELECT * from Client where email='$email' and pwd='$pwd'";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}
?>
