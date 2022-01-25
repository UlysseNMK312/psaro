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
        <li><a href="<?php echo base_url('magasinier/gererCommande') ?>">Les Reservations</a></li>
    </ul>

    <div class="row-fluid sortable">		
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Gerer les reservations</h2>
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
                            <th>Nom article</th>
                            <th>Mode de paiement</th>
                            <th>Montant a Payer</th>
                            <th>Date de commande</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($all_reservation as $single_reservation) {
                            $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $single_reservation->nomClient ?></td>
                                <td><?php echo $single_reservation->designation ?></td>
                                <td><?php echo $single_reservation->dateReservation ?></td>

                                <td class="center">
                                    <?php if ($single_reservation->status == 1) { ?>
                                        <span class="label label-success">Valide</span>
                                    <?php } else {
                                        ?>
                                        <span class="label label-danger" style="background:red">Non Validee</span>
                                        <?php }
                                    ?>
                                </td>
                                <td class="center">
                                    <?php if ($single_order->status == 0) { ?>
                                        <a class="btn btn-success" href="<?php echo base_url('magasinier/reservationValide/' . $single_reservation->idReservation); ?>">
                                            <i class="halflings-icon white thumbs-up"></i>  
                                        </a>
                                    <?php } else {
                                        ?>
                                        <a class="btn btn-danger" href="<?php echo base_url('magasinier/reservationNonValide/' . $single_reservation->idReservation); ?>">
                                            <i class="halflings-icon white thumbs-down"></i>  
                                        </a>
                                        <?php }
                                    ?>

                                    <a class="btn btn-info" href="<?php echo base_url('magasinier/modifierReservation/' . $single_order->idReservation); ?>">
                                        <i class="halflings-icon white edit"></i>  
                                    </a>
                                    <a class="btn btn-danger" href="<?php echo base_url('magasinier/supprimerReservation/' . $single_order->idReservation); ?>">
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