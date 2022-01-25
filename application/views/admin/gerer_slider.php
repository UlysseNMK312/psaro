<?php
defined('BASEPATH') OR Exit('No direct script access allowed');
?>

<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('dashboard') ?>">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="<?php echo base_url('manage/brand') ?>">Manage Brand</a></li>
    </ul>

    <div class="row-fluid sortable">		
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Manage Brand</h2>
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
                            <th>Nom Slider</th>
                            <!--<th>Lien Slider</th>-->
                            <th>Image Slider</th>
                            <th>Status de publication</th>
                            <th>Actions</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($all_slider as $single_slider) {
                            $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td class="center"><?php echo $single_slider->title; ?></td>
                                <!--<td class="center"><a target="_blank" href="<?php echo base_url($single_slider->title);?>">Allez a</a></td>
                                --><td class="center"><img src="<?php echo base_url('uploads/'.$single_slider->imageSlider);?>" style="width:300px;height:100px"/></td>
                                <td class="center">
                                    <?php if ($single_slider->status == 1) { ?>
                                        <span class="label label-success">Publiee</span>
                                    <?php } else {
                                        ?>
                                        <span class="label label-danger" style="background:red">Non publie</span>
                                    <?php }
                                    ?>
                                </td>
                                <td class="center">
                                    <?php if ($single_slider->status == 0) { ?>
                                        <a class="btn btn-success" href="<?php echo base_url('slider/slider_publie/' . $single_slider->idSlider); ?>">
                                            <i class="halflings-icon white thumbs-up"></i>  
                                        </a>
                                    <?php } else {
                                        ?>
                                        <a class="btn btn-danger" href="<?php echo base_url('slider/slider_non_publie/' . $single_slider->idSlider); ?>">
                                            <i class="halflings-icon white thumbs-down"></i>  
                                        </a>
                                    <?php }
                                    ?>

                                    <a class="btn btn-info" href="<?php echo base_url('slider/modifier/' . $single_slider->idSlider); ?>">
                                        <i class="halflings-icon white edit"></i>  
                                    </a>
                                    <a class="btn btn-danger" href="<?php echo base_url('slider/supprimer/' . $single_slider->idSlider); ?>">
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