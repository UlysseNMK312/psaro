<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
            <a href="<?php echo site_url('magasinier/ajouterArticle')?>">Ajout Article</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Ajouter Article</h2>
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
                <form class="form-horizontal" action="<?php echo site_url('magasinier/newArticle');?>" method="post" enctype="multipart/form-data">
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">Designation</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="designation" id="fileInput" type="text"/>
                            </div>
                        </div>          
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Description Article</label>
                            <div class="controls">
                                <textarea class="cleditor" name="description" id="textarea2" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Image Article</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="imageArticle" id="fileInput" type="file"/>
                            </div>
                        </div> 
                        
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Prix Article</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="prixArticle" id="fileInput" type="text"/>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Quantite Article</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="qteArticle" id="fileInput" type="text"/>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Categorie Produit</label>
                            <div class="controls">
                                <select name="categorieArticle">
                                    <?php foreach($all_published_category as $single_category){?>
                                    <option value="<?php echo $single_category->idCategorie;?>"><?php echo $single_category->nomCategorie;?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div> 
                        
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Marque Article</label>
                            <div class="controls">
                                <select name="marque">
                                    <?php foreach($all_published_brand as $single_brand){?>
                                    <option value="<?php echo $single_brand->idMarque;?>"><?php echo $single_brand->nomMarque;?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div> 
                        
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Produit Populaire</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="0" name="niveau" id="fileInput" type="radio" checked="true"/> Non populaire
                                <input class="span6 typeahead" value="1" name="niveau" id="fileInput" type="radio" />Populaire
                             </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Publication Status</label>
                            <div class="controls">
                                <select name="status">
                                    <option value="1">Publiee</option>
                                    <option value="0">Non Publie</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            <button type="reset" class="btn">Annuler</button>
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->


</div><!--/.fluid-container-->

<!-- end: Content -->