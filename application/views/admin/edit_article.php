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
            <a href="<?php echo base_url('magasinier/modifierArticle'.$product_info_by_id->idArticle)?>">Modification Article</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Modifier Article</h2>
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
                <form name="formName" class="form-horizontal" action="<?php echo base_url('magasinier/updateArticle'.$product_info_by_id->idArticle);?>" method="post" enctype="multipart/form-data">
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">Product Title</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="<?php echo $product_info_by_id->designation;?>" name="designation" id="fileInput" type="text"/>
                            </div>
                        </div>          
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="description" id="textarea2" rows="2">
                                    <?php echo $product_info_by_id->escription;?>
                                </textarea>
                            </div>
                        </div>        
                        
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Image article</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="imageArticle" id="fileInput" type="file"/>
                                <input class="span6 typeahead" name="imageArticle" value="<?php echo base_url('uploads/'.$product_info_by_id->imageArticle);?>" type="hidden"/>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <div class="controls">
                                <img src="<?php echo base_url('uploads/'.$product_info_by_id->imageArticle);?>" style="width:500px;height:200px"/>
                            </div>
                        </div> 
                        
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Prix Article</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="<?php echo $product_info_by_id->prixArticle;?>" name="prixArticle" id="fileInput" type="text"/>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Quantite article</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="<?php echo $product_info_by_id->qteArticle;?>" name="qteArticle" id="fileInput" type="text"/>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Product Category</label>
                            <div class="controls">
                                <select id="product_category" name="categorieArticle">
                                    <?php foreach($all_published_category as $single_category){?>
                                    <option value="<?php echo $single_category->idCategorie;?>"><?php echo $single_category->nomCategorie;?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div> 
                        
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Marque</label>
                            <div class="controls">
                                <select id="product_brand" name="nomMarque">
                                    <?php foreach($all_published_brand as $single_brand){?>
                                    <option value="<?php echo $single_brand->idMarque;?>"><?php echo $single_brand->nomMarque;?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div> 
                        
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Product Featured</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="0" name="niveau" id="fileInput" type="radio"/> Unfeatured
                                <input class="span6 typeahead" value="1" name="niveaeu" id="fileInput" type="radio" />Featured
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Publication Status</label>
                            <div class="controls">
                                <select id="publication_status" name="status">
                                    <option value="1">Publie</option>
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

<script>
document.getElementById('publication_status').value = <?php echo $product_info_by_id->pstatus;?>;
document.formName.product_feature.value=<?php echo $product_info_by_id->niveau;?>;
document.getElementById('product_brand').value = <?php echo $product_info_by_id->marque;?>;
document.getElementById('product_category').value = <?php echo $product_info_by_id->categorieProduit;?>;
</script>