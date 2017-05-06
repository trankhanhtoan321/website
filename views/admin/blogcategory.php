<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function dequycategory($blogcategorys,$num=0)
{
   echo '<ul style="list-style-type:none;">';
   foreach($blogcategorys as $blogcat)
   {
      if($blogcat['blogcat_parent_id'] == $num)
      {
         echo "<li><label class='control-label'><span class='fa fa-arrow-right'></span> ".$blogcat['blogcat_name']."</label>";
         dequycategory($blogcategorys,$blogcat['blogcat_id']);
         echo "<li>";
      }
   }
   echo '</ul>';
}
?>
<form action="" method="post">
   <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
   <div class="page-title">
      <div class="title_left">
         <h3>Categorys</h3>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_content">
               <a href="/admin/new_blogcategory" data-toggle="tooltip" title="add" class="btn btn-success"><i class="fa fa-plus"></i></a>
               <button data-toggle="tooltip" title="delete" type="submit" class="btn btn-danger" id="delete_button"><i class="fa fa-trash-o"></i></button>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_content">
               <?php dequycategory($blogcategorys); ?>
               <div class="ln_solid"></div>
               <div class="clearfix"></div>
               
               <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category Parent</th>
                        <th>Action</th>
                     </tr>
                  </thead>


                  <tbody>
                     <?php foreach($blogcategorys as $blogcat){ ?>
                     <tr>
                        <td><input type="checkbox" class="flat" name="table_records[]" value="<?= $blogcat['blogcat_id']; ?>"></td>
                        <td><?= $blogcat['blogcat_id']; ?></td>
                        <td><img style="width:50px" src="<?= $blogcat['blogcat_image']; ?>" /></td>
                        <td><b><a target="_blank" href="/<?=rewrite($blogcat['blogcat_seo_title'])?>-<?=$blogcat['blogcat_id']?>-blogcat.html"><?= $blogcat['blogcat_name']; ?></a></b></td>
                        <td>
                           <?php
                           foreach($blogcategorys as $blogtemp)
                           {
                              if($blogtemp['blogcat_id'] == $blogcat['blogcat_parent_id'])
                              {
                                 echo $blogtemp['blogcat_name'];
                                 break;
                              }
                           }
                           ?>
                        </td>
                        <td>
                           <a data-toggle="tooltip" title="edit" href="/admin/update_blogcategory/<?= $blogcat['blogcat_id']; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                        </td>
                     </tr> 
                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</form>

<script>
   $("#delete_button").click(function(){
      if(confirm("Are you sure to delete?")) return true;
      return false;
   });
</script>