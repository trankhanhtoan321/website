<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tkt_validate
{
	public function is_email($string_email)
	{
		if(filter_var($string_email, FILTER_VALIDATE_EMAIL)) return TRUE;
		return FALSE;
	}

	public function is_url($string_url)
	{
		if(filter_var($string_url, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED)) return TRUE;
		return FALSE;
	}

	public function is_number($s)
	{
		$pattern = "/^[0-9]+$/";
		if(preg_match($pattern, $s)) return TRUE;
		return FALSE;
	}

	public function is_word($s)
	{
		$pattern = "/^\w+$/";
		if(preg_match($pattern, $s)) return TRUE;
		return FALSE;
	}
}