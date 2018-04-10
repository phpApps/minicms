<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


//用户管理


class Sys_admin_model  extends  MY_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->table = 'sys_admin';
		$this->autoid = 'admin_id';
	}

	
	//获取当前项目菜单
	public function get_auth_options( $lv = 0 ) {
		$options = config_item( 'options' );
		return self::create_html_option( $options, $lv );
	}
	public function create_html_option( $result, $lv = 0, $num = 0 ) {
		$html = NULL;
		if ( $result ) {
			$li = NULL;
			foreach ( $result as $item ) {
				$a = NULL;
				$ul = NULL;
				if ( isset( $item[ 'children' ] ) ) {
					if ( $lv == 0 || $lv > $num ) {
						$ul = self::create_html_option( $item[ 'children' ], $lv, $num + 1 );
					}
				}
				if ( empty( $item[ 'option_value' ] ) ) {
					$a = '<a target="iframe_content">' . $item[ 'option_name' ] . '</a>';
				} else {
					if ( $item[ 'option_value' ] ) {
						$a = '<a href="' . site_url( $item[ 'option_value' ] ) . '" target="iframe_content">' . $item[ 'option_name' ] . '</a>';
					}
				}
				if ( $ul || $a ) {
					if ( $lv == 0 || $lv > $num + 1 ) {
						$li .= '<li>' . $a . $ul . '</li>';
					} else {
						$li .= '<li>' . $a . '</li>';
					}
				}
			}
			if($li){
				$html .= '<ul>'.$li.'</ul>';
			}
		}
		return $html;
	}
	
	
	
	//验证权限项
	public function check_option($url=NULL)
	{
		$admin_id = $this->session->userdata('admin_id');
		if($admin_id == 1) return TRUE;
		
		$role_id = $this->session->userdata('admin_roleid');
		$roles = config_item('roles');
		if(isset($roles[$role_id])){
			$option = $roles[$role_id]['role_value'];
			if(! empty($url)){
				if(in_array($url,$option)) return TRUE;
			}else{
				$class = $this->router->class;
				$method = $this->router->method;
				if(in_array($class,$option)) return TRUE;
				if(in_array($class.'/'.$method,$option)) return TRUE;
				if(in_array($class.'/index/'.$this->uri->segment(3),$option)) return TRUE;
			}
			
		}
		return FALSE;
	}

	



}
