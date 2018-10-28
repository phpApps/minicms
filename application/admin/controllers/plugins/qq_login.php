<?php if (!defined('BASEPATH')) exit('No direct access allowed.');


class Qq_login extends PG_Controller 
{
	
	public function __construct()
	{
    	parent::__construct();
		$this->load->model('plug_login_model');
		$config['fetchclass'] = $this->router->fetch_class();
		$this->load->library('qq_php_sdk_2.1/oauth',$config);
    }
	
	
	/**
	 * @brief QQ登录授权
	 * @access public 
	 */
	
	public function index(){
		$redirect_uri = base64_decode($this->input->get('redirect_uri',true));
		$_SESSION['redirect_uri'] = $redirect_uri ;
		$this->oauth->get_oauth_url();
	}
	
	/**
	 * @brief 获取QQ用户信息
	 * @access public 
	 */
	   
	public function callback(){
		$code = $_GET['code'];
		if (empty ($_GET['code'])){
			die('code is empty');
		}
		
		$_SESSION['admin_info'] = $this->oauth->get_user_info($code);
		$user_info = $_SESSION['admin_info'];
		$res = $this->plug_login_model->get_row(array('login_uid'=>$user_info['uid'],'login_from'=>'QQ'));
		if(empty($res)){
			$row['login_uid']= $user_info['uid'];
			$row['login_name']= $user_info['nickname'];
			$row['login_from']= 'QQ';
			$row['login_icon']= $user_info['figureurl_qq_1'];
			$this->plug_login_model->insert($row);//添加第三方信息
			$this->session->set_userdata('uid',$user_info['uid']);
			$this->session->set_userdata('from',$row['login_from']);
		}else{
			$this->session->set_userdata('uid',$res['login_uid']);
			$this->session->set_userdata('from',$res['login_from']);
		}
		
		redirect(site_url('member/binding'));//帐号处理表单
	}
}
