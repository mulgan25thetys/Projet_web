<?php
include "config.php";
 class usercore
 {
    public function ajouteruser($user)
    {
        $sql="insert into utilisateurs(pseudo,email,motdepasse) values (:pseudo,:email,:mdp)";
        $db=config::getConnexion();
        try {
            $req=$db->prepare($sql);
            $req->bindValue(':pseudo',$user->getautre0());
            $req->bindValue(':email',$user->getautre1());
            $req->bindValue(':mdp',$user->getautre2());
            return $req->execute();
        } catch (Exception $e) {
            echo "Erreur ".$e->getMessage();
        }
    }
 }
 class lignecommandecore
 {
    public function ajouterligne($lignecmd)
    {
    	$sql="insert into ligne_cmd(ref_prod,qte,total,pays,ville,tel,adr,mail) values (:ref,:qte,:total,:pays,:ville,:adr,:tel,:mail)";
    	$db=config::getConnexion();
    	try {
    		$req=$db->prepare($sql);
            $req->bindValue(':ref',$lignecmd->getref());
            $req->bindValue(':qte',$lignecmd->getqte());
    		$req->bindValue(':total',$lignecmd->gettotal());
            $req->bindValue(':pays',$lignecmd->getpays());
            $req->bindValue(':ville',$lignecmd->getville());
            $req->bindValue(':tel',$lignecmd->gettel());
            $req->bindValue(':adr',$lignecmd->getadr());
            $req->bindValue(':mail',$lignecmd->getmail());
            $test=$req->execute();
            return $test;
    	} catch (Exception $e) {
    		echo "Erreur ".$e->getMessage();
    	}
    }
    public function ajouter($lignecmd)
    {
        $sql="insert into panier(refp_prod,qtitep,totalp) values (:ref,:qte,:total)";
        $db=config::getConnexion();
        try {
            $req=$db->prepare($sql);
            $req->bindValue(':ref',$lignecmd->getautre0());
            $req->bindValue(':qte',$lignecmd->getautre1());
            $req->bindValue(':total',$lignecmd->getautre2());
            return $req->execute();
        } catch (Exception $e) {
            echo "Erreur ".$e->getMessage();
        }
    }
    public function verifierpanier($id)
    {
        $sql="SELECT  refp_prod from panier where refp_prod = $id";
        $db=config::getConnexion();
        try {
            $liste=$db->query($sql);
            return $liste;
        } catch (Exception $e) {
            echo "Erreur ".$e->getMessage();
        }
    }
    
    public function vider()
    {
        $sql="TRUNCATE `panier`";
        $db=config::getConnexion();
        try {
            $req=$db->prepare($sql);
            return $req->execute();
        } catch (Exception $e) {
            echo "Erreur ".$e->getMessage();
        }
    }
    public function afficherpanier()
    {
        $sql="SELECT *from panier ";
        $db=config::getConnexion();
        try {
            $req=$db->query($sql);
            return $req;
        } catch (Exception $e) {
            echo "Erreur ".$e->getMessage();
        }
    }
    public function modifierpanier($panier0,$ref)
    {
        $sql="UPDATE panier SET  qtitep=:qte,totalp=:total WHere refp_prod=:ref";
        $db=config::getConnexion();
        try {
            $req=$db->prepare($sql);
            $req->bindValue(':qte',$panier0->getautre1());
            $req->bindValue(':total',$panier0->getautre2());
            $req->bindValue(":ref",$ref);
            return $req->execute();
        } catch (Exception $e) {
            echo "Erreur ".$e->getMessage();
        }
    }
    public function supprimerpanier($id)
    {
        $sql="DELETE from panier where refp_prod=:id";
        $db=config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':id',$id);
        try {
            $test=$req->execute();
            return $test;
        } catch (Exception $e) {
            echo "Erreur ".$e->getMessage();
        }
    }
    public function afficherligne()
    {
    	$sql="select *from (ligne_cmd inner join utilisateurs on ligne_cmd.mail = utilisateurs.email) inner join produits on ligne_cmd.ref_prod = produits.reference";
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
    	$sql="select *from ligne_cmd where qte=$id";
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
     public function searchproduits($ref)
    {
      $sql="select *from produits where reference=$ref";
      $db=config::getConnexion();
      try {
        $req=$db->query($sql);
        return $req;
      } catch (Exception $e) {
        echo "Erreur ".$e->getMessage();
      }
    }
    public function modifiercmd($lignecmd,$id,$mail)
    {
        $sql="UPDATE `ligne_cmd` SET `qte` = ':qte', `total` = ':total', `pays` = ':pays', `ville` = ':ville', `adr` = ':adr'  WHERE `ligne_cmd`.`ref_prod` = '$id' and `ligne_cmd`.`mail` = '$mail'";
    	$db=config::getConnexion();
    	try {
    		$req=$db->prepare($sql);
            $req->bindValue(':qte',$lignecmd->getqte());
            $req->bindValue(':total',$lignecmd->gettotal());
    		$req->bindValue(':pays',$lignecmd->getpays());
            $req->bindValue(':ville',$lignecmd->getville());
            $req->bindValue(':adr',$lignecmd->getadr());
            $test=$req->execute();
            return $test;
    	} catch (Exception $e) {
    		echo "Erreur ".$e->getMessage();
    	}
    }
    public function verifiercommande($ref,$mail)
    {
       $sql="SELECT `qte`,`total` from `ligne_cmd` where `ligne_cmd`.`ref_prod`='$ref' and `ligne_cmd`.`mail` = '$mail'";
        $db=config::getConnexion();
        try {
            $req=$db->query($sql);
            return  $req;
        } catch (Exception $e) {
            echo "Erreur ".$e->getMessage();
        } 
    }
    public function supprimercommande($ref,$mail)
    {
        $sql="DELETE FROM `ligne_cmd` WHERE `ligne_cmd`.`ref_prod` = '$ref' and `ligne_cmd`.`mail` = '$mail'";
        $db=config::getConnexion();
        $req=$db->prepare($sql);
        try {
            $test=$req->execute();
            return $test;
        } catch (Exception $e) {
            echo "Erreur ".$e->getMessage();
        } 
    }
    
    public function afficheruser()
    {
        $sql="SELECT *from utilisateurs ";
        $db=config::getConnexion();
        try {
            $req=$db->query($sql);
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
    public function rechercherproduit($text)
    {
        $sql="select *from produits WHERE nom_prod LIKE '%$text%' ";
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
        $sql="select *from utilisateurs where pseudo= '$user' and motdepasse ='$pass' ";
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