<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Cms_article extends LG_Controller 
{

	public function __construct()
	{
    	parent::__construct();
		$this->load->model('cms_menu_model');
		$this->load->model('cms_article_model');
    }
	
	
	public function news($id=0)
	{
		$row_article = $this->cms_article_model->get_row($id);
		if($row_article){
			$row_menu = $this->cms_menu_model->get_db_row($row_article['art_mid']);
			if($row_menu){
				$data['row_menu'] = $row_menu;
				$data['row_article'] = $row_article;
				$data['menus'] = $this->cms_menu_model->get_menus();
				$data['crumbs'] = $this->cms_menu_model->get_crumbs($row_menu['menu_id']);
				$data['subnav'] = $this->cms_menu_model->get_subnav($row_menu['menu_id']);
				
				$data['row_prev'] = $this->cms_article_model->get_row(array('art_id <'=>$id));
				$data['row_next'] = $this->cms_article_model->get_row(array('art_id >'=>$id));
				return $this->load->view('cms_article/news',$data);
			}
		}
		show_404();
	}
	
	
	public function image($id=0)
	{
		$row_article = $this->cms_article_model->get_row($id);
		if($row_article){
			$row_menu = $this->cms_menu_model->get_db_row($row_article['art_mid']);
			if($row_menu){
				$data['row_menu'] = $row_menu;
				$data['row_article'] = $row_article;
				$data['menus'] = $this->cms_menu_model->get_menus();
				$data['crumbs'] = $this->cms_menu_model->get_crumbs($row_menu['menu_id']);
				$data['subnav'] = $this->cms_menu_model->get_subnav($row_menu['menu_id']);
				
				$data['row_prev'] = $this->cms_article_model->get_row(array('art_id <'=>$id));
				$data['row_next'] = $this->cms_article_model->get_row(array('art_id >'=>$id));
				return $this->load->view('cms_article/image',$data);
			}
		}
		show_404();
	}
	
	
}
