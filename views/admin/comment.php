<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-title">
   <div class="title_left">
      <h3>Comments</h3>
   </div>
</div>
<form action="" method="post">

   <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_content">
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
                           <th>Content</th>
                           <th>Time</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach($comments as $t){ ?>
                        <tr>
                           <td><input type="checkbox" class="flat" name="table_records[]" value="<?= $t['comment_id']; ?>"></td>
                           <td><?= $t['comment_id']; ?></td>
                           <td><img style="width:40px;height:40px;" src="<?=$t['user_image']?>" /></td>
                           <td><?= $t['user_fullname']; ?></td>
                           <td><?= $t['comment_content']; ?></td>
                           <td><?= date("d-m-Y H:i",$t['comment_time']) ?></td>
                           <td><?= $t['comment_check']==0?"<label class='label label-danger'>new</label>":""; ?></td>
                           <td><a target="_blank" href="/blog-detail-<?=$t['comment_blog_id']?>.html" data-toggle="tooltip" title="go to blog" class="btn btn-primary"><i class="fa fa-send"></i></a></td>
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