<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// 留言列表


class Cms_message_model  extends  MY_Model
{

	public function __construct()
	{
		
		parent::__construct();
        $this->table = 'cms_message';
		$this->autoid = 'msg_id';
		$this->sort  = 'desc';
	}
	
	
}
