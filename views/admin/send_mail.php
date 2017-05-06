<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-title">
   <div class="title_left">
      <h3>Send Mail</h3>
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
                     <button type="submit" class="btn btn-success" data-toggle="tooltip" title="send"><i class="fa fa-paper-plane-o"></i></button>
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
               <h2>Info</h2>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">
                     TO:
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12 emailto">
                     <input type="email" class="form-control col-xs-12" name="to[]" />
                  </div>
                  <div class="col-md-2 col-sm-2 col-xs-12">
                     <button id="addto" class="btn btn-primary" data-toggle="tooltip" title="add more email to"><i class="fa fa-plus"></i></button>
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">
                     CC:
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12 emailcc">
                     <input type="email" class="form-control col-xs-12" name="cc[]" />
                  </div>
                  <div class="col-md-2 col-sm-2 col-xs-12">
                     <button id="addcc" class="btn btn-primary" data-toggle="tooltip" title="add more email cc"><i class="fa fa-plus"></i></button>
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">
                     BCC:
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12 emailbcc">
                     <input type="email" class="form-control col-xs-12" name="bcc[]" />
                  </div>
                  <div class="col-md-2 col-sm-2 col-xs-12">
                     <button id="addbcc" class="btn btn-primary" data-toggle="tooltip" title="add more email bcc"><i class="fa fa-plus"></i></button>
                  </div>
               </div>
               <hr/>
               <div class="form-group">
                  <div class="col-md-2 col-sm-2 col-xs-2"></div>
                  <div class="col-md-10 col-sm-10 col-xs-2">
                     <label class="control-label">
                        <input type="checkbox" name="emailsubscribe" value="1" class="flat">
                        Send email to list email subscribe.
                     </label>
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
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">
                     Subject:
                  </label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                     <input type="text" class="form-control col-md-7 col-xs-12" name="subject" />
                  </div>
               </div>
               <div class="form-group">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     <textarea class="ckeditor" name="body"></textarea>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

</form>
<script type="text/javascript">
   $("#addto").click(function(){
      $(".emailto").append("<input type='email' class='form-control col-xs-12' name='to[]' />");
      return false;
   });
   $("#addcc").click(function(){
      $(".emailcc").append("<input type='email' class='form-control col-xs-12' name='cc[]' />");
      return false;
   });
   $("#addbcc").click(function(){
      $(".emailbcc").append("<input type='email' class='form-control col-xs-12' name='bcc[]' />");
      return false;
   });
</script>