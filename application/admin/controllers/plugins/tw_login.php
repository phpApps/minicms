<?php if (!defined('BASEPATH')) exit('No direct access allowed.');

/**
 * @copyright Copyright(c) 2017 
 * @file fb_login.php
 * @brief twitter快捷登录
 * @author pin
 * @date 2017/5/1 0:45:00
 * @version 1.0
 */

class Tw_login extends MY_Controller 
{
	public function __construct()
	{
    	parent::__construct();
		$this->load->model('plug_login_model');
		$config['fetchclass'] = $this->router->fetch_class();
		$this->load->library('twitter_php_sdk_2.3/twitterapi',$config);	
    }
	
	/**
	 * @brief Twitter登录授权
	 * @access public 
	 */
	
	public function index(){
		$redirect_uri = base64_decode($this->input->get('redirect_uri',true));
		$_SESSION['redirect_uri'] = $redirect_uri ;
		$this->twitterapi->get_oauth_url();
	}
	
	/**
	 * @brief 获取Twitter用户信息
	 * @access public 
	 */
	   
	public function callback(){
		$_SESSION['admin_info'] = $this->twitterapi->get_user_info();
		$user_info = $_SESSION['admin_info'];
		$res = $this->plug_login_model->get_row(array('login_uid'=>$user_info->id,'login_from'=>'Twitter'));
		if(empty($res)){
			$row['login_uid']= $user_info->id;
			$row['login_name']= $user_info->name;
			$row['login_from']= 'Twitter';
			$row['login_icon']= $user_info->profile_image_url;
			$this->plug_login_model->insert($row);//添加第三方信息
			$this->session->set_userdata('uid',$user_info->id);
			$this->session->set_userdata('from',$row['login_from']);
		}else{
			$this->session->set_userdata('uid',$res['login_uid']);
			$this->session->set_userdata('from',$res['login_from']);
		}
		
		redirect(site_url('member/binding'));//帐号处理表单
	}
}
