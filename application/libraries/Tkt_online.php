<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
data array(
	date => d/m/Y
    month => m/Y
    premonth => 123
    thismonth => 123
	total => 123
    bot => 123
	today => 123
	yesterday => 123
	month => 123
	user => array(
				ip => array(
					time => 147865765
					uri => dfg.com
					bot => 1|0
				)
				ip => array(

				),...
		)
)
*/
class Tkt_online
{
    private $file;
    private $ip;
    private $data;
    private $timeout;

    public function __construct()
    {
    	$this->ip = $this->getUserIP();
        $this->timeout = 120;// 2 minutes
        $this->file = APPPATH."libraries".DIRECTORY_SEPARATOR."Tkt_online.tmp";
    	$this->data = @unserialize(file_get_contents($this->file));
		$this->_removes_expired_data();
		$this->_set_data();
    }

    private function getUserIP()
    {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }
        return $ip;
    }

    private function _set_data()
    {
    	if(!isset($this->data['user'][$this->ip]))
    	{
    		$CI =& get_instance();
    		$this->data['user'][$this->ip]['uri'] = $_SERVER['REQUEST_URI'];
    		$this->data['user'][$this->ip]['time'] = time();
    		$this->data['today']++;
    		$this->data['total']++;
            $this->data['thismonth']++;

    		//Loads the USER_AGENT class if it’s not loaded yet 
			if(!isset($CI->agent))
			{
				$CI->load->library('user_agent');
				$class_loaded = true;
			}

			if($CI->agent->is_robot())
			{
				$this->data['user'][$this->ip]['bot'] = 1;
                $this->data['bot']++;
			}
			else
			{
				$this->data['user'][$this->ip]['bot'] = 0;
			}

			//Destroys the USER_AGENT class so it can be loaded again on the controller 
			if($class_loaded)
			{
				unset($class_loaded, $CI->agent);
			}
    	}
    	else
    	{
    		$this->data['user'][$this->ip]['time'] = time();
    		$this->data['user'][$this->ip]['uri'] = $_SERVER['REQUEST_URI'];
    	}
    	$this->_save();
    }

    public function get_data()
    {
    	return @$this->data;
    }

    public function get_total()
    {
    	return $this->data['total'];
    }

    public function get_bot_online()
    {
    	$dem=0;
    	foreach($this->data['user'] as $temp)
    	{
    		if($temp['bot']==1) $dem++;
    	}
    	return $dem;
    }

    public function get_today()
    {
    	return $this->data['today'];
    }

    public function get_bot()
    {
        return $this->data['bot'];
    }

    public function get_yesterday()
    {
    	return $this->data['yesterday'];
    }

    public function get_thismonth()
    {
        return $this->data['thismonth'];
    }

    public function get_premonth()
    {
        return $this->data['premonth'];
    }

    public function get_online()
    {
    	return count($this->data['user']);
    }

    public function get_uri_online()
    {
    	foreach($this->data['user'] as $temp)
		{
			if(isset($temp['uri']))
			{
				echo "<a href='".$temp['uri']."'>".$temp['uri']."</a>,";
			}
		}
    }

    private function _removes_expired_data()
    {
    	foreach($this->data['user'] as $key => $val)
    	{
    		if($val['time'] <= (time()-$this->timeout))
    		{
    			unset($this->data['user'][$key]);
    		}
    	}
    	if($this->data['date'] != date("d/m/Y",time()))
    	{
    		$this->data['date'] = date("d/m/Y",time());
    		$this->data['yesterday'] = $this->data['today'];
    		$this->data['today'] = 1;
    	}

        if($this->data['month'] != date("m/Y",time()))
        {
            $this->data['month'] = date("m/Y",time());
            $this->data['premonth'] = $this->data['thismonth'];
            $this->data['thismonth'] = 1;
        }
    }

    private function _save()
	{
		$fp = fopen($this->file,'w');
		flock($fp, LOCK_EX);
		$write = fwrite($fp, serialize($this->data));
		fclose($fp);
		return $write;
	}
}