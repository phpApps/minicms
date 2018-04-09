<?php if (!defined('BASEPATH')) exit('No direct access allowed.');


//用户角色


class Sys_role extends SYS_Controller 
{
	
	public function __construct()
	{
    	parent::__construct();
		$this->load->model('sys_role_model');
		$this->load->model('sys_option_model');
		$this->load->model('sys_cache_model');
    }
	

	public function index()
	{
		$data['result'] = $this->sys_role_model->get_list();
		return $this->load->view('system/sys_role/list',$data);	
	}
	
	
	public function add()
	{
		if($this->check_data() == FALSE){
			$data['list_option'] = $this->sys_option_model->get_options();
			return $this->load->view('system/sys_role/add',$data);
		}
		$this->sys_role_model->insert($this->input_data());
		$this->sys_cache_model->update_roles_cache();
		return redirect(site_url("system/sys_role/index"));
	}
	



	public function edit($id=0)
	{
		$row = $this->sys_role_model->get_row($id);
		if(empty($row)){
			return redirect(site_url("system/sys_role/index"));
		}
		if($this->check_data()==FALSE){
			$data['row'] = $row;
			$data['list_option'] = $this->sys_option_model->get_options();;
			return $this->load->view('system/sys_role/edit',$data);
		}
		$this->sys_role_model->update($this->input_data(),$id);
		$this->sys_cache_model->update_roles_cache();
		return redirect(site_url("system/sys_role/index"));	
	}
	
	
	public function delete($id=0)
	{	
		$this->sys_role_model->delete(array('role_id'=>$id,'role_system'=>0));
		$this->sys_cache_model->update_roles_cache();
		return redirect(site_url('system/sys_role/index'));		
	}




	private function check_data($id=0)
	{
		$this->form_validation->set_rules('role_name','名称','trim|required|max_length[32]');
		$this->form_validation->set_rules('role_remark','备注','trim|max_length[255]');
		$this->form_validation->set_rules('role_option[]','权限','required');
		return $this->form_validation->run();
	}
	
	
	private function input_data($id=0)
	{
		$data['role_name'] = $this->input->post('role_name',TRUE);
		$data['role_remark'] = $this->input->post('role_remark',TRUE);
		$data['role_option'] = json_encode($this->input->post('role_option',TRUE));
		return $data;
	}

	
	
}