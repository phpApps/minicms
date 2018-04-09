<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// 会员登录


class Login extends MY_Controller
{

	public function __construct()
	{
    	parent::__construct();;
		$this->load->model('mem_member_model');
	}
	
	
	
	public function index()
	{
		$this->form_validation->set_rules('member_login','','trim|required|max_length[32]');
		$this->form_validation->set_rules('member_password','','trim|required|max_length[32]');
		if($this->form_validation->run()==FALSE){
			return $this->load->view('login',array('code'=>101,'msg'=>validation_errors()));
		}
		
		$member_login = $this->input->post('member_login',TRUE);
		$member_password = $this->input->post('member_password',TRUE);
		$row = $this->mem_member_model->get_row(array('member_phone'=>$member_login));
		if(empty($row)){
			return $this->load->view('login',array('code'=>102,'msg'=>'Account does not exist'));
		}
		
		if(md5($member_password)!=$row['member_password']){
			return $this->load->view('login',array('code'=>103,'msg'=>'Incorrect password'));
		}
		$this->session->set_userdata('site_member_id',$row['member_id']);
		return redirect(site_url('profile'));
	}
	
	
	
	public function out()
	{	
		$this->session->unset_userdata('site_member_id');
		return redirect(site_url('login'));
	}
	

	
}
