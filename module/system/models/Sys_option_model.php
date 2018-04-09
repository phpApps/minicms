<?php
if ( !defined( 'BASEPATH' ) )exit( 'No direct script access allowed' );


// 权限项列表


class Sys_option_model extends MY_Model {

	public
	function __construct() {
		parent::__construct();
		$this->table = 'sys_option';
		$this->autoid = 'option_id';
	}


	public //获取权限项列表
	function get_options() {
		$this->db->order_by( 'option_sort', 'asc' );
		$this->db->order_by( 'option_pid', 'asc' );
		$result = parent::get_list();
		return self::create_options( $result );
	}

	private
	function create_options( $result, $pid = 0 ) {
		$menu = array();
		foreach ( $result as $row ) {
			if ( $row[ 'option_pid' ] == $pid ) {
				$row[ 'children' ] = self::create_options( $result, $row[ 'option_id' ] );
				$menu[] = $row;
			}
		}
		return $menu;
	}


	public //获取下拉框选项
	function select_option( $sid = 0, $mid = 0, $pid = 0 ) {
		$this->db->order_by( 'option_sort', 'asc' );
		$this->db->order_by( 'option_pid', 'asc' );
		$result = parent::get_list();
		return self::create_option( $result, $sid, $mid, $pid );
	}
	
	private
	function create_option( $result, $sid, $mid, $pid, $level = 0 ) {
		$level++;
		$option = NULL;
		foreach ( $result as $row ) {
			if ( $row[ 'option_pid' ] == $pid ) {
				$class = 'class="lv' . ( $level - 1 ) . '"';
				if ( $row[ 'option_id' ] == $sid ) {
					$option .= '<option ' . $class . ' value="' . $row[ 'option_id' ] . '" selected="selected">' . $row[ 'option_name' ] . '</option>';
				} elseif ( $row[ 'option_id' ] == $mid ) {
					$option .= '<option ' . $class . ' value="' . $row[ 'option_id' ] . '" disabled="disabled">' . $row[ 'option_name' ] . '</option>';
				}
				else {
					$option .= '<option ' . $class . ' value="' . $row[ 'option_id' ] . '">' . $row[ 'option_name' ] . '</option>';
				}
				$option .= self::create_option( $result, $sid, $mid, $row[ 'option_id' ], $level );
			}
		}
		return $option;
	}



}