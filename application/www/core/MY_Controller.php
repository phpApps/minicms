<?php if (!defined('BASEPATH')) exit('No direct access allowed.');



abstract class MY_Controller extends CI_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->load->switch_theme();
	}
}



abstract class LG_Controller extends MY_Controller 
{
	public function __construct(){
		parent::__construct();
		self::__initLanguage();
	}

	private function __initLanguage(){
		
		$default = config_item('default_language');
		$support = config_item('support_language');
		$langs = array_keys($support);
		
		$lang = $this->uri->segment(1);
		$lang = in_array($lang, $langs) ? $lang : $default;
		
		$this->session->set_userdata('site_language', $lang);
		$this->config->set_item('language', $lang);
	}
}


	
	
	
	
