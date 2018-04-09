<?php if (!defined('BASEPATH')) exit('No direct access allowed.');


// 用户注册


class Mem_member extends CMS_Controller
{
	
	public function __construct()
	{
    	parent::__construct();
		$this->load->helper('text');
        $this->load->library('pagination');
        $this->load->model('mem_member_model');
    }
	

	public function index($page=1)
	{
		$data['page'] = $page;
		$total = $this->mem_member_model->get_total();
		$data['pages'] = $this->pagination->create_pages(site_url('mem_member/index'),$total,20);
		$data['result'] = $this->mem_member_model->get_list(NULL,$page,20);
		return $this->load->view('mem_member/list',$data);
	}


	public function edit($page=1,$id=0)
	{
		$row = $this->mem_member_model->get_row($id);
		if(empty($row)){
			return redirect(site_url('mem_member/index'));
		}
		if($this->check_data() == FALSE){
			$data['row'] = $row;
			$data['page'] = $page;
			return $this->load->view('mem_member/edit',$data);
		}
		$this->mem_member_model->update($this->input_data(),$id);
		return redirect(site_url("mem_member/index/{$page}"));
	}
	
	
	public function delete($page=1,$id=1)
	{	
		$this->mem_member_model->delete($id);
		return redirect(site_url("mem_member/index/{$page}"));
	}
	
	
	
	

	private function check_data()
	{
		$this->form_validation->set_rules('member_name','','trim|max_length[32]');
		$this->form_validation->set_rules('member_phone','','trim|max_length[32]');
		$this->form_validation->set_rules('member_email','','trim|max_length[32]');
		$this->form_validation->set_rules('member_qqnum','','trim|max_length[16]');
		
		$this->form_validation->set_rules('member_area','','trim|max_length[64]');
		$this->form_validation->set_rules('member_city','','trim|max_length[64]');
		$this->form_validation->set_rules('member_type','','trim|max_length[16]');
		$this->form_validation->set_rules('member_company','','trim|max_length[16]');
		$this->form_validation->set_rules('member_remark','','trim|max_length[255]');
		return $this->form_validation->run();
	}
	
	
	
	private function input_data()
	{
		$data['member_name']  = $this->input->post('member_name',TRUE);
		$data['member_phone']  = $this->input->post('member_phone',TRUE);
		$data['member_email']  = $this->input->post('member_email',TRUE);
		$data['member_qqnum']  = $this->input->post('member_qqnum',TRUE);
		
		$data['member_area']  = $this->input->post('member_area',TRUE);
		$data['member_city']  = $this->input->post('member_city',TRUE);
		$data['member_type']  = $this->input->post('member_type',TRUE);
		//$data['member_company']  = $this->input->post('member_company',TRUE);
		$data['member_remark']  = $this->input->post('member_remark',TRUE);
		return $data;
	}
	
}