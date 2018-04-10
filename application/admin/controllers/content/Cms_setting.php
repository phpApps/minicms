<?php if (!defined('BASEPATH')) exit('No direct access allowed.');


// 站点设置


class Cms_setting extends SYS_Controller 
{
	
	public function __construct()
	{
    	parent::__construct();
		$this->load->helper('text');
		$this->load->model('cms_cache_model'); 
		$this->load->model('cms_setting_model');
    }
	
	


	public function index()
	{
		$data['result'] = $this->cms_setting_model->get_list();
		return $this->load->view('content/cms_setting/list',$data);
	}
	
	
	public function add()
	{
		if($this->check_data() == FALSE){
			$data['list_lang'] = config_item('exist_language');
			return $this->load->view('content/cms_setting/add',$data);
		}
		$this->cms_setting_model->insert($this->input_data());
		$this->cms_cache_model->update_setting_cache();
		return redirect(site_url("content/cms_setting/index"));
	}
	
	
	public function edit($id=0)
	{
		$row = $this->cms_setting_model->get_row($id);
		if(empty($row)){
			return redirect(site_url("content/cms_setting/index"));
		}
		if($this->check_data($id)==FALSE){
			$data['row'] = $row;
			$data['list_lang'] = config_item('exist_language');
			return $this->load->view('content/cms_setting/edit',$data);
		}
		$this->cms_setting_model->update($this->input_data($id),$id);
		$this->cms_cache_model->update_setting_cache();
		return redirect(site_url("content/cms_setting/index"));	
	}
	
	
	public function delete($id=0)
	{
		$this->cms_setting_model->delete(array('set_id'=>$id,'set_system'=>0));
		$this->cms_cache_model->update_setting_cache();
		return redirect(site_url("content/cms_setting/index"));	
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
