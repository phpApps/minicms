<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// 会员注册


class Signup extends MY_Controller
{

	public function __construct()
	{
    	parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('sys_captcha_model');
		$this->load->model('mem_member_model');
	}
	
	
	

	public function index()
	{
		return $this->load->view('signup');
		if($this->sys_captcha_model->check_word($this->input->post('captcha',TRUE),NULL,TRUE)==FALSE){
			die(json_encode(array('error'=>1000,'msg'=>'验证码错误')));
		}
		if(FALSE == $this->check_members_data()){
			die(json_encode(array('error'=>1001,'msg'=>'数据填写不完整')));
		}
		$data= $this->get_members_data();
		if($this->mem_member_model->check_phone($data['member_phone'])){
			die(json_encode(array('error'=>1002,'msg'=>'手机号码已使用')));
		}
		$password = rand(1000,9999);
		
		$this->load->library('aliyun-php-sdk-sms/aliyunsms');
		$res = $this->aliyunsms->sendRegPwd($data['member_phone'],$password);
		if(empty($res->RequestId)){
			die(json_encode(array('error'=>1003,'msg'=>$res)));
		}
		
		$data['member_password'] = md5($password);
		if($this->mem_member_model->insert($data)==FALSE){
			die(json_encode(array('error'=>8999,'msg'=>'保存数据失败')));
		}
		die(json_encode(array('error'=>9000,'msg'=>'保存数据成功')));
	}
	

	private function get_members_data()
	{
		$data['member_name'] = $this->input->post('member_name',TRUE);
		$data['member_phone'] = $this->input->post('member_phone',TRUE);
		$data['member_email'] = $this->input->post('member_email',TRUE);
		$data['member_qqnum'] = $this->input->post('member_qqnum',TRUE);
		$data['member_area'] = $this->input->post('member_area',TRUE);
		$data['member_city'] = $this->input->post('member_city',TRUE);
		$data['member_type'] = $this->input->post('member_type',TRUE);
		$data['member_time'] = date('Y-m-d H:i:s');
		return $data;
	}
	
	private function check_members_data()
	{
		$this->form_validation->set_rules('member_name','','trim|required|max_length[32]');
		$this->form_validation->set_rules('member_phone','','trim|required|max_length[32]');
		$this->form_validation->set_rules('member_email','','trim|required|max_length[32]');
		$this->form_validation->set_rules('member_qqnum','','trim|max_length[16]');
		$this->form_validation->set_rules('member_area','','trim|max_length[64]');
		$this->form_validation->set_rules('member_city','','trim|max_length[64]');
		$this->form_validation->set_rules('captcha','','trim|required');
		return $this->form_validation->run();
	}



	
}
