<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Cms_menu extends LG_Controller 
{

	public function __construct()
	{
    	parent::__construct();
		$this->load->library('pagination');
		$this->load->model('cms_menu_model');
		$this->load->model('cms_article_model');
    }
	
	
	public function single_page($id=0)
	{
		$row_menu = $this->cms_menu_model->get_db_row($id);
		if($row_menu){
			$data['id'] = $id;
			$data['row_menu'] = $row_menu;
			$data['menus'] = $this->cms_menu_model->get_menus();
			$data['crumbs'] = $this->cms_menu_model->get_crumbs($id);
			$data['subnav'] = $this->cms_menu_model->get_subnav($id);
			return $this->load->view('content/cms_menu/single_page',$data);
		}
		show_404();
	}
	
	
	
	public function list_news($id=0,$page=1)
	{
		$row_menu = $this->cms_menu_model->get_db_row($id);
		if($row_menu){
			$data['id'] = $id;
			$data['row_menu'] = $row_menu;
			$data['menus'] = $this->cms_menu_model->get_menus();
			$data['crumbs'] = $this->cms_menu_model->get_crumbs($id);
			$data['subnav'] = $this->cms_menu_model->get_subnav($id);
			
			$total = $this->cms_article_model->get_total(array('art_mid'=>$id));
			$data['pages'] = $this->pagination->create_pages($row_menu['menu_url'],$total,20);
			$data['result'] = $this->cms_article_model->get_list(array('art_mid'=>$id),$page,20);
			return $this->load->view('content/cms_menu/list_news',$data);
		}
		show_404();
	}
	
	
	public function list_image($id=0,$page=1)
	{
		$row_menu = $this->cms_menu_model->get_db_row($id);
		if($row_menu){
			$data['id'] = $id;
			$data['row_menu'] = $row_menu;
			$data['menus'] = $this->cms_menu_model->get_menus();
			$data['crumbs'] = $this->cms_menu_model->get_crumbs($id);
			$data['subnav'] = $this->cms_menu_model->get_subnav($id);
			
			$total = $this->cms_article_model->get_total(array('art_mid'=>$id));
			$data['pages'] = $this->pagination->create_pages($row_menu['menu_url'],$total,20);
			$data['result'] = $this->cms_article_model->get_list(array('art_mid'=>$id),$page,20);
			return $this->load->view('content/cms_menu/list_image',$data);
		}
		show_404();
	}
	
	
}
