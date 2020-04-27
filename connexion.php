<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" type="text/css" href="../styles/connexionstyle.css">
    <link rel="stylesheet" type="text/css" href="../styles/entetestyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
</head>
<body>
    <header style="color: #fff;font-family: sans-serif;font-weight: bold; font-size: 35px;">
         S'authentifier pour commander vos produits en toute sécurité.
    </header>
    <div id="infoconnect">
        <?php
           
  include '..\core\connectercore.php';
  include '..\entities\connecter.php';
    if (isset($_POST['envoyer'])) {
        # code...
      $username=isset($_POST['user']) ? $_POST['user'] :'';
      $password=isset($_POST['pass']) ? $_POST['pass'] :'';
      $erreur="";
      if (!empty($username) && !empty($password)){


      $connect=new connecter($username,$password);
      $connectc=new connectercore();
      $result=$connectc->connexion($username,$password);
      $liste=$result->fetchAll();
       foreach ($liste as $row) {

       if ($row['nomutilisateur'] == $username && $row['motdepasse'] == $password) {
         //echo "Vous etes maintenant connecté(e)!"." ".$row['email'];
         //header('Location: indexcommande.php');
        session_start();
        $_SESSION['autoriser']= true;
        $_SESSION['users']=$username;
        $_SESSION['passwd']=$password;
        header('Location:formulaire.php?');
       }
       else
       {
         $erreur="Vous n'etes pas un client veuillez vous abonner!";
       }
     }
      
  }

}
  
?>
<?php 
  if(isset($_POST['abonner'])) {
    # code...
    session_destroy();
    $username=isset($_POST['user']) ? $_POST['user'] :'';
    $password=isset($_POST['pass']) ? $_POST['pass'] :'';
    if(!empty($_POST['user']) && !empty($_POST['pass'])) {
      # code...


      $connect=new connecter($username,$password);
      $connectc=new connectercore();
      $result=$connectc->ajouter($connect);
      if ($result==true) {
        # code...
        session_start();
        $_SESSION['connecter']= true;
        $_SESSION['mailmail']=$username;
        header('Location: formulaire.php');
      }

    }
   }

?>
    </div>
    <div class="container">
        
    

    <div class="imagedesign">
       <img src="..\images\login.png"> 
    </div>
    <form method="POST"  class="formconnexion">
        <div class="user">
            <center>
            <i class="fa fa-user-circle" aria-hidden="true"></i>
            </center>
        </div>
    	<table>
        <tr>
        <?php if (!empty($erreur)) {?>
          <td><?=$erreur ?></td>
      <?php } ?>
      </tr>
    		<tr>
    			<td><i class="fa fa-envelope" aria-hidden="true"></i>Adresse Email</td>
    		</tr>
    		<tr>
    			<td><div class="text"><input type="text" name="user" placeholder="Email..."></div></td>
    		</tr>
    		<tr>
    			<td><i class="fa fa-lock" aria-hidden="true"></i>Mot de passe</td>
    		</tr>
    		<tr>
    			<td><div class="pass"><input type="password" name="pass" placeholder="Mot de passe..."></div></td>
    		</tr>
    		<tr>
    			<td><input type="submit" name="envoyer" value="Se connecter"></td>
    		</tr>
            <tr>
                <td><input type="submit" name="abonner" id="abonner" value="S'abonner"></td>
            </tr>
      
    	</table>
    </form>

   </div>
    
</body>
</html>
