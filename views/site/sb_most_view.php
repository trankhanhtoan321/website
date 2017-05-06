<div class="panel panel-default">
	<div class="panel-heading" style="background-color: #00BF96;color:#fff">
		<b>BÀI VIẾT XEM NHIỀU</b>
	</div>
	<div class="panel-body" style="padding: 0;">
		<div class="list-group" style="margin:0;">
		<?php 
			foreach($blog_most_views as $temp)
			{
				?>
				<a class="list-group-item" style="border-right:none;border-left:none;border-radius:0;" href="/<?=rewrite($temp['blog_seo_title'])?>-<?=$temp['blog_id']?>.html">
					<div class="row">
						<img style="width: 50px;height:50px;float: left;margin-left: 5px;margin-right:5px;" src="<?=$temp['blog_image']?>" />
						<?=$temp['blog_name']?>
					</div>
				</a>
				<?php
			}
		?>
		</div>
	</div>
</div>