<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* $this->load->library('tkt_upload');
* $this->tkt_upload->tkt_upload([field from form upload])
*/
class Tkt_upload
{
	private $_CI;
	private $_config = array();
	public function __construct()
	{
		$this->_CI =& get_instance();
		$this->_CI->load->library('upload');
		// assign config
		$this->_config['upload_path'] = 'uploads/';
		$this->_config['file_ext_tolower'] = TRUE;
		$this->_config['max_size'] = 8192;
		$this->_config['encrypt_name'] = TRUE;
		// load config
		$this->_CI->upload->initialize($this->_config);
	}
	/*
	|	$type:
	|	(default) image: bmp|gif|jpeg|jpg|png
	*/
	public function tkt_upload($field,$type='image',$folder='images/')
	{
		$this->_config['upload_path'] = $this->_config['upload_path'].$folder;
		$this->tkt_set_allowed_types($type);
		if(isset($_FILES[$field]))
		{
			if($this->_CI->upload->do_upload($field))
				return TRUE;
		}
		return FALSE;
	}
	public function tkt_get_file_path()
	{
		return base_url().$this->_config['upload_path'].$this->_CI->upload->data('file_name');
	}
	private function tkt_set_allowed_types($type)
	{
		if($type=='image')
		{
			$this->_config['allowed_types'] = 'bmp|gif|jpeg|jpg|png';
		}
		$this->_CI->upload->initialize($this->_config);
	}
}