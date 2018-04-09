<?php if (!defined('BASEPATH')) exit('No direct access allowed.');


// 视图路径


class MY_Loader extends CI_Loader 
{

    public function __construct() 
    {
        parent::__construct();
    }

	
	public function switch_theme($theme = 'default')
	{
		$this->_ci_view_paths = array(VIEWPATH . $theme . '/'     => TRUE);
	}
	
	    
    public function view( $view, $vars = array(), $return = FALSE ) 
	{
        return parent::view( $view, $vars, $return );
    }
  
}
