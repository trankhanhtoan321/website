<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
			<div class="hidden-sm hidden-xs affix" style="margin:auto;padding-right:10px;">
				<div class="panel-body">
					<form action="search.html" method="get" class="form-search">
						<b>Tên Sản Phẩm</b><br/>
						<input type="text" class="form-control" placeholder="Tên sản phẩm" name="q" <?=$this->input->get('q')?"value='".$this->input->get('q')."'":''?> /><br/>
						<b>Tìm kiếm trên</b>
						<div class="checkbox">
							<label><input class="flat" id="lazada" type="checkbox" <?=$this->input->get('lazada')==1?'checked':''?> value="1" name="lazada" > Lazada</label>
						</div>
						<div class="checkbox">
							<label><input class="flat" id="adayroi" type="checkbox" <?=$this->input->get('adayroi')==1?'checked':''?> value="1" name="adayroi" > Adayroi</label>
						</div>
						<div class="checkbox">
							<label><input class="flat" id="tiki" type="checkbox" <?=$this->input->get('tiki')==1?'checked':''?> value="1" name="tiki" > Tiki</label>
						</div>
						<input type="submit" class="btn btn-success form-control" value="Tìm kiếm">
					</form>
				</div>
			</div>
			<div class="panel panel-success hidden-md hidden-lg">
				<div class="panel-body">
					<form action="search.html" method="get" class="form-search">
						<b>Tên Sản Phẩm</b><br/>
						<input type="text" class="form-control" placeholder="Tên sản phẩm" name="q" <?=$this->input->get('q')?"value='".$this->input->get('q')."'":''?> /><br/>
						<b>Tìm kiếm trên</b>
						<div class="checkbox">
							<label><input class="flat" id="lazada" type="checkbox" <?=$this->input->get('lazada')==1?'checked':''?> value="1" name="lazada" > Lazada</label>
						</div>
						<div class="checkbox">
							<label><input class="flat" id="adayroi" type="checkbox" <?=$this->input->get('adayroi')==1?'checked':''?> value="1" name="adayroi" > Adayroi</label>
						</div>
						<div class="checkbox">
							<label><input class="flat" id="tiki" type="checkbox" <?=$this->input->get('tiki')==1?'checked':''?> value="1" name="tiki" > Tiki</label>
						</div>
						<input type="submit" class="btn btn-success form-control" value="Tìm kiếm">
					</form>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
			<small>Tìm thấy <?=count($products)?> kết quả</small>
			<div class="row">
				<?php foreach($products as $product){ ?>
				<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
					<div class="col-item">
						<div class="col-img">
							<a target="_blank" href="<?=$product['url']?>">
								<img class="img-responsive" src="<?=$product['image']?>" style="height:200px;margin:auto;">
							</a>
							<?php if($product['brand']=='lazada'){ ?>
							<span style="position: absolute;bottom: 0px;border-radius: 0px" class="label label-warning">Lazada</span>
							<?php } ?>
							<?php if($product['brand']=='adayroi'){ ?>
							<span style="position: absolute;bottom: 0px;border-radius: 0px" class="label label-danger">Adayroi</span>
							<?php } ?>
							<?php if($product['brand']=='tiki'){ ?>
							<span style="position: absolute;bottom: 0px;border-radius: 0px" class="label label-info">Tiki</span>
							<?php } ?>
						</div>
						<div class="col-name">
							<a target="_blank" href="<?=$product['url']?>" style="color:#000;">
								<?=getExcerpt($product['name'],0,67)?>
							</a>
						</div>
						<div class="col-price">
							<p style="width: 50%;text-align:center;float:left; border-right:1px solid #e1e1e1;">
								<a target="_blank" href="<?=$product['url']?>" style="color:#18bc9c;font-weight: bold;" href="#"><i class="fa fa-shopping-cart"></i> Xem chi tiết</a>
							</p>
							<p style="width: 50%;text-align:center;color: red;float:right;font-weight: bold;">
								<?=number_format($product['price'])?> đ
							</p>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>		
		</div>
	</div>
</div>