<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// 文章数据


class Cms_article_model  extends  MY_Model
{
	
	
	public function __construct()
	{
		parent::__construct();
		$this->table  = 'content/cms_article';
		$this->autoid = 'art_id';
		$this->language = $this->session->userdata('site_language');
	}



	protected function set_query($parame,$has_from)
	{
		$this->db->where('art_enable',1);
		parent::set_query($parame,$has_from); 
	}


	
	
	public function get_list($parame=array(),$page=NULL,$limit=NULL,$has_from=FALSE)
	{
		$this->db->select('art_id,art_title,art_description,art_attach,art_addtime,lang');
		return parent::get_list($parame,$page,$limit,$has_from);
	}
	
	
	



	


}

