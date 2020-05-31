<?php 
   require '_header.php';
   include 'ligne_commande.php';
   include 'ligne_commandecore.php';

   if($panier->count() == 0)
   {
        echo "<script>
         alert('Votre panier est vide vous ne pouvez passez aucune commande!');
          location.href= 'check-out.php';
         </script>";
   }
   elseif(isset($_GET['commande'])) {
      function essaie()
    {
        
        $cmdtest=new lignecommandecore();
        $result=$cmdtest->testconnect();
        foreach ($result as $row) {
            if ($row['email'] == $_GET['email']) {
                $_SESSION['nom']= $row['pseudo'];
                return true;
            }
        }
    }

    function essaieprod()
    {
        //include 'commande_detailcore.php';
        $cmdtest=new lignecommandecore();
        $result=$cmdtest->testproduits();
        foreach ($result as $row) {
            if ($row['reference'] == $_SESSION['referenceprod']) {
                return true;
            }
        }
    }

    $connexionprod=essaieprod();
    $connexion=essaie();

            if($connexion == true)
            {
                 if($connexionprod ==true)
                 {
                     $panier=new lignecommandecore();
                     $resultpanier=$panier->afficherpanier();
                     foreach ($resultpanier as $valuepanier) 
                    {

                        $reference=$valuepanier['refp_prod'];
                        $qteproduit=$valuepanier['qtitep'];
                        $total=$valuepanier['totalp'];

                                $lignecmd=new lignecommande($reference,$qteproduit,$total,$_GET["pays"],$_GET['ville'],$_GET['tel'],$_GET["adr"],$_GET['email']);
                                     $lignecmdcadd=new lignecommandecore();
                                     $resultadd=$lignecmdcadd->ajouterligne($lignecmd);
                                     if($resultadd == true)
                                     {
                                         if (filter_var($_GET['email'],FILTER_VALIDATE_EMAIL)) 
                                        {
                                           $header="MIME-Version: 1.0\r\n";
                                           $header.='From:"Naturalium.com"<support@gmail.com>'."\n";
                                           $header.='Content-Type:text/html; charset="uft-8"'."\n";
                                           $header.='Content-Transfer-Encoding: 8bit';
     
                                           $mailing=$_GET['email'];
                                           $messages='
                                          <html>
                                          <body>
                                          <div align="center" style="background-color=#ececec;">
                                          <h2>Bonjour '.$_SESSION['nom'].' ,</h2>
                                          <h3>Votre commande a été bien prise en compte</h3>
                                          <h3>Merci pour votre fidélité!<h3>
                                          </div>
                                          </body>
                                          </html>';
                        
                                          if (mail($mailing,"Validation de la commande",$messages,$header)) 
                                          {

                                          echo   "<script>
                                          alert('Votre commande a été bien prise en compte!');
                                          location.href= 'index.php';
                                          </script>";
                                          }     
                                        }
                    
                                       else
                                       {
                                           echo   "<script>
                                           alert('Veuillez verifier votre email nous avons pas pu vous notifier!');
                                           location.href= 'check-out.php';
                                           </script>";
                                       }
                                           $panierc = new lignecommandecore();
                                           $panierc->vider();
                                           $_SESSION['panier'] = array();
                                           echo   "<script>
                                           alert('Votre commande a été bien prise en compte!');
                                           location.href= 'index.php';
                                           </script>";
                                     }
                                }
                    }
                 } 
  }  
?>


