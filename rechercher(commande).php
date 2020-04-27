<?php
  require_once ("session_verif.php");
?>
<html>
<head>
  <title>Liste des commandes</title>
  <link rel="stylesheet" type="text/css" href="../styles/listecmdstyle.css">
   <link rel="stylesheet" type="text/css" href="../styles/entetestyle.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script type="text/javascript" language="javascript" src="../javascripte/backcmdscript.js"></script>
</head>
<body>
  <header>
        <div><a href="affichercmd.php"><i class="fas fa-store-alt store"></i></a></div>
        <div id="searchlogin">
        <div><a href="recherchercmd.php"><i class="fas fa-search search"></i></a></div>   
  
     <div id="deconnexion"><a href="deconnexion.php"><i id="logout" class="fa fa-sign-out logout" title="Deconnexion"></i></a></div>
     
     </div>
    </header>
    <div class="wrapper">
    <div class="slidebar">
      <h2>Vos gestions</h2>
      <ul>
        <li><a href="affichercmd.php"><i class="fas fa-clone clone"></i>Liste des commandes</a></li>
      </ul>
      
    </div>
    <div class="main_content">
      <div class="header">Gestion des commandes.</div>
      <div class="info">
  
   <div id="searchblock">
    <form method="GET" id="searchform">
            <input type="text" name="recherche" placeholder="Rechercher une commande(par quantité du produit)">
            <button type="submit" name="search" value="Rechercher" id="search" ><i class="fas fa-search"></i></button>
        </form>
      <?php
      include '../core/ligne_commandecore.php';
      $resultat=0;
  if (isset($_GET['search'])) {
    if (!empty($_GET['recherche'])) {
      # code...
      $lignecmdc=new lignecommandecore();
    $resultat=$lignecmdc->recherchercmd($_GET['recherche']);
    }
    # code...
    elseif (empty($_GET['recherche'])){
      echo "Aucune information trouvée!";
    }
    
    
  }
  /*elseif(!isset($_GET['recherche']))
  {
    echo "Erreur";
  }*/
?>
   <div class="tableaux">
     <table cellpadding="10" cellspacing="20" class="content-table">
      <thead>
      <tr>
        <th>Type</th>
        <th>Produits</th>
        <th>Quantité</th>
        <th>Client</th>
        <th>Email</th>
        <th>Adresse</th>
        <th>Téléphone</th>
        <th>Mode de livraison</th>
        <th>Prix</th>
        <th>Date</th>
        <th><i class="fas fa-ban"></i></th>
      </tr>
    </thead>
    <tbody>
      <?php 
            foreach ($resultat as $row) {
              
      ?>
  
      <tr>
        <td><?php echo $row['type'];?></td>
        <td><?php echo $row['nom_prod'];?></td>
        <td style="color: #44bd32;"><?php echo $row['qte'];?></td>
        <td><?php echo $row['client'];?></td>
        <td><?php echo $row['mail'];?></td>
        <td><?php echo $row['adresse'];?></td>
        <td><?php echo $row['tel'];?></td>
        <td><?php echo $row['livraison'];?></td>
        <td><?php echo $row['prix']." DT";?></td>
        <td><?php echo $row['datecmd'];?></td>
        <td><a href="supprimercmd.php?id=<?PHP echo $row['id']; ?>"><i style="color: #44bd32;" class="fa fa-trash" aria-hidden="true"></i></a></td>
        
      </tr>
      <?php
     }
     ?>
   </tbody>
     </table> 
    </div>
   </div>
      </div>

    </div>
  </div>
   
</body>
</html>
