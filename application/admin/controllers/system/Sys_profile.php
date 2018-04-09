<?php if (!defined('BASEPATH')) exit('No direct access allowed.');


// 修改资料


class Sys_profile extends SYS_Controller 
{
	
	public function __construct()
	{
    	parent::__construct();
		$this->load->model('sys_admin_model');
    }
	
	


	public function index()
	{
		$admin_id = $this->session->userdata('admin_id');
		$row = $this->sys_admin_model->get_row($admin_id);
		if(empty($row)){
			return redirect(site_url('login/out'));
		}
		
		$this->form_validation->set_rules('admin_name','','trim|required');
		$this->form_validation->set_rules('admin_sex','','trim');
		$this->form_validation->set_rules('admin_birth','','trim');
		$this->form_validation->set_rules('admin_email','','trim');
		$this->form_validation->set_rules('admin_address','','trim');
		$this->form_validation->set_rules('admin_password','','trim|matches[admin_passwordF]');
		$this->form_validation->set_rules('admin_passwordF','','trim');
		if($this->form_validation->run()== TRUE){
			$post['admin_name'] = $this->input->post('admin_name',TRUE);
			$post['admin_sex'] = $this->input->post('admin_sex',TRUE);
			$post['admin_birth'] = $this->input->post('admin_birth',TRUE);
			$post['admin_email'] = $this->input->post('admin_email',TRUE);
			$post['admin_address'] = $this->input->post('admin_address',TRUE);
			$password = $this->input->post('admin_password',TRUE);
			if($password) $post['admin_password'] = md5($password);
			
			$this->sys_admin_model->update($post,$admin_id);
			$data['msg'] = '修改成功';
		}
		$data['row'] = $row;
		return $this->load->view('system/sys_profile/index',$data);
	}
	
	
	
	

}
