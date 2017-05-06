<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
	{
		if($this->session->has_userdata('userlogin')) redirect('/admin','refresh');
		if($this->input->post('login'))
		{
			$data = array(
				'user_name' => $this->input->post('user_name',TRUE),
				'user_pass' => $this->input->post('user_pass',TRUE)
				);
			if($this->tkt_validate->is_word($data['user_name']) && $this->tkt_validate->is_word($data['user_pass']) && $this->users_model->tkt_verify($data))
			{
				$users = $this->users_model->tkt_get_list_by_field('user_name',$data['user_name']);
				if(count($users)==1)
				{
					$data = array(
						'user_id' => $users[0]['user_id'],
						'user_lastlogin' => time()
						);
					$this->users_model->tkt_update($data);
					$this->session->set_userdata('userlogin',$users[0]);
					redirect('/admin','refresh');
				}else{
					$this->load->view('alert/error');
				}
			}else{
				$this->load->view('alert/error');
			}
		}
		$this->load->view('admin/login');
	}

	public function loginfacebook()
	{
		if($this->input->get('ref'))
		{
			$this->session->set_userdata('ref',$this->input->get('ref'));
		}
		require_once APPPATH.'third_party/Facebook/autoload.php';
		$fb = new Facebook\Facebook ([
		  'app_id' => '1765825137022819', 
		  'app_secret' => 'd50aed04ca37eafa4bdd45aff654bf2f',
		  'default_graph_version' => 'v2.2',
		  ]);
		 
		$helper = $fb->getRedirectLoginHelper();
		 
		try {
		  $accessToken = $helper->getAccessToken();
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  // When Graph returns an error
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  // When validation fails or other local issues
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}
		    
		if (! isset($accessToken)) {
		    $permissions = array('public_profile','email'); // Optional permissions
		    $loginUrl = $helper->getLoginUrl(base_url().'login/loginfacebook', $permissions);
		    header("Location: ".$loginUrl);  
		  exit;
		}
		 
		try {
		  // Returns a `Facebook\FacebookResponse` object
		  $fields = array('id', 'name', 'email');
		  $response = $fb->get('/me?fields='.implode(',', $fields).'', $accessToken);
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}		 
		$user = $response->getGraphUser();
		// store user
		$users_1 = $this->users_model->tkt_get_list_by_field('user_name',$user['id']);
		if(count($users_1)==0)
		{
			$data_insert = array(
				'user_name' => $user['id'],
				'user_pass' => password_hash($user['id'],1),
				'user_email' => $user['email'],
				'user_fullname' => $user['name'],
				'user_role' => 'fbguest',
				'user_lastlogin' => time(),
				'user_image' => 'http://graph.facebook.com/'.$user['id'].'/picture?type=large'
				);
			if($user_id = $this->users_model->tkt_insert($data_insert))
			{
				$this->session->set_userdata('userlogin',$this->users_model->tkt_get($user_id));
				$this->subscribe_email_model->tkt_insert(array('sub_email'=>$user['email'],'sub_time'=>time()));
				if($this->session->has_userdata('ref'))
				{
					$ref=$this->session->userdata('ref');
					$this->session->unset_userdata('ref');
					redirect($ref,'refresh');
				}else{
					redirect('/','refresh');
				}
			}else{
				redirect('/login','refresh');
			}
		}else if(count($users_1)==1){
			$this->session->set_userdata('userlogin',$users_1[0]);
			if($this->session->has_userdata('ref'))
			{
				$ref=$this->session->userdata('ref');
				$this->session->unset_userdata('ref');
				redirect($ref,'refresh');
			}else{
				redirect('/','refresh');
			}
		}
	}

	function logingoogle()
	{
		if($this->input->get('ref'))
		{
			$this->session->set_userdata('ref',$this->input->get('ref'));
		}
		$google_client_id 		= '778574297757-17v5a53hesb0eah1rlvc330delnpcehl.apps.googleusercontent.com';
		$google_client_secret 	= 'LHxVEjqbSWqklC3d328Jga01';
		$google_redirect_url 	= base_url().'login/logingoogle'; //path to your script
		$google_developer_key 	= 'AIzaSyAm0fgGEwbn2_4nbLma_VhExx81ryHS4T8';
		require_once APPPATH.'third_party/Google/Google_Client.php';
		require_once APPPATH.'third_party/Google/contrib/Google_Oauth2Service.php';
		 
		$gClient = new Google_Client();
		$gClient->setApplicationName('Login to Monny.Net');
		$gClient->setClientId($google_client_id);
		$gClient->setClientSecret($google_client_secret);
		$gClient->setRedirectUri($google_redirect_url);
		$gClient->setDeveloperKey($google_developer_key);
		$google_oauthV2 = new Google_Oauth2Service($gClient);
		if (isset($_GET['code'])) 
		{ 
			$gClient->authenticate($_GET['code']);
			$_SESSION['tokengooglelogin'] = $gClient->getAccessToken();
			header('Location: '.filter_var($google_redirect_url, FILTER_SANITIZE_URL));
			return;
		}
		if (isset($_SESSION['tokengooglelogin']))
		{
			$gClient->setAccessToken($_SESSION['tokengooglelogin']);
		}
		if ($gClient->getAccessToken()) 
		{
			$user = $google_oauthV2->userinfo->get();
			$_SESSION['tokengooglelogin'] = $gClient->getAccessToken();
		}else{
			$authUrl = $gClient->createAuthUrl();
		}
		if(isset($authUrl))
		{
			header("Location: ".$authUrl);
		}else{	
			// store user
			$users_1 = $this->users_model->tkt_get_list_by_field('user_name',$user['id']);
			if(count($users_1)==0)
			{
				$data_insert = array(
					'user_name' => $user['id'],
					'user_pass' => password_hash($user['id'],1),
					'user_email' => $user['email'],
					'user_fullname' => $user['name'],
					'user_role' => 'ggguest',
					'user_lastlogin' => time(),
					'user_image' => $user['picture']
					);
				if($user_id = $this->users_model->tkt_insert($data_insert))
				{
					$this->session->set_userdata('userlogin',$this->users_model->tkt_get($user_id));
					$this->subscribe_email_model->tkt_insert(array('sub_email'=>$user['email'],'sub_time'=>time()));
					if($this->session->has_userdata('ref'))
					{
						$ref=$this->session->userdata('ref');
						$this->session->unset_userdata('ref');
						redirect($ref,'refresh');
					}else{
						redirect('/','refresh');
					}
				}else{
					redirect('/login','refresh');
				}
			}else if(count($users_1)==1){
				$this->session->set_userdata('userlogin',$users_1[0]);
				if($this->session->has_userdata('ref'))
				{
					$ref=$this->session->userdata('ref');
					$this->session->unset_userdata('ref');
					redirect($ref,'refresh');
				}else{
					redirect('/','refresh');
				}
			}
		}
	}

	public function logout()
	{
		if($this->session->has_userdata('userlogin')) $this->session->unset_userdata('userlogin');
		redirect('/login','refresh');
	}
}
