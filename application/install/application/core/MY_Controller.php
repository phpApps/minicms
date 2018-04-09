<?php if (!defined('BASEPATH')) exit('No direct access allowed.');



abstract class MY_Controller extends CI_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->load->switch_theme();
		$this->check_lock();
	}
	
	
	public function load_view($view, $vars = array(), $return = FALSE)
	{
		$cfg = $this->cfg_data();
		$data = array_merge($vars,$cfg);
		return $this->load->view($view,$data,$return);
	}
	
	
	private function check_lock()
	{
		if(file_exists(FCPATH.'install.lock')){
			die('<div align="center"><h2>CMS系统已经安装！</h2><p>如需要重新安装，请删除文件install.lock !</p></div>');
		}
	}
	
	
	private function cfg_data()
	{
		$data['ver_msg'] = 'V1.0 UTF8';
		$data['sp_testdirs'] = array(
								  '/',
								  '/install/*',
								  '/shared/cache/*',
								  '/shared/config/*',
								  '/aboutcms/application/cache/*',
								  '/aboutcms/upload/*',
							  );
		return $data;	
	}
	
}


	
	
	
