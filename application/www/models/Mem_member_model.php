<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// 用户模型


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
	//获取用户数据 icon
	public function get_icon($mid=NULL){
		$mid = ($this->session->userdata('mid'))?$this->session->userdata('mid'):'';
		$uid =  ($this->session->userdata('uid'))?$this->session->userdata('uid'):'';
		$from = ($this->session->userdata('from'))?$this->session->userdata('from'):'';
		$row = $this->db->where(array('login_mid'=>$mid,'login_uid'=>$uid,'login_from'=>$from))->get($this->db->dbprefix('plug_login'))->row_array();
		return ($row) ? $row["login_icon"]: base_url().'default/assets/img/user.png';
	}
}
