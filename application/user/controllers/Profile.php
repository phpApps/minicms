<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// 会员登录


class Profile extends MY_Controller
{

	public function __construct()
	{
    	parent::__construct();
		$this->load->helper('captcha');
		$this->load->library('form_validation');
		$this->load->model('sys_captcha_model');
		$this->load->model('mem_member_model');
	}
	
	

	public function index()
	{
	   $member_id = $this->session->userdata('site_member_id');
	   if($member_id>0){
		   $row = $this->mem_member_model->get_row($member_id);

		   if($this->check_members_data() == FALSE){
				return $this->load->view('profile',array('row'=>$row,'code'=>301,'msg'=>validation_errors()));
		   }
		   $data = $this->get_members_data();
		   $result = $this->mem_member_model->update($data,$member_id);
		   return $this->load->view('profile',array('row'=>$row,'code'=>0,'msg'=>'Data modified successfully'));
	   }
	   return redirect(site_url('login'));
	}

	
	
	//提交数据
	private function get_members_data()
    {
		$data['member_name'] = $this->input->post('member_name',TRUE);
		$data['member_email'] = $this->input->post('member_email',TRUE);
		$data['member_qqnum'] = $this->input->post('member_qqnum',TRUE);
		$data['member_area'] = $this->input->post('member_area',TRUE);
		$data['member_city'] = $this->input->post('member_city',TRUE);
		$data['member_edittime'] = date('Y-m-d H:i:s');
		return $data;
	}
	//验证数据
	private function check_members_data()
	{
		$this->form_validation->set_rules('member_name','','trim|required|max_length[32]');
		$this->form_validation->set_rules('member_email','','trim|required|max_length[32]');
		$this->form_validation->set_rules('member_qqnum','','trim|required|max_length[16]');
		$this->form_validation->set_rules('member_area','','trim|required|max_length[64]');
		$this->form_validation->set_rules('member_city','','trim|required|max_length[64]');
		return $this->form_validation->run();
	}
	
	
	
}
