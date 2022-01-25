<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('magasinier')?>">Accueil</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Dashboard</a></li>
    </ul>

   	

	
   
    <div class="row-fluid">	

        <a class="quick-button metro orange span3">
            <i class="icon-group"></i>
            
            <h1 ><?php $query = $this->db->query('SELECT * FROM client'); echo $query->num_rows();?></h1>
            <h4>Clients</h4>
        </a>
        
        <a class="quick-button metro blue span3">
            <i class="icon-shopping-cart"></i>
            <h1><?php $query = $this->db->query('SELECT * FROM commande'); echo $query->num_rows();?></h1>
            <h4>Commandes</h4>
        </a>

        <a class="quick-button metro red span3">
            <i class="icon-th"></i>
            <h1><?php $query = $this->db->query('SELECT * FROM categorie'); echo $query->num_rows();?></h1>
            <h4>Categories</h4>
        </a>

        <a class="quick-button metro green span3">
            <i class="icon-barcode"></i>
            <h1><?php $query = $this->db->query('SELECT * FROM article'); echo $query->num_rows();?></h1>
            <h4>Produits</h4>
        </a>

        <div class="clearfix"></div>
        <hr>

    </div><!--/row-->

    <div class="row-fluid">
        <div class="span3"></div>
        <a class="quick-button metro pink span3">
            <i class="icon-bold"></i>
            <h1><?php $query = $this->db->query('SELECT * FROM reservation'); echo $query->num_rows();?></h1>
            <h4>Reservation</h4>
        </a>
        <a class="quick-button metro black span3">
            <i class="icon-money"></i>
            <h1><?php $query = $this->db->query('SELECT * FROM commande;')->row(); echo '0';?></h1>
            <h4>Total vente</h4>
        </a>
        
        <div class="span3"></div>
    </div>


</div><!--/.fluid-container-->

<!-- end: Content -->