<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// 修改密码


class Password extends MY_Controller
{

	public function __construct()
	{
    	parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('mem_member_model');
	}
	
	

	
	public function index()
	{
		$member_id = $this->session->userdata('site_member_id');
		if($member_id>0)
		{
			$this->form_validation->set_error_delimiters('');
			$this->form_validation->set_rules('member_password','','trim|required|max_length[32]|matches[member_passwordF]');
			$this->form_validation->set_rules('member_passwordF','','trim|required|max_length[32]');
			if($this->form_validation->run()==FALSE)
			{
				return $this->load->view('password',array('code'=>401,'msg'=>validation_errors()));
			}
			$member_password = $this->input->post('member_password',TRUE);
			$this->mem_member_model->update(array("member_password"=>md5($member_password)),$member_id);
			return $this->load->view('password',array('code'=>0,'msg'=>'Password modified successfully'));
		}
		return redirect(site_url('login'));
	}
	
	
	

	
}
