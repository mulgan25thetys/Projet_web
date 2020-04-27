<?php
  require_once ("session_verif.php");
?>
<html>
<head>
  <title>Liste des commandes</title>
  <link rel="stylesheet" type="text/css" href="../styles/listecmdstyle.css">
   <link rel="stylesheet" type="text/css" href="../styles/entetestyle.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
  <script type="text/javascript" language="javascript" src="javascripte/backcmdscript.js"></script>
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
          <div id="expedition">
         <form method="POST" action="expedier.php" class="login-form">
        <h1>Expédier la commande</h1>
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
        <div class="txtb">
          <i class="fas fa-gift"></i>
          <input type="text" name="nom_prod" style="pointer-events: none;" value="<?php echo $row['nom_prod']."----".$row['qte']."----".$row['prix']."DT"?>">
          <span data-placeholder="Username"></span>
        </div>
        <div class="txtb">
          <i class="fas fa-map-marked-alt"></i>
          <input type="text" name="adresse" style="pointer-events: none;" value="<?php echo $row['adresse']?>">
          <span data-placeholder="Username"></span>
        </div> 
        <div class="txtb">
          <i class="fas fa-mobile"></i>
          <input type="text" name="num" style="pointer-events: none;" value="<?php echo "Téléphone:".$row['tel']?>">
          <span data-placeholder="Username"></span>
        </div> 
        <div class="txtb">
          <i class="fas fa-envelope"></i>
          <input type="text" name="email" placeholder="Votre Email...">
          <span data-placeholder="Username"></span>
        </div>

        <div class="txtb">
          <i class="fas fa-user-lock"></i>
          <input type="text" name="code" placeholder="Code du fournisseur...">
          <span data-placeholder="Password"></span>
        </div>

        <input type="submit" name="submitexpedier" class="logbtn" value="Expédier">
        <?php
        }
  }
 
?>

</form>
    
    </div>
   </div>
      </div>

    </div>
  </div>
   
</body>
</html>
