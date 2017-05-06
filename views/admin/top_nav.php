<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
$userlogin = $this->session->userdata('userlogin');
$comments_topnav = $this->comment_model->get_new()
?>

<li class="">
    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <img src="<?= $userlogin['user_image']; ?>"><?= $userlogin['user_name'] ?>
        <span class=" fa fa-angle-down"></span>
    </a>
    <ul class="dropdown-menu dropdown-usermenu pull-right">
        <li><a href="/admin/profile_user"><i class="fa fa-info pull-right"></i> Profile</a></li>
        <li><a href="/admin/change_password"><i class="fa fa-lock pull-right"></i> Change Password</a></li>
        <li><a href="/login/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
    </ul>
</li>
<li class="">
    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        Comments <?php if(count($comments_topnav)>0){ ?><span class="badge" style="background-color:#E13300;"><?=count($comments_topnav)?></span><?php } ?>
        <span class=" fa fa-angle-down"></span>
    </a>
    <ul class="dropdown-menu dropdown-usermenu pull-right">
    	<?php foreach($comments_topnav as $ct){ ?>
        <li><a target="_blank" href="/blog-detail-<?=$ct['comment_blog_id']?>.html">Blog ID <?=$ct['comment_blog_id']?> <i class="fa fa-send"></i></a></li>
        <?php } ?>
    </ul>
</li>