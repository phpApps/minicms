<?php if (!defined('BASEPATH')) exit('No direct access allowed.');


// 语言列表


class Sys_language extends SYS_Controller 
{
	
	public function __construct()
	{
    	parent::__construct();
		$this->load->model('sys_cache_model');
		$this->load->model('sys_language_model');
    }
	
	
	
	

	public function index()
	{
		$data['result'] = $this->sys_language_model->get_list();
		$this->load->view('system/sys_language/list',$data);	
	}
	
	
	
	
	
	public function add()
	{
		if($this->check_data()==FALSE){
			return $this->load->view('system/sys_language/add');
		}
		
		$post = $this->input_data();
		if($post['lang_default']==1)
		$this->sys_language_model->update(array('lang_default'=>0));
		
		$this->sys_language_model->insert($post);
		$this->sys_cache_model->update_language_cache();
		$this->sys_cache_model->update_route_cache();
		return redirect(site_url('system/sys_language/index'));
	}
	
	
	
	

	public function edit($id=0)
	{
		$row = $this->sys_language_model->get_row($id);
		if(empty($row)){
			return redirect(site_url('system/sys_language/index'));
		}
		if($this->check_data()==FALSE){
			$data['row'] = $row;
			return $this->load->view('system/sys_language/edit',$data);
		}

		$post = $this->input_data();
		if($post['lang_default']==1)
		$this->sys_language_model->update(array('lang_default'=>0));
	
		$this->sys_language_model->update($post,$id);
		$this->sys_cache_model->update_language_cache();
		$this->sys_cache_model->update_route_cache();
		return redirect(site_url('system/sys_language/index'));	
	}
	
	
	
	

	public function delete($id=0)
	{	
		$this->sys_language_model->delete(array('lang_id'=>$id,'lang_default'=>0));
		$this->sys_cache_model->update_language_cache();
		$this->sys_cache_model->update_route_cache();
		return redirect(site_url('system/sys_language/index'));		
	}
	
	
	


	private function check_data()
	{
		$this->form_validation->set_rules('lang_sign','','trim|required|max_length[8]');
		$this->form_validation->set_rules('lang_name','','trim|required|max_length[32]');
		$this->form_validation->set_rules('lang_default','','trim|integer');
		$this->form_validation->set_rules('lang_enable','','trim|integer');
		return $this->form_validation->run();
	}
	
	
	
	private function input_data()
	{
		$data['lang_sign'] = $this->input->post('lang_sign',TRUE);
		$data['lang_name'] = $this->input->post('lang_name',TRUE);
		$data['lang_default'] = intval($this->input->post('lang_default',TRUE));
		$data['lang_enable'] = intval($this->input->post('lang_enable',TRUE));
		if($data['lang_default']==1) $data['lang_enable'] = 1;
		return $data;
	}
	
	
	
	
	
	
}