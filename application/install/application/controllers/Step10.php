<?php defined('BASEPATH') OR exit('No direct script access allowed');


header("Pragma:no-cache\r\n");
header("Cache-Control:no-cache\r\n");
header("Expires:0\r\n");


class Step10 extends MY_Controller 
{

	public function index()
	{
		$res = array();
		$dbhost = $this->input->get('dbhost',TRUE);
		$dbuser = $this->input->get('dbuser',TRUE);
		$dbpwd = $this->input->get('dbpwd',TRUE);
		$dbname = $this->input->get('dbname',TRUE);
		$conn = @mysql_connect($dbhost,$dbuser,$dbpwd);
		if($conn == FALSE){
			$res['conn'] = "<font color='red'>数据库连接失败！</font>";
			$res['condb'] = "<font color='red'>数据库连接失败！</font>";	
		}
		else{
			$res['conn'] = "<font color='green'>信息正确！</font>";
			if(empty($dbname)){
				$res['condb'] = "<font color='red'>必须填写！</font>";
			}else{
				$condb = mysql_select_db($dbname,$conn);
				if($condb){
					$res['condb'] = "<font color='red'>数据库已经存在，系统将覆盖数据库！</font>";
				}else{
					$res['condb'] = "<font color='green'>数据库不存在,系统将自动创建！</font>";
				}
			}
		}
		@mysql_close($conn);
		die(json_encode($res));
	}
	
}
