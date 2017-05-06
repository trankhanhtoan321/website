<div class="list-group">
<?php foreach($blogs as $blog){ ?>			
	<div class="list-group-item">
		<div class="row">
			<div class="col-xs-4 col-sm-4 col-md-4">
				<img class="img-responsive" src="<?=$blog['blog_image']?>" alt="<?=$blog['blog_seo_title']?>" />
			</div>
			<div class="col-xs-8 col-sm-8 col-md-8">
				<h3 style="color:#0082C8">
					<a href="/<?=rewrite($blog['blog_seo_title'])?>-<?=$blog['blog_id']?>.html">
						<?=$blog['blog_name']?>
					</a>
				</h3>
				<i><i class="fa fa-calendar"></i> <?=date("H:i d/m/Y",$blog['blog_time'])?></i>&nbsp;&nbsp;
				<i><i class="fa fa-user"></i> <?=$blog['user_name']?></i>&nbsp;&nbsp;
				<i><i class="fa fa-comments-o"></i> <?=$blog['blog_comments']?></i>&nbsp;&nbsp;
				<i><i class="fa fa-signal"></i> <?=$blog['blog_views']?></i>&nbsp;&nbsp;
				<i><i class="fa fa-database"></i> <?=$blog['blog_cat_names']?></i>
				<br/>
				<i><?=$blog['blog_excerpt']?$blog['blog_excerpt']:get_excerpt($blog['blog_content'],500)?></i>
			</div>
		</div>
	</div>
<?php } ?>
</div>