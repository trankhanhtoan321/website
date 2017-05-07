<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
			<div class="panel panel-success">
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
							<label><input class="flat" id="nguyenkim" type="checkbox" <?=$this->input->get('nguyenkim')==1?'checked':''?> value="1" name="nguyenkim" > NguyenKim</label>
						</div>
						<div class="checkbox">
							<label><input class="flat" id="tiki" type="checkbox" <?=$this->input->get('tiki')==1?'checked':''?> value="1" name="tiki" > Tiki</label>
						</div><br/>
						<b>Loại Tìm Kiếm</b>
						<div class="checkbox">
							<label><input type="radio" class="flat" id="search_exactly" name="search_exactly" value="0" <?=!$this->input->get('search_exactly')==1?'checked':''?> /> Thông thường</label>
						</div>
						<div class="checkbox">
							<label><input type="radio" class="flat" id="search_exactly" name="search_exactly" value="1" <?=$this->input->get('search_exactly')==1?'checked':''?> /> Chính Xác</label>
						</div>
						<input type="submit" class="btn btn-success form-control" value="Tìm kiếm">
					</form>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
			<div class="col-item">
				<h2 class="text-center"><?=$product['name']?></h2>
				<h3 class="text-center">Biểu đồ lịch sử giá</h3>
				<div id="graph" style="height: 250px"></div>
				<br/>
				<b>Giá hiện tại: <i style="color: red;"><?=number_format($product['price'])?> đ</i></b><br/>
				<b>Giá thấp nhất: <i style="color: red;"><?=number_format($product['min_price'])?> đ</i></b><br/>
				<b>Giá cao nhất: <i style="color: red;"><?=number_format($product['max_price'])?> đ</i></b>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
			<div class="row productview">
				<div class="col-item">
					<div class="col-img">
						<a target="_blank" href="<?=$product['url']?>">
							<img class="img-responsive lazy" data-original="<?=$product['image']?>" style="height:200px;margin:auto;">
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
						<a target="_blank" href="<?=$product['url']?>" style="color:#000;"><?=$product['name']?></a>
					</div>
					<div class="col-price">
						<p style="width: 50%;text-align:center;float:left; border-right:1px solid #e1e1e1;">
							<a target="_blank" href="<?=$product['url']?>" style="color:#18bc9c;font-weight: bold;" href="#"><i class="fa fa-shopping-cart"></i> Xem chi tiết</a>
						</p>
						<p style="width: 50%;text-align:center;color: red;float:right;font-weight: bold;"><?=number_format($product['price'])?> đ</p>
					</div>
				</div>
			</div>		
		</div>
	</div>
</div>
<script src="/views/assets/raphael-min.js"></script>
<script src="/views/assets/morris/morris.min.js"></script>
<script>new Morris.Line({element: 'graph',data: <?=$chart?>,xkey: 'create_at',ykeys: ['price'],labels: ['Giá'],smooth :false,postUnits:' đ',hideHover:'auto',ymin:<?=($temp=($product['min_price']-(($product['max_price']-$product['min_price'])/4)))==$product['price']?0:$temp?>,resize:true});</script>