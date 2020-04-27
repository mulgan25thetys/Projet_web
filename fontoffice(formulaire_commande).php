<?php
  require_once('session_verif.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" type="text/css" href="../styles/connexionstyle.css">
    <link rel="stylesheet" type="text/css" href="../styles/entetestyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script type="text/javascript" language="javascript" src="../javascripte/scrpitformulaire.js"></script>
</head>
<body>
    <header>
        <div><a href="#"><i class="fas fa-store-alt store"></i></a></div>
         <nav>
            <ul>
                
                <li class="menuconnect"><a href="formulaire.php">Commander</a></li>
                <li class="menucmd"><a href="#">Mes commandes</a>
                    <ul class="submenu">
                        <li><a href="afficher.php">Consulter</a></li>
                        
                    </ul>
                </li>
                <li class="menuconnect"><a href="deconnexion.php">Déconnecter</a></li>

            </ul>
        </nav>
     
    </header>
       
  
    <div class="container">
        
    

    <div class="imagedesign">
       <img src="..\images\form.png"> 
    </div>
    <form  name="formulaire" method="GET">

    	<table>
            <tr>
                <td><p id="para" onclick="messager()">
                    
                    <?php
  include '../core/ligne_commandecore.php';
  include '../entities/ligne_commande.php';

  if(isset($_GET['envoyer']))
  {
    function essaie()
    {
        $cmdtest=new lignecommandecore();
        $result=$cmdtest->testconnect();
        foreach ($result as $row) {
            if ($row['nomutilisateur'] == $_GET['mail']) {
                return true;
            }
        }
    }
    function essaieprod()
    {
        $cmdtest=new lignecommandecore();
        $result=$cmdtest->testproduits();
        foreach ($result as $row) {
            if ($row['nom_prod'] == $_GET['nom_prod']) {
                return true;
            }
        }
    }
    $connexionprod=essaieprod();
    $connexion=essaie();
    if ($connexion == true) {
        if ($connexionprod == true) {
           $client=$_GET['nom']." ".$_GET["prenom"];
  
         $lignecmd=new lignecommande($_GET["sexe"],$_GET['nom_prod'],$_GET["qte"],$client,$_GET["mail"],$_GET['adresse'],$_GET["phone"],$_GET["livraison"],$_GET['montant'],$_GET["date_cmd"]);
          $lignecmdc=new lignecommandecore();
         $test=$lignecmdc->ajouterligne($lignecmd);
        if ($test==true) {
         # code...
        echo "Commande éffectuée vous pouvez consulter via mes commandes"."</br>";
         if (filter_var($_GET['mail'],FILTER_VALIDATE_EMAIL)) {
             # code...
            $mailing=$_GET['mail'];
           if (mail($mailing,"Validation de la commande","
            Votre commande a été bien prise en compte
            ")) {
               # code...
              echo "Un message a été envoyé à votre compte";
           }
           
         }
         else
           {
            echo "Veuillez vérifier votre Email pour la notification";
           }
        }
        elseif ($test==false) {
        echo "Veuillez vous abonner pour continuer!"." ".$_GET['mail'];
        }
         
    }
    elseif ($connexionprod == false) {
        # code...
        echo "Produit inexistant Veuillez ressayer!";
    }
     
          
    }
    elseif ($connexion == false) {
        # code...
        $retour="</br>";
        $lien="<a href='connexion.php' style='color:#2ecc71;'>Abonnez-vous</a>";
        echo "Veuillez vous abonner pour continuer"." ".$lien;
    }
}
?>

    </p></td>
            </tr>
              </br>
            <tr>
                <td><i class="fa fa-user" aria-hidden="true"></i>Type</td>
            </tr>
            <tr>
                <td><div class="text"><input type="text" name="sexe" id="sexe" placeholder="Homme/Femme..."></div></td>
            </tr>
            <tr>
                <td><i class="fa fa-user" aria-hidden="true"></i>Nom</td>
            </tr>
            <tr>
                <td><div class="text"><input type="text" name="nom"  id="nom" placeholder="Nom..."></div></td>
            </tr>
            <tr>
                <td><i class="fa fa-user" aria-hidden="true"></i>Prénom</td>
            </tr>
            <tr>
                <td><div class="text"><input type="text" name="prenom" id="prenom" placeholder="Prénom..."></div></td>
            </tr>
            <tr>
                <td><i class="fa fa-envelope" aria-hidden="true"></i>Email</td>
            </tr>
            <tr>
                <td><div class="pass"><input type="text" name="mail" id="mail" placeholder="Adresse email..."></div></td>
            </tr>
            <tr>
                <td><i class="fas fa-map-marked-alt"></i>Adresse</td>
            </tr>
            <tr>
                <td><div class="pass"><input type="text" name="adresse" id="adresse" placeholder="(adresse/ville/pays)..."></div></td>
            </tr>
            <tr>
                <td><i class="fa fa-archive" aria-hidden="true"></i>Produit</td>
            </tr>
            <tr>
                <td><div class="text"><input type="text" name="nom_prod" id="nom_prod" placeholder="Nom du produit..."></div></td>
            </tr>
            <tr>
                <td><i class="fa fa-clone" aria-hidden="true"></i>Quantité</td>
            </tr>
            <tr>
                <td><div class="text"><input type="number" name="qte" id="qte" placeholder="Quantité commandée..."></div></td>
            </tr>
            <tr>
                <td><i class="far fa-money-bill-alt"></i>Montant</td>
            </tr>
            <tr>
                <td><div class="text"><input type="number" name="montant" id="montant" placeholder="Prix total..."></div></td>
            </tr>
            <tr>
                <td><i class="fa fa-shopping-bag" aria-hidden="true"></i>Mode de livraison</td>
            </tr>
            <tr>
                <td><div class="text"><input type="text" name="livraison" id="livraison" placeholder="Domicile/Retrait en magasin..."></div></td>
            </tr>
            <tr>
                <td><i class="fas fa-mobile"></i>Téléphone</td>
            </tr>
            <tr>
                <td><div class="text"><input type="number" id="phone" name="phone" placeholder="Numéro de Téléphone..."></div></td>
            </tr>
            <tr>
                <td><i class="fas fa-stopwatch"></i>Date de la commande</td>
            </tr>
            <tr>
                <td><div class="text"><input type="date" id="date_cmd" name="date_cmd" placeholder="(yyyy-mm-dd)..."></div></td>
            </tr>
            <tr>
                <td><input type="button" name="envoyer" id="envoyer" value="Commander" onclick="test()"></td>
            </tr>
        </br>
            <tr>
                <td><p id="info"></p></td>
            </tr>
          
            
            
        </table>
    </form>

   </div>
   <footer>
         <div>
             <ul>
                 <li><img src="../icons/discover.png"></li>
                 <li><img src="../icons/express.png"></li>
                 <li><img src="../icons/mastercard.png"></li>
                 <li><img src="../icons/paypal.png"></li>
                 <li><img src="../icons/visa.png"></li>
             </ul>
         </div>
         <div style="font-style: italic;font-size: 15px;">
             Copyrigth &copy;Ecommerce.com 2020 tous droits réservés.
         </div>
        <div><p><hr></p></div>
   </footer>
</body>
</html>
