<?php if (!defined('BASEPATH')) exit('No direct access allowed.');


// 留言列表


class Cms_message extends CMS_Controller
{
	
	public function __construct()
	{
    	parent::__construct();
        $this->load->library('pagination');
        $this->load->model('cms_message_model');
    }
	

	public function index($page=1)
	{
		$data['page'] = $page;
		$data['pages'] = $this->pagination->create_pages(site_url('cms_message/index'),$this->cms_message_model->get_total(),20);
		$data['result'] = $this->cms_message_model->get_list(NULL,$page,20);
		return $this->load->view('cms_message/list',$data);
	}


	public function edit($page=1,$id=0)
	{
		$row = $this->cms_message_model->get_row($id);
		if(empty($row)){
			return redirect(site_url('cms_message/index'));
		}
		if($this->check_data() == FALSE){
			$data['row'] = $row;
			$data['page'] = $page;
			return $this->load->view('cms_message/edit',$data);
		}
		$this->cms_message_model->update($this->input_data(),$id);
		return redirect(site_url("cms_message/index/{$page}"));
	}
	
	
	public function delete($page=1,$id=1)
	{	
		$this->cms_message_model->delete($id);
		return redirect(site_url("cms_message/index/{$page}"));
	}
	
	
	
	

	private function check_data()
	{
		$this->form_validation->set_rules('msg_name','','trim|max_length[32]');
		$this->form_validation->set_rules('msg_phone','','trim|max_length[32]');
		$this->form_validation->set_rules('msg_email','','trim|max_length[32]');
		$this->form_validation->set_rules('msg_qqnum','','trim|max_length[16]');
		
		$this->form_validation->set_rules('msg_area','','trim|max_length[64]');
		$this->form_validation->set_rules('msg_city','','trim|max_length[64]');
		$this->form_validation->set_rules('msg_content','','trim|max_length[255]');
		$this->form_validation->set_rules('msg_remark','','trim|max_length[255]');
		return $this->form_validation->run();
	}
	
	
	
	private function input_data()
	{
		$data['msg_name']  = $this->input->post('msg_name',TRUE);
		$data['msg_phone']  = $this->input->post('msg_phone',TRUE);
		$data['msg_email']  = $this->input->post('msg_email',TRUE);
		$data['msg_qqnum']  = $this->input->post('msg_qqnum',TRUE);
		
		$data['msg_area']  = $this->input->post('msg_area',TRUE);
		$data['msg_city']  = $this->input->post('msg_city',TRUE);
		$data['msg_content']  = $this->input->post('msg_content',TRUE);
		$data['msg_remark']  = $this->input->post('msg_remark',TRUE);
		return $data;
	}
	
}