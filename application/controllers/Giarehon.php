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
		$data['_varibles']['products'] = array();
		$data['_content'] = 'giarehon/listsanpham';
		$search_value = $this->input->get('q',TRUE);
		if($search_value)
		{
			if($this->input->get('lazada',TRUE)==1)
			{
				$matches = file_get_contents('http://www.lazada.vn/catalog/?q='.urlencode($search_value));
				preg_match('/<script type="application\/ld\+json">.+<\/script>/', $matches,$matches);
				$matches = ltrim($matches[0], '<script type="application/ld+json">');
				$matches = rtrim($matches,'</script>');
				$matches = json_decode($matches);
				foreach($matches->itemListElement as $a)
				{
					if(preg_match('/'.rewrite($search_value).'/', rewrite($a->name)))
					{
						$data['_varibles']['products'][] = array(
							'name' => $a->name,
							'image' => $a->image,
							'url' => 'https://pub.accesstrade.vn/deep_link/4348611782943178052?url='.urlencode($a->url),
							'brand' => 'lazada',
							'price' => $a->offers->price
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
					if(preg_match('/'.rewrite($search_value).'/', rewrite($a->ProductName)))
					{
						$data['_varibles']['products'][] = array(
							'name' => $a->ProductName,
							'image' => $a->ImageUrlFormat,
							'url' => 'https://pub.accesstrade.vn/deep_link/4348611782943178052?url='.urlencode('https://www.adayroi.com'.$a->UrlDetail),
							'brand' => 'adayroi',
							'price' => $a->PriceSell
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
					if(preg_match('/'.rewrite($search_value).'/', rewrite($s->{'data-title'})))
					{
						preg_match('/data-id="'.$s->{'data-id'}.'" href="[^"]+"/', $html, $t);
						$i = 17+strlen($s->{'data-id'});
						$s->url = rtrim(substr($t[0], $i),'"');
						$data['_varibles']['products'][] = array(
							'name' => $s->{'data-title'},
							'image' => rtrim(substr($images[0][$dem++], 30),'"'),
							'url' => 'https://pub.accesstrade.vn/deep_link/4348611782943178052?url='.urlencode($s->url),
							'brand' => 'tiki',
							'price' => $s->{'data-price'}
							);
					}
				}
			}
			if($data['_varibles']['products']!=NULL)
			{
				$data['_varibles']['products'] = array_sort($data['_varibles']['products'], 'price', SORT_ASC);
			}
		}
		$this->load->view('giarehon/index',$data);
	}
}