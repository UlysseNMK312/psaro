<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>PSARO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap styles -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- Customize styles -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet"/>
    <!-- font awesome styles -->
	<link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
		<!--[if IE 7]>
			<link href="css/font-awesome-ie7.min.css" rel="stylesheet">
		<![endif]-->

		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	<!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/ico/favicon.ico">
  </head>
<body>
<!-- 
	Upper Header Section 
-->
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="topNav">
		<div class="container">
			<div class="alignR">
				<div class="pull-left socialNw">
					<a href="#"><span class="icon-twitter"></span></a>
					<a href="#"><span class="icon-facebook"></span></a>
					<a href="#"><span class="icon-youtube"></span></a>
					<a href="#"><span class="icon-tumblr"></span></a>
				</div>
				<a class="active" href="<?php echo base_url();?>"> <span class="icon-home"></span> Accueil</a> 
				<a href="#"><span class="icon-user"></span> Mon compte</a> 
				<a href="<?php echo site_url('psaro/creationCompte');?>"><span class="icon-edit"></span> S'enregistrer </a> 
				<a href="<?php echo site_url('psaro/contact');?>"><span class="icon-envelope"></span> Nous contacter</a>
				<a href="<?php echo site_url('panier/panier');?>"><span class="icon-shopping-cart"></span> <?php echo $this->cart->total_items();?> <span class="badge badge-warning"> Fc.<?php echo $this->cart->format_number($this->cart->total());?></span></a>
			</div>
		</div>
	</div>
</div>

<!--
Lower Header Section 
-->
<div class="container">
<div id="gototop"> </div>
<header id="header">
<div class="row">
	<div class="span4">
	<h1>
	<a class="logo" href="<?php echo base_url();?>"><span> Psaro ecommerce</span> 
		<img src="<?php echo base_url();?>assets/img/unnamed.jpg" alt="bootstrap sexy shop">
	</a>
	</h1>
	</div>
	<div class="span4">
	<div class="offerNoteWrapper">
	<h1 class="dotmark">
	<i class="icon-cut"></i>
	PSARO E-shopping 
	</h1>
	</div>
	</div>
	<div class="span4 alignR">
	<p><br> <strong> Appelez-nous (24/7) : +243 00 00 00 000 </strong><br><br></p>
	<span class="btn btn-mini"><?php echo $this->cart->total_items();?><span class="icon-shopping-cart"></span></span>
	<span class="btn btn-warning btn-mini"> Fc.</span>
	<!--<span class="btn btn-mini">&pound;</span>
	<span class="btn btn-mini">&euro;</span>-->
	</div>
</div>
</header>

<!--
Navigation Bar Section 
-->
<div class="navbar">
	  <div class="navbar-inner">
		<div class="container">
		  <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </a>
		  <div class="nav-collapse">
			<ul class="nav">
			<li class="active"><a href="<?php echo base_url();?>">Accueil	</a></li>
			<li class=""><a href="<?php echo site_url('psaro/tousLesProduits');?>">Tous les produits</a></li>
			<li class=""><a href="<?php echo site_url('psaro/grille');?>">Grille</a></li>
			<li class=""><a href="<?php echo site_url('panier/panier');?>">Panier</a></li>
			<li class=""><a href="<?php echo site_url('client/reservation');?>">Reservations</a></li>
			<li class=""><a href="<?php echo site_url('psaro/contact');?>">Contact</a></li>
		</ul>
		<form action="<?php echo base_url('client/search');?>" class="navbar-search pull-left">
			<input type="text" placeholder="Search" class="search-query span2" name="search">
		</form>
			<ul class="nav pull-right">
			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="icon-lock"></span> Connexion <b class="caret"></b></a>
				<div class="dropdown-menu">
				<form class="form-horizontal loginFrm">
				  <div class="control-group">
					<input type="text" class="span2" id="inputEmail" placeholder="Email">
				  </div>
				  <div class="control-group">
					<input type="password" class="span2" id="inputPassword" placeholder="Password">
				  </div>
				  <div class="control-group">
					<label class="checkbox">
					<input type="checkbox"> Remember me
					</label>
					<button type="submit" class="shopBtn btn-block">Se connecter</button>
				  </div>
				</form>
				</div>
			</li>
			</ul>
		  </div>
		</div>
	  </div>
	</div>
