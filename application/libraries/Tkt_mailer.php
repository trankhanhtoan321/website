<?php
/**
* 
*/
class Tkt_mailer
{
	var $mail;

	function __construct()
	{
		require_once APPPATH.'/third_party/PHPMailer-master/PHPMailerAutoload.php';
		$CI =& get_instance();
		$this->mail = new PHPMailer;
		$this->mail->isSMTP();
		$this->mail->Host = $CI->setting_model->tkt_get('email_host');
		$this->mail->Port = $CI->setting_model->tkt_get('email_port');
		$this->mail->SMTPSecure = $CI->setting_model->tkt_get('email_SMTPSecure');
		$this->mail->SMTPAuth = TRUE;
		$this->mail->Username = $CI->setting_model->tkt_get('email_Username');
		$this->mail->Password = $CI->setting_model->tkt_get('email_Password');
		$this->mail->setFrom($CI->setting_model->tkt_get('email_Username'), $CI->setting_model->tkt_get('email_name'));
		$this->mail->addReplyTo($CI->setting_model->tkt_get('email_Username'), $CI->setting_model->tkt_get('email_name'));
	}

	function addAddress($address, $name = '')
	{
		$this->mail->addAddress($address,$name);
	}

	function addCC($address, $name = '')
	{
		$this->mail->addCC($address, $name);
	}

	function addBCC($address, $name = '')
	{
		$this->mail->addBCC($address, $name);
	}

	function Subject($s)
	{
		$this->mail->Subject = $s;
	}

	function msgHTML($message)
	{
		$this->mail->msgHTML($message);
	}

	function send()
	{
		return $this->mail->send();
	}

	function getError()
	{
		return $this->mail->ErrorInfo;
	}
}