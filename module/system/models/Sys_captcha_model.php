<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// 系统验证码


class Sys_captcha_model  extends  CI_Model
{


	public function __construct()
	{
		parent::__construct();
		$this->table = 'sys_captcha';
		$this->autoid = 'captcha_id';
	}
	


	public function save_word($send_word=NULL,$send_name=NULL,$ip_address=NULL)
	{
		$send_word = trim($send_word);
		$send_name = trim($send_name);
		if(empty($send_word)){
			$send_word = rand(1000,9999);
		}
		if(empty($ip_address)){
			$ip_address = $this->input->ip_address();
		}
		if(empty($send_name)){
			$this->session->set_userdata('captcha_word',$send_word);
		}
		else{
			$row['captcha_time'] = time();
			$row['send_word'] = $send_word;
			$row['send_name'] = $send_name;
			$row['ip_address'] = $ip_address;
			$this->db->insert($this->table,$row);
		}
		return $send_word;
	}
	
	
		
	public function check_word($send_word=NULL,$send_name=NULL,$delete=TRUE,$ip_address=NULL)
	{
		$send_word = trim($send_word);
		$send_name = trim($send_name);
		$expiration = time()-1800;
		$this->db->where('captcha_time <',$expiration);
		$this->db->delete($this->table);
		if(empty($ip_address)){
			$ip_address = $this->input->ip_address();
		}
		if(empty($send_name)){ 
			$captcha = $this->session->userdata('captcha_word'); 
			if(trim($send_word)!=trim($captcha)){
				return FALSE;
			}
			if($delete){
				$this->session->unset_userdata('captcha_word');
			}
		}else{ 
			$this->db->where('send_word',$send_word);
			$this->db->where('send_name',$send_name);
			$this->db->where('ip_address',$ip_address);
			$row = $this->db->get($this->table)->row_array();
			if(empty($row)){
				return FALSE;
			}
			if($delete){
				if(TRUE){
					$this->db->where('send_word',$send_word);
					$this->db->delete($this->table);
				}else{
					$this->db->set('send_num','send_num+1',FALSE);
					$this->db->where('send_word',$send_word);
					$this->db->update($this->table);
				}
			}
		}
		return TRUE;
	}
	
	
	
	public function check_IPnum($send_name,$ip_address)
	{
		$this->db->where('send_name',$send_name);
		$this->db->where('ip_address',$ip_address);
		$this->db->where('captcha_time > ',strtotime('-1 day'));
		$total = $this->db->get($this->table)->num_rows();
		if($total<10) return TRUE;
		return FALSE;
	}
	
	
	public function check_IPtime($send_name,$ip_address)
	{
		$this->db->where('send_name',$send_name);
		$this->db->where('ip_address',$ip_address);
		$this->db->order_by('captcha_time','desc');
		$this->db->where('captcha_time > ',strtotime('-1 minutes'));
		$total = $this->db->get($this->table)->num_rows();
		if($total>0) return FALSE;
		return TRUE;
	}
	
	
}
