<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller
{
	function index()
	{
		$data['SEO_title'] = $this->setting_model->tkt_get('set_pagetitle');
		$data['SEO_keyword'] = $this->setting_model->tkt_get('set_pagekeyword');
		$data['SEO_descriptiton'] = $this->setting_model->tkt_get('set_pagedescriptiton');
		$data['SEO_image'] = $this->setting_model->tkt_get('logo');
		$data['_varibles']['blog_news'] = $this->blog_model->tkt_get_list(10,0,'DESC','blog_time');
		$data['_varibles']['blog_most_views'] = $this->blog_model->tkt_get_list(10,0,'DESC','blog_views');
		$data['_content'] = 'site/home';
		$this->load->view('site/index',$data);
	}

	function tra_cuu_diem_thi_tin_hoc_van_phong()
	{
		$data['SEO_title'] = "Tra Cứu Điểm Thi Tin Học Văn Phòng";
		$data['SEO_descriptiton'] = $this->setting_model->tkt_get('set_pagedescriptiton');
		$data['SEO_keyword'] = $this->setting_model->tkt_get('set_pagekeyword');
		$data['SEO_image'] = $this->setting_model->tkt_get('logo');
		$data['_varibles']['thongbao'] = NULL;
		if($this->input->post('tracuu'))
		{
			$tracuu = $this->input->post('tracuu',TRUE);
			if($this->tkt_validate->is_email($tracuu) || $this->tkt_validate->is_number($tracuu))
			{
				$this->load->library('tkt_webclient',array('host'=>'t3h.vn'));
				$this->tkt_webclient->setContentType("application/json; charset=utf-8");
				$this->tkt_webclient->setAccept("application/json, text/javascript, */*; q=0.01");
				$datapost = "{'Tieu_chi1': '{$tracuu}', 'Tieu_chi2': ''}";
				$this->tkt_webclient->post("http://csc.edu.vn/services/Default.aspx/Xu_ly_Tra_cuu",$datapost);
				$ketqua = $this->tkt_webclient->getContent();
				$p1 = strpos($ketqua, "#%%#");
				$p2 = strpos($ketqua, '"}');
				if(substr($ketqua, $p1+4,$p2-$p1-4)>0)
				{
					$ketqua = substr($ketqua,0, $p1).'"}';
					$ketqua = json_decode($ketqua);
					$data['_varibles']['ketqua'] = $ketqua->d;
				} else {
					$data['_varibles']['thongbao'] = "không có kết quả phù hợp!";
				}
			} else {
				$data['_varibles']['thongbao'] = "nhập sai email hoặc số điện thoại!";
			}
		}
		$data['_content'] = 'site/tra_cuu_diem_thi_tin_hoc_van_phong';
		$this->load->view('site/index',$data);
	}

	function blog_category($id,$page=0)
	{
		$data['_varibles']['blogcat'] = $this->blogcategory_model->tkt_get($id);
		if(!$data['_varibles']['blogcat']) redirect('/','fresh');

		$data['_varibles']['blogs'] = $this->blog_model->tkt_get_list(10,$page,'DESC','blog_time',$id);
		$data['_varibles']['blog_news'] = $this->blog_model->tkt_get_list(7,0,'DESC','blog_time');
		$data['_varibles']['blog_most_views'] = $this->blog_model->tkt_get_list(5,0,'DESC','blog_views');
		/*pagination*/
		$config['base_url'] = base_url().'/'.rewrite($data['_varibles']['blogcat']['blogcat_seo_title']).'-'.$id.'-blogcat.html/p/';
		$config['total_rows'] = count($this->blog_model->tkt_get_list(0,0,'DESC','blog_time',$id));
		$config['per_page'] = 10;
		$config['num_links'] = 5;
		$this->load->library('tkt_pagination',$config);
		$data['_varibles']['pagination'] = $this->tkt_pagination->create_links();
		/*end pagination*/
		/*______________________________________________________*/
		$data['SEO_title'] = $data['_varibles']['blogcat']['blogcat_seo_title'];
		$data['SEO_descriptiton'] = $data['_varibles']['blogcat']['blogcat_seo_description'];
		$data['SEO_keyword'] = $data['_varibles']['blogcat']['blogcat_seo_keyword'];
		$data['SEO_image'] = $data['_varibles']['blogcat']['blogcat_image'];
		$data['_content'] = 'site/blog_category';
		$this->load->view('site/index',$data);
	}

	function blog($id)
	{
		$this->blog_model->tkt_increase($id,'blog_views');
		$data['_varibles']['blog'] = $this->blog_model->tkt_get($id);
		$data['_varibles']['comments'] = $this->comment_model->tkt_get_list(0,0,'ASC','comment_time',$id);
		if(!$data['_varibles']['blog']) redirect('/','fresh');
		$data['_varibles']['blog_relates'] = array();
		/*________________need for SEO________________________________________*/
		$data['SEO_title'] = $data['_varibles']['blog']['blog_seo_title'];
		$data['SEO_descriptiton'] = $data['_varibles']['blog']['blog_seo_description'];
		$data['SEO_keyword'] = $data['_varibles']['blog']['blog_seo_keyword'];
		$data['_varibles']['blog_news'] = $this->blog_model->tkt_get_list(7,0,'DESC','blog_time');
		$data['_varibles']['blog_most_views'] = $this->blog_model->tkt_get_list(5,0,'DESC','blog_views');
		$data['SEO_image'] = $data['_varibles']['blog']['blog_image'];
		$blogcat = json_decode($data['_varibles']['blog']['blog_cat_ids']);
		if($blogcat)
		{
			$blogs = $this->blog_model->tkt_get_list(0,0,'DESC','blog_time',$blogcat[0]);
			$index = array_search($id, array_column($blogs, 'blog_id'));
			$index2 = count($blogs)-1-$index;
			$data1 = $this->blog_model->tkt_get_list(5,$index,'DESC','blog_time',$blogcat[0]);
			$data2 = $this->blog_model->tkt_get_list(5,$index2,'ASC','blog_time',$blogcat[0]);
			unset($data1[0]);
			unset($data2[0]);
			$data['_varibles']['blog_relates'] = array_merge($data1,$data2);
		}
		$data['_content'] = 'site/blog';
		$this->load->view('site/index',$data);
	}

}