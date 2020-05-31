<?php
  require_once ("session_verif.php");
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Naturalium | Tableau commandes</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>Naturalium</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenue,</span>
                <h2><?php echo $pseudo;?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Generale</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Accueil <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php">Tableau de bords</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Formulaires <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form-commandes.php">Formulaires commandes</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tablescommandes.php">Tables-commandes</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Présentation des données <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="statitiques.php">Statitique</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Autres</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Pages aditionnelles <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="contacts.php">Contacts</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="mailing.php">Mailing</a></li>
                      <li><a href="page_404.html">404 Erreur</a></li>
                      <li><a href="login.php">Connexion</a></li>
                    </ul>
                  </li>                 
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Paramètres">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Plein écran">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Bloquer">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Déconnecter" href="login.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="images/user.png" alt=""><?php echo $pseudo;?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="javascript:;"> Profile</a>
                        <a class="dropdown-item"  href="javascript:;">
                          <span class="badge bg-red pull-right">50%</span>
                          <span>Paramètres</span>
                        </a>
                    <a class="dropdown-item"  href="javascript:;">Aides</a>
                      <a class="dropdown-item"  href="deconnexion.php"><i class="fa fa-sign-out pull-right"></i> Déconnection</a>
                    </div>
                  </li>
  
                  <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-envelope-o"></i>
                      <span class="badge bg-green">1</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/user.png" alt="Profile Image" /></span>
                          <span>
                            <span>Mulgan </span>
                            <span class="time">3 min plus tard</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Tableaux de bord <small>Visualisez vos tableaux</small></h3>
              </div>
               <a href="tablescommandes.php"><i style="font-size: 22px;border-radius: 50%;box-shadow: 0 0 6px 2px rgb(0,0,0,0.2);" class="fa fa-repeat" aria-hidden="true"></i></a>
              <div class="title_right">
                <div  class="col-md-5 col-sm-5   form-group pull-right top_search">
                  <div class="input-group">
                    <a href="tablescommandes.php"><i class="fas fa-undo-alt"></i></a>
                  </div>
                  <div class="input-group">
                    <form action="recherchercommandes.php" method="POST" style="width: 800px; display: flex;">
                       <input type="text" name="search" class="form-control" placeholder="Par quantité...">
                       <span class="input-group-btn">
                       <button class="btn btn-default" name="text" type="submit">Go!</button>
                       </span>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row" style="display: block;">
              


             

              <div class="clearfix"></div>

              <div class="col-md-6 col-sm-6  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Expéditions<small>Livraison des commandes</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php
                      include 'ligne_commandecore.php';
                      $lignecmd=new lignecommandecore();
                      $resultat=$lignecmd->affichermission();
                    ?>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Code fournisseurs</th>
                          <th>Missions</th>
                        </tr>
                      </thead>
                      <?php
                            foreach ($resultat as $row) {
                          ?>
                      <tbody>
                        <tr>
                          <th scope="row"><?php echo $row['id_ag'];?></th>
                          <td><?php echo $row['codeagent'];?></td>
                          <td><?php echo $row['mission'];?></td>
                        </tr>
                      </tbody>
                       <?php
                       }
                        ?>
                    </table>

                  </div>
                </div>
              </div>

              <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tous  <small>Vos commandes</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <?php
                      $resultat=$lignecmd->afficherligne();
                    ?>
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">Produits</th>
                            <th class="column-title">Référence</th>
                            <th class="column-title">Quantité</th>
                            <th class="column-title">Client</th>
                            <th class="column-title">Livraison</th>
                            <th class="column-title">Téléphone</th>
                            <th class="column-title">Date</th>
                            <th class="column-title">Prix total</th>
                            <th class="column-title">Supprimer</th>
                            <th class="column-title">Expédier</th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>
                          <?php
                            foreach ($resultat as $row) {
                          ?>
                        <tbody>
                          <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" "><img height="50" width="50" src="../images/<?php echo $row['images'];?>"></td>
                            <td class=" "><?php echo $row['reference'];?></td>
                            <td class=" "><?php echo $row['qte'];?></td>
                            <td class=" "><?php echo $row['pseudo'];?></td>
                            <td class=" "><?php echo $row['pays']."/".$row['ville']."/"."Adresse :".$row['adr'];?></td>
                            <td class=" "><?php echo $row['tel'];?></td>
                            <td class=" "><?php echo $row['datecmd'];?></td>
                            <td class="a-right a-right "><?php echo $row['total']." "."TDN"?></td>
                            <td><a href="supprimercmd.php?id=<?PHP echo $row['iddet']; ?>"><i style="color: #44bd32;" class="fa fa-trash" aria-hidden="true"></i></a></td>
                            <td>
                                <form method="GET" action="expediercmd.php">
                                <button type="submit" name="btnexpedit" id="btnexpedit"><i style="color: #44bd32;"class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                <input type="hidden" name="id" value="<?PHP echo $row['iddet']; ?>">
                                </form>
                            </td>
                          </tr>
                        </tbody>
                        <?php
                       }
                        ?>
                      </table>
                      <a href="triercommande.php" style="font-size: 20px; font-weight: bold;color: #44bd32;">Trier</a>
                    </div>
							
						
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Naturalium.com
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>
