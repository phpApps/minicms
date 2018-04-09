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
class Sys_cache_model extends CI_Model
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
     * 更新系统配置缓存
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
		$result = $this->db->get($this->db->dbprefix('sys_setting'))
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
		write_file(BASEPATH . 'config/cfg_sys_setting.php', 
									 array_to_cache("config['setting']", $data));	
	}
	
	
	
    /**
     * 更新语言缓存
     *
     * @access  public
     * @return  void
     */
	public function update_language_cache()
	{
		$result = $this->db->order_by('lang_default','desc')
							->get($this->db->dbprefix('sys_language'))
							->result_array();
		$data = array();
		foreach($result as $item)
		{
			if($item['lang_default']==1){
				$data['default_language'] = $item['lang_sign'];
			}
			if($item['lang_enable']==1){
				$data['support_language'][$item['lang_sign']] = $item['lang_name'];
			}
			$data['exist_language'][] = $item;
		}
		write_file(BASEPATH . 'config/cfg_sys_language.php', 
									 array_to_cache("config", $data));	
	}
	
	
	
  /**
   * 更新权限项缓存
   *
   * @access  public
   * @param   string
   * @return  void
   */
	public function update_options_cache()
	{
		$data = array();
		$options = $this->db->select('option_id, option_name, option_folder, option_value, option_ismenu')
							->order_by('option_pid','asc')
							->order_by('option_sort','asc')
							->where_in('option_pid', 0)
							->get($this->db->dbprefix('sys_option'))
						   	->result_array();						
		foreach ($options as & $one)
		{
			$one['children'] = $this->db->select('option_id, option_name, option_folder, option_value, option_ismenu')
										->order_by('option_sort','asc')
										->order_by('option_pid','asc')
										->where_in('option_pid', $one['option_id'])
										->get($this->db->dbprefix('sys_option'))
										->result_array();  		  
			foreach ($one['children'] as & $two){
				$two['children'] = $this->db->select('option_id, option_name, option_folder, option_value, option_ismenu')
											->order_by('option_sort','asc')
											->order_by('option_pid','asc')
											->where_in('option_pid', $two['option_id'])
											->get($this->db->dbprefix('sys_option'))
											->result_array(); 
			}	
			$data[$one['option_id']] = $one;
		}
		write_file(BASEPATH . 'config/cfg_sys_options.php', 
									array_to_cache("config['options']",$data));
		
	}
	
	
	
    /**
     * 更新用户角色缓存
     *
     * @access  public
     * @param   string
     * @return  void
     */
	public function update_roles_cache()
	{
		$data = array();
		$roles = $this->db->get($this->db->dbprefix('sys_role'))
						   ->result_array();
		foreach ($roles as $role)
		{	
			$res = array();
			$role_option = json_decode($role['role_option'],TRUE);
			foreach($role_option as $tid => $ids)
			{
				$result = $this->db->select('option_name, option_value, option_ismenu')
								->where_in('option_id', $ids)
							    ->get($this->db->dbprefix('sys_option'))
							    ->result_array();
				$val = array();
				foreach ($result as $item)
				{
					$val[] = $item['option_value'];
				}
				
				$row = $this->db->select('option_folder')
								->where_in('option_id', $tid)
							    ->get($this->db->dbprefix('sys_option'))
							    ->row_array();
				$res[$row['option_folder']] = $val;
			}
			$data[$role['role_id']] = array('role_name'=>$role['role_name'],'role_value'=>$res);
		}
		write_file(BASEPATH . 'config/cfg_sys_roles.php', 
									 array_to_cache("config['roles']",$data));
	}
	
    
}