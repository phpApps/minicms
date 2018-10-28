<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
* 阿里云通信接口
* 此接口包含阿里云短信、手机验证码、邮箱
*
**/

class Sms extends SYS_Controller
{
	public function __construct()
	{
    	parent::__construct();
		$this->load->model('sys_captcha_model');
		$this->load->config('cfg_plug_aliyun',FALSE,TRUE);
	}
	
	//阿里云短信
	public function alsms()
	{
		$post['accessKey'] = $this->input->post('accessKey',TRUE);
		$post['accessSecret'] = $this->input->post('accessSecret',TRUE);
		$post['signName'] = $this->input->post('signName',TRUE);
		$post['topicName'] = $this->input->post('topicName',TRUE);
		$post['endPoint'] = $this->input->post('endPoint',TRUE);
		
		$this->form_validation->set_rules('accessKey','密钥','trim|required|max_length[255]');
		$this->form_validation->set_rules('accessSecret','校验码','trim|required|max_length[255]');
		$this->form_validation->set_rules('signName','短信签名','trim|required|max_length[64]');
		$this->form_validation->set_rules('topicName','主题名称','trim|required|max_length[64]');
		$this->form_validation->set_rules('endPoint','MNS地址','trim|required|max_length[225]');
		
		$aliyun = config_item('aliyun');
		$data['param'] = $aliyun['sms'];
		
		if($this->form_validation->run()== FALSE){
			$data['sign'] = NULL;
			return $this->load->view('plugins/aliyun/sms',$data);
		}

		$aliyun['sms'] = $post;
		$this->save_config($aliyun);
		
		$data['sign'] = '配置创建成功';
		return $this->load->view('plugins/aliyun/sms',$data);
	}
	
		public
	function index() {
		$type = $this->input->post( 'type', TRUE );
		$send_name = $this->input->post( 'send_name', TRUE );
		$sendRegTpl = $this->input->post( 'sendRegTpl', TRUE );

		$this->load->library( 'aliyun_php_sdk_sms/aliyunsms', $param );
		$res = $this->aliyunsms->send( $sendRegTpl, $send_name, array( 'password' => strval( random_string( 'numeric', 6 ) ) ) );
		if ( empty( $res->RequestId ) ) {
			return ( json_encode( array( 'error' => 1003, 'msg' => $res ) ) );
		} else {
			echo json_encode( array( 'error' => '1000', 'msg' => '未知错误！' ) );
		}
	}
	
	

}
