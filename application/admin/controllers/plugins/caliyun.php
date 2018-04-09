<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
* 阿里云通信接口
* 此接口包含阿里云短信、手机验证码、邮箱
*
* @version  1.0 
* @author   pin
* @time   2017.6
**/

class Caliyun extends MY_Controller
{
	public function __construct()
	{
    	parent::__construct();
		$this->load->model('sys_captcha_model');
	}
	
	
	/*
	* 阿里云短信
	* @access public 
	* @param $type(sendRegCode、sendRegPwd)
	* @param $template( sms template)
	* @return array()
	**/
	
	public function alsms()
	{
		//获取配置
		$this->load->config('aliyun',FALSE,TRUE);
		$row['param'] = config_item('param');
		
		//提交数据
		$data['accessKey'] = $this->input->post('accessKey',TRUE);
		$data['accessSecret'] = $this->input->post('accessSecret',TRUE);
		$data['signName'] = $this->input->post('signName',TRUE);
		$data['topicName'] = $this->input->post('topicName',TRUE);
		$data['endPoint'] = $this->input->post('endPoint',TRUE);
		
		//验证数据
		$this->form_validation->set_rules('accessKey','密钥','trim|required|max_length[255]');
		$this->form_validation->set_rules('accessSecret','校验码','trim|required|max_length[255]');
		$this->form_validation->set_rules('signName','短信签名','trim|required|max_length[64]');
		$this->form_validation->set_rules('topicName','主题名称','trim|required|max_length[64]');
		$this->form_validation->set_rules('endPoint','MNS地址','trim|required|max_length[225]');
		if($this->form_validation->run()== FALSE){
			$row['sign'] = '';
			return $this->load->view('aliyun/aliyunsms',$row);
		}
		
		//更新缓存
		$row['sign'] = $this->get_cfg($data,'aliyun');
		return $this->load->view('aliyun/aliyunsms',$row);
	}
	
	/*
	* 阿里云邮箱
	* @access public 
	* @param $sendReg(code、pwd、text)
	* @return array()
	**/
	
	public function alemail()
	{
		//获取配置
		$this->load->config('aliyunemail',FALSE,TRUE);
		$row['param'] = config_item('param');
		//提交数据
		$data['accessKey'] = $this->input->post('accessKey',TRUE);
		$data['accessSecret'] = $this->input->post('accessSecret',TRUE);
		$data['signName'] = $this->input->post('signName',TRUE);
		$data['accessSite'] = $this->input->post('accessSite',TRUE);
		$data['area'] = $this->input->post('area',TRUE);
		
		//验证数据
		$this->form_validation->set_rules('accessKey','密钥','trim|required|max_length[255]');
		$this->form_validation->set_rules('accessSecret','校验码','trim|required|max_length[255]');
		$this->form_validation->set_rules('signName','邮件签名','trim|required|max_length[64]');
		$this->form_validation->set_rules('accessSite','发件地址','trim|required|max_length[64]');
		$this->form_validation->set_rules('area','区域','trim|required|max_length[64]');
		
		if($this->form_validation->run()== FALSE){
			$row['sign'] = '';
			return $this->load->view('aliyun/aliyunemail',$row);
		}
		
		//更新缓存
		$row['sign'] = $this->get_cfg($data,'aliyunemail');
		return $this->load->view('aliyun/aliyunemail',$row);
	}
	
	/*
	* 配置生成模块
	*
	* @access private
	* @param  $url (config URL)
	* @param  $sendReg (config type)
	* @return array();
	*/
	
	private function get_cfg($data=array(),$RegTpl="")
	{
		$cfg_path = FCPATH.'application'.DIRECTORY_SEPARATOR;
		write_file($cfg_path .'config/'.$RegTpl.'.php', 
								array_to_cache("config['param']", $data));
		return ($data) ? '配置创建成功!':'';			
	}
}
