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
                           <th>full name</th>
                           <th>email</th>
                           <th>last login</th>
                           <th>role</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach($users as $blog){ ?>
                        <tr>
                           <td><input type="checkbox" class="flat" name="table_records[]" value="<?= $blog['user_id']; ?>"></td>
                           <td><?= $blog['user_id']; ?></td>
                           <td><img style="width:50px" src="<?= $blog['user_image']; ?>" /></td>
                           <td><?= $blog['user_name'] ?></td>
                           <td><?= $blog['user_fullname'] ?></td>
                           <td><?= $blog['user_email'] ?></td>
                           <td><?= date("Y/m/d H:i",$blog['user_lastlogin']); ?></td>
                           <td><?= $blog['user_role'] ?></td>
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