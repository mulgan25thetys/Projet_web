//session verifier pour utilisateur
<?php
    session_start();
  	$username=isset($_SESSION['users']) ? $_SESSION['users'] :'';
    $password=isset($_SESSION['passwd']) ? $_SESSION['passwd'] :'';

?>
//session verifer pour administrateur
<?php
session_start();
     if (!isset($_SESSION['autoriseragent']) || !$_SESSION['autoriseragent']) {
       # code...
      header('Location:compteruser.php?erreur=3');
     }
     $username=isset($_SESSION['email']) ? $_SESSION['email'] : '';
     $password=isset($_SESSION['pass']) ? $_SESSION['pass'] : '';
?>

//session alerte
<?php
 $erreur=isset($_GET['erreur']) ? $_GET['erreur'] : '';
 $mail=isset($_GET['users']) ? $_GET['users'] : '';
 $pass=isset($_GET['password']) ? $_GET['password'] : '';
?>
<html>
<head>
	<title>Espace connexion</title>
	<link rel="stylesheet" type="text/css" href="../styles/listecmdstyle.css">
	 <link rel="stylesheet" type="text/css" href="../styles/entetestyle.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script type="text/javascript" language="javascript" src="../javascripte/backcmdscript.js"></script>
</head>
<body>
	 <header style="color: #fff;font-family: sans-serif;font-weight: bold; font-size: 35px;">
        Pour toutes opérations connecter vous à votre compte Agent.  
    </fieldset>
    </header>

    <div id="connexion">
       <?php
          switch ($erreur) {
            case 1:
              # code...
            echo "Veuillez verifier votre adresse $mail!";
              break;
              case 2:
              # code...
              echo "Mot de passe invalide $pass";
              break;
              case 3:
              # code...
              echo "Veuillez bien vous authentifier pour continuer";
              break;
          }
       ?>
     </div>

</body>
</html>