<?php 
     /*
    if($connexion == true)
    {
       if($connexionprod ==true)
       {
           $panier=new lignecommandecore();
           $resultpanier=$panier->afficherpanier();
           foreach ($resultpanier as $valuepanier) 
            {

            $reference=$valuepanier['refp_prod'];
            $qteproduit=$valuepanier['qtitep'];
            $total=$valuepanier['totalp'];
            
            $lignecmdc=new lignecommandecore();
            $resulcommande=$lignecmdc->afficherligne();

                  foreach($resulcommande as $valuecommande)
                  {
                      if($valuecommande['ref_prod'] == $reference)
                      {
                           if($valuecommande['mail'] == $_GET['email'])
                           {
                                $quantite=intval($valuecommande['qte'] + $qteproduit);
                                $total_add=floatval($valuecommande['total'] + $total);
                                $resultupdate=$lignecmdc->supprimercommande($reference,$_GET['email']);
                                if($resultupdate == true)
                                {
                                     $lignecmd=new lignecommande($reference,$quantite,$total_add,$_GET["pays"],$_GET['ville'],$_GET["adr"],$_GET['email']);
                                     $lignecmdcadd=new lignecommandecore();
                                     $resultadd=$lignecmdcadd->ajouterligne($lignecmd);
                                     if($resultadd == true)
                                     {
                                         if (filter_var($_GET['email'],FILTER_VALIDATE_EMAIL)) 
                                        {
                                           $header="MIME-Version: 1.0\r\n";
                                           $header.='From:"Naturalium.com"<support@gmail.com>'."\n";
                                           $header.='Content-Type:text/html; charset="uft-8"'."\n";
                                           $header.='Content-Transfer-Encoding: 8bit';
     
                                           $mailing=$_GET['email'];
                                           $messages='
                                          <html>
                                          <body>
                                          <div align="center" style="background-color=#ececec;">
                                          <h2>Bonjour '.$_SESSION['nom'].' ,</h2>
                                          <h3>Votre commande a été bien prise en compte</h3>
                                          <h3>Merci pour votre fidélité!<h3>
                                          </div>
                                          </body>
                                          </html>';
                        
                                          if (mail($mailing,"Validation de la commande",$messages,$header)) {

                                          echo   "<script>
                                          alert('Votre commande a été bien prise en compte!');
                                          location.href= 'home.php';
                                          </script>";
                                          }     
                                        }
                    
                                       else
                                       {
                                           echo   "<script>
                                           alert('Veuillez verifier votre email nous avons pas pu vous notifier!');
                                           location.href= 'cart.php';
                                           </script>";
                                       }
                                           $panierc = new lignecommandecore();
                                           $panierc->vider();
                                           $_SESSION['panier'] = array();
                                           echo   "<script>
                                           alert('Votre commande a été bien prise en compte!');
                                           location.href= 'home.php';
                                           </script>";
                                     }
                                }
                                else
                                {
                                            $lignecmd=new lignecommande($reference,$qteproduit,$total,$_GET["pays"],$_GET['ville'],$_GET["adr"],$_GET['email']);
                                     $lignecmdcadd=new lignecommandecore();
                                     $resultadd=$lignecmdcadd->ajouterligne($lignecmd);
                                     if($resultadd == true)
                                     {
                                         if (filter_var($_GET['email'],FILTER_VALIDATE_EMAIL)) 
                                        {
                                           $header="MIME-Version: 1.0\r\n";
                                           $header.='From:"Naturalium.com"<support@gmail.com>'."\n";
                                           $header.='Content-Type:text/html; charset="uft-8"'."\n";
                                           $header.='Content-Transfer-Encoding: 8bit';
     
                                           $mailing=$_GET['email'];
                                           $messages='
                                          <html>
                                          <body>
                                          <div align="center" style="background-color=#ececec;">
                                          <h2>Bonjour '.$_SESSION['nom'].' ,</h2>
                                          <h3>Votre commande a été bien prise en compte</h3>
                                          <h3>Merci pour votre fidélité!<h3>
                                          </div>
                                          </body>
                                          </html>';
                        
                                          if (mail($mailing,"Validation de la commande",$messages,$header)) {

                                          echo   "<script>
                                          alert('Votre commande a été bien prise en compte!');
                                          location.href= 'home.php';
                                          </script>";
                                          }     
                                        }
                    
                                       else
                                       {
                                           echo   "<script>
                                           alert('Veuillez verifier votre email nous avons pas pu vous notifier!');
                                           location.href= 'cart.php';
                                           </script>";
                                       }
                                           $panierc = new lignecommandecore();
                                           $panierc->vider();
                                           $_SESSION['panier'] = array();
                                           echo   "<script>
                                           alert('Votre commande a été bien prise en compte!');
                                           location.href= 'home.php';
                                           </script>";
                                     }
                                }
                           }
                           else
                           {
                                           $lignecmd=new lignecommande($reference,$qteproduit,$total,$_GET["pays"],$_GET['ville'],$_GET["adr"],$_GET['email']);
                                     $lignecmdcadd=new lignecommandecore();
                                     $resultadd=$lignecmdcadd->ajouterligne($lignecmd);
                                     if($resultadd == true)
                                     {
                                         if (filter_var($_GET['email'],FILTER_VALIDATE_EMAIL)) 
                                        {
                                           $header="MIME-Version: 1.0\r\n";
                                           $header.='From:"Naturalium.com"<support@gmail.com>'."\n";
                                           $header.='Content-Type:text/html; charset="uft-8"'."\n";
                                           $header.='Content-Transfer-Encoding: 8bit';
     
                                           $mailing=$_GET['email'];
                                           $messages='
                                          <html>
                                          <body>
                                          <div align="center" style="background-color=#ececec;">
                                          <h2>Bonjour '.$_SESSION['nom'].' ,</h2>
                                          <h3>Votre commande a été bien prise en compte</h3>
                                          <h3>Merci pour votre fidélité!<h3>
                                          </div>
                                          </body>
                                          </html>';
                        
                                          if (mail($mailing,"Validation de la commande",$messages,$header)) {

                                          echo   "<script>
                                          alert('Votre commande a été bien prise en compte!');
                                          location.href= 'home.php';
                                          </script>";
                                          }     
                                        }
                    
                                       else
                                       {
                                           echo   "<script>
                                           alert('Veuillez verifier votre email nous avons pas pu vous notifier!');
                                           location.href= 'cart.php';
                                           </script>";
                                       }
                                           $panierc = new lignecommandecore();
                                           $panierc->vider();
                                           $_SESSION['panier'] = array();
                                           echo   "<script>
                                           alert('Votre commande a été bien prise en compte!');
                                           location.href= 'home.php';
                                           </script>";
                                     }
                           }
                      }
                      else
                      {
                                     $lignecmd=new lignecommande($reference,$qteproduit,$total,$_GET["pays"],$_GET['ville'],$_GET["adr"],$_GET['email']);
                                     $lignecmdcadd=new lignecommandecore();
                                     $resultadd=$lignecmdcadd->ajouterligne($lignecmd);
                                     if($resultadd == true)
                                     {
                                         if (filter_var($_GET['email'],FILTER_VALIDATE_EMAIL)) 
                                        {
                                           $header="MIME-Version: 1.0\r\n";
                                           $header.='From:"Naturalium.com"<support@gmail.com>'."\n";
                                           $header.='Content-Type:text/html; charset="uft-8"'."\n";
                                           $header.='Content-Transfer-Encoding: 8bit';
     
                                           $mailing=$_GET['email'];
                                           $messages='
                                          <html>
                                          <body>
                                          <div align="center" style="background-color=#ececec;">
                                          <h2>Bonjour '.$_SESSION['nom'].' ,</h2>
                                          <h3>Votre commande a été bien prise en compte</h3>
                                          <h3>Merci pour votre fidélité!<h3>
                                          </div>
                                          </body>
                                          </html>';
                        
                                          if (mail($mailing,"Validation de la commande",$messages,$header)) {

                                          echo   "<script>
                                          alert('Votre commande a été bien prise en compte!');
                                          location.href= 'home.php';
                                          </script>";
                                          }     
                                        }
                    
                                       else
                                       {
                                           echo   "<script>
                                           alert('Veuillez verifier votre email nous avons pas pu vous notifier!');
                                           location.href= 'cart.php';
                                           </script>";
                                       }
                                           $panierc = new lignecommandecore();
                                           $panierc->vider();
                                           $_SESSION['panier'] = array();
                                           echo   "<script>
                                           alert('Votre commande a été bien prise en compte!');
                                           location.href= 'home.php';
                                           </script>";
                                     }   
                      }
                  }

            }
       }
    }
  }
}*/

?>