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
		<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
			<small style="color:red;">Tìm thấy <?=count($products)?> kết quả</small>
			<div class="row productview">
				<?php $dem=1; foreach($products as $product){ ?>
				<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
					<div class="col-item" id="sp<?=$dem?>">
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
							<?php if($product['brand']=='nguyenkim'){ ?>
							<span style="position: absolute;bottom: 0px;border-radius: 0px" class="label label-primary">NguyenKim</span>
							<?php } ?>
							<?php if($product['brand']=='tiki'){ ?>
							<span style="position: absolute;bottom: 0px;border-radius: 0px" class="label label-info">Tiki</span>
							<?php } ?>
							<?php if(isset($product['link'])){ ?>
							<span id="lssp<?=$dem?>" style="display:none;position: absolute;top: 0px;right:0px;border-radius: 0px" class="label label-primary label-lg">
								<a href="<?=$product['link']?>&q=<?=$this->input->get('q')?>&lazada=<?=$this->input->get('lazada')?>&adayroi=<?=$this->input->get('adayroi')?>&tiki=<?=$this->input->get('tiki')?>&nguyenkim=<?=$this->input->get('nguyenkim')?>&search_exactly=<?=$this->input->get('search_exactly')?>" style="color:#FFF;"><i class='glyphicon glyphicon-stats'></i> Lịch sử giá</a>
							</span>
							<script type="text/javascript">$(document).ready(function(){$("#sp<?=$dem?>").mouseleave(function(){$('#lssp<?=$dem?>').hide();});$("#sp<?=$dem?>").mouseover(function(){$('#lssp<?=$dem?>').show();});});</script>
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
				<?php $dem++; } ?>
			</div>		
		</div>
	</div>
</div>