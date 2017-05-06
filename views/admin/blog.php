<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-title">
   <div class="title_left">
      <h3>Articles</h3>
   </div>
</div>
<form action="" method="post">

   <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_content">
               <a href="/admin/new_blog" data-toggle="tooltip" title="add" class="btn btn-success"><i class="fa fa-plus"></i></a>
               <button data-toggle="tooltip" title="delete" type="submit" class="btn btn-danger" id="delete_button"><i class="fa fa-trash-o"></i></button>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_content">
               
                  <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
                  <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>ID</th>
                           <th>Image</th>
                           <th>Name</th>
                           <th>Time</th>
                           <th>views</th>
                           <th>comments</th>
                           <th>enable comments</th>
                           <th>category</th>
                           <th>user</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach($blogs as $blog){ ?>
                        <tr>
                           <td><input type="checkbox" class="flat" name="table_records[]" value="<?= $blog['blog_id']; ?>"></td>
                           <td><?= $blog['blog_id']; ?></td>
                           <td><img style="width:50px" src="<?= $blog['blog_image']; ?>" /></td>
                           <td><b><a target="_blank" href="/<?=rewrite($blog['blog_seo_title'])?>-<?=$blog['blog_id']?>.html"><?= $blog['blog_name']; ?></a></b></td>
                           <td><?= date("Y/m/d H:i",$blog['blog_time']); ?></td>
                           <td><?= $blog['blog_views'] ?></td>
                           <td><?= $blog['blog_comments'] ?></td>
                           <td><?= $blog['blog_enable_comment'] ?></td>
                           <td><?=$blog['blog_cat_names']?></td>
                           <td><?= $blog['user_name'] ?></td>
                           <td><a data-toggle="tooltip" title="edit" href="/admin/update_blog/<?= $blog['blog_id']; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a></td>
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