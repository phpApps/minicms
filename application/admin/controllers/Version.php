<?php if (!defined('BASEPATH')) exit('No direct access allowed.');


// OS管理


class Version extends LG_Controller 
{
	
	public function __construct()
	{
    	parent::__construct();
    }
	
	public function index()
	{
		return $this->load->view('version');
	}

	
	
}
