<?php
defined('BASEPATH') OR Exit('No direct script access allowed');
?>
<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('magasinier')?>">Dashboard</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="<?php echo base_url('magasinier/gererArticle')?>">Manage Product</a></li>
    </ul>

    <div class="row-fluid sortable">		
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Manage Product</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            
            <style type="text/css">
                #result{color:red;padding: 5px}
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
                            <th>Designation</th>
                            <th>Image</th>
                            <th>Prix</th>
                            <th>Quantite</th>
                            <th>Status de publication</th>
                            <th>Actions</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php 
                        $i=0;
                        foreach($get_all_product as $single_product){
                            $i++;
                        ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td class="center"><?php echo $single_product->designation;?></td>
                            <td class="center"><img src="<?php echo base_url('uploads/'.$single_product->imageArticle);?>" style="width:200px;height:75px"/></td>
                            <td class="center">Fc.<?php echo $single_product->prixArticle;?></td>
                            <td class="center"><?php echo $single_product->qteArticle;?></td>
                            <td class="center">
                                <?php if ($single_product->pstatus == 1) { ?>
                                    <span class="label label-success">Publie</span>
                                <?php } else {
                                    ?>
                                    <span class="label label-danger" style="background:red">Non Publie</span>
                                    <?php }
                                ?>
                            </td>
                           <td class="center">
                                    <?php if ($single_product->pstatus == 0) { ?>
                                        <a class="btn btn-success" href="<?php echo base_url('magasinier/articlePublie/' . $single_product->idArticle); ?>">
                                            <i class="halflings-icon white thumbs-up"></i>  
                                        </a>
                                    <?php } else {
                                        ?>
                                        <a class="btn btn-danger" href="<?php echo base_url('magasinier/articleNonPublie/' . $single_product->idArticle); ?>">
                                            <i class="halflings-icon white thumbs-down"></i>  
                                        </a>
                                        <?php }
                                    ?>

                                    <a class="btn btn-info" href="<?php echo base_url('magasinier/modifierArticle/' . $single_product->idArticle); ?>">
                                        <i class="halflings-icon white edit"></i>  
                                    </a>
                                    <a class="btn btn-danger" href="<?php echo base_url('magasinier/supprimerArticle/' . $single_product->idArticle); ?>">
                                        <i class="halflings-icon white trash"></i> 
                                    </a>
                                </td>
                        </tr>
                        <?php }?>
                        
                    </tbody>
                </table>            
            </div>
        </div><!--/span-->

    </div><!--/row-->



</div><!--/.fluid-container-->

<!-- end: Content -->