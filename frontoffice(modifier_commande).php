<?php
  include '../core/ligne_commandecore.php';
  include '../entities/ligne_commande.php';

  if(isset($_POST['envoyer']))
  {
    function essaie()
    {
        $cmdtest=new lignecommandecore();
        $result=$cmdtest->testconnect();
        foreach ($result as $row) {
            if ($row['nomutilisateur'] == $_POST['mail']) {
                return true;
            }
        }
    }
    function essaieprod()
    {
        $cmdtest=new lignecommandecore();
        $result=$cmdtest->testproduits();
        foreach ($result as $row) {
            if ($row['nom_prod'] == $_POST['nom_prod']) {
                return true;
            }
        }
    }
    $connexionprod=essaieprod();
    $connexion=essaie();
    if ($connexion == true) {
        if ($connexionprod == true) {
           //$client=$_POST['nom']." ".$_POST["prenom"];
  
         $lignecmd=new lignecommandemod($_POST["sexe"],$_POST['nom_prod'],$_POST["qte"],$_POST["mail"],$_POST['adresse'],$_POST["phone"],$_POST["livraison"],$_POST['montant'],$_POST["date_cmd"]);
          $lignecmdc=new lignecommandecore();
         $test=$lignecmdc->modifiercmd($lignecmd,$_POST['id']);
        if ($test==true) {
         # code...
        echo "Mise à jour éffectuée!";
        header('Location: afficher.php');
        }
        elseif ($text==false) {
        echo "Veuillez vous abonner pour continuer!"." ".$_POST['mail'];
        }
         
    }
    elseif ($connexionprod == false) {
        # code...
        echo "Produit inexistant Veuillez ressayer! avant modificiation";
    }
     
          
    }
    elseif ($connexion == false) {
        # code...
        $retour="</br>";
        $lien="<a href='connexion.php' style='color:#2ecc71;'>Abonnez-vous</a>";
        echo "Vous n'etes pas client veuillez vous abonner pour continuer"." ".$lien;
    }
}
?>
