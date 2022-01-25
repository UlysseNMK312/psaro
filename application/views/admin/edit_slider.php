<?php
defined('BASEPATH') OR Exit('No direct script access allowed');
?>

<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('dashboard')?>">Accueil</a>
            <i class="icon-angle-right"></i> 
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="<?php echo base_url('slider/edit_slider/'.$slider_info_by_id->idSlider)?>">Modifier Slider</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Modifier Slider</h2>
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
                <p><?php echo $this->session->flashdata('message');?></p>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="<?php echo base_url('slider/update_slider/'.$slider_info_by_id->idSlider);?>" method="post" enctype="multipart/form-data">
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">Nom Slider</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="<?php echo $slider_info_by_id->title;?>" name="title" type="text"/>
                            </div>
                        </div> 
                        
                         <div class="control-group">
                            <label class="control-label" for="fileInput">Slider Image</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="imageSlider" type="file"/>
                                <input class="span6 typeahead" value="<?php echo $slider_info_by_id->imageSlider;?>" name="imageSlider" type="hidden"/>
                            </div>
                        </div>
                        
                        
                         <div class="control-group">
                            <label class="control-label" for="fileInput">Image Slider</label>
                            <div class="controls">
                                <img style="width:500px;height:200px" src="<?php echo base_url('uploads/'.$slider_info_by_id->imageSlider);?>"/>
                            </div>
                        </div>
                        <!--
                         <div class="control-group">
                            <label class="control-label" for="fileInput">Lien Slider</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="<?php echo $slider_info_by_id->linkSlider;?>" name="linkSlider" type="url"/>
                            </div>
                        </div>
                        -->
                                
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Status de Publication</label>
                            <div class="controls">
                                <select name="status">
                                    <option value="1">Publiee</option>
                                    <option value="0">Non Publiee</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" id="save_category" class="btn btn-primary">Sauvegarder</button>
                            <button type="reset" class="btn">Annuler</button>
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->

    
    
</div><!--/.fluid-container-->

<!-- end: Content -->