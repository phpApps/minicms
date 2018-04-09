<?php if (!defined('BASEPATH')) exit('No direct access allowed.');


//视图路径


class MY_Loader extends CI_Loader 
{

    public function __construct() 
    {
        parent::__construct();
    }

	
	public function switch_theme($theme = 'default')
	{
		$this->_ci_view_paths = array(VIEWPATH . $theme . DIRECTORY_SEPARATOR => TRUE);
	}
	
	

	public function view($view, $vars = array(), $return = FALSE)
	{
		$lang =  get_instance()->session->userdata('site_language');
		$paths = $this->_ci_view_paths;
		if(file_exists( key($paths).$view.'_'.$lang.'.php')){
			$view = $view.'_'.$lang;
		}
		return parent::view($view, $vars, $return);
	}
  
  
}
