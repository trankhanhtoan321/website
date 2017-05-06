<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*	$config['base_url'] = 'http://example.com/index.php/test/page/';
*	$config['total_rows'] = 200;
*	$config['per_page'] = 20;
*	$this->load->library('tkt_pagination',$config);
*	$this->tkt_pagination->create_links();
*/
class Tkt_pagination
{
	private $_CI;

	function __construct($config = array())
	{
		$_config = array(
			'full_tag_open' => '<ul class="pagination">',
			'full_tag_close' => '</ul>',

			'first_tag_open' => '<li>',
			'first_tag_close' => '</li>',

			'last_tag_open' => '<li>',
			'last_tag_close' => '</li>',

			'cur_tag_open' => '<li class="active"><a href="#">',
			'cur_tag_close' => '</a></li>',

			'next_tag_open' => '<li>',
			'next_tag_close' => '</li>',

			'prev_tag_open' => '<li>',
			'prev_tag_close' => '</li>',

			'num_tag_open' => '<li>',
			'num_tag_close' => '</li>',

			'num_links' => 5
		);
		$this->_CI =& get_instance();
		$this->_CI->load->library('pagination',$_config);
		if($config) $this->_CI->pagination->initialize($config);
	}

	function init($config)
	{
		$this->_CI->pagination->initialize($config);
	}

	function create_links()
	{
		return $this->_CI->pagination->create_links();
	}
}