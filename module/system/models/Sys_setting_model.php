<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// 系统设置


class Sys_setting_model  extends  MY_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->table = 'sys_setting';
		$this->autoid = 'set_id';
	}




}
