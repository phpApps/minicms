<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


//站点设置


class Cms_setting_model  extends  MY_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->table = 'cms_setting';
		$this->autoid = 'set_id';
	}




}
