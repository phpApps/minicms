<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Step2 extends MY_Controller 
{

	public function index()
	{
		if(empty($_POST)){
			return redirect(site_url('step1'));
		}
		return $this->load_view('step2');
	}
	
}
