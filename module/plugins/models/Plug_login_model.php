<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// 第三方登录资料表


class Plug_login_model  extends  MY_Model
{

	public function __construct()
	{
		parent::__construct();
        $this->table = 'plug_login';
		$this->autoid = 'login_id';
		$this->sort  = 'desc';
	}
	
	
}
