<?php if (!defined('BASEPATH')) exit('No direct access allowed.');


// 文章评论


class Cms_comment extends CMS_Controller
{
	
	public function __construct()
	{
    	parent::__construct();
		$this->load->helper('text');
        $this->load->library('pagination');
        $this->load->model('cms_comment_model');
    }
	

	public function index($page=1)
	{
		$data['page'] = $page;
		$total = $this->cms_comment_model->get_total();
		$data['pages'] = $this->pagination->create_pages(site_url('cms_comment/index'),$total,20);
		$data['result'] = $this->cms_comment_model->get_list_patch(NULL,$page,20);
		return $this->load->view('cms_comment/list',$data);
	}
	

	public function edit($page=1,$id=0)
	{
		$row = $this->cms_comment_model->get_row_patch($id);
		if(empty($row)){
			return redirect(site_url('cms_comment/index'));
		}
		$post['cmt_status']  = $this->input->post('cmt_status',TRUE);
		$post['cmt_reply']  = $this->input->post('cmt_reply',TRUE);
		if(empty($post['cmt_status'])){
			$data['row'] = $row;
			$data['page'] = $page;
			return $this->load->view('cms_comment/edit',$data);
		}
		$this->cms_comment_model->update($post,$id);
		return redirect(site_url("cms_comment/index/{$page}"));
	}
	

	public function reply($page=1,$id=1)
	{	
		$this->cms_comment_model->update(array("cmt_status"=>2),$id);
		return redirect(site_url("cms_comment/index/{$page}"));
	}


    public function delete($page=1,$id=1)
	{	
		$this->cms_comment_model->delete($id);
		return redirect(site_url("cms_comment/index/{$page}"));
	}
	
}