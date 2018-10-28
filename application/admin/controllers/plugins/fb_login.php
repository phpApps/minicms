<?php if (!defined('BASEPATH')) exit('No direct access allowed.');

/**
 * @copyright Copyright(c) 2017 
 * @file fb_login.php
 * @brief facebook快捷登录
 * @author pin
 * @date 2017/5/1 0:45:00
 * @version 1.0
 */

class Fb_login extends MY_Controller 
{
	
	public function __construct(){
		
		parent::__construct();
		$this->load->model('mem_member_model');
		$this->load->model('plug_login_model');
		$config['fetchclass'] = $this->router->fetch_class();
		$this->load->library('graph_php_sdk_5.0.0/facebookapi',$config);
    }
	
	/**
	 * @brief Facebook登录授权
	 * @access public 
	 */
	 
	public function index(){
		
		$redirect_uri = base64_decode($this->input->get('redirect_uri',true));
		$_SESSION['redirect_uri'] = $redirect_uri;
		$this->facebookapi->get_oauth_url();
	}
	
	/**
	 * @brief 获取Facebook用户信息
	 * @access public 
	 */
	      
	public function callback(){
		
		$_SESSION['admin_info'] = $this->facebookapi->get_user_info();
		$user_info = $_SESSION['admin_info'];
		$res = $this->plug_login_model->get_row(array('login_uid'=>$user_info['id'],'login_from'=>'Facebook'));
		
		if(empty($res)){
			$row['login_uid']= $user_info['id'];
		    $row['login_name']= $user_info['name'];
			$row['login_from']= 'Facebook';
			$row['login_icon']= $user_info['picture']['url'];
			$this->plug_login_model->insert($row);//添加第三方信息
			$this->session->set_userdata('uid',$user_info['id']);
			$this->session->set_userdata('from',$row['login_from']);
		}else{
			$this->session->set_userdata('uid',$res['login_uid']);
			$this->session->set_userdata('from',$res['login_from']);
		}
		
		redirect(site_url('member/binding'));//帐号处理表单
	}
}