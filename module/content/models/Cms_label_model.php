<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// 标签列表


class Cms_label_model  extends  LANG_Model
{
	
	
	public function __construct()
	{
		parent::__construct();
		$this->table  = 'cms_label';
		$this->autoid = 'label_id';
		$this->language = $this->session->userdata('backend_language');
	}

}
















