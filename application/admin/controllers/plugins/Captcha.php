<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');




class Captcha extends CI_Controller
{


	public function __construct()
	{
    	parent::__construct();
		$this->load->helper('file');
		$this->load->helper('string');
		$this->load->helper('captcha');
		$this->load->model('sys_captcha_model');
	}
	
	
	public function index($id=0,$len=0)
	{
		$img_url = base_url('application/cache/captcha/');
		$img_path = APPPATH.'cache'.DIRECTORY_SEPARATOR.'captcha'.DIRECTORY_SEPARATOR; make_dir($img_path);
		
		if($len<4) $len = 8;
		if($id==1){
			$vals = array(
				'word'			=> random_string(numeric,$len),
				'img_path'		=> $img_path,
				'img_url'		=> $img_url,
				'img_width'		=> $len*20,
				'img_height'	=> '30',
				'expiration'	=> 1800,
				'word_length'	=> $len,
				'font_size'		=> 16,
				'colors'		=> array(
					'background'	=> array(255,255,255),
					'border'		=> array(255,255,255),
					'text'			=> array(66,66,66),
					'grid'			=> array(255,255,255)
				)
			);
		}else{
			$vals = array(
				'word'			=> random_string(numeric,$len),
				'img_path'		=> $img_path,
				'img_url'		=> $img_url,
				'img_width'		=> $len*20,
				'img_height'	=> '30',
				'expiration'	=> 1800,
				'word_length'	=> $len,
				'font_size'		=> 16,
				'colors'		=> array(
					'background'	=> array(255,255,255),
					'border'		=> array(153,102,102),
					'text'			=> array(204,153,153),
					'grid'			=> array(255,182,182)
				)
			);

		}
		$cap = create_captcha($vals);
		$this->sys_captcha_model->save_word($cap['word']);
		Header("Content-type: image/jpeg");
		echo file_get_contents($vals['img_path'].$cap['time'].'.jpg');
	}
	
	public function check($word=NULL)
	{
		if(empty($word)) $word = $this->input->get('captcha',TRUE);
		$status = $this->sys_captcha_model->check_word($word,FALSE);
		die(strval($status ? 1 : 0));
	}
}
