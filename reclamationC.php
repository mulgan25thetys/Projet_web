# Projet_web
Création d'un site web dans un projet d'étude deuxieme année 

<?PHP
/*include "../config.php";*/
class reclamationC {
	function ajoutereclamation($reclamation){
		$sql="insert into reclamation (nom,email,libelle,objet) values (:nom, :email,:libelle,:objet)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $nom=$reclamation->getnom();
        $email=$reclamation->getemail();
        $libelle=$reclamation->getlibelle();
        $objet=$reclamation->getobjet();
		$req->bindValue(':nom',$nom);
		$req->bindValue(':email',$email);
		$req->bindValue(':libelle',$libelle);
		$req->bindValue(':objet',$objet);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherreclamation(){
		//$sql="SElECT * From reclamation e inner join formationphp.reclamation a on e.id_reclamation= a.id_reclamation";
		$sql="SElECT * From reclamation";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerreclamation($id_reclamation){
		$sql="DELETE FROM reclamation where id_reclamation= :id_reclamation";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_reclamation',$id_reclamation);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function etatreclamation($id_reclamation,$etat){
		$sql="UPDATE reclamation SET etat=:etat WHERE id_reclamation=:id_reclamation";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$req->bindValue(':id_reclamation',$id_reclamation);
		$req->bindValue(':etat',$etat);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererreclamation($id_reclamation){
		$sql="SELECT * from reclamation where id_reclamation=$id_reclamation";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListereclamations($tarif){
		$sql="SELECT * from reclamation where date_reclamation=$tarif";
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
