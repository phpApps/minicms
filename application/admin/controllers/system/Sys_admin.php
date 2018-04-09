<?php if (!defined('BASEPATH')) exit('No direct access allowed.');


// 用户列表


class Sys_admin extends SYS_Controller 
{
	
	public function __construct()
	{
    	parent::__construct(); 
		$this->load->model('sys_admin_model');
		$this->load->model('sys_role_model');
    }
	

	public function index($page=1)
	{
		$data['page'] = $page;
		$data['result'] = $this->sys_admin_model->get_list();
		$data['list_role'] = $this->sys_role_model->get_list();
		return $this->load->view('system/sys_admin/list',$data);	
	}
	
	
	public function add()
	{
		if($this->check_data() == FALSE){
			$data['list_role'] = $this->sys_role_model->get_list();
			return $this->load->view('system/sys_admin/add',$data);
		}
		$this->sys_admin_model->insert($this->input_data());
		return redirect(site_url("system/sys_admin/index"));
	}
	



	public function edit($page=1,$id=0)
	{
		$row = $this->sys_admin_model->get_row($id);
		if(empty($row)){
			return redirect(site_url("system/sys_admin/index"));
		}
		if($this->check_data($id)==FALSE){
			$data['row'] = $row;
			$data['page'] = $page;
			$data['list_roles'] = $this->sys_role_model->get_list();
			return $this->load->view('system/sys_admin/edit',$data);
		}
		$this->sys_admin_model->update($this->input_data($id),$id);
		return redirect(site_url("system/sys_admin/index/{$page}"));	

	}
	
    public function delete($page=1,$id=1)
	{	
		$this->sys_admin_model->delete($id);
		return redirect(site_url("system/sys_admin/index/{$page}"));		
	}
	
	private function check_data($id=0)
	{
		if($id==0){
			$this->form_validation->set_rules('admin_password','密码','trim|required|max_length[32]|matches[admin_passwordF]');
			$this->form_validation->set_rules('admin_passwordF','确认密码','trim|required');
		}else{
			$this->form_validation->set_rules('admin_password','密码','trim|max_length[32]|matches[admin_passwordF]');
			$this->form_validation->set_rules('admin_passwordF','确认密码','trim');
		}
		$this->form_validation->set_rules('admin_phone','手机','trim|required|max_length[16]');
		$this->form_validation->set_rules('admin_login','用户名','trim|required|max_length[16]');
		$this->form_validation->set_rules('admin_roleid','角色','trim|required|integer');
		$this->form_validation->set_rules('admin_work','状态','trim|required|integer');
		
		$this->form_validation->set_rules('admin_name','姓名','trim|required|max_length[16]');
		$this->form_validation->set_rules('admin_sex','性别','trim|max_length[16]');
		$this->form_validation->set_rules('admin_birth','生日','trim|max_length[16]');
		$this->form_validation->set_rules('admin_email','电邮','trim|max_length[32]');
		$this->form_validation->set_rules('admin_address','地址','trim|max_length[255]');
		return $this->form_validation->run();
	}
	
	//提交修改数据
	private function input_data($id=0)
	{
		$admin_password = $this->input->post('admin_password',TRUE);
		if($admin_password) $data['admin_password'] = md5($admin_password);

		$data['admin_phone'] = $this->input->post('admin_phone',TRUE);
		$data['admin_login'] = $this->input->post('admin_login',TRUE);
		$data['admin_roleid'] = $this->input->post('admin_roleid',TRUE);
		$data['admin_work'] = $this->input->post('admin_work',TRUE);
		$data['admin_name'] = $this->input->post('admin_name',TRUE);
		$data['admin_sex'] = $this->input->post('admin_sex',TRUE);
		$data['admin_birth'] = $this->input->post('admin_birth',TRUE);
		$data['admin_email'] = $this->input->post('admin_email',TRUE);
		$data['admin_address'] = $this->input->post('admin_address',TRUE);
		
		return $data;
	}

	
	
}