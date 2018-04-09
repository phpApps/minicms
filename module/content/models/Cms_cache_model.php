<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



// ------------------------------------------------------------------------

/**
 * 缓存操作模型
 *
 * @package     
 * @subpackage  Models
 * @category    Models
 * @author      Netusn
 * @link        
 */
class Cms_cache_model extends CI_Model
{
	/**
     * 构造函数
     *
     * @access  public
     * @return  void
     */
	public function __construct()
	{
		parent::__construct();	
	}
	
	 
	
	// ------------------------------------------------------------------------

    /**
     * 更新菜单缓存
     *
     * @access  public
     * @return  void
     */
	public function update_menu_cache()
	{
		$data = array();
		$langs = $this->db->where('lang_enable', 1)
							->order_by('lang_default', 'desc')
							->get($this->db->dbprefix('sys_language'))
							->result_array();
		$num = count($langs);
		foreach($langs as $lang)
		{
			$table = $this->db->dbprefix('cms_menu');
			$lv1_menus = $this->db->select('menu_id, menu_pid, menu_name, menu_out, menu_url, menu_tid, menu_enable, lang')
									  ->where('lang', $lang['lang_sign'])
									  ->where('menu_pid', 0)
									  ->order_by('menu_id','asc')
									  ->order_by('menu_sort','asc')
									  ->get($table)
									  ->result_array();
			foreach ($lv1_menus as & $one)
			{
				unset($one['menu_out']);
				unset($one['menu_url']);
				$lv2_menus = $this->db->select('menu_id, menu_pid, menu_name, menu_out, menu_url, menu_tid, menu_enable, lang')
										  ->where('lang', $lang['lang_sign'])
										  ->where('menu_pid', $one['menu_id'])
										  ->order_by('menu_id','asc')
										  ->order_by('menu_sort','asc')
										  ->get($table)
										  ->result_array();
				foreach ($lv2_menus as & $two)
				{
					unset($two['menu_out']);
					unset($two['menu_url']);
					$lv3_menus = $this->db->select('menu_id, menu_pid, menu_name, menu_out, menu_url, menu_tid, menu_enable, lang')
											  ->where('lang', $lang['lang_sign'])
											  ->where('menu_pid', $two['menu_id'])
											  ->order_by('menu_id','asc')
											  ->order_by('menu_sort','asc')
											  ->get($table)
											  ->result_array();
					foreach($lv3_menus as & $three)
					{
						$three['children'] = array();
						unset($three['menu_out']);
						unset($three['menu_url']);
					}
					$two['children'] = $lv3_menus;
				}
				$one['children'] = $lv2_menus;
			}
			
			if($num>1){
				$data[$lang['lang_sign']] = $lv1_menus;
			}else{
				$data = $lv1_menus;
			}	
		}
		write_file(BASEPATH . 'config/cfg_cms_menus.php', 
									 array_to_cache("config['menus']", $data));
	}
	
	
    /**
     * 更新站点设置缓存
     *
     * @access  public
     * @return  void
     */
	public function update_setting_cache()
	{
		$data = array();
		$langs = $this->db->where('lang_enable', 1)
							->order_by('lang_default', 'desc')
							->get($this->db->dbprefix('sys_language'))
							->result_array();
		$result = $this->db->get($this->db->dbprefix('cms_setting'))
						   ->result_array();
						   	
		$num = count($langs);	
		foreach($langs as $lang)
		{
			
			foreach($result as $item)
			{
				$val = $item['set_value'];
				$arr = json_decode($val,TRUE);
				
				if(is_array($arr) && isset($arr[$lang['lang_sign']])){
					$val = $arr[$lang['lang_sign']];
				}
				if($num>1){
					$data[$lang['lang_sign']][$item['set_sign']] = $val;
				}else{
					$data[$item['set_sign']] = $val;
				}
			}
		}
		write_file(BASEPATH . 'config/cfg_cms_setting.php', 
									 array_to_cache("config['setting']", $data));	
	}
	
	
    /**
     * 更新路由缓存
     *
     * @access  public
     * @return  void
     */
	public function update_route_cache()
	{
		$data = array();
		$langs = $this->db->where('lang_enable', 1)
							->order_by('lang_default', 'desc')
							->get($this->db->dbprefix('sys_language'))
							->result_array();
		$num = count($langs);
		foreach($langs as $lang)
		{
			//语言路由
			$data[$lang['lang_sign']] = $this->router->default_controller;
			
			$menus = $this->db->select('menu_id, menu_url, menu_out, menu_tid, lang')
							  ->where('menu_out', 0)
							  ->where('lang', $lang['lang_sign'])
							  ->order_by('menu_id', 'asc')
							  ->get($this->db->dbprefix('cms_menu'))
							  ->result_array();
			foreach($menus as $menu)
			{
				if($menu['menu_out']<1)
				{
					$menu_url = ($num>1) ? $menu['lang'].'/'.$menu['menu_url'] : $menu['menu_url'];
					if($menu['menu_tid']==2){
						$data[$menu_url] = 'single_page/'.$menu['menu_tid'];
					}
					if($menu['menu_tid']==3){
						$data[$menu_url] = 'list_aricle/'.$menu['menu_tid'];
					}
					if($menu['menu_tid']==4){
						$data[$menu_url] = 'list_image/'.$menu['menu_tid'];
					}
					if($menu['menu_tid']==5){
						$data[$menu_url] = 'list_video/'.$menu['menu_tid'];
					}
					
					//分页情况
					if( in_array($menu['menu_tid'],array(3,4,5))){
						$data[$menu_url.'/(:num)'] = $data[$menu_url].'/$1';
					}
				}
			}	
		}
		
		//文章路由
		$data['article/(:num)'] = 'article_article/$1';
		$data['image/(:num)'] = 'article_image/$1';
		$data['video/(:num)'] = 'article_video/$1';
		
		write_file(BASEPATH . 'config/cfg_cms_route.php', 
									 array_to_cache("route", $data));	
	}
	

    
}