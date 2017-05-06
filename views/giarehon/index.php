<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tìm và so sánh giá thấp nhất Lazada,Tiki,Adayroi</title>
    <meta name="Description" content="Giarehon.net là website so sánh giá và tìm giá thấp nhất  Lazada,Tiki,Adayroi">
    <meta name="Keywords" content="tìm giá, so sánh giá, Lazada, Adayroi, tiki, giá rẻ hơn, giá rẻ nhất">
    <meta name="author" content="Trần Khánh Toàn" />
    <meta name="copyright" content="Trần Khánh Toàn" />
    <link rel="icon" href="/uploads/icons/favicon.png" type="image/png" sizes="16x16">
    <link rel="canonical" href="/"/>
    <meta name="robots" content="index,follow" />
    <meta name="revisit-after" content="days">
    <link rel="publisher" href="https://plus.google.com/114746573387722844751"/>
    <link rel="author" href="https://plus.google.com/114746573387722844751"/>
    <meta itemprop="name" content="Tìm và so sánh giá thấp nhất Lazada,Tiki,Adayroi">
    <meta itemprop="description" content="Giarehon.net là website so sánh giá và tìm giá thấp nhất  Lazada,Tiki,Adayroi">
    <meta itemprop="image" content="/uploads/icons/favicon.png">
    <meta property="og:title" content="Tìm và so sánh giá thấp nhất Lazada,Tiki,Adayroi" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="/" />
    <meta property="og:image" content="/uploads/icons/favicon.png" />
    <meta property="og:description" content="Giarehon.net là website so sánh giá và tìm giá thấp nhất  Lazada,Tiki,Adayroi" />
    <meta property="og:site_name" content="Tìm và so sánh giá thấp nhất Lazada,Tiki,Adayroi" />
    <meta property="fb:admins" content="707865849393292" />
    <meta name="geo.placename" content="Viet Nam" />
    <meta name="geo.region" content="VN" />
    <!-- css -->
    <link href="/views/assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/views/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/views/assets/layout_giarehon/style.css" rel="stylesheet">
    <link href="/views/assets/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- script -->
    <script src="/views/assets/jquery/dist/jquery.min.js"></script>
    <script src="/views/assets/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>
   <?php
   $this->load->view('giarehon/menu_nav',$_varibles);
   $this->load->view($_content,$_varibles);
   ?>
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h2>Đang xử lý yêu cầu...</h2>
        </div>
        <div class="modal-body">
          <div class="progress" style="height:25px">
            <div  class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
<button id="showxuly" style="display:none;" data-toggle="modal" data-target="#myModal"></button>
<script src="/views/assets/iCheck/icheck.min.js"></script>
<script src="/views/assets/layout_giarehon/custom.js"></script>
</body>
</html>
