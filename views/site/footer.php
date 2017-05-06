<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid" style="margin-top:10px; background-color: #2f2f2f;padding-top: 10px;color:#ACACAC;">
	<div class="row">
		<div class="col-sm-3">
			<?php $this->load->view('site/doi_tac'); ?>
		</div>
		<div class="col-sm-3">
			<?php $this->load->view('site/ket_noi_chung_toi'); ?>
		</div>
		<div class="col-sm-3">
			<?php $this->load->view('site/subscribe_email'); ?>
		</div>
		<div class="col-sm-3">
			<?php $this->load->view('site/thong_ke_truy_cap'); ?>
		</div>
	</div>
</div>
<div class="container-fluid copyright">
	<div class="col-xs-12 text-center">&copy; Copyright 2017 - BUKT</div>
</div>