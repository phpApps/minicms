<?php if (!defined('BASEPATH')) exit('No direct access allowed.');


// 菜单列表


class Cms_menu extends SYS_Controller 
{
	
	public function __construct()
	{
    	parent::__construct();
		$this->load->helper('text');
		$this->load->model('cms_cache_model');
		$this->load->model('cms_menu_model');
    }
	
	
	
	

	public function index()
	{
		$data['result'] = $this->cms_menu_model->get_menus();
		return $this->load->view('content/cms_menu/list',$data);	
	}
	
	

	public function add()
	{
		if($this->check_data()==FALSE){
			return $this->load->view('content/cms_menu/add');
		}
		
		$this->cms_menu_model->insert($this->input_data());
		$this->cms_cache_model->update_menu_cache();
		$this->cms_cache_model->update_route_cache();
		return redirect(site_url('content/cms_menu/index'));
	}


	public function edit($id=0)
	{
		$row = $this->cms_menu_model->get_row($id);
		if(empty($row)){
			return redirect(site_url('content/cms_menu/index'));
		}
		if($this->check_data()==FALSE){
			$data['row'] = $row;
			return $this->load->view('content/cms_menu/edit',$data);
		}
		
		$this->cms_menu_model->update($this->input_data(),$id);
		$this->cms_cache_model->update_menu_cache();
		$this->cms_cache_model->update_route_cache();
		return redirect(site_url('content/cms_menu/index'));	
	}
	
	
	public function delete($id=0)
	{	
		$this->cms_menu_model->delete($id);
		$this->cms_cache_model->update_menu_cache();
		$this->cms_cache_model->update_route_cache();
		return redirect(site_url('content/cms_menu/index'));		
	}
	
	
	private function check_data()
	{
		$this->form_validation->set_rules('menu_enable','','trim|required|integer');
		$this->form_validation->set_rules('menu_sort','','trim|required|integer');
		
		$this->form_validation->set_rules('menu_pid','','trim|required|integer');
		$this->form_validation->set_rules('menu_name','','trim|required|max_length[128]');
		
		$this->form_validation->set_rules('menu_out','','trim|integer');
		$this->form_validation->set_rules('menu_iswrite','','trim|integer');
		$this->form_validation->set_rules('menu_out','','trim|integer|max_length[255]');
		$this->form_validation->set_rules('menu_url','','trim|required|max_length[255]');
		
		$this->form_validation->set_rules('menu_tid','','trim|max_length[255]');
		$this->form_validation->set_rules('menu_moren','','trim|max_length[255]');

		$this->form_validation->set_rules('menu_sname','','trim|max_length[128]');
		$this->form_validation->set_rules('menu_intro','','trim|max_length[255]');
		
		$this->form_validation->set_rules('menu_attach','','trim|max_length[128]');
		$this->form_validation->set_rules('menu_attach2','','trim|max_length[128]');
		$this->form_validation->set_rules('menu_attach3','','trim|max_length[128]');
		$this->form_validation->set_rules('menu_title','','trim|max_length[128]');
		$this->form_validation->set_rules('menu_keyword','','trim|max_length[128]');
		$this->form_validation->set_rules('menu_description','','trim|max_length[255]');
		$this->form_validation->set_rules('menu_content','','trim');
		return $this->form_validation->run();
	}
	
	
	
	private function input_data()
	{
		$data['menu_enable'] = intval($this->input->post('menu_enable',TRUE));
		$data['menu_sort'] = intval($this->input->post('menu_sort',TRUE));
		
		$data['menu_pid'] = $this->input->post('menu_pid',TRUE);
		$data['menu_name'] = $this->input->post('menu_name',TRUE);
		$data['menu_out'] = intval($this->input->post('menu_out',TRUE));
		$data['menu_url'] = $this->input->post('menu_url',TRUE);
		$data['menu_tid'] = $this->input->post('menu_tid',TRUE);
		
		$data['menu_sname'] = $this->input->post('menu_sname',TRUE);
		$data['menu_intro'] = $this->input->post('menu_intro',TRUE);
		
		$data['menu_attach'] = $this->input->post('menu_attach',TRUE);
		$data['menu_attach2'] = $this->input->post('menu_attach2',TRUE);
		$data['menu_attach3'] = $this->input->post('menu_attach3',TRUE);
		$data['menu_title'] = $this->input->post('menu_title',TRUE);
		$data['menu_content']  = $this->input->post('menu_content');
		$data['menu_keyword'] = $this->input->post('menu_keyword',TRUE);
		$data['menu_description']  = $this->input->post('menu_description',TRUE);
		
		if(empty($data['menu_title'])){
			$data['menu_title'] = ellipsize($data['menu_name'],100);
		}
		if(empty($data['menu_keyword'])){
			$data['menu_keyword'] = ellipsize($data['menu_title'],100);
		}
		if(empty($data['menu_description'])){
			$data['menu_description'] = ellipsize(trim(preg_replace('/[\s|\t]+/',',',strip_tags($data['menu_content'])),','),150);
		}
		
		return $data;
	}

	
}