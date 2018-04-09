<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// 评论列表


class Cms_comment_model  extends  LANG_Model
{

	public function __construct()
	{
		parent::__construct();
        $this->table = 'cms_comment';
		$this->autoid = 'cmt_id';
		$this->sort  = 'desc';
	}
	

	public function get_list_patch($parame,$page,$limit)
	{
		$this->db->from("{$this->table} a");
		$this->db->join('cms_article b','b.art_id=a.cmt_aid','left');
		$this->db->join('mem_member c','c.member_id=a.cmt_mid','left');
		$this->db->select('a.*,b.art_title,c.member_name');
	   	return parent::get_list($parame,$page,$limit,TRUE);
	}
	

	public function get_row_patch($id){
		$this->db->from("{$this->table} a");
		$this->db->join('cms_article b','b.art_id=a.cmt_aid','left');
		$this->db->join('mem_member c','c.member_id=a.cmt_mid','left');
		$this->db->select('a.*,b.art_title,c.member_name');
		return parent::get_row($id,TRUE);
	}
	
}
