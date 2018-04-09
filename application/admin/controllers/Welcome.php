<?php if (!defined('BASEPATH')) exit('No direct access allowed.');


// 系统管理


class Welcome extends SYS_Controller 
{
	
	public function __construct()
	{
    	parent::__construct();
    }
	
	public function index()
	{
		$data['head_option'] = $this->sys_admin_model->get_auth_options(1);
		$data['list_option'] = $this->sys_admin_model->get_auth_options();
		return $this->load->view('welcome',$data);
	}
	
}
