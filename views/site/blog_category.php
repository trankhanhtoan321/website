<div class="container">
	<div class="row">
		<div class="col-sm-9 col-xs-12 col-md-9">
			<h1 class="page-header text-center"><?=$blogcat['blogcat_name']?></h1>
			<?php
			$blogs['blogs'] = $blogs;
			$this->load->view('site/list',$blogs);
			$blogs = NULL;
			?>
			<?=$pagination?>
		</div>
		<div class="col-sm-3 col-xs-12 col-md-3">
			<?php
			$blog_news['blog_news'] = $blog_news;
			$this->load->view('site/sb_blog_new',$blog_news);
			$blog_news = NULL;
			/*---------------------------------------------------*/
			$blog_most_views['blog_most_views'] = $blog_most_views;
			$this->load->view('site/sb_most_view',$blog_most_views);
			$blog_most_views = NULL;
			?>
		</div>
	</div>
</div>