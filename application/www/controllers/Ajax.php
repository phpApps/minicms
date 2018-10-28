<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Ajax extends LG_Controller 
{
	
	public function __construct()
	{
    	parent::__construct();
		$this->load->model('cms_menu_model');
		$this->load->library('form_validation');
    }
	
	/*
	*  USER LOGIN 用户登录
	*
	*
	*****************************************/
	
	public function login($type=NULL){
		$data['menus'] = $this->cms_menu_model->get_menus();
		$uid = $this->session->userdata('uid');
		$uid = isset($uid) ? $uid : '';
		if($uid){
			$result = $this->db->select('login_icon, login_name')
								->where_in('login_uid', $uid)
							    ->get($this->db->dbprefix('plug_login'))
							    ->row_array();
			$data['tp']['member_icon']	= $result['login_icon'];					
			$data['tp']['member_name']	= $result['login_name'];						
		}else{
			$data['tp'] = array();
		}
		
		if($this->check_member_data()==FALSE){
			if($type){
				return $this->load->view('content/cms_login/register',$data);
		    }
			return $this->load->view('content/cms_login/login',$data);
		}
	}
	
	public function submit(){
		
		$type = $this->input->post('type',true);
		
		if($type=='reg'){
			if($this->check_member_data() == FALSE){
				die(json_encode(array('status'=>0,'code'=>'Login failed!')));
			}
			$this->mem_member_model->insert($this->get_member_data());
			$this->session->set_userdata('userid',$this->db->insert_id());
			die(json_encode(array('status'=>1,'code'=>'Login was successful!')));
		}else{
			$data['member_login'] = $this->input->post('member_login',TRUE);
			$data['member_password'] = md5($this->input->post('member_password',TRUE));
			$data['member_name'] = $this->input->post('member_name',TRUE);
			$data['member_icon'] = $this->input->post('member_icon',TRUE);
			
			$result = $this->mem_member_model->get_row(array('member_login'=>$data['member_login'],'member_password'=>$data['member_password']));
			if($result){
				$this->mem_member_model->update($data,$result['member_id']);
				$this->session->set_userdata('userid',$result['member_id']);
				die(json_encode(array('status'=>1,'code'=>'Login was successful!')));
			}else{
				die(json_encode(array('status'=>2,'code'=>'Account already exists!')));
			}
		}
	}
	
	private function get_member_data()
    {
		$data['member_login'] = $this->input->post('member_login',TRUE);
		$data['member_password'] = md5($this->input->post('member_password',TRUE));
		$data['member_phone'] = $this->input->post('member_phone',TRUE);
		$data['member_email'] = $this->input->post('member_email',TRUE);
		$data['member_icon'] = $this->input->post('member_icon',TRUE);
		$data['member_name'] = $this->input->post('member_name',TRUE);
		$data['member_regtime'] = date('Y-m-d H:i:s');
		$data['member_edittime'] = date('Y-m-d H:i:s');
		return $data;
	}
	
	private function check_member_data()
	{
		$this->form_validation->set_rules('member_login','','trim|required|max_length[32]');
		$this->form_validation->set_rules('member_password','','trim|required|max_length[16]');
		$this->form_validation->set_rules('member_phone','','trim|required|max_length[11]');
		$this->form_validation->set_rules('member_email','','trim|required|max_length[64]');
		return $this->form_validation->run();
	}
}
