<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
* 第三方登录接口
* 此接口包含facebook、twittr、QQ等
*
* @version  1.0 
* @author   pin
* @time   2017.6
**/

class Plug_login extends SYS_Controller
{
	public function __construct()
	{
    	parent::__construct();
	}
	
	/*
	* facebook 登录
	* @access public 
	* @param $sendReg(code、pwd、text)
	* @param $template( sms template)
	* @return array()
	**/
	
	public function fb_login()
	{
		//数据
		$data['appid'] = $this->input->post('appid',TRUE);
		$data['appsecret'] = $this->input->post('appsecret',TRUE);
		$data['version'] = $this->input->post('version',TRUE);
		
		//验证
		$this->form_validation->set_rules('appid','密钥','trim|required|max_length[255]');
		$this->form_validation->set_rules('appsecret','校验码','trim|required|max_length[255]');
		$this->form_validation->set_rules('version','版本号','trim|required|max_length[64]');
		
		//获取配置
		$this->load->config('fb_login',FALSE,TRUE);
		$row['param'] = config_item('param');
		if($this->form_validation->run() == FALSE ){
			$row['sign'] = '';
			return $this->load->view('plugins/plug_login/fb_login',$row);
		}
		//更新缓存
		$row['sign'] = $this->get_cfg($data,'fb');
		return $this->load->view('plugins/plug_login/fb_login',$row);
	}
	
	/*
	* twittr 登录
	* @access public 
	* @param $sendReg(code、pwd、text)
	* @return array()
	**/
	
	public function tw_login()
	{
		//数据
		$data['appid'] = $this->input->post('appid',TRUE);
		$data['appsecret'] = $this->input->post('appsecret',TRUE);
		
		//验证
		$this->form_validation->set_rules('appid','密钥','trim|required|max_length[255]');
		$this->form_validation->set_rules('appsecret','校验码','trim|required|max_length[255]');
		
		//获取配置
		$this->load->config('fb_login',FALSE,TRUE);
		$row['param'] = config_item('param');
		
		if($this->form_validation->run() == FALSE ){
			$row['sign'] = '';
			return $this->load->view('plugins/plug_login/tw_login',$row);
		}
		//更新缓存
		$row['sign'] = $this->get_cfg($data,'tw');
		return $this->load->view('plugins/plug_login/tw_login',$row);
	}
	
	
	/*
	* QQ 登录
	* @access public 
	* @param $sendReg(code、pwd、text)
	* @return array()
	**/
	
	public function qq_login()
	{
		//数据
		$data['appid'] = $this->input->post('appid',TRUE);
		$data['appsecret'] = $this->input->post('appsecret',TRUE);
		
		//验证
		$this->form_validation->set_rules('appid','密钥','trim|required|max_length[255]');
		$this->form_validation->set_rules('appsecret','校验码','trim|required|max_length[255]');
		
		//获取配置
		$this->load->config('qq_login',FALSE,TRUE);
		$row['param'] = config_item('param');
		
		if($this->form_validation->run() == FALSE ){
			$row['sign'] = '';
			return $this->load->view('plugins/plug_login/qq_login',$row);
		}
		//更新缓存
		$row['sign'] = $this->get_cfg($data,'qq');
		return $this->load->view('plugins/plug_login/qq_login',$row);
	}
	
	/*
	* 配置生成模块
	*
	* @access private
	* @param  $Regtel (config type)
	* @return array();
	*/
	
	private function get_cfg($data=array(),$Regtel='fb')
	{
		$cfg_path = FCPATH.'application'.DIRECTORY_SEPARATOR;
		write_file($cfg_path .'config/'.$Regtel.'_login.php', 
								array_to_cache("config['param']", $data));
		return 'sdk参数配置成功！';
	}
	
	/*
	* 退出登录
	* @access private 
	* @return currl view
	*/
	public function loginout()
	{ 
		$redirect_uri = base64_decode($this->input->get('redirect_uri',true));
		$this->session->unset_userdata('mid');
		$this->session->unset_userdata('from');
		redirect($redirect_uri);
	}
}

