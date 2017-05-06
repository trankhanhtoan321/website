<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Test extends CI_Controller
{
	function index()
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://api.accesstrade.vn/me/product_links");
		curl_setopt($ch, CURLOPT_POST, 2);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
		curl_setopt($ch, CURLOPT_POSTFIELDS, 'access_key=qreq4g5KwVff4lgXtbi3VY0EhTOKYoQQ&url=http://www.lazada.vn/apple-iphone-7-plus-128gb-do-hang-nhap-khau-5010756.html');
		$r=curl_exec($ch);
		echo $r;
		curl_close($ch);
	}
}