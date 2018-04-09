<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


//设置BASE_URL


class MY_Config extends CI_Config
{
	
	public function __construct($routing = NULL)
	{
		$this->config =& get_config();

		// Set the base_url automatically if none was provided
		if (empty($this->config['base_url']))
		{
			if (isset($_SERVER['SERVER_NAME']))
			{
				if (strpos($_SERVER['SERVER_NAME'], ':') !== FALSE)
				{
					$server_addr = '['.$_SERVER['SERVER_NAME'].']';
				}
				else
				{
					$server_addr = $_SERVER['SERVER_NAME'];
				}

				$base_url = (is_https() ? 'https' : 'http').'://'.$server_addr
					.substr($_SERVER['SCRIPT_NAME'], 0, strpos($_SERVER['SCRIPT_NAME'], basename($_SERVER['SCRIPT_FILENAME'])));
			}
			else
			{
				$base_url = 'http://localhost/';
			}

			$this->set_item('base_url', $base_url);
		}

		log_message('info', 'Config Class Initialized');
	}
	
}

 