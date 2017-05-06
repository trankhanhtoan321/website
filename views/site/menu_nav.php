<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<nav class="navbar navbar-default navbar-fixed-top" style="font-size:16px;border-bottom:1px solid #0082C8;">
    <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="/">
            <!-- <img class="img-responsive" style="height:50px;padding:0" src="<?=$this->setting_model->tkt_get('logo')?>" /> -->
            <a class="navbar-brand" href="<?= base_url(); ?>">Bukt.info</a>
        </a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-plug"></i> Công Cụ</a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="/tra-cuu-diem-thi-tin-hoc-van-phong.html"><i class="fa fa-search"></i> Tra Cứu Điểm Tin Học Văn Phòng</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <?php if(!$this->session->has_userdata('userlogin')){ ?>
            <li><a href="/login"><i class="fa fa-key"></i> Đăng Nhập</a></li>
        <?php }else{ $user = $this->session->userdata('userlogin');?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user"></i> <?= $user['user_fullname'] ?></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="/login/logout"><i class="fa fa-power-off"></i> Đăng Xuất</a></li>
                </ul>
            </li>
        <?php } ?>
        </ul>
    </div>
</div>
</nav>
<div style="height:60px"></div>