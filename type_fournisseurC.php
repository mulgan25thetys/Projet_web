# Projet_web
Création d'un site web dans un projet d'étude deuxieme année 
<?PHP
/*include "../config.php";*/
class type_fournisseurC {
	function ajoutertype_fournisseur($type_fournisseur){
		$sql="insert into type_fournisseur (type) values (:type)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $type=$type_fournisseur->gettype();
		$req->bindValue(':type',$type);
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function affichertype_fournisseur(){
		//$sql="SElECT * From type_fournisseur e inner join formationphp.type_fournisseur a on e.id_type_fournisseur= a.id_type_fournisseur";
		$sql="SElECT * From type_fournisseur";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimertype_fournisseur($id_type){
		$sql="DELETE FROM type_fournisseur where id_type= :id_type";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_type',$id_type);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifiertype_fournisseur($type_fournisseur,$id_type){
		$sql="UPDATE type_fournisseur SET type=:type WHERE id_type=:id_type";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$type=$type_fournisseur->gettype();
		$req->bindValue(':id_type',$id_type);
		$req->bindValue(':type',$type);
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recuperertype_fournisseur($id_type){
		$sql="SELECT * from type_fournisseur where id_type=$id_type";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListetype_fournisseurs($tarif){
		$sql="SELECT * from type_fournisseur where date_type_fournisseur=$tarif";
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
