<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Welcome extends LG_Controller 
{
	
	public function __construct()
	{
    	parent::__construct();
		$this->load->model('cms_menu_model');
		$this->load->model('cms_label_model');
		$this->load->model('cms_article_model');
    }


	public function index()
	{
		$data['menus'] = $this->cms_menu_model->get_menus();
		$data['banner_img'] = $this->cms_label_model->get_row('banner_img');
		$data['banner_slide'] = $this->cms_label_model->get_list('banner_slide');
		$data['list_tebie'] = $this->cms_article_model->get_list(array('art_mid'=>15),1,8);
		$data['list_yaowen'] = $this->cms_article_model->get_list(array('art_mid'=>16),1,8);
		$data['list_zonghe'] = $this->cms_article_model->get_list(array('art_mid'=>17),1,8);
		return $this->load->view('welcome/index',$data);
	}
	
	
}
