<?php if (!defined('BASEPATH')) exit('No direct access allowed.');


// 文章列表


class Cms_article extends CMS_Controller 
{
	
	
	public function __construct()
	{
    	parent::__construct();
		$this->load->helper('text');
		$this->load->library('pagination');
		$this->load->model('cms_aticle_model');
		$this->load->model('cms_menu_model');
        $this->load->model('cms_block_model');
		$this->load->model('cms_label_model');
    }



	
	public function index($sign=0,$page=1)
	{	
		$limit=20;
		if($sign==0){
			$sign=1;
			$search['art_id'] = NULL;
			$search['art_mid'] = NULL;
			$search['art_title'] = NULL;
			$search['art_enable'] = 1;
            $search['art_hastop'] = 0;
			$search['art_lbid'] = array();
			$this->session->set_userdata(array('search'=>$search));
		}
		
		if($this->input->post()){
			$sign=1;
			$page=1;
			$search['art_id']  = $this->input->post('art_id',TRUE);
			$search['art_mid']  = $this->input->post('art_mid',TRUE);
			$search['art_title']  = $this->input->post('art_title',TRUE);
            $search['art_enable']  = $this->input->post('art_enable',TRUE);
			$search['art_hastop']  = $this->input->post('art_hastop',TRUE);
			$search['art_lbid']  = (array) $this->input->post('art_lbid',TRUE);
			$this->session->set_userdata(array('search'=>$search));
		}
		
		$search = $this->session->userdata('search');
		$data['search'] = $search;
		$data['sign'] = $sign;
		$data['page'] = $page;
	
		// 缓存搜索
		$this->db->start_cache();
		if($search['art_id']) $this->db->where('a.art_id',$search['art_id']);
		if($search['art_mid']) $this->db->where('a.art_mid',$search['art_mid']);
		if($search['art_title']) $this->db->like('a.art_title',$search['art_title']);
		if($search['art_enable']) $this->db->where('a.art_enable',$search['art_enable']);
		if($search['art_hastop']) $this->db->where('a.art_hastop',$search['art_hastop']);
		if($search['art_lbid']) $this->db->where('a.art_lbid IN ('.implode($search['art_lbid'],',').')');
		$this->db->stop_cache();
		
		// 分页数据
		$data['sign'] = $sign;
		$data['page'] = $page;
		$data['pages'] = $this->pagination->create_pages(site_url('cms_article/index/'.$sign),$this->cms_aticle_model->get_total(),$limit);
		
		$result = $this->cms_aticle_model->get_list(NULL,$page,$limit); $this->db->flush_cache();
		$this->cms_aticle_model->replenish_data($result);
		$data['result'] = $result;
		
		$data['list_block'] = $this->cms_block_model->get_artBlock();	 
		return $this->load->view('cms_article/list',$data);
	}




	public function add($sign=0)
	{	
		if($this->check_input()==FALSE){
			$data['sign'] = $sign;
			$data['list_block'] = $this->cms_block_model->get_artBlock();
			return $this->load->view('cms_article/add',$data);
		}
        $this->cms_aticle_model->insert($this->input_data());
        return redirect(site_url("cms_article/index/{$sign}"));	
	}
	
	
	
	public function edit($sign=0,$page=1,$id=0)
	{
		$row = $this->cms_aticle_model->get_row($id);
		if(empty($row)){
			return redirect(site_url("cms_article/index/{$sign}"));
		}
		
        if($this->check_input()==FALSE){
			$data['row'] = $row;
			$data['sign'] = $sign;
			$data['page'] = $page;
			$data['list_block'] = $this->cms_block_model->get_artBlock();
			return $this->load->view('cms_article/edit',$data);	
        }

        $this->cms_aticle_model->update($this->input_data(),$id);
        return redirect(site_url("cms_article/index/{$sign}/{$page}"));
	}



	public function delete($cid=1,$page=1,$id=0)
	{
		$this->cms_aticle_model->delete($id);
        $this->ma_poslabel_model->delete(array('art_id' => $id));
		return redirect(site_url('cms_article/index/'.$cid.'/'.$page));
	}
	
	
	
	
	private function check_input()
	{
		$this->form_validation->set_rules('art_mid','','trim|required|integer');
		$this->form_validation->set_rules('art_lbid[]','','integer');
		
		$this->form_validation->set_rules('art_enable','','trim|required|integer');
		$this->form_validation->set_rules('art_hastop','','trim|required|integer');
		
		$this->form_validation->set_rules('art_attach','','trim|max_length[128]');
		$this->form_validation->set_rules('art_attach2','','trim|max_length[128]');
		$this->form_validation->set_rules('art_attach3','','trim|max_length[128]');
		
		$this->form_validation->set_rules('art_title','','trim|required|max_length[128]');
		$this->form_validation->set_rules('art_keyword','','trim|max_length[128]');
		$this->form_validation->set_rules('art_description','','trim|max_length[255]');
		$this->form_validation->set_rules('art_content','','trim|required');

		return $this->form_validation->run();
	}
	



	private function input_data($id=0)
	{
		$data['art_mid'] = intval($this->input->post('art_mid',TRUE));
		
		$lbid = $this->input->post('art_lbid',TRUE);
		if($lbid) $data['art_lbid'] = implode(',',$lbid);
		
		$data['art_enable'] = intval($this->input->post('art_enable',TRUE));
		$data['art_hastop'] = intval($this->input->post('art_hastop',TRUE));
		
		$data['art_attach'] = $this->input->post('art_attach',TRUE);
		$data['art_attach2'] = $this->input->post('art_attach2',TRUE);
		$data['art_attach3'] = $this->input->post('art_attach3',TRUE);
		
		$data['art_title'] = $this->input->post('art_title',TRUE);
		$data['art_content'] = $this->input->post('art_content');
		$data['art_keyword'] = $this->input->post('art_keyword',TRUE);
		$data['art_description'] = $this->input->post('art_description',TRUE);
		
		if(empty($data['art_keyword'])){
			$data['art_keyword'] = ellipsize($data['art_title'],100);
		}
		if(empty($data['art_description'])){
			$data['art_description'] = ellipsize(trim(preg_replace('/[\s|\t]+/',',',strip_tags($data['art_content'])),','),150);
		}
		
		$data['art_editime'] = date('Y-m-d H:i:s');
		if($id==0) $data['art_addtime'] = date('Y-m-d H:i:s');
		
		return $data;
	}
	
	
}