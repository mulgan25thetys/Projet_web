<?php
include 'config.php';
  class expediteurcore
 {
    public function expedier($ag)
    {
        $sql="insert into agents(codeagent,mission) values (:id,:mission)";
        $db=config::getConnexion();
        try {
            $req=$db->prepare($sql);
            $req->bindValue(':id',$ag->getid());
            $req->bindValue(':mission',$ag->getmission());
            $test=$req->execute();
            return $test;
        } catch (Exception $e) {
            echo "Erreur ".$e->getMessage();
        }
    }
    public function verifier($code)
    {
        $sql="select *from agents where codeagent= '$code' ";
        $db=config::getConnexion();
        try {
            $req=$db->query($sql);
            return $req;
        } catch (Exception $e) {
            echo "Erruer ".$e->getMessage();
        }
    }
    public function recuperer($code)
    {
        $sql="SELECT *from agents where codeagent=$code";
        $db=config::getConnexion();
        try {
            $liste=$db->query($sql);
            return $liste;
        } catch (Exception $e) {
            echo "Erreur ".$e->getMessage();
        }
    }
    public function modifier($ag,$id)
    {
        $sql="UPDATE agents SET mission=:mission where codeagent=$id";
        $db=config::getConnexion();
        try {
            $req=$db->prepare($sql);
            $req->bindValue(':mission',$ag->getmission());
            $test=$req->execute();
            return $test;
        } catch (Exception $e) {
            echo "Erreur ".$e->getMessage();
        }
    }
    public function connexion($user)
    {
        $sql="select *from employes where email= '$user' ";
        $db=config::getConnexion();
        try {
            $req=$db->query($sql);
            return $req;
        } catch (Exception $e) {
            echo "Erruer ".$e->getMessage();
        }
    }
    
 }
?>