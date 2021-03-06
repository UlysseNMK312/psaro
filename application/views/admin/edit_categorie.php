<?php
defined('BASEPATH') OR ('No direct script access allowed');
?>
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
        <li>
            <i class="icon-edit"></i>
            <a href="<?php echo base_url('magasinier/modifierCategorie/'.$category_info_by_id->idCategorie)?>">Modifier Categorie</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Modifier Categorie</h2>
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
                <form class="form-horizontal" action="<?php echo base_url('magasinier/updatecategorie/'.$category_info_by_id->idCategorie);?>" method="post">
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">Nom de la categorie</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="<?php echo $category_info_by_id->nomCategorie;?>" id="category_name" name="nomCategorie" type="text"/>
                            </div>
                        </div>          
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Description</label>
                            <div class="controls">
                                <textarea class="cleditor" id="category_description" name="description" rows="3">
                                    <?php echo $category_info_by_id->description;?>
                                </textarea>
                            </div>
                        </div>
                                
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Status de publication</label>
                            <div class="controls">
                                <select id="slect" name="publication_status">
                                    <option value="1">Publiee</option>
                                    <option value="0">Non Publishee</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" id="save_category" class="btn btn-primary">Enregistrer</button>
                            <button type="reset" class="btn">Annuler</button>
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->

   
    
</div><!--/.fluid-container-->

<!-- end: Content -->