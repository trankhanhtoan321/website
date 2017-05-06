<h4>ĐĂNG KÝ NHẬN TIN QUA EMAIL</h4>
<form action='' method='post'>
	<div class="input-group">
		<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
		<input type="text" name="sub_email" class="form-control" placeholder="Nhập Email">
		<div class="input-group-btn">
			<button class="btn btn-success" type="submit"><i class="fa fa-send"></i></button>
		</div>
	</div>
</form>
<?php
if($this->input->post('sub_email',TRUE) && $this->tkt_validate->is_email($this->input->post('sub_email',TRUE)))
{
	$data_insert = array(
		'sub_email' => $this->input->post('sub_email',TRUE),
		'sub_time' => time()
		);
	if($this->subscribe_email_model->tkt_insert($data_insert))
	{
		?>
		<script type="text/javascript">
			alert('subscribe email success!');
		</script>
		<?php
	}
	else
	{
		?>
		<script type="text/javascript">
			alert('subscribe email failled!');
		</script>
		<?php
	}
}
?>