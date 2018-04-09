<?php if (!defined('BASEPATH')) exit('No direct access allowed.');

// 用户退出

class Logout extends LG_Controller 
{
	
	public function __construct()
	{
    	parent::__construct();
    }

	public function index()
	{	
		$this->session->unset_userdata('admin_id');
		$this->session->unset_userdata('admin_name');
		$this->session->unset_userdata('admin_roleid');
		return redirect('login');
	}
	
	
	


}
