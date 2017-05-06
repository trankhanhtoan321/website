<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model
{
	private $_data=array();
	private $_tkt_table_name = 'setting';
	private $_col_name = 'set_name';
	private $_col_value = 'set_value';
	public function __construct()
	{
		parent::__construct();
		$temp=$this->db->get($this->_tkt_table_name);
		$temp=$temp->result_array();
		foreach($temp as $t)
			$this->_data[$t[$this->_col_name]]=$t[$this->_col_value];
	}
	private function _update_data()
	{
		$this->_data = array();
		$temp=$this->db->get($this->_tkt_table_name);
		$temp=$temp->result_array();
		foreach($temp as $t)
			$this->_data[$t[$this->_col_name]]=$t[$this->_col_value];
	}
	public function tkt_get($name)
	{
		if(isset($this->_data[$name])) return $this->_data[$name];
		return NULL;
	}
	public function tkt_get_list()
	{
		return $this->_data;
	}
	public function tkt_update($data)
	{
		foreach($data as $key => $val)
		{
			if(isset($this->_data[$key]))
			{
				$this->db->reset_query();
				$this->db->where($this->_col_name,$key);
				if(!$this->db->update($this->_tkt_table_name,array($this->_col_value=>$val))) return FALSE;
			}
		}
		$this->_update_data();
		return TRUE;
	}
}