<?php if (!defined('BASEPATH')) exit('No direct access allowed.');


// 模块列表


class Cms_block extends CMS_Controller 
{
	
	public function __construct()
	{
    	parent::__construct();
		$this->load->model('cms_block_model');
    }
	
	
	
	

	public function index()
	{
		$data['result'] = $this->cms_block_model->get_list(array('asc'=>'block_sort'));
		$this->load->view('cms_block/list',$data);	
	}
	
	
	
	
	
	public function add()
	{
		if($this->check_data()==FALSE){
			return $this->load->view('cms_block/add');
		}
		$this->cms_block_model->insert($this->input_data());
		return redirect(site_url('cms_block/index'));
	}
	
	
	
	

	public function edit($id=0)
	{
		$row = $this->cms_block_model->get_row($id);
		if(empty($row)){
			return redirect(site_url('cms_block/index'));
		}
		if($this->check_data()==FALSE){
			$data['row'] = $row;
			return $this->load->view('cms_block/edit',$data);
		}
		$this->cms_block_model->update($this->input_data(),$id);
		return redirect(site_url('cms_block/index'));	
	}
	
	
	
	

	public function delete($id=0)
	{	
		$this->cms_block_model->delete($id);
		return redirect(site_url('cms_block/index'));		
	}
	
	
	


	private function check_data()
	{
		$this->form_validation->set_rules('block_sign','','trim|required|max_length[16]');
		$this->form_validation->set_rules('block_name','','trim|required|max_length[32]');
		$this->form_validation->set_rules('block_enable','','trim|required|integer');
		$this->form_validation->set_rules('block_article','','trim|required|integer');
		return $this->form_validation->run();
	}
	
	
	
	private function input_data()
	{
		$data['block_sign'] = $this->input->post('block_sign',TRUE);
		$data['block_name'] = $this->input->post('block_name',TRUE);
		$data['block_enable'] = $this->input->post('block_enable',TRUE);
		$data['block_article'] = $this->input->post('block_article',TRUE);
		return $data;
	}
	
	
	
	
	
	
}