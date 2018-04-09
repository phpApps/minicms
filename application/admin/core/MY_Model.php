<?php if (!defined('BASEPATH')) exit('No direct access allowed.');




class  MY_Model  extends  CI_Model
{
	
	/**
	 * table	string	数据表名
	 * autoid	int		自增ID
	 * sort		string	排序类型
	 */
	public $table = NULL;
	public $autoid = NULL;
	public $sort = NULL;
	
	
	public function __construct(){
		parent::__construct();
		if(empty($this->autoid)){
			$this->autoid = 'id';
		}
	}

	public function get_list($parame=array(),$page=NULL,$limit=NULL,$has_from=FALSE){
		$this->set_query($parame,$has_from);
		if(empty($parame['desc'])){
			if(empty($parame['asc'])){
				if($this->sort){
					$this->db->order_by('a.'.$this->autoid,$this->sort);
				}
			}
		}
		if($limit>0){
			if($page>0){
				$this->db->limit($limit,abs($page-1)*$limit);
			}else{
				$this->db->limit($limit);
			}
		}
		return $this->db->get()->result_array();
	}

	public function get_row($parame=array(),$has_from=FALSE){
		$this->db->limit(1);
		$this->set_query($parame,$has_from);
		return $this->db->get()->row_array();
	}

	public function get_total($parame=array(),$has_from=FALSE){
		$this->set_query($parame,$has_from);
		return $this->db->count_all_results();
	}
	
	

	// --------------------------------------------------------------------

	/**
	 * set_query
	 *
	 * 解析查询参数
	 *
	 * @param	array	desc|asc|sql 查询参数
	 * @param	bool	前面是否已添加 db->from
	 * @return
	 */
	protected function set_query($parame,$has_from){
		if($has_from==FALSE){
			$this->db->from($this->table.' a');
		}
		if( is_string($parame) || is_int($parame)){
			$this->db->where('a.'.$this->autoid,$parame);
		}
		elseif(is_array( $parame )){
			foreach($parame as $key => $value){
				if(is_array($value)){
					if($value){
						$this->db->where_in('a.'.$key,$value);
					}
				}
				elseif(strtolower($key)=='desc'){
					$this->db->order_by('a.'.$value,$key);	
				}
				elseif(strtolower($key)=='asc'){
					$this->db->order_by('a.'.$value,$key);	
				}
				elseif(strtolower($key)=='sql'){
					$this->db->where($value);
				}
				else{
					$this->db->where('a.'.$key,$value);
				}	
			}
		}
	}


	public function insert($data=array()){
		return $this->db->insert($this->table,$data); 
	}

	public function update($data=array(),$parame=array()){
		if(is_array($parame)){
			foreach($parame as $key=>$value){
				if(strtolower($key)=='sql'){
					$this->db->where($value);
				}else{
					$this->db->where($key,$value);
				}
			}
			return $this->db->update($this->table,$data);
		}else{
			return $this->db->update($this->table,$data,array($this->autoid=>$parame)); 
		}	
	}

	public function delete($parame=array()){
		if(empty($parame)){
			return $this->db->delete($this->table);
		}
		if(is_array($parame)){
			foreach($parame as $key=>$value){
				if(is_array($value)){
					$this->db->where_in($key,$value);
				}else{
					$this->db->where($key, $value);
				}
			}
			return $this->db->delete($this->table);
		}else{
			return $this->db->delete($this->table,array($this->autoid=>$parame));
		}	
	}
		
}


class  LANG_Model  extends  MY_Model{
	
	protected $language = NULL;
	
	public function __construct(){
		parent::__construct();
		if(empty($this->language)){
			$this->language = config_item('language');
		}
	}
	
	protected function set_query($parame,$has_from){
		$this->db->where('a.lang',$this->language);
		parent::set_query($parame,$has_from);
	}
	
	public function insert($data=array()){
		$data['lang'] = $this->language;
		parent::insert($data);
	}

	public function update($data=array(),$parame=array()){
		$this->db->where('lang',$this->language);
		parent::update($data,$parame);
	}

	public function delete($parame=array()){
		$this->db->where('lang',$this->language);
		parent::delete($parame);	
	}

}











