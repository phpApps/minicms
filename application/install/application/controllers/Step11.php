<?php defined('BASEPATH') OR exit('No direct script access allowed');


header("Pragma:no-cache\r\n");
header("Cache-Control:no-cache\r\n");
header("Expires:0\r\n");


class Step11 extends MY_Controller 
{

	public function index()
	{
		$rmurl = $updateHost."dedecms/demodata.{$s_lang}.txt";
	
		$sql_content = file_get_contents($rmurl);
		$fp = fopen($install_demo_name,'w');
		if(fwrite($fp,$sql_content))
			echo '&nbsp; <font color="green">[√]</font> 存在(您可以选择安装进行体验)';
		else
			echo '&nbsp; <font color="red">[×]</font> 远程获取失败';
		unset($sql_content);
		fclose($fp);
		exit();
	}
	
}
