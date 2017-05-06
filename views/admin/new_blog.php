<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function dequycategory($blogcategorys,$num=0)
{
   echo '<ul style="list-style-type:none;">';
   foreach($blogcategorys as $blogcat)
   {
      if($blogcat['blogcat_parent_id'] == $num)
      {
         echo "<li><label class='control-label'><input name='blog_cat_ids[]' type='checkbox' class='flat' value='".$blogcat['blogcat_id']."' /> ".$blogcat['blogcat_name']."</label>";
         dequycategory($blogcategorys,$blogcat['blogcat_id']);
         echo "<li>";
      }
   }
   echo '</ul>';
}
?>
<div class="page-title">
   <div class="title_left">
      <h3>New Article</h3>
   </div>
</div>
<form enctype="multipart/form-data" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">
   <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
   <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_content">
               <div class="form-group">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     <a href="/admin/blogs" class="btn btn-danger" data-toggle="tooltip" title="close"><i class="fa fa-reply"></i></a>
                     <button type="submit" class="btn btn-success" data-toggle="tooltip" title="save"><i class="fa fa-floppy-o"></i></button>
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
               <h4>Genarel</h4>
            </div>
            <div class="x_content">
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blog_name">
                     Title:
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                     <input type="text" id="blog_name" class="form-control col-md-7 col-xs-12" name="blog_name" />
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">
                     Enable comment:
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                     <lable><input type="radio" name="blog_enable_comment" id="blog_enable_comment" value="1" class="flat" checked />Yes</lable>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <lable><input type="radio" name="blog_enable_comment" id="blog_enable_comment" value="0" class="flat" />No</lable>
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blog_image">
                     Image:<span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                     <input type="file" id="blog_image" class="btn btn-primary form-control col-md-7 col-xs-12" name="blog_image" />
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blog_excerpt">
                     Short Description:
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                     <textarea maxlength="500" id="blog_excerpt" name="blog_excerpt" class="resizable_textarea form-control"></textarea>
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
                     <?php dequycategory($blogcategorys); ?>
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
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blog_seo_title">
                     Title:
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                     <input maxlength="70" type="text" id="blog_seo_title" class="form-control col-md-7 col-xs-12" name="blog_seo_title" />
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blog_seo_keyword">
                     Keyword:
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                     <input maxlength="160" type="text" id="blog_seo_keyword" class="form-control col-md-7 col-xs-12" name="blog_seo_keyword" />
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blog_seo_description">
                     Description:
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                     <input maxlength="160" type="text" id="blog_seo_description" class="form-control col-md-7 col-xs-12" name="blog_seo_description" />
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
               <h2>Content:</h2>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <div class="form-group">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     <textarea class="ckeditor" name="blog_content"></textarea>
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
               <h2>
                  <label class='control-label'>
                     <input type="checkbox" name="sendmail" value="1" class="flat">
                     Enable Send Mail
                  </label>
               </h2>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <div class="form-group">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     <label class='control-label'>
                        <input type="checkbox" name="sendmailsubscribe" value="1" class="flat">
                        Send Email To List Email Subscribe.
                     </label>
                  </div>
               </div>
               <hr/>
               <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12">
                     <b>Send Email To:</b>
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12 listemail">
                     <input type="email" class="form-control col-md-9 col-xs-12" name="emails[]" />
                  </div>
               </div>
               <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12"></div>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                     <button class="btn btn-warning pull-right" id="addemail" data-toggle="tooltip" title="add more email">
                        <i class="fa fa-plus"></i>
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

</form>
<script type="text/javascript">
   $("#addemail").click(function(){
      $(".listemail").append("<input type='email' class='form-control col-md-9 col-xs-12' name='emails[]' />");
      return false;
   });
</script>