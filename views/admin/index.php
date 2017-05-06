<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$userlogin = $this->session->userdata('userlogin'); 
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Control</title>

    <!-- css -->
    <link href="/views/assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/views/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/views/assets/nprogress/nprogress.css" rel="stylesheet">
    <link href="/views/assets/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="/views/assets/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="/views/assets/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/views/assets/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="/views/assets/layout-admin/custom.min.css" rel="stylesheet">

    <!-- script -->
    <script src="/views/assets/ckeditor/ckeditor.js"></script>
    <script src="/views/assets/jquery/dist/jquery.min.js"></script>
    <script src="/views/assets/bootstrap/dist/js/bootstrap.min.js"></script>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="<?= $userlogin['user_image'] ?>" class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><?= $userlogin['user_name']; ?><br/>(<i><?= $userlogin['user_fullname']; ?></i>)</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <?php $this->load->view('admin/menu'); ?>
                    </div>
                    <!-- /sidebar menu -->

                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <?php $this->load->view('admin/top_nav'); ?>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>
                    <?php if(isset($_alert)) $this->load->view($_alert); ?>
                    <div class="clearfix"></div>
                    <?php $this->load->view($_content,$_varibles); ?>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    &copy; BUKT Admin Control
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <script src="/views/assets/fastclick/lib/fastclick.js"></script>
    <script src="/views/assets/nprogress/nprogress.js"></script>
    <script src="/views/assets/iCheck/icheck.min.js"></script>
    <script src="/views/assets/select2/dist/js/select2.full.min.js"></script>
    <script src="/views/assets/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/views/assets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/views/assets/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="/views/assets/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="/views/assets/autosize/dist/autosize.min.js"></script>
    <script src="/views/assets/layout-admin/custom.min.js"></script>

    <!-- Select2 -->
    <script>
      $(document).ready(function() {
        $(".select2_single").select2({
          placeholder: "Select an option",
          allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });
    </script>
    <!-- /Select2 -->
    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({
          keys: true
        });
        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });
        $('#datatable-checkbox').dataTable({
          'order': [[ 1, 'desc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $('#datatable-checkbox').on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });
      });
    </script>
    <!-- /Datatables -->
    <!-- Autosize -->
    <script>
      $(document).ready(function() {
        autosize($('.resizable_textarea'));
      });
    </script>
    <!-- /Autosize -->
</body>
</html>