<?php
if ( !defined( 'BASEPATH' ) )exit( 'No direct script access allowed' );


// 第三方登录资料表


class Plug_login_model extends MY_Model {

	function __construct() {
		parent::__construct();
		$this->table = 'plug_login';
		$this->autoid = 'login_id';
		$this->sort = 'desc';
	}

	function save_config( $data = array() ) {
		write_file( MODUPATH . 'plugins/config/cfg_plug_login.php', array_to_cache( 'aliyun', $data ) );
	}


}