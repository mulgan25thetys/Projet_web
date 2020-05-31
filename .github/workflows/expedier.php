 <!DOCTYPE html>
 <html>
 <head>
   <title>Expédition</title>
   <meta =charset="utf-8">
 </head>
 <body>
          <?php
    include 'expeditcore.php';
    include 'expedit.php';
    if (isset($_POST['submitexpedier'])) {
            $code=$_POST['code'];        
      $br="</br>";
       if (filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
       
          function essaie()
          {
            $cmdtest=new expediteurcore();
             $result=$cmdtest->connexion($_POST['email']);
             foreach ($result as $row) {
               if ($row['email'] == $_POST['email']) {
                return true;
                }
              }
          }
          $verif=essaie();
          if ($verif == true) {
               function essaie2()
               {
                $agtest=new expediteurcore();
                $result=$agtest->verifier($_POST['code']);
                foreach ($result as $row) {
                if ($row['codeagent'] == $_POST['code']) {
                return true;
                }
              }
             }
            $verif2=essaie2();
            if ($verif2 == true) {
               
               $mission="Vous avez une mission de livrer la commande du produit "."</br>"."Produit :".$_POST['nom_prod'].$br." Livraison :".$_POST['adresse'].$br." Telephone ".$_POST['tel'];
               $agent=new expediteur($code,$mission);
               $agentc=new expediteurcore();
               $test=$agentc->modifier($agent,$code);
               if ($test==true) {
                     header('Location: tablescommandes.php');
                   }
               else
                 {
                      echo "Une erreur est survenue!";
                 }
            }
            else
            {
               $mission="Vous avez une mission de livrer la commande du produit "."</br>"."Produit :".$_POST['nom_prod'].$br." Livraison :".$_POST['adresse'].$br." Telephone ".$_POST['tel'];
               $agent=new expediteur($code,$mission);
               $agentc=new expediteurcore();
               $test=$agentc->expedier($agent);
               if ($test==true) {
                    # code...
                     header('Location: tablescommandes.php');
                   }

               else
                 {
                      echo "Une erreur est survenue!";
                 }
               
            }
         }
         else
         {
          echo "Veuillez vous rassurer d'etre à la charge de cette gestion!";
         }
       }
  }
            
?>
 </body>
 </html>
