<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class MY_Form_validation extends CI_Form_validation
{

	
	public function __construct( $rules = array() )
	{	
		parent::__construct( $rules );
	}
	

	
	public function set_error_delimiters($prefix = '<span class="red">', $suffix = '</span>')
	{
		return parent::set_error_delimiters($prefix, $suffix);
	}
	
	
	
	// 验证验证码
	public function valid_code($str)
	{
		$CI = &get_instance();
		if (strtolower($str) != strtolower($CI->session->userdata('captcha'))){
					return FALSE;
		}
		$CI->session->unset_userdata('captcha');
		return TRUE;
	}
	
	
	// 验证中文和英文无空格字符
	public function valid_letter_chinese_nospace($str)
	{
		$regex = "/^([a-zA-Z\']|[\x{4e00}-\x{9fa5}])+$/u";
		if ( ! preg_match($regex, $str)){		
			
			return FALSE;
		}
		return  TRUE;	
	}
	
	// 验证中文和英文字符
	public function valid_letter_chinese($str)
	{
		$regex = "/^([a-zA-Z\ \']|[\x{4e00}-\x{9fa5}])+$/u";
		if ( ! preg_match($regex, $str)){		
			
			return FALSE;
		}
		return  TRUE;	
	}
	
	//验证英文字符
	public function valid_letter_english($str)
	{
		$regex = "/^([a-zA-Z\ \'])+$/u";
		if ( ! preg_match($regex, $str)){
		
			return FALSE;
		}
		return  TRUE;
	}
	
	
	// 验证日期
	public function valid_date($str)
	{
		$regex="/d{4}-d{2}-d{2}/";
		if ( ! preg_match($regex, $str)){		
			return FALSE;
		}
		return  TRUE;
	}
	
	
	// 验证电话号码
	public function valid_phone($str)
	{
		$regex = "/^([0-9\ \/\+\-\'])+$/u";
		if ( ! preg_match($regex, $str)){
			return FALSE;
		}
		return  TRUE;
	}
	
	
	// 验证日期时间
	public function valid_datetime($str)
	{
		$regex="/^((((1[6-9]|[2-9]d)d{2})-(0?[13578]|1[02])-(0?[1-9]|[12]d|3[01]))|(((1[6-9]|[2-9]d)d{2})-(0?[13456789]|1[012])-(0?[1-9]|[12]d|30))|(((1[6-9]|[2-9]d)d{2})-0?2-(0?[1-9]|1d|2[0-8]))|(((1[6-9]|[2-9]d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))-0?2-29-)) (20|21|22|23|[0-1]?d):[0-5]?d:[0-5]?d$/";
		if ( ! preg_match($regex, $str)){		
			return FALSE;
		}
		return  TRUE;
	}
	
	
	
	
	
	// 验证URL
	public function  valid_url($str)
	{
		$str = prep_url($str);
		$regex = "/^([http|https|ftp]:\/\/)+(\\w+(-\\w+)*)(\\.(\\w+(-\\w+)*))*(\\?\\S*)?/";
		if ( ! preg_match($regex, $str)){
			return FALSE;
		}
		return  TRUE;
	}
	
	
	
}