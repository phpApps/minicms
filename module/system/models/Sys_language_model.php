<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// 语言列表


class Sys_language_model  extends  MY_Model
{
	
	
	public function __construct()
	{
		parent::__construct();
		$this->table  = 'sys_language';
		$this->autoid = 'lang_id';
	}


}
















