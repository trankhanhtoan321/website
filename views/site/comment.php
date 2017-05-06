<form action="" method="post">
	<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
	<div class="panel panel-default">
		<div class="panel-heading"><b>BÌNH LUẬN</b></div>
		<div class="panel-body">
			<div class="list-group">
				<?php foreach($comments as $comment){ ?>
				<div class="list-group-item">
					<div class="row">
						<img style="width:50px;height:50px;float:left;margin-right:5px;margin-left: 5px;" src="<?=$comment['user_image']?>">
						<div class="list-group-item-heading">
							<b><?=$comment['user_fullname']?></b>
							<i style="color:#ACACAC;"><?=date("d-m-Y H:i",$comment['comment_time'])?></i>
							<?php if($this->session->has_userdata('userlogin')){ $user=$this->session->userdata('userlogin'); if($user['user_role']=='admin'){ ?>
							<a href="/admin/delete_comment/<?=$comment['comment_id']?>/?ref=<?=current_url()?>" onclick="return confirm('Are you sure to delete?')" class="pull-right"><i class="fa fa-times"></i></a>
							<?php }} ?>
						</div>
						<div class="list-group-item-text">
							<?=$comment['comment_content']?>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
			<?php if($this->session->has_userdata('userlogin')){ ?>
			<div class="form-group">
				<textarea maxlength="1000" class="resizable_textarea form-control" name="comment_content" placeholder="Comment content here..."></textarea>
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit" data-toggle="tooltip" title="send comment">Gởi Bình Luận</button>
			</div>
			<?php } else { ?>
			<b style="color: #E13300;">Bạn phải đăng nhập để được bình luận!</b>
			<a style="text-decoration: none;" href="/login/loginfacebook/?ref=<?=current_url()?>" class="btn btn-primary">Login With Facebook</a>
            <a style="text-decoration: none;" href="/login/logingoogle/?ref=<?=current_url()?>" class="btn btn-danger">Login With Google</a>
			<?php } ?>
		</div>
	</div>
</form>
<?php
if($this->input->post('comment_content',TRUE) && $this->session->has_userdata('userlogin'))
{
	$user = $this->session->userdata('userlogin');
	$data_insert = array(
		'comment_blog_id' => $blog_id,
		'comment_user_id' => $user['user_id'],
		'comment_time' => time(),
		'comment_content' => strip_tags($this->input->post('comment_content',TRUE))
		);
	if($this->comment_model->tkt_insert($data_insert)) redirect(current_url(),'refresh');
}
/*update status comment if role admin is logined*/
if($this->session->has_userdata('userlogin'))
{
	$user = $this->session->userdata('userlogin');
	if($user['user_role']=='admin')
	{
		$this->comment_model->tkt_update_status($blog_id);
	}
}
?>