<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<form enctype="multipart/form-data" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">
   <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
   <div class="page-title">
      <div class="title_left">
         <h3>New Product Categorys</h3>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_content">
               <a href="/admin/blogcategory" class="btn btn-danger" data-toggle="tooltip" title="close"><i class="fa fa-reply"></i></a>
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
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blogcat_name">
                     Category Name:<span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                     <input type="text" id="blogcat_name" class="form-control col-md-7 col-xs-12" name="blogcat_name" required="required" />
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blogcat_image">
                     Images:
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                     <input type="file" id="blogcat_image" class="btn btn-primary form-control col-md-7 col-xs-12" name="blogcat_image"/>
                  </div>
               </div>
               <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12">Category Parent:</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                     <select name="blogcat_parent_id" class="select2_single form-control" tabindex="-1">
                        <option></option>
                        <option value="0">None (NULL)</option>
                        <?php foreach($blogcategorys as $blogcat){ ?>
                           <option value="<?= $blogcat['blogcat_id']; ?>"><?= $blogcat['blogcat_name']; ?></option>
                        <?php } ?>
                     </select>
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
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blogcat_seo_title">
                     Title:
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                     <input maxlength="70" type="text" id="blogcat_seo_title" class="form-control col-md-7 col-xs-12" name="blogcat_seo_title" />
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blogcat_seo_keyword">
                     Keyword:
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                     <input maxlength="160" type="text" id="blogcat_seo_keyword" class="form-control col-md-7 col-xs-12" name="blogcat_seo_keyword" />
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blogcat_seo_description">
                     Description:
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                     <input maxlength="160" type="text" id="blogcat_seo_description" class="form-control col-md-7 col-xs-12" name="blogcat_seo_description" />
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
               <h2>Category Description</h2>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <div class="form-group">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     <textarea class="ckeditor" name="blogcat_description"></textarea>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

</form>