<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>

        <!-- start: Meta -->
        <meta charset="utf-8">
        <title>Psaro Admin Dashboard</title>
        <meta name="description" content="Shop Admin Panel Dashboard">
        <meta name="author" content="Engr Rostom Ali">
        <meta name="keyword" content="Shop Admin Panel Dashboard">
        <!-- end: Meta -->

        <!-- start: Mobile Specific -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- end: Mobile Specific -->

        <!-- start: CSS -->
        <link id="bootstrap-style" href="<?php echo base_url()?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/admin/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link id="base-style" href="<?php echo base_url()?>assets/admin/css/style.css" rel="stylesheet">
        <link id="base-style-responsive" href="<?php echo base_url()?>assets/admin/css/style-responsive.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
        <!-- end: CSS -->


        <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
                <link id="ie-style" href="<?php echo base_url()?>assets/admin/css/ie.css" rel="stylesheet">
        <![endif]-->

        <!--[if IE 9]>
                <link id="ie9style" href="<?php echo base_url()?>assets/admin/css/ie9.css" rel="stylesheet">
        <![endif]-->

        <!-- start: Favicon -->
        <link rel="shortcut icon" href="<?php echo base_url()?>assets/admin/img/favicon.jpg">
        <!-- end: Favicon -->




    </head>

    <body>
        <!-- start: Header -->
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="<?php echo base_url('magasinier')?>">Psaro E-commerce<span></span></a>

                    <!-- start: Header Menu -->
                    <div class="nav-no-collapse header-nav">
                        <ul class="nav pull-right">
                           
                            <li class="dropdown">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="halflings-icon white user"></i> <?php echo $this->session->userdata('nomComplet');?>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-menu-title">
                                        <span>Parametres du compte</span>
                                    </li>
                                    <li><a href="#"><i class="halflings-icon user"></i> Profil</a></li>
                                    <li><a href="<?php echo base_url('magasinier/logout')?>"><i class="halflings-icon off"></i>Deconnexion</a></li>
                                </ul>
                            </li>
                            <!-- end: User Dropdown -->
                        </ul>
                    </div>
                    <!-- end: Header Menu -->

                </div>
            </div>
        </div>
        <!-- start: Header -->

        <div class="container-fluid-full">
            <div class="row-fluid">

                <!-- start: Main Menu -->
                <div id="sidebar-left" class="span2">
                    <div class="nav-collapse sidebar-nav">
                        <ul class="nav nav-tabs nav-stacked main-menu">
                            <li><a href="<?php echo base_url('magasinier')?>"><i class="icon-dashboard"></i><span class="hidden-tablet"> Dashboard</span></a></li>	
                            <li><a href="<?php echo base_url('magasinier/ajouterCategorie')?>"><i class="icon-th"></i><span class="hidden-tablet"> Ajouter Categorie</span></a></li>
                            <li><a href="<?php echo base_url('magasinier/gererCategorie')?>"><i class="icon-tasks"></i><span class="hidden-tablet"> Gerer Categories</span></a></li>
                            <li><a href="<?php echo base_url('magasinier/ajouterArticle')?>"><i class="icon-th"></i><span class="hidden-tablet"> Ajouter Article</span></a></li>
                            <li><a href="<?php echo base_url('magasinier/gererArticle')?>"><i class="icon-tasks"></i><span class="hidden-tablet"> Gerer Article</span></a></li>
                            <li><a href="<?php echo base_url('magasinier/ajouterMarque')?>"><i class="icon-th"></i><span class="hidden-tablet"> Ajouter Marque</span></a></li>
                            <li><a href="<?php echo base_url('magasinier/gererMarque')?>"><i class="icon-tasks"></i><span class="hidden-tablet"> Gerer Marque</span></a></li>
                          
                            <li><a href="<?php echo base_url('slider/add_slider')?>"><i class="icon-font"></i><span class="hidden-tablet"> Ajouter Slider</span></a></li>
                            <li><a href="<?php echo base_url('slider/gerer_slider')?>"><i class="icon-picture"></i><span class="hidden-tablet"> Gerer Slider</span></a></li>
                            <li><a href="<?php echo base_url('magasinier/allCommande')?>"><i class="icon-shopping-cart"></i><span class="hidden-tablet"> Voir commande</span></a></li>
                            <li><a href="<?php echo base_url('magasinier/gererCommande')?>"><i class="icon-list-alt"></i><span class="hidden-tablet"> Gerer commande</span></a></li>
                            <li><a href="<?php echo base_url('magasinier/gererReservation');?>"><i class="icon-shopping-cart"></i><span class="hidden-tablet"> Reservation</span></a></li>
                            <li><a href="<?php echo base_url('magasinier/gererClient');?>"><i class="icon-align-justify"></i><span class="hidden-tablet">Gerer client</span></a></li>
                            
                        </ul>
                    </div>
                </div>
                <!-- end: Main Menu -->

                <noscript>
                <div class="alert alert-block span10">
                    <h4 class="alert-heading">Warning!</h4>
                    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
                </div>
                </noscript>
                
                <?php echo $maincontent;?>
                <?php //echo $chart;?>
               
            </div><!--/#content.span10-->
        </div><!--/fluid-row-->

        <div class="modal hide fade" id="myModal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Settings</h3>
            </div>
            <div class="modal-body">
                <p>Here settings can be configured...</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn" data-dismiss="modal">Close</a>
                <a href="#" class="btn btn-primary">Save changes</a>
            </div>
        </div>

        <div class="clearfix"></div>

        <footer>

            <p> <center>
                <span>&copy; <?php echo date("Y"); ?> Psaro Ecommerce - By <a href="#" style="color:white;" alt="Bootstrap_Metro_Dashboard">Felicite</a></span>

            </p></center>

        </footer>

        <!-- start: JavaScript-->

        <script src="<?php echo base_url()?>assets/admin/js/jquery-1.9.1.min.js"></script>
        <script src="<?php echo base_url()?>assets/admin/js/jquery-migrate-1.0.0.min.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery-ui-1.10.0.custom.min.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery.ui.touch-punch.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/modernizr.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/bootstrap.min.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery.cookie.js"></script>

        <script src='<?php echo base_url()?>assets/admin/js/fullcalendar.min.js'></script>

        <script src='<?php echo base_url()?>assets/admin/js/jquery.dataTables.min.js'></script>

        <script src="<?php echo base_url()?>assets/admin/js/excanvas.js"></script>
        <script src="<?php echo base_url()?>assets/admin/js/jquery.flot.js"></script>
        <script src="<?php echo base_url()?>assets/admin/js/jquery.flot.pie.js"></script>
        <script src="<?php echo base_url()?>assets/admin/js/jquery.flot.stack.js"></script>
        <script src="<?php echo base_url()?>assets/admin/js/jquery.flot.resize.min.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery.chosen.min.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery.uniform.min.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery.cleditor.min.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery.noty.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery.elfinder.min.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery.raty.min.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery.iphone.toggle.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery.uploadify-3.1.min.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery.gritter.min.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery.imagesloaded.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery.masonry.min.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery.knob.modified.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/jquery.sparkline.min.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/counter.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/retina.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/custom.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/chart.js"></script>

        <script src="<?php echo base_url()?>assets/admin/js/Chart.min.js"></script>
        <script src="<?php echo base_url()?>assets/admin/js/off-canvas.js"></script>

        <!-- end: JavaScript-->

    </body>
</html>