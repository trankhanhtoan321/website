<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Test extends CI_Controller
{
	function index()
	{
		$html = file_get_contents("https://www.nguyenkim.com/tim-kiem.html?q=iphone");
		preg_match_all('/<img class=" pict imagelazyload " id="det_img_[0-9]+" data-original="[^"]+"/', $html, $images);
		preg_match_all('/<p class="nk-product-name-txt" title="[^"]+"/', $html, $names);
		preg_match_all('/<span class="nk-price-txt"><span>[^<]+</', $html, $prices);
		preg_match_all('/<div href="[^"]+"/', $html, $urls);
		print_r($names);
		print_r($images);
		print_r($prices);
		print_r($urls);
	}
}