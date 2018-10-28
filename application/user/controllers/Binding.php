<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// 会员绑定

class Binding extends MY_Controller
{

	public function __construct()
	{
    	parent::__construct();
		$this->load->model('sys_captcha_model');
		$this->load->model('mem_member_model');
		$this->load->model('plug_login_model');
	}
	
	
	public function index()
	{
		$data =array();
		$uid = $this->session->userdata('uid');
		$login_from = $this->session->userdata('from');
		$redirect_uri = $this->session->userdata('redirect_uri');
		$tplogin = $this->plug_login_model->get_row(array("login_uid"=>$uid,"login_from"=>$login_from));
		
		if(!empty($tplogin["login_mid"])){
			$this->session->set_userdata('mid',$tplogin["login_mid"]);
			return redirect($redirect_uri);
		}
			
		$row = $this->plug_login_model->get_row(array('login_uid'=>$uid,'login_from'=>$login_from));
		if($row){
			$data['member_icon'] =  $row['login_icon'];
			$data['member_name'] = $row['login_name'];
		}
		return $this->load->view('binding',$data);
	}
	
	public function login(){
		$uid = $this->session->userdata('uid');
		$login_from = $this->session->userdata('from');
		$member_login = $this->input->post('member_login',TRUE);
		$password = $this->input->post('member_password',TRUE);

		if(empty($member_login) || empty($password)){
			die(json_encode(array('error'=>1000,'msg'=>'数据填写不完整')));
		}
		
		$this->db->or_where('member_login',$member_login);
		$this->db->or_where('member_phone',$member_login);
		$result = $this->mem_member_model->get_row(array('member_password'=>md5($password)));
		if(empty($result)){
			die(json_encode(array('error'=>1001,'msg'=>'帐号不存在')));
		}
		
		$res = $this->plug_login_model->get_total(array('login_mid'=>$result['member_id'],'login_from'=>$login_from));
		if($res > 0 ){
			die(json_encode(array('error'=>1002,'msg'=>'该帐号已绑定')));
		}
		
		//绑定帐号
		$this->plug_login_model->update(array('login_mid'=>$result['member_id']),array('login_uid'=>$uid,'login_from'=>$login_from));
		$this->session->set_userdata('mid',$result['member_id']);
		die(json_encode(array('error'=>1009,'msg'=>'帐号绑定成功')));
	}
	
	
	public function register(){
		
		if(FALSE == $this->check_members_data()){
			die(json_encode(array('error'=>2000,'msg'=>'数据填写不完整')));
		}
		
		$data = $this->get_members_data();
		
		if(preg_match("/^1[34578]{1}\d{9}+$/",$data['member_login'],$phone)){
			if($this->mem_member_model->check_phone($phone[0])){
				die(json_encode(array('error'=>2002,'msg'=>'手机号码已使用')));
			}
			$data['member_phone'] = $phone[0];
		}else{
			if($this->mem_member_model->get_row(array('member_login'=>$data['member_login']))){
				die(json_encode(array('error'=>2003,'msg'=>'该帐号已使用')));
			}
		}
		
		//注册帐号
		if($this->mem_member_model->insert($data) == FALSE){
			die(json_encode(array('error'=>2003,'msg'=>'保存数据失败')));
		}
		$mid = $this->db->insert_id();
		$this->session->set_userdata('mid',$mid);
		
		//绑定帐号
		
		$uid = $this->session->userdata('uid');
		$login_from = $this->session->userdata('from');
		$this->plug_login_model->update(array('login_mid'=>$mid),array('login_uid'=>$uid,'login_from'=>$login_from));
		$this->session->set_userdata('mid',$mid);
		die(json_encode(array('error'=>2009,'msg'=>'帐号绑定成功')));
	}
	
	//解除绑定 
	public function unbinding(){
		$mid = $this->session->userdata('mid');
		$login_from = $this->input->get('login_from',true);
		$data['logintype'] = $this->plug_login_model->get_list(array('login_mid'=>$mid));
		if($mid && $login_from){
			$this->plug_login_model->update(array('login_mid'=>''),array('login_from'=>$login_from));
			return redirect(site_url('login'));
		}
		return $this->load->view('unbinding',$data);
	}
	
	private function get_members_data()
	{
		$data['member_name'] = $this->input->post('member_name',TRUE);
		$data['member_login'] = $this->input->post('member_login',TRUE);
		$data['member_email'] = $this->input->post('member_email',TRUE);
		$data['member_qqnum'] = $this->input->post('member_qqnum',TRUE);
		$data['member_area'] = $this->input->post('member_area',TRUE);
		$data['member_city'] = $this->input->post('member_city',TRUE);
		$data['member_type'] = $this->input->post('member_type',TRUE);
		$data['member_password'] = md5($this->input->post('member_password',TRUE));
		$data['member_addtime'] = date('Y-m-d H:i:s');
		$data['member_edittime'] = date('Y-m-d H:i:s');
		return $data;
	}
	
	private function check_members_data()
	{
		$this->form_validation->set_rules('member_name','','trim|required|max_length[32]');
		$this->form_validation->set_rules('member_login','','trim|required|max_length[32]');
		$this->form_validation->set_rules('member_email','','trim|required|max_length[32]');
		$this->form_validation->set_rules('member_password','','trim|required|max_length[32]');
		$this->form_validation->set_rules('member_passwordF','','trim|required|max_length[32]|matches[member_password]');
		$this->form_validation->set_rules('member_qqnum','','trim|max_length[16]');
		$this->form_validation->set_rules('member_area','','trim|max_length[64]');
		$this->form_validation->set_rules('member_city','','trim|max_length[64]');
		return $this->form_validation->run();
	}	
}
