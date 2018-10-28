<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
* 阿里云通信接口
* 此接口包含阿里云短信、手机验证码、邮箱
*
**/

class Email extends SYS_Controller
{
	public function __construct()
	{
    	parent::__construct();
		$this->load->model('sys_captcha_model');
		$this->load->config('cfg_plug_aliyun');
	}
	
	
	//阿里云邮箱
	public function alemail()
	{
		$post['accessKey'] = $this->input->post('accessKey',TRUE);
		$post['accessSecret'] = $this->input->post('accessSecret',TRUE);
		$post['signName'] = $this->input->post('signName',TRUE);
		$post['accessSite'] = $this->input->post('accessSite',TRUE);
		$post['area'] = $this->input->post('area',TRUE);
		
		$this->form_validation->set_rules('accessKey','密钥','trim|required|max_length[255]');
		$this->form_validation->set_rules('accessSecret','校验码','trim|required|max_length[255]');
		$this->form_validation->set_rules('signName','邮件签名','trim|required|max_length[64]');
		$this->form_validation->set_rules('accessSite','发件地址','trim|required|max_length[64]');
		$this->form_validation->set_rules('area','区域','trim|required|max_length[64]');
		
		$aliyun = config_item('aliyun');
		$data['param'] = $aliyun['email'];
		
		if($this->form_validation->run()== FALSE){
			$data['sign'] = NULL;
			return $this->load->view('plugins/aliyun/email',$data);
		}
		
		$aliyun['email'] = $post;
		$this->save_config($aliyun);
		
		$data['sign'] = '配置创建成功';
		return $this->load->view('plugins/aliyun/email',$data);
	}
	
	
	public
	function index() {
		//单邮件
		$type = $this->input->post( 'type', TRUE );
		$address = $this->input->post( 'eAddress', TRUE );
		$content = $this->input->post( 'eTemplate', TRUE );
		$title = $this->input->post( 'eTitle', TRUE );
		$fromAlias = $this->input->post( 'eFromAlias', TRUE );
		//数据库操作

		$this->load->library( 'aliyun_php_sdk_dm/aliyunemail', $param );
		$res = $this->aliyunemail->sendSingleemail( $address, $content, $fromAlias, $title );
		if ( empty( $res->RequestId ) ) {
			return ( json_encode( array( 'error' => 1003, 'msg' => $res ) ) );
		} else {
			echo json_encode( array( 'error' => 1000, 'msg' => 'success' ) );
		}
	}

	
	
	private function save_config($data=array())
	{
		write_file( MODUPATH.'plugins/config/cfg_plug_login.php', array_to_cache('aliyun', $data));		
	}
}
