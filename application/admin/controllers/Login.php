<?php if (!defined('BASEPATH')) exit('No direct access allowed.');

// 用户登录

class Login extends LG_Controller 
{
	
	public function __construct()
	{
    	parent::__construct();
		$this->load->model('sys_captcha_model');
		$this->load->model('sys_admin_model');
    }

	public function index()
	{
		if($this->session->userdata('admin_id')>0){
			return redirect(site_url('logout'));
		}
		
		$this->form_validation->set_rules('admin_login','','trim|required');
		$this->form_validation->set_rules('admin_password','','trim|required');
		$this->form_validation->set_rules('captcha','','trim|required');
		if ($this->form_validation->run() == FALSE){
			return $this->load->view('login');
		}
		
		$captcha = $this->input->post('captcha',TRUE);
		
		if($this->sys_captcha_model->check_word($captcha,NULL,TRUE)==FALSE){
			$data['msg'] = '验证码不正确！';
			return $this->load->view('login',$data);
		}

		$login = $this->input->post('admin_login',TRUE);
		$password = $this->input->post('admin_password',TRUE);
		$row = $this->sys_admin_model->get_row(array('admin_login'=>$login,'admin_password'=>md5($password)));
		if(empty($row)){
			$data['msg'] = '手机或密码错误！';
			return $this->load->view('login',$data);
		}
		if(empty($row['admin_work'])){
			$data['msg'] = '账号被限制登录！';
			return $this->load->view('login',$data);
		}
		$this->session->set_userdata('admin_id',$row['admin_id']);
		$this->session->set_userdata('admin_name',$row['admin_name']);
		$this->session->set_userdata('admin_roleid',$row['admin_roleid']);
		return redirect('welcome');
	}

	
	


}
