<?php if (!defined('BASEPATH')) exit('No direct access allowed.');


// 标签列表


class Cms_label extends SYS_Controller 
{
	
	public function __construct()
	{
    	parent::__construct();
		$this->load->model('cms_label_model');
    }
	
	
	
	

	public function index($label_bs=NULL)
	{
		$data['label_bs'] = $label_bs;
		$data['result'] = $this->cms_label_model->get_list(array('label_bs'=>$label_bs));
		$this->load->view('content/cms_label/list',$data);	
	}
	
	

	public function add($label_bs=NULL)
	{
		if($this->check_data()==FALSE){
			$data['label_bs'] = $label_bs;
			return $this->load->view('content/cms_label/add',$data);
		}
		$this->cms_label_model->insert($this->input_data($label_bs));
		return redirect(site_url('content/cms_label/index/'.$label_bs));
	}



	public function edit($label_bs=NULL,$id=0)
	{
		$row = $this->cms_label_model->get_row($id);
		if(empty($row)){
			return redirect(site_url('content/cms_label/index/'.$label_bs));
		}
		if($this->check_data()==FALSE){
			$data['row'] = $row;
			$data['label_bs'] = $label_bs;
			return $this->load->view('content/cms_label/edit',$data);
		}
		$this->cms_label_model->update($this->input_data($label_bs),$id);
		return redirect(site_url('content/cms_label/index/'.$label_bs));	
	}
	
	
	
	public function delete($label_bs=NULL,$id=0)
	{	
		$this->cms_label_model->delete($id);
		return redirect(site_url('content/cms_label/index/'.$label_bs));		
	}
	
	
	
	private function check_data()
	{
		$this->form_validation->set_rules('label_url','','trim|max_length[255]');
		$this->form_validation->set_rules('label_name','','trim|required|max_length[128]');
		$this->form_validation->set_rules('label_intro','','trim|max_length[255]');
		
		$this->form_validation->set_rules('label_attach','','trim|max_length[128]');
		$this->form_validation->set_rules('label_attach2','','trim|max_length[128]');
		$this->form_validation->set_rules('label_attach3','','trim|max_length[128]');
		$this->form_validation->set_rules('label_title','','trim|max_length[128]');
		$this->form_validation->set_rules('label_keyword','','trim|max_length[128]');
		$this->form_validation->set_rules('label_description','','trim|max_length[255]');
		
		$this->form_validation->set_rules('label_enable','','trim|required|integer');
		$this->form_validation->set_rules('label_sort','','trim|integer');
		return $this->form_validation->run();
	}
	
	
	
	private function input_data($label_bs=NULL)
	{
		$data['label_bs'] = $label_bs;
		$data['label_url'] = $this->input->post('label_url',TRUE);
		$data['label_name'] = $this->input->post('label_name',TRUE);
		$data['label_intro'] = $this->input->post('label_intro',TRUE);
		
		$data['label_attach'] = $this->input->post('label_attach',TRUE);
		$data['label_attach2'] = $this->input->post('label_attach2',TRUE);
		$data['label_attach3'] = $this->input->post('label_attach3',TRUE);
		$data['label_title'] = $this->input->post('label_title',TRUE);
		$data['label_keyword'] = $this->input->post('label_keyword',TRUE);
		$data['label_description']  = $this->input->post('label_description',TRUE);
		
		$data['label_enable'] = $this->input->post('label_enable',TRUE);
		$data['label_sort'] = $this->input->post('label_sort',TRUE);
		return $data;
	}

	
}