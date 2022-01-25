<?php
defined('BASEPATH') OR ('No direct script access allowed');
?>

<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('magasinier') ?>">Accueil</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="<?php echo base_url('magasinier/gererCommande') ?>">Gestion des Client</a></li>
    </ul>

    <div class="row-fluid sortable">		
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Gerer les Clients</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <style type="text/css">
                #result{color:red;padding:5px}
                #result p{color:red}
            </style>
            <div id="result">
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            <th>N.</th>
                            <th>Nom client</th>
                            <th>Mail client</th>
                            <th>Ville</th>
                            <th>Commune</th>
                            <th>Detail Adresse</th>
                            <th>Telephone</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($all_client as $single_client) {
                            $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $single_client->nomClient ?></td>
                                <td><?php echo $single_client->mailClient ?></td>
                                <td><?php echo $single_client->ville ?></td>
                                <td><?php echo $single_client->commune ?></td>
                                <td><?php echo $single_client->detailAdresse ?></td>
                                <td><?php echo $single_client->telephone?></td>
                                

                                <td class="center">
                                    <?php if ($single_client->status == 1) { ?>
                                        <span class="label label-success">VIP</span>
                                    <?php } else {
                                        ?>
                                        <span class="label label-danger" style="background:red">Normal</span>
                                        <?php }
                                    ?>
                                </td>
                                <td class="center">
                                    <?php if ($single_client->status == 0) { ?>
                                        <a class="btn btn-success" href="<?php echo base_url('magasinier/categoriserClientVip/' . $single_client->idClient); ?>">
                                            <i class="halflings-icon white thumbs-up"></i>  
                                        </a>
                                    <?php } else {
                                        ?>
                                        <a class="btn btn-danger" href="<?php echo base_url('magasinier/categoriserClientNormal/' . $single_client->idClient); ?>">
                                            <i class="halflings-icon white thumbs-down"></i>  
                                        </a>
                                        <?php }
                                    ?>

                                    <a class="btn btn-info" href="<?php echo base_url('magasinier/modifierClient/' . $single_client->idClient); ?>">
                                        <i class="halflings-icon white edit"></i>  
                                    </a>
                                    <a class="btn btn-danger" href="<?php echo base_url('magasinier/supprimerClient/' . $single_client->idClient); ?>">
                                        <i class="halflings-icon white trash"></i> 
                                    </a>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>            
            </div>
        </div><!--/span-->

    </div><!--/row-->



</div><!--/.fluid-container-->

<!-- end: Content -->