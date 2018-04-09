<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Step4 extends MY_Controller 
{

	public function index()
	{
		if(empty($_POST)){
			return redirect(site_url('step3'));
		}
		$modules = $this->input->post('modules',TRUE);
		$dbhost = $this->input->post('dbhost',TRUE);
		$dbuser = $this->input->post('dbuser',TRUE);
		$dbpwd = $this->input->post('dbpwd',TRUE);
		$dbdriver = $this->input->post('dbdriver',TRUE);
		$dbprefix = $this->input->post('dbprefix',TRUE);
		$dbname = $this->input->post('dbname',TRUE);
		$dblang = $this->input->post('dblang',TRUE);
		
		$adminuser = $this->input->post('adminuser',TRUE);
		$adminpwd = $this->input->post('adminpwd',TRUE);
		$webname = $this->input->post('webname',TRUE);
		$baseurl = $this->input->post('baseurl',TRUE);
		$installdemo = $this->input->post('installdemo',TRUE);
		
		
		$conn = mysql_connect($dbhost,$dbuser,$dbpwd) or die("<script>alert('数据库服务器或登录密码无效，\\n\\n无法连接数据库，请重新设定！');history.go(-1);</script>");
		mysql_query("CREATE DATABASE IF NOT EXISTS `".$dbname."`;",$conn);
		mysql_select_db($dbname) or die("<script>alert('选择数据库失败，可能是你没权限，请预先创建一个数据库！');history.go(-1);</script>");
		mysql_query("SET NAMES '$dblang',character_set_client=binary,sql_mode='';",$conn);
	
		//数据库配置
		$configstr = file_get_contents(ROOT_PATH."constant.php");
		$configstr = preg_replace('/\f+/','',$configstr);
		preg_match_all("/define\(['|\"](.*?)['|\"],(.*?)\);/", $configstr, $res);
		if(count($res)==3){
			foreach($res[1] as $num=>$val){
				$str = NULL;
				if($val=='HOSTNAME'){
					$str = "define('HOSTNAME','{$dbhost}');";
				}
				elseif($val=='USERNAME'){
					$str = "define('USERNAME','{$dbuser}');";
				}
				elseif($val=='PASSWORD'){
					$str = "define('PASSWORD','{$dbpwd}');";
				}
				elseif($val=='DATABASE'){
					$str = "define('DATABASE','{$dbname}');";
				}
				elseif($val=='DBDRIVER'){
					$str = "define('DBDRIVER','{$dbdriver}');";
				}
				elseif($val=='DBPREFIX'){
					$str = "define('DBPREFIX','{$dbprefix}');";
				}
				if(!empty($str)){
					$configstr = str_replace($res[0][$num],$str,$configstr);
				}
			}
		}
		file_put_contents(ROOT_PATH."constant.php",$configstr);
	  
		//创建数据表
	  	$sql = file_get_contents(FCPATH."template/mysql/sys.sql");
		$sql = str_replace('{$admin_login}',$adminuser,$sql);
		$sql = str_replace('{$admin_name}',$adminuser,$sql);
		$sql = str_replace('{$admin_password}',md5($adminpwd),$sql);
		
		$sql = str_replace('{$backend_name}',$webname,$sql);
		$sql = str_replace('{$backend_title}',$webname,$sql);
		
			
		$arr = $this->decode_sql($sql,$dbprefix);
		foreach($arr as $val){
			mysql_query($val,$conn);
		}
		
		//创建模块列表
		if(is_array($modules)){
			foreach($modules as $name){
				$sql = file_get_contents(FCPATH."template/mysql/{$name}.sql");
				if(!empty($sql)){
					if(strtolower($name)=='cms'){
						$sql = str_replace('{$site_name}',$webname,$sql);
						$sql = str_replace('{$site_title}',$webname,$sql);
						$sql = str_replace('{$site_domain}',$baseurl,$sql);
					}
					if(strtolower($name)=='mem'){
						$sql = str_replace('{$member_login}',$adminuser,$sql);
						$sql = str_replace('{$member_name}',$adminuser,$sql);
						$sql = str_replace('{$member_password}',md5($adminpwd),$sql);
					}
				}
				$arr = $this->decode_sql($sql,$dbprefix);
				foreach($arr as $val){
					mysql_query($val,$conn);
				}
			}
		}

		//导入默认数据
	

		return $this->load_view('step4');
	}
	
	
	
	private function decode_sql($str='',$dbprefix='')
	{	
		$str = str_replace('{~dbprefix~}',$dbprefix,$str);
		$str = preg_replace('/\/\*.*?\*\//i','',$str);
		$str = str_replace("\r","\n",$str);
		$str = preg_replace('/\n+/',"\n",$str);
		$str = trim($str,"\n");
		$str = trim($str,';');
		$arr = explode(";\n",$str);
		return $arr;
	}
	
	
	


	
}
