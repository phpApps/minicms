<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// 会员列表


class Mem_member_model  extends  MY_Model
{

	public function __construct()
	{
		
		parent::__construct();
        $this->table = 'mem_member';
		$this->autoid = 'member_id';
		$this->sort  = 'desc';
	}
	
	
	//检查手机
	public function check_phone($phone)
	{
		$this->db->where('member_phone',$phone);
		$row = $this->db->get($this->table)->row_array();
		return ($row) ? TRUE : FALSE;
	}

	
	
}
