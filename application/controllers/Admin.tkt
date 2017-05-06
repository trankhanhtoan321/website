<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	private $_userlogin;
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('userlogin')) redirect('/login','refresh');
		$this->_userlogin = $this->session->userdata('userlogin');
		if($this->_userlogin['user_role']!='admin') redirect('/','refresh');
		$this->load->library('tkt_upload');
	}

	public function index()
	{
		$data['_varibles'] = NULL;
		$data['_content'] = 'admin/home';
		$this->load->view('admin/index',$data);
	}

	/*users*/
	public function profile_user()
	{
		if($this->input->post('update_profile'))
		{
			$data_update = array(
				'user_id' => $this->_userlogin['user_id'],
				'user_fullname' => $this->input->post('user_fullname'),
				'user_name' => $this->input->post('user_name'),
				'user_email' => $this->input->post('user_email')
				);
			if($this->tkt_upload->tkt_upload('user_image','image','images/logos/'))
			{
				$data_update['user_image'] = $this->tkt_upload->tkt_get_file_path();
			}
			$users = $this->users_model->tkt_get_list_by_field('user_name',$data_update['user_name']);
			if($data_update['user_name']==$this->_userlogin['user_name'] || count($users)==0)
			{
				if($this->users_model->tkt_update($data_update))
				{
					$data['_alert'] = 'alert/success';
					$users = $this->users_model->tkt_get_list_by_field('user_name',$data_update['user_name']);
					if(count($users)==1)
					{
						$this->_userlogin = $users[0];
						$this->session->set_userdata('userlogin',$this->_userlogin);
					}
				}else{
					$data['_alert'] = 'alert/error';
				}
			}else{
				$data['_alert'] = 'alert/error';
			}
		}
		$data['_varibles'] = NULL;
		$data['_content'] = 'admin/profile_user';
		$this->load->view('admin/index',$data);
	}

	function user()
	{
		if($this->input->post('table_records'))
		{
			if($this->users_model->tkt_delete($this->input->post('table_records')))
			{
				$data['_alert'] = 'alert/success';
			}else{
				$data['_alert'] = 'alert/error';
			}
		}
		$data['_content'] = 'admin/user';
		$data['_varibles']['users'] = $this->users_model->tkt_get_list();
		$this->load->view('admin/index',$data);
	}

	public function change_password()
	{
		if($this->input->post('change_password'))
		{
			$data_update = array(
				'user_id' => $this->_userlogin['user_id'],
				'user_pass' => password_hash($this->input->post('new_password'),PASSWORD_DEFAULT)
				);
			$data_verify = array(
				'user_name' => $this->_userlogin['user_name'],
				'user_pass' => $this->input->post('old_password')
				);
			if($this->users_model->tkt_verify($data_verify))
			{
				if($this->users_model->tkt_update($data_update))
				{
					$data['_alert'] = 'alert/success';
				}else{
					$data['_alert'] = 'alert/error';
				}
			}else{
				$data['_alert'] = 'alert/error';
			}
		}
		$data['_varibles'] = NULL;
		$data['_content'] = 'admin/change_password';
		$this->load->view('admin/index',$data);
	}

	/*setting*/
	public function general_setting()
	{
		if($this->input->post('save_setting'))
		{
			$data_update = array(
				'set_pagetitle' => $this->input->post('set_pagetitle'),
				'set_pagedescriptiton' => $this->input->post('set_pagedescriptiton'),
				'set_pagekeyword' => $this->input->post('set_pagekeyword'),
				'address' => $this->input->post('address'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'id_analytics' => $this->input->post('id_analytics'),
				'google_site_verification' => $this->input->post('google_site_verification'),
				'author' => $this->input->post('author'),
				'email_host' => $this->input->post('email_host'),
				'email_SMTPSecure' => $this->input->post('email_SMTPSecure'),
				'email_port' => $this->input->post('email_port'),
				'email_Username' => $this->input->post('email_Username'),
				'email_Password' => $this->input->post('email_Password'),
				'author_name' => $this->input->post('author_name'),
				'email_name' => $this->input->post('email_name'),
				'currency' => $this->input->post('currency'),
				'fb_id' => $this->input->post('fb_id')
				);

			if($this->tkt_upload->tkt_upload('logo','image','images/logos/'))
			{
				$data_update['logo'] = $this->tkt_upload->tkt_get_file_path();
			}

			$this->load->library('tkt_upload',NULL,'tkt_upload2');
			if($this->tkt_upload2->tkt_upload('favicon','image','images/logos/'))
			{
				$data_update['favicon'] = $this->tkt_upload->tkt_get_file_path();
			}

			if($this->setting_model->tkt_update($data_update))
			{
				$data['_alert'] = 'alert/success';
			}else{
				$data['_alert'] = 'alert/error';
			}
		}
		$data['_varibles'] = NULL;
		$data['_content'] = 'admin/general_setting';
		$this->load->view('admin/index',$data);
	}

	/*blogcategory*/
	public function blogcategory()
	{
		if($this->input->post('table_records'))
		{
			if($this->blogcategory_model->tkt_delete($this->input->post('table_records')))
			{
				$data['_alert'] = 'alert/success';
			}else{
				$data['_alert'] = 'alert/error';
			}
		}
		$data['_content'] = 'admin/blogcategory';
		$data['_varibles']['blogcategorys'] = $this->blogcategory_model->tkt_get_list();
		$this->load->view('admin/index',$data);
	}

	public function new_blogcategory()
	{
		if($this->input->post('blogcat_name') && $this->input->post('blogcat_seo_title'))
		{
			$data_insert = array(
				'blogcat_name' => $this->input->post('blogcat_name'),
				'blogcat_seo_title' => $this->input->post('blogcat_seo_title'),
				'blogcat_seo_description' => $this->input->post('blogcat_seo_description'),
				'blogcat_seo_keyword' => $this->input->post('blogcat_seo_keyword'),
				'blogcat_parent_id' => $this->input->post('blogcat_parent_id'),
				'blogcat_description' => $this->input->post('blogcat_description'),
				'blogcat_image' => '/uploads/icons/none.jpg'
				);
			if($this->tkt_upload->tkt_upload('blogcat_image','image','images/blogs/'))
			{
				$data_insert['blogcat_image'] = $this->tkt_upload->tkt_get_file_path();
			}
			if($this->blogcategory_model->tkt_insert($data_insert))
			{
				$data['_alert'] = 'alert/success';
			}else{
				$data['_alert'] = 'alert/error';
			}
		}
		$data['_varibles']['blogcategorys'] = $this->blogcategory_model->tkt_get_list();
		$data['_content'] = 'admin/new_blogcategory';
		$this->load->view('admin/index',$data);
	}

	public function update_blogcategory($blogcat_id=0)
	{
		if($blogcat_id == 0) redirect('/admin/blogcategory','refresh');
		if($this->input->post('blogcat_name') && $this->input->post('blogcat_seo_title'))
		{
			$data_update = array(
				'blogcat_id' => $blogcat_id,
				'blogcat_name' => $this->input->post('blogcat_name'),
				'blogcat_seo_title' => $this->input->post('blogcat_seo_title'),
				'blogcat_seo_description' => $this->input->post('blogcat_seo_description'),
				'blogcat_seo_keyword' => $this->input->post('blogcat_seo_keyword'),
				'blogcat_parent_id' => $this->input->post('blogcat_parent_id'),
				'blogcat_description' => $this->input->post('blogcat_description')
				);
			if($this->tkt_upload->tkt_upload('blogcat_image','image','images/blogs/'))
			{
				$data_update['blogcat_image'] = $this->tkt_upload->tkt_get_file_path();
			}
			if($this->blogcategory_model->tkt_update($data_update))
			{
				$data['_alert'] = 'alert/success';
			}else{
				$data['_alert'] = 'alert/error';
			}
		}
		$data['_varibles']['blogcategory'] =  $this->blogcategory_model->tkt_get($blogcat_id);
		$data['_varibles']['blogcategorys'] = $this->blogcategory_model->tkt_get_list();
		$data['_content'] = 'admin/update_blogcategory';
		$this->load->view('admin/index',$data);
	}

	/*blog*/
	public function new_blog()
	{
		if($this->input->post('blog_name') && $this->input->post('blog_seo_title'))
		{
			$data_insert = array(
				'blog_user_id' => $this->_userlogin['user_id'],
				'blog_time' => time(),
				'blog_name' => $this->input->post('blog_name'),
				'blog_seo_title' => $this->input->post('blog_seo_title'),
				'blog_seo_description' => $this->input->post('blog_seo_description'),
				'blog_seo_keyword' => $this->input->post('blog_seo_keyword'),
				'blog_cat_ids' => json_encode($this->input->post('blog_cat_ids')),
				'blog_content' => $this->input->post('blog_content'),
				'blog_excerpt' => $this->input->post('blog_excerpt'),
				'blog_enable_comment' => $this->input->post('blog_enable_comment'),
				'blog_image' => '/uploads/icons/none.jpg',
				'blog_cat_names' => ''
				);
			if(is_array($this->input->post('blog_cat_ids')))
			{
				foreach ($this->input->post('blog_cat_ids') as $cat_id) 
				{
					$cat = $this->blogcategory_model->tkt_get($cat_id);
					if($cat != NULL)
					{
						$data_insert['blog_cat_names'] = $data_insert['blog_cat_names'].','.$cat['blogcat_name'];
					}
				}
			}
			if($this->tkt_upload->tkt_upload('blog_image','image','images/blogs/'))
			{
				$data_insert['blog_image'] = $this->tkt_upload->tkt_get_file_path();
			}
			if($this->blog_model->tkt_insert($data_insert))
			{
				$data['_alert'] = 'alert/success';
			}else{
				$data['_alert'] = 'alert/error';
			}

			/*send email*/
			if($this->input->post('sendmail')==1)
			{
				$this->load->library('tkt_mailer');
				$this->tkt_mailer->Subject($this->input->post('blog_name'));
				$this->tkt_mailer->msgHTML($this->input->post('blog_content'));
				foreach($this->input->post("emails") as $email)
				{
					$this->tkt_mailer->addAddress($email);
				}
				if($this->input->post('sendmailsubscribe')==1)
				{
					$emails = $this->subscribe_email_model->tkt_get_list();
					foreach($emails as $email)
					{
						$this->tkt_mailer->addBCC($email['sub_email']);
					}
				}
				$this->tkt_mailer->send();
			}
			/*end send email*/
		}
		$data['_varibles']['blogcategorys'] = $this->blogcategory_model->tkt_get_list();
		$data['_content'] = 'admin/new_blog';
		$this->load->view('admin/index',$data);
	}

	public function blogs()
	{
		if($this->input->post('table_records'))
		{
			if($this->blog_model->tkt_delete($this->input->post('table_records')))
			{
				$data['_alert'] = 'alert/success';
			}else{
				$data['_alert'] = 'alert/error';
			}
		}
		$data['_content'] = 'admin/blog';
		$data['_varibles']['blogs'] = $this->blog_model->tkt_get_list();
		$this->load->view('admin/index',$data);
	}

	public function update_blog($blog_id)
	{
		if($blog_id == 0) redirect('/admin/blogs','refresh');
		if($this->input->post('blog_name') && $this->input->post('blog_seo_title'))
		{
			$data_update = array(
				'blog_id' => $blog_id,
				'blog_time' => time(),
				'blog_name' => $this->input->post('blog_name'),
				'blog_seo_title' => $this->input->post('blog_seo_title'),
				'blog_seo_description' => $this->input->post('blog_seo_description'),
				'blog_seo_keyword' => $this->input->post('blog_seo_keyword'),
				'blog_cat_ids' => json_encode($this->input->post('blog_cat_ids')),
				'blog_content' => $this->input->post('blog_content'),
				'blog_cat_names' => '',
				'blog_excerpt' => $this->input->post('blog_excerpt'),
				'blog_enable_comment' => $this->input->post('blog_enable_comment')
				);
			if(is_array($this->input->post('blog_cat_ids')))
			{
				$data_update['blog_cat_names'] = '';
				foreach ($this->input->post('blog_cat_ids') as $cat_id) 
				{
					$cat = $this->blogcategory_model->tkt_get($cat_id);
					if($cat != NULL)
					{
						$data_update['blog_cat_names'] = $data_update['blog_cat_names'].','.$cat['blogcat_name'];
					}
				}
			}
			if($this->tkt_upload->tkt_upload('blog_image','image','images/blogs/'))
			{
				$data_update['blog_image'] = $this->tkt_upload->tkt_get_file_path();
			}
			if($this->blog_model->tkt_update($data_update))
			{
				$data['_alert'] = 'alert/success';
			}else{
				$data['_alert'] = 'alert/error';
			}
		}
		$data['_varibles']['blog'] =  $this->blog_model->tkt_get($blog_id);
		$data['_varibles']['blogcategorys'] = $this->blogcategory_model->tkt_get_list();
		$data['_content'] = 'admin/update_blog';
		$this->load->view('admin/index',$data);
	}

	public function subscribe_email()
	{
		if($this->input->post('table_records'))
		{
			if($this->subscribe_email_model->tkt_delete($this->input->post('table_records')))
			{
				$data['_alert'] = 'alert/success';
			}else{
				$data['_alert'] = 'alert/error';
			}
		}
		$data['_content'] = 'admin/subscribe_email';
		$data['_varibles']['subscribe_emails'] = $this->subscribe_email_model->tkt_get_list();
		$this->load->view('admin/index',$data);
	}

	function send_mail()
	{
		if($this->input->post('subject') && $this->input->post('body'))
		{
			$this->load->library('tkt_mailer');
			$this->tkt_mailer->Subject($this->input->post('subject'));
			$this->tkt_mailer->msgHTML($this->input->post('body'));
			foreach($this->input->post('to') as $to)
			{
				$this->tkt_mailer->addAddress($to);
			}
			foreach($this->input->post('cc') as $cc)
			{
				$this->tkt_mailer->addCC($cc);
			}
			foreach($this->input->post('bcc') as $bcc)
			{
				$this->tkt_mailer->addBCC($bcc);
			}
			if($this->input->post('emailsubscribe')==1)
			{
				$emails = $this->subscribe_email_model->tkt_get_list();
				foreach($emails as $emmail)
				{
					$this->tkt_mailer->addBCC($email);
				}
			}
			if($this->tkt_mailer->send())
			{
				$data['_alert'] = 'alert/success';
			}else{
				$data['_alert'] = 'alert/error';
			}
		}
		$data['_varibles'] = NULL;
		$data['_content'] = 'admin/send_mail';
		$this->load->view('admin/index',$data);
	}

	function comment()
	{
		if($this->input->post('table_records'))
		{
			if($this->comment_model->tkt_delete($this->input->post('table_records')))
			{
				$data['_alert'] = 'alert/success';
			}else{
				$data['_alert'] = 'alert/error';
			}
		}
		$data['_content'] = 'admin/comment';
		$data['_varibles']['comments'] = $this->comment_model->tkt_get_list();
		$this->load->view('admin/index',$data);
	}

	function delete_comment($id)
	{
		$this->comment_model->tkt_delete($id);
		redirect($this->input->get('ref'),'refresh');
	}

	function product_category()
	{
		if($this->input->post('table_records'))
		{
			if($this->product_category_model->tkt_delete($this->input->post('table_records')))
			{
				$data['_alert'] = 'alert/success';
			}else{
				$data['_alert'] = 'alert/error';
			}
		}
		$data['_content'] = 'admin/product_category';
		$data['_varibles']['categorys'] = $this->product_category_model->tkt_get_list();
		$this->load->view('admin/index',$data);
	}

	function new_product_category()
	{
		if($this->input->post('product_category_name') && $this->input->post('product_category_seo_title'))
		{
			$data_insert = array(
				'product_category_name' => $this->input->post('product_category_name'),
				'product_category_seo_title' => $this->input->post('product_category_seo_title'),
				'product_category_seo_keyword' => $this->input->post('product_category_seo_keyword'),
				'product_category_seo_description' => $this->input->post('product_category_seo_description'),
				'product_category_parent_id' => $this->input->post('product_category_parent_id'),
				'product_category_description' => $this->input->post('product_category_description'),
				'product_category_date_added' => time(),
				'product_category_image' => '/uploads/icons/none.jpg'
				);
			if($this->tkt_upload->tkt_upload('product_category_image','image','images/products/'))
			{
				$data_insert['product_category_image'] = $this->tkt_upload->tkt_get_file_path();
			}
			if($this->product_category_model->tkt_insert($data_insert))
			{
				$data['_alert'] = 'alert/success';
			}else{
				$data['_alert'] = 'alert/error';
			}
		}
		$data['_varibles']['categorys'] = $this->product_category_model->tkt_get_list();
		$data['_content'] = 'admin/new_product_category';
		$this->load->view('admin/index',$data);
	}

	function update_product_category($id)
	{
		if($id == 0) redirect('/admin/product_category','refresh');
		if($this->input->post('product_category_name') && $this->input->post('product_category_seo_title'))
		{
			$data_update = array(
				'product_category_id' => $id,
				'product_category_name' => $this->input->post('product_category_name'),
				'product_category_seo_title' => $this->input->post('product_category_seo_title'),
				'product_category_seo_keyword' => $this->input->post('product_category_seo_keyword'),
				'product_category_seo_description' => $this->input->post('product_category_seo_description'),
				'product_category_parent_id' => $this->input->post('product_category_parent_id'),
				'product_category_description' => $this->input->post('product_category_description')
				);
			if($this->tkt_upload->tkt_upload('product_category_image','image','images/products/'))
			{
				$data_update['product_category_image'] = $this->tkt_upload->tkt_get_file_path();
			}
			if($this->product_category_model->tkt_update($data_update))
			{
				$data['_alert'] = 'alert/success';
			}else{
				$data['_alert'] = 'alert/error';
			}
		}
		$data['_varibles']['category'] =  $this->product_category_model->tkt_get($id);
		$data['_varibles']['categorys'] = $this->product_category_model->tkt_get_list();
		$data['_content'] = 'admin/update_product_category';
		$this->load->view('admin/index',$data);
	}

	function new_product()
	{
		if($this->input->post('product_name') && $this->input->post('product_seo_title'))
		{
			$data_insert = array(
				'product_name' => $this->input->post('product_name'),
				'product_seo_title' => $this->input->post('product_seo_title'),
				'product_seo_keyword' => $this->input->post('product_seo_keyword'),
				'product_seo_description' => $this->input->post('product_seo_description'),
				'product_price_in' => $this->input->post('product_price_in'),
				'product_price_out' => $this->input->post('product_price_out'),
				'product_date_added' => time(),
				'product_description' => $this->input->post('product_description'),
				'product_image' => '/uploads/icons/none.jpg',
				'product_quantity' => $this->input->post('product_quantity'),
				'product_sku' => $this->input->post('product_sku'),
				'product_model' => $this->input->post('product_model'),
				'product_views' => 0,
				'product_orders' => 0,
				'product_category_ids' => json_encode($this->input->post('product_category_ids')),
				'product_enable' => $this->input->post('product_enable')
				);
			$attrs = $this->input->post("product_attr");
			$values = $this->input->post("product_attr_value");
			$product_attribute = array();
			for($i=0;$i<count($attrs);$i++)
			{
				if($attrs[$i]!=NULL) $product_attribute[] = array($attrs[$i],$values[$i]);
			}
			$data_insert['product_attribute'] = json_encode($product_attribute);
			if($this->tkt_upload->tkt_upload('product_image','image','images/products/'))
			{
				$data_insert['product_image'] = $this->tkt_upload->tkt_get_file_path();
			}
			$i=1;
			$product_gallery = array();
			while(isset($_FILES['product_gallery'.$i]))
			{
				$this->load->library('tkt_upload',NULL,'tkt_upload'.$i);
				if($this->{'tkt_upload'.$i}->tkt_upload('product_gallery'.$i,'image','images/products/'))
				{
					$product_gallery[] = $this->{'tkt_upload'.$i}->tkt_get_file_path();
				}
				$i++;
			}
			$data_insert['product_gallery'] = json_encode($product_gallery);
			if($this->product_model->tkt_insert($data_insert))
			{
				$data['_alert'] = 'alert/success';
			}else{
				$data['_alert'] = 'alert/error';
			}
		}
		$data['_varibles']['categorys'] = $this->product_category_model->tkt_get_list();
		$data['_content'] = 'admin/new_product';
		$this->load->view('admin/index',$data);
	}

	function product()
	{
		if($this->input->post('table_records'))
		{
			if($this->product_model->tkt_delete($this->input->post('table_records')))
			{
				$data['_alert'] = 'alert/success';
			}else{
				$data['_alert'] = 'alert/error';
			}
		}
		$data['_content'] = 'admin/product';
		$data['_varibles']['products'] = $this->product_model->tkt_get_list();
		$this->load->view('admin/index',$data);
	}

	function update_product($id)
	{
		if($id == 0) redirect('/admin/product','refresh');
		if($this->input->post('product_name') && $this->input->post('product_seo_title'))
		{
			$data_insert = array(
				'product_id' => $id,
				'product_name' => $this->input->post('product_name'),
				'product_seo_title' => $this->input->post('product_seo_title'),
				'product_seo_keyword' => $this->input->post('product_seo_keyword'),
				'product_seo_description' => $this->input->post('product_seo_description'),
				'product_price_in' => $this->input->post('product_price_in'),
				'product_price_out' => $this->input->post('product_price_out'),
				'product_quantity' => $this->input->post('product_quantity'),
				'product_sku' => $this->input->post('product_sku'),
				'product_model' => $this->input->post('product_model'),
				'product_description' => $this->input->post('product_description'),
				'product_category_ids' => json_encode($this->input->post('product_category_ids')),
				'product_enable' => $this->input->post('product_enable')
				);
			$attrs = $this->input->post("product_attr");
			$values = $this->input->post("product_attr_value");
			$product_attribute = array();
			for($i=0;$i<count($attrs);$i++)
			{
				if($attrs[$i]!=NULL) $product_attribute[] = array($attrs[$i],$values[$i]);
			}
			$data_insert['product_attribute'] = json_encode($product_attribute);
			if($this->tkt_upload->tkt_upload('product_image','image','images/products/'))
			{
				$data_insert['product_image'] = $this->tkt_upload->tkt_get_file_path();
			}
			$this->load->library('tkt_upload',NULL,'tkt_upload1');
			if($this->tkt_upload1->tkt_upload('product_gallery1','image','images/products/'))
			{
				$i=2;
				$product_gallery[] = $this->tkt_upload1->tkt_get_file_path();
				while(isset($_FILES['product_gallery'.$i]))
				{
					$this->load->library('tkt_upload',NULL,'tkt_upload'.$i);
					if($this->{'tkt_upload'.$i}->tkt_upload('product_gallery'.$i,'image','images/products/'))
					{
						$product_gallery[] = $this->{'tkt_upload'.$i}->tkt_get_file_path();
					}
					$i++;
				}
				$data_insert['product_gallery'] = json_encode($product_gallery);
			}
			
			if($this->product_model->tkt_update($data_insert))
			{
				$data['_alert'] = 'alert/success';
			}else{
				$data['_alert'] = 'alert/error';
			}
		}
		$data['_varibles']['categorys'] = $this->product_category_model->tkt_get_list();
		$data['_varibles']['product'] = $this->product_model->tkt_get($id);
		$data['_content'] = 'admin/update_product';
		$this->load->view('admin/index',$data);
	}
}
