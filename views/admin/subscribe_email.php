<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-title">
   <div class="title_left">
      <h3>Subscribe Email</h3>
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
                           <th>Email</th>
                           <th>Time</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach($subscribe_emails as $t){ ?>
                        <tr>
                           <td><input type="checkbox" class="flat" name="table_records[]" value="<?= $t['sub_id']; ?>"></td>
                           <td><?= $t['sub_id']; ?></td>
                           <td><b><?= $t['sub_email']; ?></b></td>
                           <td><?= date("Y/m/d H:i",$t['sub_time']); ?></td>
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