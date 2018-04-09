<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// 模块列表


class cms_block_model  extends  MY_Model
{
	
	
	public function __construct()
	{
		parent::__construct();
		$this->table  = 'cms_block';
		$this->autoid = 'block_id';
	}



	public function get_artBlock()
	{
		return parent::get_list(array('block_article'=>1));
	}

}
















