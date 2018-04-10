<?php if (!defined('BASEPATH')) exit('No direct access allowed.');


// 更新缓存


class Cms_cache extends SYS_Controller 
{
	
	public function __construct()
	{
    	parent::__construct();
		$this->load->model('cms_cache_model');
    }
	
	


	public function index()
	{
		$model = $this->input->post('cache_model',TRUE);
		if($model){
			foreach($model as $method){
				$this->cms_cache_model->$method();
			}
			return $this->load->view('content/cms_cache/index',array('msg'=>'缓存数据更新成功！'));
		}
		return $this->load->view('content/cms_cache/index');
	}
	
	
	
	

}
