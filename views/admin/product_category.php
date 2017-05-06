<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function dequycategory($categorys,$num=0)
{
   echo '<ul style="list-style-type:none;">';
   foreach($categorys as $cat)
   {
      if($cat['product_category_parent_id'] == $num)
      {
         echo "<li><label class='control-label'><span class='fa fa-arrow-right'></span> ".$cat['product_category_name']."</label>";
         dequycategory($categorys,$cat['product_category_id']);
         echo "<li>";
      }
   }
   echo '</ul>';
}
?>
<form action="" method="post">
   <div class="page-title">
      <div class="title_left">
         <h3>Product Categorys</h3>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_content">
               <a href="/admin/new_product_category" data-toggle="tooltip" title="add" class="btn btn-success"><i class="fa fa-plus"></i></a>
               <button data-toggle="tooltip" title="delete" type="submit" class="btn btn-danger" id="delete_button"><i class="fa fa-trash-o"></i></button>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_content">
               <?php dequycategory($categorys); ?>
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
                     <?php foreach($categorys as $cat){ ?>
                     <tr>
                        <td><input type="checkbox" class="flat" name="table_records[]" value="<?= $cat['product_category_id']; ?>"></td>
                        <td><?= $cat['product_category_id']; ?></td>
                        <td><img style="width:50px" src="<?= $cat['product_category_image']; ?>" /></td>
                        <td><b><a target="_blank" href="/<?=rewrite($cat['product_category_seo_title'])?>-<?=$cat['product_category_id']?>-procat.html"><?= $cat['product_category_name']; ?></a></b></td>
                        <td>
                           <?php
                           foreach($categorys as $temp)
                           {
                              if($temp['product_category_id'] == $cat['product_category_parent_id'])
                              {
                                 echo $temp['product_category_name'];
                                 break;
                              }
                           }
                           ?>
                        </td>
                        <td>
                           <a data-toggle="tooltip" title="edit" href="/admin/update_product_category/<?= $cat['product_category_id']; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
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