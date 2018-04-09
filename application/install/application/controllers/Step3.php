<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Step3 extends MY_Controller 
{

	public function index()
	{
		if(empty($_POST)){
			return redirect(site_url('step2'));
		}
		return $this->load_view('step3');
	}
	
}
