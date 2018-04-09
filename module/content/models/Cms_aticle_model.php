<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// 文章列表


class cms_aticle_model  extends  LANG_Model
{

	public function __construct()
	{
		
		parent::__construct();
        $this->table = 'cms_article';
		$this->autoid = 'art_id';
		$this->sort  = 'desc';
	}
	
	
	
	public function replenish_data(& $result)
	{
		foreach($result as &$item){
			$row_menu = $this->cms_menu_model->get_row(array('menu_id'=>$item['art_mid']));
			$item['menu_name'] = $row_menu['menu_name'];
			
			$label_name = array(); 
			if($item['art_lbid']){
				$list_label = $this->cms_label_model->get_list(array('sql'=>'label_id IN ('.$item['art_lbid'].')'));
				foreach($list_label as $temp) $label_name[] = $temp['label_name'];
			}
			$item['label_name'] = implode(',',$label_name);
		} 
	}
	
}
