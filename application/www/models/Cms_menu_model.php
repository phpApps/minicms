<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// 菜单列表


class Cms_menu_model  extends  CI_Model
{
	
	
	public function __construct()
	{
		parent::__construct();
		$this->table  = 'content/cms_menu';
		$this->autoid = 'menu_id';
		$this->menus = lang_config_item('menus');
	}
	
	
	
	
	
	
	/*-----------------------------------从配置文件获取-----------------------------------*/
	
	// 获取单个菜单
	public function get_row($id=0,$menus=array())
	{
		if(empty($menus)){
			$menus = $this->menus;
		}
		foreach($menus as $one){
			if($one['menu_id']==$id){
				unset($one['children']);
				return $one;
			}
			$temp = self::get_row($id, $one['children']);
			if($temp){
				unset($temp['children']);
				return $temp;
			}
		}
		return array();
	}
	
	
	// 获取栏目二级菜单
	public function get_subnav($id=0)
	{
		$res = array();
		$all = self::get_menus(0,true);
		$arr = self::get_crumbs($id);
		$topid = empty($arr[0]['menu_id']) ? 0 : $arr[0]['menu_id'];
		foreach($all as $row){
			if($row['menu_id']==$topid){
				return $row;
			}
		}
		return $res;
	}


	// 获取所有菜单列表
	public function get_menus($id=0,$enable=FALSE)
	{
		$res = array();
		foreach($this->menus as $row){
			if($row['menu_enable']==1 || $enable){
				if($row['menu_pid']==$id){
					$temp = $row;
					foreach($temp['children'] as $num=>$two){
						if($two['menu_enable']==0){
							unset($temp['children'][$num]);
						}
					}
					
					$res[] = $temp;
				}	
			}
		}
		return $res;
	}
	

	// 获取面包屑数据
	public function get_crumbs($id=0)
	{
		return self::create_crumb($id,$this->menus);
	}
	
	private function create_crumb($id=0,$menus=array())
	{
		$res = array();
		foreach($menus as $row){
			if($row['menu_id']==$id){
				if(isset($row['children'])){
					unset($row['children']);
				}
				return array($row);
			}else{
				if($row['children']){
					$temp = self::create_crumb($id,$row['children']);
					if($temp){
						unset($row['children']);
						$res = array($row);
						$res = array_merge($res,$temp);
					}
				}
			}
		}
		return $res;
	}
	
	
	
	
	
	
	/*-----------------------------------从数据库获取-----------------------------------*/
	
	public function get_db_row($id=0)
	{
		$this->db->where($this->autoid,$id);
		$row = $this->db->get($this->table)->row_array();
		if($row){
			if(empty($row['menu_url'])) $row['menu_url'] = front_menu_url($row);
			if(empty($row['menu_content'])) $row['menu_content'] =  front_parse_html($row['menu_content']);
			if(empty($row['menu_sname'])) $row['menu_sname'] = $row['menu_name'];
			if(empty($row['menu_intro'])) $row['menu_intro'] = ellipsize($row['menu_description'],200);
			$row['menu_pageid'] = strpos($row['menu_url'],'/')===FALSE ?  $row['menu_url'].'-index' : str_replace('/','-',$row['menu_url']);
		}
		return $row;
	}

	


}
















