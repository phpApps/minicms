<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// 模板项列表


class Cms_label_model  extends  CI_Model
{
	
	
	public function __construct()
	{
		parent::__construct();
		$this->table  = 'content/cms_label';
		$this->autoid = 'label_id';
		$this->language = $this->session->userdata('site_language');
	}




	public function get_row($sign=NULL)
	{
		$this->db->limit(1);
		$this->db->where('label_enable',1);
		$this->db->where('label_bs',$sign);
		$this->db->where('lang',$this->language);
		return $this->db->limit(1)->get($this->table)->row_array();
	}



	public function get_list($sign=NULL)
	{
		$this->db->where('label_enable',1);
		$this->db->where('label_bs',$sign);
		$this->db->where('lang',$this->language);
		return $this->db->get($this->table)->result_array();
	}



	


}
















