<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
* 阿里云通信接口
* 此接口包含阿里云短信、手机验证码、邮箱
*
* @version  1.0 
* @author   pin
* @time   2017.6
**/

class Caliyunsms extends MY_Controller
{
	public function __construct()
	{
    	parent::__construct();
		$this->load->helper('string_helper');
		$this->load->model('sys_captcha_model');
		$this->load->model('mem_member_model');
	}
	
	
	/*
	* 阿里云短信
	* @access public 
	* @param $type(sendRegCode、sendRegPwd)
	* @param $template( sms template)
	* @return array()
	**/
	
	public function index()
	{
		//加载配置
		$this->load->config('aliyun',FALSE,TRUE);
		
		//发短信
		$type = $this->input->post('type',TRUE);
		$result['send_name'] = $this->input->post('send_name',TRUE);
		$result['sendRegTpl'] =  $this->input->post('sendRegTpl',TRUE);
		
		//数据库操作
		
		if($type=="sendRegCode"){
		    echo $this->sendRegCode($result['send_name'],$result['sendRegTpl'],config_item('param'));
		}elseif($type=="sendRegPwd"){
			echo $this->sendRegPwd($result['send_name'],$result['sendRegTpl'],config_item('param'));
		}elseif($type=="sendRegText"){
			echo $this->sendRegText($result['send_name'],$result['sendRegTpl'],config_item('param'));
		}else{
			echo json_encode(array('error'=>'1000','msg'=>'未知错误！'));
		}
	}
	
	/*
	* 短信验证码发送机制
	* @access private 
	* @param $send_name 手机号
	* @param $send_name 模版号
	* @param $param 配置参数
	* @return array()
	*/
	public function sendRegCode($send_name,$sendRegTpl,$param = array())
	{ 
	   $this->load->library('aliyun_php_sdk_sms/aliyunsms',$param);
		if(empty($send_name)){
			return json_encode(array('error'=>'1001','msg'=>'发送名称不能为空!'));
		}
		
		if($this->sys_captcha_model->check_IPnum($send_name,$this->input->ip_address())==FALSE){
			return json_encode(array('error'=>'1002','msg'=>'今天发送次数超过上限!'));
		}

		if($this->sys_captcha_model->check_IPtime($send_name,$this->input->ip_address())==FALSE){
			return json_encode(array('error'=>'1004','msg'=>'1分钟内不能重复发送!'));
		}
		
		$code = random_string('numeric',6);
		$this->sys_captcha_model->save_word($code,$send_name,$this->input->ip_address());
		
		$res = $this->aliyunsms->send($sendRegTpl,$send_name,array('code' =>strval($code)));
		if(empty($res->RequestId)){
			return json_encode(array('error'=>1003,'msg'=>$res));
		}
		return json_encode(array('error'=>'9000','msg'=>'验证码已经发送到您的手机，请查看短信！'));
	}
	
	/*
	* 短信重置密码/注册密码
	* @access public 
	* @param 
	* @param $data
	* @return array()
	*/
	
	public function sendRegPwd($send_name,$sendRegTpl,$param=array())
	{ 
		$this->load->library('aliyun_php_sdk_sms/aliyunsms',$param);
		if(empty($send_name)){
			return json_encode(array('error'=>'1001','msg'=>'发送名称不能为空!'));
		}
		
		if($this->sys_captcha_model->check_IPnum($send_name,$this->input->ip_address())==FALSE){
			return json_encode(array('error'=>'1002','msg'=>'今天发送次数超过上限!'));
		}

		if($this->sys_captcha_model->check_IPtime($send_name,$this->input->ip_address())==FALSE){
			return json_encode(array('error'=>'1004','msg'=>'1分钟内不能重复发送!'));
		}
		
		/*$row = $this->mem_member_model->get_row(array('member_phone'=>$send_name));
		if(empty($row)){
			return json_encode(array('error'=>'1005','msg'=>'手机号码不存在！'));
		}*/
		$row['member_password'] = random_string('numeric',6);
		$res = $this->aliyunsms->send($sendRegTpl,$send_name,array('password'=>strval($row['member_password'])));
		if(empty($res->RequestId)){
			return (json_encode(array('error'=>1003,'msg'=>$res)));
		}
		/*if($this->mem_member_model->update($row,array('member_id'=>$row['member_id'])) == FALSE){
			return json_encode(array('error'=>'1006','msg'=>'保存数据失败！'));
		}
		return json_encode(array('error'=>'1007','msg'=>'保存数据成功！'));*/
	}
	
	/*
	* 短消息发送机制
	* @access private 
	* @param 
	* @param $data
	* @return array()
	*/
	public function sendRegText($send_name,$sendRegTpl,$param=array())
	{ 
		return;
	}
}
