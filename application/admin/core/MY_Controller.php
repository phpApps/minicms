<?php if (!defined('BASEPATH')) exit('No direct access allowed.');




abstract class MY_Controller extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('sys_admin_model');
		$this->load->switch_theme('default');
	}
}




abstract class LG_Controller extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		self::__initLanguage();
	}

	private function __initLanguage()
	{
		$default = config_item('default_language');
		$support = config_item('support_language');
		$langs = array_keys($support);

		$lang = key($_GET);
		if(empty($lang)){
			$lang = $this->session->userdata('backend_language');
		}
		$lang = in_array($lang, $langs) ? $lang : $default;

		$this->session->set_userdata('backend_language',$lang);
		$this->config->set_item('language',$lang);
	}
}




abstract class SYS_Controller extends LG_Controller 
{
	public function __construct()
	{	
		parent::__construct();
		
		$this->session->set_userdata('admin_id',1);
		$this->session->set_userdata('admin_roleid',1);
		
		$admin_id = $this->session->userdata('admin_id');
		if($admin_id<1){
			return redirect('login');	//登录验证
		}
		if($this->sys_admin_model->check_option()==FALSE){	//权限验证
			return redirect('version?limit');
		}
		return;
	}
}
	
	
	
	
	
	
	