<!-- 
Body Section 
-->
	<div class="row">
<div id="sidebar" class="span3">
<div class="well well-small">
	<ul class="nav nav-list">
		<?php foreach($all_category_name as $single_category_name){?>
		<li><a href="<?php echo site_url('psaro/getProduitByCategorie/'.$single_category_name->idCategorie);?>"><span class="icon-chevron-right"></span><?php echo $single_category_name->nomCategorie;?></a></li>
		<?php }?>
		<li><a href="<?php echo site_url('psaro/tousLesProduits');?>"><span class="icon-chevron-right"></span>Autres</a></li>
		<li style="border:0"> &nbsp;</li>
	</ul>
</div>

			  <div class="well well-small alert alert-warning cntr">
				  <h2>50% de reduction</h2>
				  <p> 
					 Valide pour les clients enregistres. <br><br><a class="defaultBtn" href="#">Cliquer ici </a>
				  </p>
			  </div>
			  <div class="well well-small" ><a href="#"><img src="<?php echo base_url();?>assets/img/paypal.jpg" alt="payment method paypal"></a></div>

</div>
	<div class="span9">
	<div class="well np">
		<div id="myCarousel" class="carousel slide homCar">
            <div class="carousel-inner">
						<?php $slider_posts = $this->SliderModel->get_all_slider_post();
                    foreach ($slider_posts as $slider_post) {
                        ?>
			  <div class="item">
                <img style="width:100%" src="<?php echo base_url() ?>uploads/<?php echo $slider_post->imageSlider;?>" alt="bootstrap ecommerce templates">
                <div class="carousel-caption">
                      <h4>Psaro shopping</h4>
                      <p><span>Bienvenu chez nous</span></p>

                </div>
              </div>
										<?php }?>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
          </div>
        </div>
<!--
New Products
-->
	<div class="well well-small">
	<h3>NOUVEAUX </h3>
	<hr class="soften"/>
		<div class="row-fluid">
		
		  <ul class="thumbnails">
			<?php foreach ($all_new_products as $single_new_product) { ?>
			<li class="span4">
			  <div class="thumbnail">
				<a class="zoomTool" href="<?php echo base_url('psaro/detailProduit/'.$single_new_product->idArticle); ?>" title="add to cart"><span class="icon-search"></span> Voir</a>
				<a href="<?php echo base_url('single/' . $single_new_product->idArticle); ?>"><img style="width:250px;height:150px" src="<?php echo base_url('uploads/' . $single_new_product->imageArticle) ?>" alt=""></a>
				<div class="caption cntr">
					<p><?php echo $single_new_product->designation;?></p>
					<p><strong> Fc.<?php echo $this->cart->format_number($single_new_product->prixArticle); ?></strong></p>
					<h4><a class="shopBtn" href="<?php echo base_url('psaro/detailProduit/'.$single_new_product->idArticle); ?>" title="add to cart"> Ajouter au panier </a></h4>
					
					<br class="clr">
				</div>
			  </div>
			</li>
			<?php }?>
