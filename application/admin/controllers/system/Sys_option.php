<?php if (!defined('BASEPATH')) exit('No direct access allowed.');


// 权限项列表


class Sys_option extends SYS_Controller 
{
	
	public function __construct()
	{
    	parent::__construct();
		$this->load->model('sys_option_model');
		$this->load->model('sys_cache_model'); 
    }
	

	public function index()
	{
		$data['result'] = $this->sys_option_model->get_options();
		return $this->load->view('system/sys_option/list',$data);	
	}

	public function add()
	{
		if($this->check_data()==FALSE){
			return $this->load->view('system/sys_option/add');
		}
		$this->sys_option_model->insert($this->input_data());
		$this->sys_cache_model->update_options_cache();
		return redirect(site_url('system/sys_option/index'));
	}

	public function edit($id=0)
	{
		$row = $this->sys_option_model->get_row($id);
		if(empty($row)){
			return redirect(site_url('system/sys_option/index'));
		}
		if($this->check_data()==FALSE){
			$data['row'] = $row;
			return $this->load->view('system/sys_option/edit',$data);
		}
		$this->sys_option_model->update($this->input_data(),$id);
		$this->sys_cache_model->update_options_cache();
		return redirect(site_url('system/sys_option/index'));	
	}

	public function delete($id=0)
	{	
		$this->sys_option_model->delete(array('option_id'=>$id,'option_system'=>0));
		$this->sys_cache_model->update_options_cache();
		return redirect(site_url('system/sys_option/index'));		
	}

	private function check_data()
	{
		$this->form_validation->set_rules('option_pid','','trim|required|integer');
		$this->form_validation->set_rules('option_name','','trim|required|max_length[32]');
		$this->form_validation->set_rules('option_value','','trim|required|max_length[64]');
		$this->form_validation->set_rules('option_sort','','trim|required|integer');
		return $this->form_validation->run();
	}
	
	private function input_data()
	{
		$data['option_pid'] = $this->input->post('option_pid',TRUE);
		$data['option_name'] = $this->input->post('option_name',TRUE);
		$data['option_value'] = $this->input->post('option_value',TRUE);
		$data['option_ismenu'] = $this->input->post('option_ismenu',TRUE);
		$data['option_desc'] =  $this->input->post('option_desc',TRUE);
		$data['option_folder'] = $this->input->post('option_folder',TRUE);//添加文件夹
		$data['option_sort'] = $this->input->post('option_sort',TRUE);
		return $data;
	}
	
	public function ajax_sort()
	{
		$id = $this->input->post('sortid',TRUE);
		$sort = $this->input->post('sortval',TRUE);
		$this->sys_option_model->update(array('option_sort'=>$sort),$id);
		echo json_encode(array('error_code'=>0));
	}
		
}



