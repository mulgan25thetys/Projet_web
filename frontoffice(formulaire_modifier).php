<?php
  session_start();
  if (@$_SESSION['autoriser']!="oui") {
      # code...
    header('Location: connexion.php');
    exit();
  }
?>
  	<html>
  	<head>
  		<title>Modifier commandes</title>
  		<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../styles/connexionstyle.css">
    <link rel="stylesheet" type="text/css" href="../styles/entetestyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script type="text/javascript" language="javascript" src="../javascripte/modifierscript.js"></script>
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
                <li class="menuconnect"><a href="connexion.php">Se connecter</a></li>
            </ul>
        </nav>
    </header>
  		
  	   <div class="container">
        
    

    <div class="imagedesign">
       <img src="..\images\update.png"> 
    </div>

    <form action="modifier.php" id="formmodif" name="formulaire" method="POST">

    	<table>
            <?php
  include '../core/ligne_commandecore.php';
    include '../entities/ligne_commande.php';
  if (isset($_GET['id'])) {
    # code...
    $lignecmdc=new lignecommandecore();
    $resultat=$lignecmdc->recuperercmd($_GET['id']);
    foreach ($resultat as $row) {
        # code...
    ?>
            <tr>
                <td><i class="fa fa-user" aria-hidden="true"></i>Type</td>
            </tr>
            <tr>
                <td><div class="text"><input type="text" name="sexe" id="sexe" value="<?php echo $row['type']?>"></div></td>
            </tr>
            <tr>
                <td><i class="fa fa-user" aria-hidden="true"></i>Nom</td>
            </tr>
            <tr>
                <td><div class="text"><input type="text" name="nom" style="background-color: #bdc3c7;"  id="nom" placeholder="Nom..." disabled></div></td>
            </tr>
            <tr>
                <td><i class="fa fa-user" aria-hidden="true"></i>Prénom</td>
            </tr>
            <tr>
                <td><div class="text"><input type="text" name="prenom" style="background-color: #bdc3c7;" id="prenom" placeholder="Prénom..." disabled></div></td>
            </tr>
            <tr>
                <td><i class="fa fa-envelope" aria-hidden="true"></i>Email</td>
            </tr>
            <tr>
                <td><div class="pass"><input type="text" name="mail" id="mail" value="<?php echo $row['mail']?>"></div></td>
            </tr>
            <tr>
                <td><i class="fas fa-map-marked-alt"></i>Adresse</td>
            </tr>
            <tr>
                <td><div class="pass"><input type="text" name="adresse" id="adresse" value="<?php echo $row['adresse']?>"></div></td>
            </tr>
            <tr>
                <td><i class="fa fa-archive" aria-hidden="true"></i>Produit</td>
            </tr>
            <tr>
                <td><div class="text"><input type="text" name="nom_prod" id="nom_prod" value="<?php echo $row['nom_prod']?>"></div></td>
            </tr>
            <tr>
                <td><i class="fa fa-clone" aria-hidden="true"></i>Quantité</td>
            </tr>
            <tr>
                <td><div class="text"><input type="number" name="qte" id="qte" value="<?php echo $row['qte']?>"></div></td>
            </tr>
            <tr>
                <td><i class="far fa-money-bill-alt"></i>Montant</td>
            </tr>
            <tr>
                <td><div class="text"><input type="number" name="montant" id="montant" value="<?php echo $row['prix']?>"></div></td>
            </tr>
            <tr>
                <td><i class="fa fa-shopping-bag" aria-hidden="true"></i>Mode de livraison</td>
            </tr>
            <tr>
                <td><div class="text"><input type="text" name="livraison" id="livraison" value="<?php echo $row['livraison']?>"></div></td>
            </tr>
            <tr>
                <td><i class="fas fa-mobile"></i>Téléphone</td>
            </tr>
            <tr>
                <td><div class="text"><input type="number" id="phone" name="phone" value="<?php echo $row['tel']?>"></div></td>
            </tr>
            <tr>
                <td><i class="fas fa-stopwatch"></i>Date de la commande</td>
            </tr>
            <tr>
                <td><div class="text"><input type="date" id="date_cmd" name="date_cmd" value="<?php echo $row['datecmd']?>"></div></td>
            </tr>
            <tr>
                <td><input type="button" name="envoyer" id="envoyer" value="Modifier" onclick="test()"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" id="envoyer" value="<?php echo $row['id']?>"></td>
            </tr>
        </br>
            <tr>
                <td><p id="info"></p></td>
            </tr>
                <?php
        }
  }
 
?>
        </table>
    </form>

   </div>

  	</body>
  	</html>

 
