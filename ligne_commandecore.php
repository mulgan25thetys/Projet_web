<?php
include "config.php";
 class lignecommandecore
 {
    public function ajouteruser($ligneuser)
    {
        $sql="insert into employes(email,identifiant,pseudo) values (:email,:ident,:pseudo)";
        $db=config::getConnexion();
        try {
            $req=$db->prepare($sql);
            $req->bindValue(':email',$ligneuser->getemail());
            $req->bindValue(':ident',$ligneuser->getident());
            $req->bindValue(':pseudo',$ligneuser->getpseudo());
            $test=$req->execute();
            return $test;
        } catch (Exception $e) {
            echo "Erreur ".$e->getMessage();
        }
    }
    public function afficherligne()
    {
    	$sql="SELECT DISTINCT `ligne_cmd`.`iddet`,`ligne_cmd`.`ref_prod`,`ligne_cmd`.`qte`,`ligne_cmd`.`total`,`ligne_cmd`.`pays`,`ligne_cmd`.`ville`,`ligne_cmd`.`adr`,`ligne_cmd`.`tel`,`ligne_cmd`.`mail`,`ligne_cmd`.`datecmd`,`produits`.`images`,`produits`.`reference`,`utilisateurs`.`pseudo` from (`ligne_cmd` inner join `utilisateurs` on `ligne_cmd`.`mail` = `utilisateurs`.`email`) inner join `produits` on `ligne_cmd`.`ref_prod` = `produits`.`reference` ";
    	$db=config::getConnexion();
    	try {
    		$liste=$db->query($sql);
    		return $liste;
    	} catch (Exception $e) {
    		echo "Erreur ".$e->getMessage();
    	}
        /*SELECT DISTINCT row_number() over(order by salary desc)`ligne_cmd`.`ref_prod`,`ligne_cmd`.`qte`,`ligne_cmd`.`total`,`utilisateurs`.`email`,`produits`.`images` FROM `ligne_cmd` INNER JOIN `produits` ON `ligne_cmd`.`ref_prod` = `produits`.`reference` INNER JOIN `utilisateurs` ON `ligne_cmd`.`mail` = `utilisateurs`.`email`*/
    }
    public function supprimerligne($id)
    {
    	$sql="DELETE from ligne_cmd where iddet=$id";
    	$db=config::getConnexion();
    	$req=$db->prepare($sql);
    	try {
    		$test=$req->execute();
    		return $test;
    	} catch (Exception $e) {
    		echo "Erreur ".$e->getMessage();
    	}
    }
    public function recuperercmd($id)
    {
    	$sql="select *from ligne_cmd where iddet=$id";
    	$db=config::getConnexion();
    	try {
    		$liste=$db->query($sql);
    		return $liste;
    	} catch (Exception $e) {
    		echo "Erreur ".$e->getMessage();
    	}
    }
    public function testconnect()
    {
      $sql="select *from utilisateurs";
      $db=config::getConnexion();
      try {
        $req=$db->query($sql);
        return $req;
      } catch (Exception $e) {
        echo "Erreur ".$e->getMessage();
      }
    }
    public function testproduits()
    {
      $sql="select *from produits";
      $db=config::getConnexion();
      try {
        $req=$db->query($sql);
        return $req;
      } catch (Exception $e) {
        echo "Erreur ".$e->getMessage();
      }
    }
    public function modifiercmd($lignecmd,$id)
    {
    	$sql="UPDATE ligne_cmd SET  qte=:qte,pays=:pays,ville=:ville,adr=:adr,mail=:mail WHere iddet=:id";
    	$db=config::getConnexion();
    	try {
    		$req=$db->prepare($sql);
    		$req->bindValue(":qte",$lignecmd->getqte());
    		return $req;
    	} catch (Exception $e) {
    		echo "Erreur ".$e->getMessage();
    	}
    }
    public function recherchercmd($text)
    {
    	$sql="select *from (ligne_cmd inner join utilisateurs on ligne_cmd.mail = utilisateurs.email) inner join produits on ligne_cmd.ref_prod = produits.reference WHERE qte LIKE '%$text%' ";
    	$db=config::getConnexion();
    	try {
    		$req=$db->query($sql);
    		return $req;
    	} catch (Exception $e) {
    		echo "Erreur ".$e->getMessage();
    	}
    }
    public function trier()
    {
    	$sql="select *from (ligne_cmd inner join utilisateurs on ligne_cmd.mail = utilisateurs.email) inner join produits on ligne_cmd.ref_prod = produits.reference order by ligne_cmd.qte";
    	$db=config::getConnexion();
    	try {
    		$req=$db->query($sql);
    		return $req;
    	} catch (Exception $e) {
    		echo "Erreur ".$e->getMessage();
    	}
    }
    public function connexion($user,$pass)
    {
        $sql="select *from employes where pseudo= '$user' and identifiant ='$pass' ";
        $db=config::getConnexion();
        try {
            $req=$db->query($sql);
            return $req;
        } catch (Exception $e) {
            echo "Erruer ".$e->getMessage();
        }
    }
    public function affichermission()
    {
        $sql="select *from agents order by 1";
        $db=config::getConnexion();
        try {
            $liste=$db->query($sql);
            return $liste;
        } catch (Exception $e) {
            echo "Erreur ".$e->getMessage();
        }
    }
    public function compter($maille)
    {
        $sql="select count(*) from commandes where mail='$maille' ";
        $db=config::getConnexion();
        try {
            $nb=$db->query($sql);
            return $nb;
        } catch (Exception $e) {
            echo "Erreur ".$e->getMessage();
        }
    }
     public function vidercommande()
    {
        $sql="TRUNCATE `ligne_cmd`";
        $db=config::getConnexion();
        $req=$db->prepare($sql);
        try {
            $test=$req->execute();
            return $test;
        } catch (Exception $e) {
            echo "Erreur ".$e->getMessage();
        } 
    }
    
 }

 
?>
