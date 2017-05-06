<div class="container">
	<div class="row">
		<div class="col-sm-9 col-xs-12 col-md-9" style="background-color: #fff;">
			<div class="row">
				<div class="col-xs-3">
					<img class="img-responsive" src="<?=$blog['blog_image']?>" alt="<?=$blog['blog_seo_title']?>">
				</div>
				<div class="col-xs-9">
					<h1>
						<a style="color:#000;" href="/<?=rewrite($blog['blog_seo_title'])?>-<?=$blog['blog_id']?>.html">
							<?=$blog['blog_name']?>
						</a>
					</h1>
					<small>
						<i><i class="fa fa-calendar"></i> <?=date("H:i d/m/Y",$blog['blog_time'])?></i>&nbsp;&nbsp;
						<i><i class="fa fa-user"></i> <?=$blog['user_name']?></i>&nbsp;&nbsp;
						<i><i class="fa fa-comments-o"></i> <?=$blog['blog_comments']?></i>&nbsp;&nbsp;
						<i><i class="fa fa-signal"></i> <?=$blog['blog_views']?></i>
						&nbsp;
						<i><i class="fa fa-database"></i> <?=$blog['blog_cat_names']?></i><br/>
						<?=$blog['blog_excerpt']?>
					</small>
				</div>
			</div>
			<hr/>
			<?= $blog['blog_content'] ?>
			<?php
			$data['blog_id'] = $blog['blog_id'];
			$data['comments'] = $comments;
			$this->load->view('site/comment',$data);
			?>
		</div>
		<div class="col-sm-3 col-xs-12 col-md-3">
			<?php
			$blog_relates['blog_relates'] = $blog_relates;
			$this->load->view('site/sb_blog_related',$blog_relates);
			$blog_relates = NULL;
			/*--------------------------------------------------*/
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