<?php if (!defined('BASEPATH')) exit('No direct access allowed.');


// 系统设置


class Sys_setting extends SYS_Controller 
{
	
	public function __construct()
	{
    	parent::__construct();
		$this->load->model('sys_cache_model'); 
		$this->load->model('sys_setting_model');
		$this->load->model('sys_language_model');
    }
	
	


	public function index()
	{
		$data['result'] = $this->sys_setting_model->get_list();
		return $this->load->view('system/sys_setting/list',$data);
	}
	
	
	public function add()
	{
		if($this->check_data() == FALSE){
			$data['list_lang'] = $this->sys_language_model->get_list();
			return $this->load->view('system/sys_setting/add',$data);
		}
		$this->sys_setting_model->insert($this->input_data());
		$this->sys_cache_model->update_setting_cache();
		return redirect(site_url("system/sys_setting/index"));
	}
	
	
	public function edit($id=0)
	{
		$row = $this->sys_setting_model->get_row($id);
		if(empty($row)){
			return redirect(site_url("system/sys_setting/index"));
		}
		if($this->check_data($id)==FALSE){
			$data['row'] = $row;
			$data['list_lang'] = $this->sys_language_model->get_list();
			return $this->load->view('system/sys_setting/edit',$data);
		}
		$this->sys_setting_model->update($this->input_data($id),$id);
		$this->sys_cache_model->update_setting_cache();
		return redirect(site_url("system/sys_setting/index"));	
	}
	
	
	public function delete($id=0)
	{
		$this->sys_setting_model->delete(array('set_id'=>$id,'set_system'=>0));
		$this->sys_cache_model->update_setting_cache();
		return redirect(site_url("system/sys_setting/index"));	
	}
	
	
	private function check_data($id=0)
	{
		if($id==0){
			$this->form_validation->set_rules('set_type','','trim|required|max_length[32]');
			$this->form_validation->set_rules('set_sign','','trim|required|max_length[64]');
		}
		$this->form_validation->set_rules('set_name','','trim|required|max_length[32]');
		$this->form_validation->set_rules('set_value[]','','');
		return $this->form_validation->run();
	}
	
	
	private function input_data($id=0)
	{
		if($id==0){
			$data['set_type'] = $this->input->post('set_type',TRUE);
			$data['set_sign'] = $this->input->post('set_sign',TRUE);
		}
		$data['set_name'] = $this->input->post('set_name',TRUE);
		
		$bool = $this->input->post('set_type',TRUE)=='html' ? TRUE :FALSE;
		$value = $this->input->post('set_value',$bool);
		$data['set_value'] = json_encode($value);
		return $data;
	}

}
