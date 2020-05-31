<?php
  session_start();
  /*if(!isset($_SESSION['autoriser']) || !$_SESSION['autoriser']) {
       # code...
      echo "<script>alert('La connection a échouée! Connectez-vous pour effectuer tous vos achats');
              location.href= 'home.php';
             </script>";
     }*/
     $pseudo=isset($_SESSION['psdo']) ? $_SESSION['psdo'] : '';
     $email=isset($_SESSION['email']) ? $_SESSION['email'] : '';
     $reference_prod=isset($_SESSION['referenceprod']) ? $_SESSION['referenceprod'] : '';
     /*
							include 'ligne_commandecore.php';
						        if (isset($_POST['envoyer']))
						        {
                                    $commande0=new lignecommandecore();
                                    $resultat=$commande0->searchproduits($_POST['reff']);
                                    foreach ($resultat as $value) {
                                    	session_start();
                                    	$_SESSION['images']=$value['images'];
                                    	$_SESSION['nom']=$value['nom_prod'];
                                    	$_SESSION['prix']=$value['pu'];
						    ?>
							<ul class="header-cart-wrapitem">
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img height="50" width="50" src="images/<?php echo $value['images'];?>" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											<?php echo $value['nom_prod'];?>
										</a>

										<span class="header-cart-item-info">
										  <?php echo $value['pu']." TDN";?>
										</span>
									</div>
								</li>
							</ul>
                            <?php
                                }
						    }*/
                            
?>