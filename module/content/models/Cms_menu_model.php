<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// 菜单列表


class Cms_menu_model  extends  LANG_Model
{
	
	
	public function __construct()
	{
		parent::__construct();
		$this->table  = 'cms_menu';
		$this->autoid = 'menu_id';
		$this->language = $this->session->userdata('backend_language');
	}




	public function get_menus()
	{
		$this->db->order_by('menu_pid','asc');
		$this->db->order_by('menu_sort','asc');
		$result = parent::get_list();
		return self::create_menus($result);
	}
	
	private function create_menus($result,$pid=0)
	{
		$menu = array();
		foreach($result as $row){
			if($row['menu_pid']==$pid){
				$row['children'] = self::create_menus($result,$row['menu_id']);
				$menu[] = $row;
			}
		}
		return $menu;
	}





	
	public function menu_option($sid=0,$mid=0,$pid=0)
	{
		$this->db->order_by('menu_pid','asc');
		$this->db->order_by('menu_sort','asc');
		$result = parent::get_list();
		return self::create_option($result,$sid,$mid,$pid);
	}
	
	private function create_option($result,$sid,$mid,$pid,$level=0)
	{
		$level++;
		$option = NULL;
		foreach($result as $row){
			if($row['menu_pid']==$pid){
				$white = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',($level-1)*2);
				if($row['menu_id']==$sid){
					$option .= '<option value="'.$row['menu_id'].'" selected="selected">'.$white.$row['menu_name'].'</option>';
				}
				elseif($row['menu_id']==$mid){
					$option .= '<option value="'.$row['menu_id'].'" disabled="disabled">'.$white.$row['menu_name'].'</option>';
				}
				else{
					$option .= '<option value="'.$row['menu_id'].'">'.$white.$row['menu_name'].'</option>';
				}
				$option .= self::create_option($result,$sid,$mid,$row['menu_id'],$level);
			}
		}
		return $option;
	}
	


}
















