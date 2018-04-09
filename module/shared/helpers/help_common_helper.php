<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



// ------------------------------------------------------------------------






// -------------------------------------------------------------------------------//

/**
 * 前台网站配置[index_page]
 *
 * @access  public
 * @param   string
 * @return  string
 */

if( ! function_exists('config_index_page'))
{
	function config_index_page($folder = '') 
	{
		if(empty($folder)){
			$config_file = WEBSITE_PATH.'application'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php';
		}else{
			$folder = str_replace('/',DIRECTORY_SEPARATOR,$folder);
			$config_file = ROOT_PATH.$folder.DIRECTORY_SEPARATOR.'application'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php';
		}
		if( file_exists( $config_file ) ){
			include( $config_file);
			if( isset( $config['index_page'] ) ){
				return $config['index_page'];
			}
			show_error('The configuration item[index_php] does not exist');	
		}
		show_error('The front site config.php file does not exist');	
	}
}





// -------------------------------------------------------------------------------//

/**
 * 后台获取ROOT链接
 *
 * @access  public
 * @param   string
 * @return  string
 */

if( ! function_exists('root_base_url'))
{
	function root_base_url($uri = '')
	{
		$str = substr(FCPATH,strlen(ROOT_PATH));
		$str = str_replace('\\','/',$str);
		$str = trim($str,'/');
		$base_url = trim(base_url(),'/');
		$base_url = substr($base_url,0,-strlen($str));
		return rtrim($base_url,'/').'/'.ltrim($uri,'/').'/';
	}
}


/**
 * 后台获取上层链接
 *
 * @access  public
 * @param   string
 * @return  string
 */








// -------------------------------------------------------------------------------//

/**
 * 根据语言输出配置项
 *
 * @access  public
 * @param   string  配置项
 * @param   boolean 是前台配置
 * @return  string
 */
 
if( ! function_exists('lang_config_item'))
{
	function lang_config_item($name = '', $site_language = TRUE)
	{
		$ci = get_instance();
		if($site_language){
			$lang = $ci->session->userdata('site_language');
		}else{
			$lang = $ci->session->userdata('backend_language');
		}
		$data = config_item($name);
		if(is_array($data) && array_key_exists($lang,$data)){
			return $data[$lang];
		}
		return $data;
	}
}


/**
 * 根据语言输出设置项
 *
 * @access  public
 * @param   string  设置项
 * @param   boolean 是前台配置
 * @return  string
 */
 
if( ! function_exists('setting_item'))
{
	function setting_item($key = '', $site_language = TRUE)
	{
		$setting = lang_config_item('setting',$site_language);
		if(isset($setting[$key])){
			return $setting[$key];
		}
		return;
	}
}









/**
 * 前台解析内容输出
 *
 * @access  public
 * @param   string
 * @return  string
 */
 
if( ! function_exists('front_parse_html'))
{
	function front_parse_html($html = NULL)
	{
		$html = str_replace('{site_url}',site_url(),$html);
		$html = str_replace('{base_url}',rtrim(base_url(),'/'),$html);
		return $html;
	}
}


// -------------------------------------------------------------------------------//

/**
 * 创建文件夹
 *
 * @access  private
 * @param   string
 * @return  string
 */

if ( ! function_exists('make_dir'))
{
	function make_dir($path)
	{	
		if(is_dir($path)){
			return TRUE;
		}
		$paths = explode(DIRECTORY_SEPARATOR,$path);
		if( empty($paths) ){
			return file_exists($path);
		}
		$dir = NULL;
		foreach($paths as $key => $val){
			$dir .= $val.DIRECTORY_SEPARATOR;
			! file_exists($dir) AND ! empty($dir) AND @mkdir($dir,0755);
		}	
	}
}






// ------------------------------------------------------------------------

/* End of file common_helper.php */
/* Location: ./shared/heleprs/common_helper.php */
