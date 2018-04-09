<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// 忘记密码


class Forget extends MY_Controller
{

	public function __construct()
	{
    	parent::__construct();
		$this->load->helper('captcha');
		$this->load->model('sys_captcha_model');
	}
	
	
		
	public function index()
	{
		$this->form_validation->set_rules('send_name','','trim|required|max_length[32]');
		$this->form_validation->set_rules('captcha','','trim|required|max_length[32]');
		if($this->form_validation->run()==FALSE){
			return $this->load->view('forget',array('code'=>201,'msg'=>validation_errors()));
		}
		$send_name = $this->input->post('send_name',TRUE);
		$captcha = $this->input->post('captcha',TRUE);
		$status = $this->sys_captcha_model->check_word($captcha,$send_name,TRUE);
		if($status==FALSE){
			return $this->load->view('forget',array('code'=>202,'msg'=>'Verification code error'));
		}
		return $this->load->view('forget',array('code'=>0,'msg'=>'Password reset succeeded'));
	}
	
}
