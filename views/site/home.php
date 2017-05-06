<div class="container">
	<div class="row">
		<div class="col-sm-9 col-xs-12 col-md-9">
			<?php
			$blogs['blogs'] = $blog_news;
			$this->load->view('site/list',$blogs);
			$blogs = NULL;
			?>
		</div>
		<div class="col-sm-3 col-xs-12 col-md-3">
			<?php
			$blog_most_views['blog_most_views'] = $blog_most_views;
			$this->load->view('site/sb_most_view',$blog_most_views);
			$blog_most_views = NULL;
			?>
		</div>
	</div>
</div>