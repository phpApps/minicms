<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class MY_Pagination extends CI_Pagination 
{
	
	protected $use_page_numbers = TRUE;


	public function __construct($config = array())
	{
		parent::__construct($config);
	}


	public function create_pages($base_url=NULL,$total=0,$limit=20)
	{
		$config['base_url'] = $base_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;
		$this->initialize($config);
		return $this->create_links();
	}


}

