<?php
include "../config.php";
 class lignecommandecore
 {
    public function ajouterligne($lignecmd)
    {
    	$sql="insert into commandes(type,nom_prod,qte,client,mail,adresse,tel,livraison,prix,datecmd) values (:type,:nom_prod,:qte,:client,:mail,:adr,:tel,:livraison,:prix,:date)";
    	$db=config::getConnexion();
    	try {
    		$req=$db->prepare($sql);
    		$req->bindValue(':type',$lignecmd->gettype());
    		$req->bindValue(':nom_prod',$lignecmd->getnomprod());
    		$req->bindValue(':qte',$lignecmd->getqte());
    		$req->bindValue(':client',$lignecmd->getclient());
    		$req->bindValue(':mail',$lignecmd->getmail());
    		$req->bindValue(':adr',$lignecmd->getadr());
    		$req->bindValue(':tel',$lignecmd->gettel());
    		$req->bindValue(':livraison',$lignecmd->getlivraison());
    		$req->bindValue(':prix',$lignecmd->getprix());
    		$req->bindValue(':date',$lignecmd->getdate());
    		$test=$req->execute();
    		return $test;
    	} catch (Exception $e) {
    		echo "Erreur ".$e->getMessage();
    	}
    }
    public function afficherligne()
    {
    	$sql="select *from commandes order by 1";
    	$db=config::getConnexion();
    	try {
    		$liste=$db->query($sql);
    		return $liste;
    	} catch (Exception $e) {
    		echo "Erreur ".$e->getMessage();
    	}
    }
    public function supprimerligne($id)
    {
    	$sql="DELETE from commandes where id=$id";
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
    	$sql="select *from commandes where id=$id";
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
    	$sql="UPDATE commandes SET type=:type, nom_prod=:nom, qte=:qte,mail=:mail, adresse=:adr, tel=:tel, livraison=:livraison, prix=:prix, datecmd=:datecmd WHere id=:id";
    	$db=config::getConnexion();
    	try {
    		$req=$db->prepare($sql);
    		$req->bindValue(':type',$lignecmd->gettype());
    		$req->bindValue(':nom',$lignecmd->getnomprod());
    		$req->bindValue(":qte",$lignecmd->getqte());
    		$req->bindValue(":mail",$lignecmd->getmail());
    		$req->bindValue(":adr",$lignecmd->getadr());
    		$req->bindValue(":tel",$lignecmd->gettel());
    		$req->bindValue(":livraison",$lignecmd->getlivraison());
    		$req->bindValue(":prix",$lignecmd->getprix());
    		$req->bindValue(":datecmd",$lignecmd->getdate());
    		$req->bindValue(':id',$id);
    		$test=$req->execute();
    		return $test;
    	} catch (Exception $e) {
    		echo "Erreur ".$e->getMessage();
    	}
    }
    public function recherchercmd($text)
    {
    	$sql="SELECT *FROM commandes WHERE qte LIKE '%$text%' ";
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
    	$sql="Select *From commandes order by qte";
    	$db=config::getConnexion();
    	try {
    		$req=$db->query($sql);
    		return $req;
    	} catch (Exception $e) {
    		echo "Erreur ".$e->getMessage();
    	}
    }
    public function afficherinfo($email)
    {
        $sql="select *from commandes where mail= '$email' ";
        $db=config::getConnexion();
        try {
            $req=$db->query($sql);
            //$req->bindValue(':email',$email);
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
    
 }

 
?>
