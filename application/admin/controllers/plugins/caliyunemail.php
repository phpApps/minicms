<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
* 阿里云通信接口
* 此接口包含阿里云邮件
*
* @version  1.0 
* @author   pin
* @time   2017.6
**/

class Caliyunemail extends MY_Controller
{
	public function __construct()
	{
    	parent::__construct();
		$this->load->helper('string_helper');
		$this->load->model('sys_captcha_model');
		$this->load->model('mem_member_model');
	}
	
	
	/*
	* 阿里云邮件
	* @access public 
	* @param $type(sendRegCode、sendRegPwd)
	* @param $template( sms template)
	* @return array()
	**/
	
	public function index()
	{
		//加载配置
		$this->load->config('aliyunemail',FALSE,TRUE);
		
		//单邮件
		$type = $this->input->post('type',TRUE);
		$address = $this->input->post('eAddress',TRUE);
		$content =  $this->input->post('eTemplate',TRUE);
		$title = $this->input->post('eTitle',TRUE);
		$fromAlias = $this->input->post('eFromAlias',TRUE);
		//数据库操作
		
		if($type=="SingleSendMailCode"){
		    echo $this->sendRegCode($address,$content,$fromAlias,$title,config_item('param'));
		}elseif($type=="SingleSendMailPassword"){
			echo $this->sendRegPwd($address,$content,$fromAlias,$title,config_item('param'));
		}elseif($type=="SingleSendMailTxt"){
			echo $this->sendRegText($address,$content,$fromAlias,$title,config_item('param'));
		}else{
			echo json_encode(array('error'=>'1000','msg'=>'未知错误！'));
		}
	}
	
	/*
	* 邮箱验证码发送机制
	* @access private 
	* @param $send_name 邮箱
	* @param $send_name 模版号
	* @param $param 配置参数
	* @return array()
	*/
	public function sendRegCode($address,$content,$fromAlias,$title,$param = array())
	{ 
	   $this->load->library('aliyun_php_sdk_dm/aliyunemail',$param);
		if(empty($address)){
			return json_encode(array('error'=>'1001','msg'=>'邮箱地址不能为空!'));
		}
		
		if($this->sys_captcha_model->check_IPnum($address,$this->input->ip_address())==FALSE){
			return json_encode(array('error'=>'1002','msg'=>'邮件发送次数超过上限!'));
		}

		if($this->sys_captcha_model->check_IPtime($address,$this->input->ip_address())==FALSE){
			return json_encode(array('error'=>'1004','msg'=>'1分钟内不能重复发送!'));
		}
		
		$code = random_string('numeric',6);
		$this->sys_captcha_model->save_word($code,$address,$this->input->ip_address());
		
		$content = str_replace("{code}",$code,$content);
		$res = $this->aliyunemail->sendSingleemail($address,$content,$fromAlias,$title);
		if(empty($res->RequestId)){
			return json_encode(array('error'=>1003,'msg'=>$res));
		}
		return json_encode(array('error'=>'9000','msg'=>'验证码已经发送到您的邮箱！'));
	}
	
	/*
	* 邮件重置密码/注册密码
	* @access public 
	* @param 
	* @param $data
	* @return array()
	*/
	
	public function sendRegPwd($address,$content,$fromAlias,$title,$param = array())
	{ 
		$this->load->library('aliyun_php_sdk_dm/aliyunemail',$param);
		if(empty($address)){
			return json_encode(array('error'=>'1001','msg'=>'邮箱地址不能为空!'));
		}
		
		$row = $this->mem_member_model->get_row(array('member_email'=>$address));
		if(empty($row)){
			return json_encode(array('error'=>'1005','msg'=>'邮件地址不存在！'));
		}
		$password = random_string('numeric',6);
		$content = str_replace("{time}",date('Y-m-d H:i:s'),$content);
		$content = str_replace("{password}",$password,$content);
		$res = $this->aliyunemail->sendSingleemail($address,$content,$fromAlias,$title);
		if(empty($res->RequestId)){
			return (json_encode(array('error'=>1003,'msg'=>$res)));
		}
		if($this->mem_member_model->update($row,array('member_id'=>$row['member_id'])) == FALSE){
			return json_encode(array('error'=>'1006','msg'=>'保存数据失败！'));
		}
		return json_encode(array('error'=>'1007','msg'=>'保存数据成功！'));
	}
	
	/*
	* 邮件发送机制
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