</ul>
</div>
	</div>

	<!--
	Featured Products
	-->
		<div class="well well-small">
		  <h3><a class="btn btn-mini pull-right" href="products.html" title="View more">Voir plus<span class="icon-plus"></span></a>Features Products </h3>
		  <hr class="soften"/>
		  <div class="row-fluid">
				
		  <ul class="thumbnails">
			<?php foreach($all_featured_products as $single_feature_product) {?>
			<li class="span4">
			  <div class="thumbnail">
				<a class="zoomTool" href="<?php echo base_url('single/' . $single_feature_product->idArticle); ?>');?>" title="ajouter au panier"><span class="icon-search"></span> Voir</a>
				<a  href="<?php echo base_url('single/' . $single_feature_product->idArticle); ?>"><img style="width:250px;height:150px" src="<?php echo base_url('uploads/' . $single_feature_product->imageArticle) ?>" alt=""></a>
				<div class="caption">
				  <h5><?php echo $single_feature_product->designation; ?></h5>
				  <h4>
					  <a class="defaultBtn" href="<?php echo base_url('single/' . $single_feature_product->idArticle); ?>" title="Click to view"><span class="icon-zoom-in"></span></a>
					  <a class="shopBtn" href="<?php echo base_url('psaro/save_cart'); ?>" title="add to cart"><span class="icon-plus"></span></a>
					  <span class="pull-right">Fc.<?php echo $this->cart->format_number($single_feature_product->prixArticle); ?></span>
				  </h4>
				</div>
			  </div>
			</li>
			<?php }?>
			</ul>
				
				</div>
				</div>
				</div>
				</div>
				<!--
			
		  </ul>	
	</div>
	</div>
				
	<div class="well well-small">
	<a class="btn btn-mini pull-right" href="#">Plus <span class="icon-plus"></span></a>
	Popular Products 
	</div>
	<hr>
	<div class="well well-small">
	<a class="btn btn-mini pull-right" href="#">Plus <span class="icon-plus"></span></a>
	Best selling Products 
	</div>
	</div>
	</div>
<!-- 
Clients 
-->
<section class="our_client">
	<hr class="soften"/>
	<h4 class="title cntr"><span class="text">Distributeur officiel de</span></h4>
	<hr class="soften"/>
	<div class="row">
		<div class="span2">
			<a href="#"><img alt="" src="<?php echo base_url();?>assets/img/chivita.png"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="<?php echo base_url();?>assets/img/cocacolacompany.png"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="<?php echo base_url();?>assets/img/danone.png"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="<?php echo base_url();?>assets/img/culino.png"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="<?php echo base_url();?>assets/img/dasani.png"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="<?php echo base_url();?>assets/img/maziwa.png"></a>
		</div>
	</div>
</section>

<!--
Footer
-->
<footer class="footer">
<div class="row-fluid">
<div class="span2">
<h5>Votre compte</h5>

<a href="<?php echo site_url('client/connexion');?>">Se connecter</a><br>
<a href="<?php echo site_url('client/creationCompte');?>">Creer compte</a><br>
<a href="<?php echo site_url('client/deconnexion');?>">Se deconnecter</a><br>
<!--<a href="#">ORDER HISTORY</a>--><br>
 </div>
<div class="span2">
<h5>liens</h5>
<a href="<?php echo site_url('psaro/contact');?>">Contacts</a><br>
<a href="<?php echo site_url('psaro/contact');?>">Nos adresses</a><br>
<a href="<?php echo site_url('psaro/contact');?>">Nous ecrire</a><br>

 </div>
<div class="span2">
<h5>Liens</h5>
<a href="<?php echo site_url('psaro/tousLesProduits');?>">Nouveaux produits</a> <br>
<a href="<?php echo site_url('client/reservation');?>">Reservations</a><br>
<a href="<?php echo site_url('psaro/apropos');?>">A-Propos de Psaro</a><br>

 </div>
 <div class="span6">
<h5>Nous sommes Psaro</h5>
Notre souhait vous servir en tout le temps et tous les jours.<br>
Avec nous faites vos achats a tout moment et en tout lieu
 </div>
 </div>
</footer>
</div><!-- /container -->

<div class="copyright">
<div class="container">
	<p class="pull-right">
		<a href="#"><img src="<?php echo base_url();?>assets/img/maestro.png" alt="payment"></a>
		<a href="#"><img src="<?php echo base_url();?>assets/img/mc.png" alt="payment"></a>
		<a href="#"><img src="<?php echo base_url();?>assets/img/pp.png" alt="payment"></a>
		<a href="#"><img src="<?php echo base_url();?>assets/img/visa.png" alt="payment"></a>
		<a href="#"><img src="<?php echo base_url();?>assets/img/disc.png" alt="payment"></a>
	</p>
	<span>Copyright &copy; 2021<br> Psaro E-commerce</span>
</div>
</div>
<a href="#" class="gotop"><i class="icon-double-angle-up"></i></a>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.easing-1.3.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.scrollTo-1.4.3.1-min.js"></script>
    <script src="<?php echo base_url();?>assets/js/shop.js"></script>
  </body>
</html>