<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// 用户角色


class Sys_role_model  extends  MY_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->table = 'sys_role';
		$this->autoid = 'role_id';
	}


}
