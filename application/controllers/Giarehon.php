<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Giarehon extends CI_Controller
{
	function index()
	{
		$data['_varibles'] = NULL;
		$data['_content'] = 'giarehon/home';
		$this->load->view('giarehon/index',$data);
	}

	function search()
	{
		$search_value = $this->input->get('q',TRUE);
		$data['_varibles']['products'] = array();
		if($search_value)
		{
			$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
			$cache_name=rewrite(($this->input->get('search_exactly')==1?'Y':'N').($this->input->get('nguyenkim')==1?1:0).($this->input->get('lazada')==1?1:0).($this->input->get('adayroi')==1?1:0).($this->input->get('tiki')==1?1:0).$search_value);
			if ( ! $data['_varibles']['products'] = $this->cache->get($cache_name))
			{
				$data['_varibles']['products'] = array();
				if($this->input->get('lazada',TRUE)==1)
				{
					$matches = file_get_contents('http://www.lazada.vn/catalog/?q='.urlencode($search_value));
					preg_match('/<script type="application\/ld\+json">.+<\/script>/', $matches,$matches);
					$matches = ltrim($matches[0], '<script type="application/ld+json">');
					$matches = rtrim($matches,'</script>');
					$matches = json_decode($matches);
					foreach($matches->itemListElement as $a)
					{
						if($this->input->get('search_exactly')==1)
						{
							if(preg_match('/'.rewrite($search_value).'/', rewrite($a->name)))
							{
								$data['_varibles']['products'][] = array(
									'name' => getExcerpt($a->name,0,67),
									'image' => isset($a->image)?$a->image:'/uploads/icons/none.jpg',
									'url' => 'https://pub.accesstrade.vn/deep_link/4348611782943178052?url='.urlencode($a->url),
									'brand' => 'lazada',
									'price' => $a->offers->price,
									'link' => base_url().'lich-su-gia.html?url='.urlencode($a->url)
									);
							}
						}else{
							$data['_varibles']['products'][] = array(
								'name' => getExcerpt($a->name,0,67),
								'image' => isset($a->image)?$a->image:'/uploads/icons/none.jpg',
								'url' => 'https://pub.accesstrade.vn/deep_link/4348611782943178052?url='.urlencode($a->url),
								'brand' => 'lazada',
								'price' => $a->offers->price,
								'link' => base_url().'lich-su-gia.html?url='.urlencode($a->url)
								);
						}
					}
				}
				if($this->input->get('adayroi',TRUE)==1)
				{
					$matches = file_get_contents('https://www.adayroi.com/tim-kiem?q='.urlencode($search_value));
					preg_match('/var dataProducts.+\}\]\'\)\)\;/', $matches,$matches);
					$matches = ltrim($matches[0],"var dataProducts = jQuery.parseJSON(Encoder.htmlDecode('");
					$matches = rtrim($matches,"'));");
					$matches = htmlspecialchars_decode($matches);
					$matches = json_decode($matches);
					foreach($matches as $a)
					{
						if($this->input->get('search_exactly')==1)
						{
							if(preg_match('/'.rewrite($search_value).'/', rewrite($a->ProductName)))
							{
								$data['_varibles']['products'][] = array(
									'name' => getExcerpt($a->ProductName,0,67),
									'image' => isset($a->ImageUrlFormat)?$a->ImageUrlFormat:'/uploads/icons/none.jpg',
									'url' => 'https://pub.accesstrade.vn/deep_link/4348611782943178052?url='.urlencode('https://www.adayroi.com'.$a->UrlDetail),
									'brand' => 'adayroi',
									'price' => $a->PriceSell,
									'link' => base_url().'lich-su-gia.html?url='.urlencode('https://www.adayroi.com'.$a->UrlDetail)
									);
							}
						}else{
							$data['_varibles']['products'][] = array(
								'name' => getExcerpt($a->ProductName,0,67),
								'image' => isset($a->ImageUrlFormat)?$a->ImageUrlFormat:'/uploads/icons/none.jpg',
								'url' => 'https://pub.accesstrade.vn/deep_link/4348611782943178052?url='.urlencode('https://www.adayroi.com'.$a->UrlDetail),
								'brand' => 'adayroi',
								'price' => $a->PriceSell,
								'link' => base_url().'lich-su-gia.html?url='.urlencode('https://www.adayroi.com'.$a->UrlDetail)
								);
						}
					}
				}
				if($this->input->get('tiki',TRUE)==1)
				{
					$html = file_get_contents('https://tiki.vn/search?q='.urlencode($search_value));
					$html = preg_replace(array('/\n/'), array(' '), $html);
					preg_match_all('/data-seller-product-id[^>]+search-div-product-item"/', $html,$matches);
					preg_match_all('/product-image lazy" data-src="[^"]+"/', $html,$images);
					$dem=0;
					foreach($matches[0] as $a)
					{
						$s = '{"'.$a.'}';
						$s = preg_replace(array('/=/'), array('":'), $s);
						$s = preg_replace(array('/" /'), array('","'), $s);
						while(preg_match('/" /', $s))
						{
							$s = preg_replace(array('/" /'), array('"'), $s);
						}
						$s = json_decode($s);
						if($this->input->get('search_exactly')==1)
						{
							if(preg_match('/'.rewrite($search_value).'/', rewrite($s->{'data-title'})))
							{
								preg_match('/data-id="'.$s->{'data-id'}.'" href="[^"]+"/', $html, $t);
								$i = 17+strlen($s->{'data-id'});
								$s->url = rtrim(substr($t[0], $i),'"');
								$data['_varibles']['products'][] = array(
									'name' => getExcerpt($s->{'data-title'},0,67),
									'image' => isset($images[0])?rtrim(substr($images[0][$dem++], 30),'"'):'/uploads/icons/none.jpg',
									'url' => 'https://pub.accesstrade.vn/deep_link/4348611782943178052?url='.urlencode($s->url),
									'brand' => 'tiki',
									'price' => $s->{'data-price'},
									'link' => base_url().'lich-su-gia.html?url='.urlencode($s->url)
									);
							}
						}else{
							preg_match('/data-id="'.$s->{'data-id'}.'" href="[^"]+"/', $html, $t);
							$i = 17+strlen($s->{'data-id'});
							$s->url = rtrim(substr($t[0], $i),'"');
							$data['_varibles']['products'][] = array(
								'name' => getExcerpt($s->{'data-title'},0,67),
								'image' => isset($images[0])?rtrim(substr($images[0][$dem++], 30),'"'):'/uploads/icons/none.jpg',
								'url' => 'https://pub.accesstrade.vn/deep_link/4348611782943178052?url='.urlencode($s->url),
								'brand' => 'tiki',
								'price' => $s->{'data-price'},
								'link' => base_url().'lich-su-gia.html?url='.urlencode($s->url)
								);
						}
					}
				}
				if($this->input->get('nguyenkim')==1)
				{
					$html = file_get_contents("https://www.nguyenkim.com/tim-kiem.html?q=".urlencode($search_value));
					preg_match_all('/<img class=" pict imagelazyload " id="det_img_[0-9]+" data-original="[^"]+"/', $html, $images);
					preg_match_all('/<p class="nk-product-name-txt" title="[^"]+"/', $html, $names);
					preg_match_all('/<span class="nk-price-txt"><span>[^<]+</', $html, $prices);
					preg_match_all('/<div href="[^"]+"/', $html, $urls);
					for($i=0;$i<count($names[0]);$i++)
					{
						$k = strlen($images[0][$i]);
						$name = substr($names[0][$i], 39, strlen($names[0][$i])-40);
						$j = strpos($images[0][$i], 'http');
						if($this->input->get('search_exactly')==1)
						{
							if(preg_match('/'.rewrite($search_value).'/', rewrite($name)))
							{
								$data['_varibles']['products'][] = array(
									'name' => getExcerpt($name,0,67),
									'image' => substr($images[0][$i], $j, $k-$j-1),
									'brand' => 'nguyenkim',
									'url' => 'https://pub.accesstrade.vn/deep_link/4348611782943178052?url='.urlencode(substr($urls[0][$i], 11,strlen($urls[0][$i])-12)),
									'price' => preg_replace(array('/\./'),array(''),(substr($prices[0][$i], 33,strlen($prices[0][$i])-34)))
									);
							}
						}else{
							$data['_varibles']['products'][] = array(
								'name' => getExcerpt($name,0,67),
								'image' => substr($images[0][$i], $j, $k-$j-1),
								'brand' => 'nguyenkim',
								'url' => 'https://pub.accesstrade.vn/deep_link/4348611782943178052?url='.urlencode(substr($urls[0][$i], 11,strlen($urls[0][$i])-12)),
								'price' => preg_replace(array('/\./'),array(''),(substr($prices[0][$i], 33,strlen($prices[0][$i])-34)))
								);
						}
					}
				}
				if($data['_varibles']['products']!=NULL)
				{
					$data['_varibles']['products'] = array_sort($data['_varibles']['products'], 'price', SORT_ASC);
				}
				$this->cache->save($cache_name, $data['_varibles']['products'], 86400);
			}
		}
		$data['_content'] = 'giarehon/listsanpham';
		$this->load->view('giarehon/index',$data);
	}
	function lichsugia()
	{
		if(!$this->input->get('url')) redirect('/search.html');
		$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
		$cache_name='lsg'.rewrite($this->input->get('url'));
		if (!$cache=$this->cache->get($cache_name))
		{
			$this->load->library('tkt_webclient',array('host'=>'www.pricetracker.vn'));
			$this->tkt_webclient->setAccept('application/json');
			$this->tkt_webclient->setContentType('application/json');
			$this->tkt_webclient->post('/api/product/search','{"search":"'.urldecode($this->input->get('url')).'"}');
			$url = strrev($this->tkt_webclient->getContent());
			preg_match('/}"[^\/]+\//', $url,$code);
			if(!$code) redirect('/search.html');
			$code = strrev(substr($code[0], 2,strlen($code[0])-3));
			$this->tkt_webclient->get('/api/web/product/'.$code);
			$r = json_decode($this->tkt_webclient->getContent());

			$data['_varibles']['product'] = array(
				'name'=> getExcerpt($r->product->product->title,0,67),
				'image' => $r->product->product->thumbnail_url,
				'url' => 'https://pub.accesstrade.vn/deep_link/4348611782943178052?url='.urlencode($r->product->product->url),
				'price' => $r->product->product->current_price,
				'min_price' => $r->product->product->min_price,
				'max_price' => $r->product->product->max_price
				);
			if(preg_match('/lazada/', strtolower($r->product->product->store)))
			{
				$data['_varibles']['product']['brand'] = 'lazada';
			}elseif(preg_match('/tiki/', strtolower($r->product->product->store))){
				$data['_varibles']['product']['brand'] = 'tiki';
			}elseif(preg_match('/adayroi/', strtolower($r->product->product->store))){
				$data['_varibles']['product']['brand'] = 'adayroi';
			}
			$data['_varibles']['chart'] = json_encode($r->product->history);
			$temp['product'] = $data['_varibles']['product'];
			$temp['chart'] = $data['_varibles']['chart'];
			$this->cache->save($cache_name, $temp, 86400);
		}else{
			$data['_varibles']['chart'] = $cache['chart'];
			$data['_varibles']['product'] = $cache['product'];
		}
		$data['_content'] = 'giarehon/lichsugia';
		$this->load->view('giarehon/index',$data);
	}
}