<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-title">
   <div class="title_left">
      <h3>Products</h3>
   </div>
</div>
<form action="" method="post">

   <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_content">
               <a href="/admin/new_product" data-toggle="tooltip" title="add" class="btn btn-success"><i class="fa fa-plus"></i></a>
               <button data-toggle="tooltip" title="delete" type="submit" class="btn btn-danger" id="delete_button"><i class="fa fa-trash-o"></i></button>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_content">
                  <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>ID</th>
                           <th>Image</th>
                           <th>SKU</th>
                           <th>Name</th>
                           <th>Price (<?=$this->setting_model->tkt_get('currency')?>)</th>
                           <th>enable</th>
                           <th>Quantity</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach($products as $product){ ?>
                        <tr>
                           <td><input type="checkbox" class="flat" name="table_records[]" value="<?= $product['product_id']; ?>"></td>
                           <td><?= $product['product_id']; ?></td>
                           <td><img style="width:50px" src="<?= $product['product_image']; ?>" /></td>
                           <td><?= $product['product_sku']; ?></td>
                           <td><b><a target="_blank" href="/<?=rewrite($product['product_seo_title'])?>-<?=$product['product_id']?>-product.html"><?= $product['product_name']; ?></a></b></td>
                           <td><?= number_format($product['product_price_out']); ?></td>
                           <td><?= $product['product_enable']?'enable':'disable'; ?></td>
                           <td><?= $product['product_quantity']; ?></td>
                           <td><a data-toggle="tooltip" title="edit" href="/admin/update_product/<?= $product['product_id']; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a></td>
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