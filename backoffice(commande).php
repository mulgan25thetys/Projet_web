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
      <div><i class="fa fa-user-circle-o" aria-hidden="true"></i>
            <div id="pseudo">
        <?php echo $username;?>
     </div>
      </div>
      <h2>Vos gestions</h2>
      <ul>
        <li><a href="#" onclick="affichercmd()"><i class="fas fa-clone clone"></i>Liste des commandes</a></li>
        <li><a href="#" onclick="triercmd()"><i class="fas fa-sort-alpha-up sort"></i>Trie des commandes</a></li>
        <li><a href="#" onclick="mission()"><i class="fas fa-tasks sort"></i>Missions</a></li>
        <li><a href="#" onclick="Statitiquecmd()"><i class="fas fa-chart-area chart"></i>Statitique</a></li>
        <li><a href="#" onclick="mailing()"><i class="fas fa-envelope-open-text text"></i>Mailing</a></li>
      </ul>
      
    </div>
    <div class="main_content">
      <div class="header">Gestion des commandes.</div>
      <div class="info">
     
    <div class="tableaux" id="tableaux">
    	     <?php
  include "../core/ligne_commandecore.php";
   
   $lignecmdc=new lignecommandecore();
   $resultat=$lignecmdc->afficherligne();
?>
	   <table class="content-table">
	   	<thead>
	   		<tr>
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
        <th>Expédier</th>
	   	</tr>
	   	</thead>
	   	
	   	<tbody>
	   		<?php 
            foreach ($resultat as $row) {
            	
	   	?>
	
	   	<tr>
	   		<td><?php echo $row['nom_prod'];?></td>
	   		<td><?php echo $row['qte'];?></td>
	   		<td><?php echo $row['client'];?></td>
	   		<td><?php echo $row['mail'];?></td>
	   		<td><?php echo $row['adresse'];?></td>
	   		<td><?php echo $row['tel'];?></td>
	   		<td><?php echo $row['livraison'];?></td>
	   		<td><?php echo $row['prix']." DT";?></td>
	   		<td><?php echo $row['datecmd'];?></td>
	   		<td><a href="supprimercmd.php?id=<?PHP echo $row['id']; ?>"><i style="color: #44bd32;" class="fa fa-trash" aria-hidden="true"></i></a></td>
        <td>
          <form method="GET" action="expediercmd.php">
            <button type="submit" name="btnexpedit" id="btnexpedit"><i style="color: #44bd32;"class="fa fa-paper-plane" aria-hidden="true"></i></button>
            <input type="hidden" name="id" value="<?PHP echo $row['id']; ?>">
          </form>
        </td>
	   	</tr>
	   	<?php
	   }
	   ?>
	   	</tbody>
	   	
	   </table> 
    </div>

    <div class="tableauxt" id="tableauxt">
    	    <?php
   $resultat=$lignecmdc->trier();
?>
	   <table class="content-table">
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
	   	</tr>
	   </thead>
	   <tbody>
	   	<?php 
            foreach ($resultat as $row) {
            	
	   	?>
	
	   	<tr>
	   		<td ><?php echo $row['type'];?></td>
	   		<td><?php echo $row['nom_prod'];?></td>
	   		<td style="color: #44bd32;"><?php echo $row['qte'];?></td>
	   		<td><?php echo $row['client'];?></td>
	   		<td><?php echo $row['mail'];?></td>
	   		<td><?php echo $row['adresse'];?></td>
	   		<td><?php echo $row['tel'];?></td>
	   		<td><?php echo $row['livraison'];?></td>
	   		<td><?php echo $row['prix']." DT";?></td>
	   		<td><?php echo $row['datecmd'];?></td>
	   	</tr>
	   	<?php
	   }
	   ?>
	</tbody>
	   </table> 
    </div>
    <div class="tableauxag" id="tableauxag">
          <?php

   $resultat=$lignecmdc->affichermission();
?>
     <table class="content-table">
      <thead>
      <tr>
        <th colspan="2">Missions</th>
      </tr>
     </thead>
     <tbody>
      <?php 
            foreach ($resultat as $row) {
              
      ?>
  
      <tr>
        <td colspan="2"><?php echo $row['mission'];?></td>
      </tr>
      <tr>
        <td>Code forunisseurs</td>
        <td ><?php echo $row['codeagent'];?></td>
      </tr>
      <?php
     }
     ?>
  </tbody>
     </table> 
    </div>
     <div id="mailing" class="mailing">
     	
     
     <?php
 if (isset($_POST['envoyer'])) {
 	# code...
 	if (filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL)) {
 		# code...
 		
 		if (mail($_POST['mail'],$_POST['objet'],$_POST['text'])) {
 			# code...
 			echo "Message envoyé!";
 		}
 		else
 		{
 			echo "Message non envoyé!";
 		}
 	}
 }
?>
           <form method="POST" name="form" id="fformm">
   	<h1 style="color:#009879; font-family: sans-serif;">Envoie d'Email</h1>
   	   <fieldset>
   	   	<i class="fa fa-envelope" aria-hidden="true"></i>
   	   	<input type="text" name="mail" placeholder="Email du destinataire">
   	   </fieldset>
   	   <fieldset>
         <i class="fas fa-sticky-note"></i>
   	   	<input type="text" name="objet" placeholder="Objet du message">
   	   </fieldset>
   	   <fieldset id="text">
   	   	<textarea name="text" placeholder="Votre message..."></textarea>
   	   </fieldset>
   	   	<input type="submit" name="envoyer" value="envoyer" id="button">
   </form>
   </div>
  <div id="statt">
  	  <?php

  /*$dbhost='localhost';
  $dbuser='root';
  $dbname='module_site';
  $dbpass='';

  try {
  	$dbcon = new PDO('mysql:host={$dbhost};dbname={$dbname}', $dbuser, $dbpass);
  	$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
  	die($e->getMessage());
  }*/
  $dbcon=config::getConnexion();
  $stmp=$dbcon->prepare("SELECT *from commandes");
  $stmp->execute();
  $json =[];
  $json2 =[];
  while ($row=$stmp->fetch(PDO::FETCH_ASSOC)) {
  	# code...
  	extract($row);
  	$json[]= $nom_prod;
  	$json2[]= (int)$qte;
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>chart stati</title>
	<meta charset="utf-8">
</head>
<body>
<canvas id="myChart"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script type="text/javascript">
	var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: <?php echo json_encode($json);?>,
        datasets: [{
            label: 'Statitique des commandes',
            backgroundColor: '#009879',
            borderColor: '#009879',
            data: <?php echo json_encode($json2);?>,
        }]
    },

    // Configuration options go here
    options: {}
});
</script>
</body>
</html>
  </div>
    
         
   </div>
      </div>

    </div>
  </div>
   
</body>
</html>
