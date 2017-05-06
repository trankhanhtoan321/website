<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function dequycategory($categorys,$num=0)
{
   echo '<ul style="list-style-type:none;">';
   foreach($categorys as $cat)
   {
      if($cat['product_category_parent_id'] == $num)
      {
         echo "<li><label class='control-label'><input name='product_category_ids[]' type='checkbox' class='flat' value='".$cat['product_category_id']."' /> ".$cat['product_category_name']."</label>";
         dequycategory($categorys,$cat['product_category_id']);
         echo "<li>";
      }
   }
   echo '</ul>';
}
?>
<form enctype="multipart/form-data" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">
   <div class="page-title">
      <div class="title_left">
         <h3>New Product</h3>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_content">
               <a href="/admin/product" class="btn btn-danger" data-toggle="tooltip" title="close"><i class="fa fa-reply"></i></a>
               <button type="submit" class="btn btn-success" data-toggle="tooltip" title="save"><i class="fa fa-floppy-o"></i></button>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_title">
               <h4>Genarel</h4>
            </div>
            <div class="x_content">
               <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product_name">
                     Name:*
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                     <input type="text" id="product_name" class="form-control col-md-7 col-xs-12" name="product_name" required="required" />
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product_sku">
                     SKU:
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                     <input type="text" id="product_sku" class="form-control col-md-7 col-xs-12" name="product_sku"/>
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product_model">
                     Model:
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                     <input type="text" id="product_model" class="form-control col-md-7 col-xs-12" name="product_model"/>
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product_quantity">
                     Quantity:
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                     <input type="number" value="1" id="product_quantity" class="form-control col-md-7 col-xs-12" name="product_quantity"/>
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product_image">
                     Images:
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                     <input type="file" id="product_image" class="btn btn-primary form-control col-md-7 col-xs-12" name="product_image"/>
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product_price_in">
                     price in(<?=$this->setting_model->tkt_get('currency')?>):
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                     <input type="number" id="product_price_in" value="0" class="form-control col-md-7 col-xs-12" name="product_price_in"/>
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product_price_out">
                     price out (sale)(<?=$this->setting_model->tkt_get('currency')?>):
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                     <input type="number" id="product_price_out" value="0" class="form-control col-md-7 col-xs-12" name="product_price_out"  />
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product_enable">
                     Enable:
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                     <label class="checkbox-inline"><input type="radio" id="product_enable" class="flat" name="product_enable" value="1"/>Enable</label>
                     <label class="checkbox-inline"><input type="radio" id="product_enable" class="flat" name="product_enable" value="0" checked/>Disable</label>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_title">
               <h2>Category:</h2>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <div class="form-group">
                  <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-1">
                     <?php dequycategory($categorys); ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_title">
               <h2>Attribute:</h2>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <div class="form-inline">
                  <div class="col-md-12 col-sm-12 col-xs-12 attribute_product_sc">
                     <input type="text" placeholder="name attribute" class="form-control" name="product_attr[]"><input type="text" name="product_attr_value[]" placeholder="value" class="form-control"><br/>
                  </div>
                  <div class="clearfix"></div><br/>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     <button type="button" data-toggle="tooltip" title="add attribute line" class="btn btn-warning add_attr"><span class="fa fa-plus"></span></button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_title">
               <h2>Gallery:</h2>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <div class="form-group">
                  <div class="col-md-12 col-sm-12 col-xs-12 product_gallery_sc">
                     <input type="file" class="form-control btn btn-primary" name="product_gallery1">
                  </div>
                  <div class="clearfix"></div><br/>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     <button type="button" data-toggle="tooltip" title="add image" class="btn btn-warning add_product_gallery"><span class="fa fa-plus"></span></button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_title">
               <h2>Meta</h2>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product_seo_title">
                     Title:*
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                     <input maxlength="70" type="text" id="product_seo_title" class="form-control col-md-7 col-xs-12" name="product_seo_title" required="required" />
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product_seo_keyword">
                     Keyword:
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                     <input maxlength="160" type="text" id="product_seo_keyword" class="form-control col-md-7 col-xs-12" name="product_seo_keyword" />
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product_seo_description">
                     Description:
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                     <input maxlength="160" type="text" id="product_seo_description" class="form-control col-md-7 col-xs-12" name="product_seo_description" />
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_title">
               <h2>Description</h2>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <div class="form-group">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     <textarea class="ckeditor" name="product_description"></textarea>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

</form>
<script type="text/javascript">
   $(".add_attr").click(function(){
      $(".attribute_product_sc").append('<input type="text" placeholder="name attribute" class="form-control" name="product_attr[]"><input type="text" name="product_attr_value[]" placeholder="value" class="form-control"><br/>');
      return false;
   });
   var i=2;
   $(".add_product_gallery").click(function(){
      $(".product_gallery_sc").append('<input type="file" class="form-control btn btn-primary" name="product_gallery'+i+'">');
      i++;
      return false;
   });
</script>