<?php


//文本中间字符串以*隐藏
if ( !function_exists( 'hide_text' ) ) {
    function hide_text( $str, $sl = 1, $el = 1 ,$len = false) {
        $strlen = mb_strlen( $str, 'utf-8' );
        $firstStr = mb_substr( $str, 0, $sl, 'utf-8' );
        $lastStr = mb_substr( $str, -$el, $el, 'utf-8' );
        $numlen = $len ? $strlen - 1 : 3;
        return $strlen > 2 ? $firstStr . str_repeat( '*', $numlen ). $lastStr : $firstStr . str_repeat( "*", 2 ) . $lastStr;
    }
}

//姓名中间字符串以*隐藏
if ( !function_exists( 'hide_name' ) ) {
    function hide_name( $str ) {
        $strlen = mb_strlen( $str, 'utf-8' );
        $firstStr = mb_substr( $str, 0, 1, 'utf-8' );
        $lastStr = mb_substr( $str, -1, 1, 'utf-8' );
        return $strlen == 2 ? $firstStr . str_repeat( '*', $strlen  - 1 ). $lastStr : $firstStr . str_repeat( "*", $strlen - 2 ) . $lastStr;
    }
}

//用户名、邮箱、手机账号中间字符串以*隐藏
if ( !function_exists( 'hide_star' ) ) {
    function hide_star( $str ) {
        $rs = null;
        if ( strpos( $str, '@' ) ) {
            $email_array = explode( "@", $str );
            $prevfix = ( strlen( $email_array[ 0 ] ) < 4 ) ? "" : mb_substr( $str, 0, 3, 'utf-8' ); //邮箱前缀
            $count = 0;
            $str = preg_replace( '/.*?@/', '***@', $str, -1, $count );
            $rs = $prevfix . $str;
        } else {
            $pattern = '/(1[3458]{1}[0-9])[0-9]{4}([0-9]{4})/i';
            if ( preg_match( $pattern, $str ) ) {
                $rs = preg_replace( $pattern, '$1****$2', $str );
            } else {
                $rs = mb_substr( $str, 0, 3, 'utf-8' ) . "***" . mb_substr( $str, -2, 2, 'utf-8' );
            }
        }
        return $rs;
    }
}

if ( !function_exists( 'cut_substr' ) ) {
    function cut_substr( $string, $sublen, $start = 0, $end = '', $code = 'UTF-8' ) {
        if ( $code == 'UTF-8' ) {
            $pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
            preg_match_all( $pa, $string, $t_string );

            if ( count( $t_string[ 0 ] ) - $start > $sublen ) return join( '', array_slice( $t_string[ 0 ], $start, $sublen ) ) . $end;
            return join( '', array_slice( $t_string[ 0 ], $start, $sublen ) );
        } else {
            $start = $start * 2;
            $sublen = $sublen * 2;
            $strlen = strlen( $string );
            $tmpstr = '';

            for ( $i = 0; $i < $strlen; $i++ ) {
                if ( $i >= $start && $i < ( $start + $sublen ) ) {
                    if ( ord( substr( $string, $i, 1 ) ) > 129 ) {
                        $tmpstr .= substr( $string, $i, 2 );
                    } else {
                        $tmpstr .= substr( $string, $i, 1 );
                    }
                }
                if ( ord( substr( $string, $i, 1 ) ) > 129 )$i++;
            }
            if ( strlen( $tmpstr ) < $strlen )$tmpstr .= $end;
            return $tmpstr;
        }
    }
}

//只含大写字母和数字
if ( !function_exists( 'random_alpnum' ) ) {
    function random_alpnum( $len = 0, $pool = NULL ) {
        $str = NULL;
        if ( intval( $len ) < 1 ) {
            $len = 4;
        }
        if ( empty( $pool ) ) {
            $pool = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        for ( $i = 0; $i < intval( $len ); $i++ ) {
            $str .= substr( $pool, mt_rand( 0, strlen( $pool ) - 1 ), 1 );
        }
        return $str;
    }
}

/**
 * 将array转换成缓存字符
 *
 * @access	public
 * @param	string
 * @param	array
 * @return	void
 */
if ( ! function_exists('array_to_cache'))
{
	function array_to_cache($name, $array)
	{
		return '<?php if ( ! defined(\'BASEPATH\')) exit(\'No direct script access allowed\');' . PHP_EOL .
			   '$' . $name . '=' . var_export($array, TRUE) . ';';
	}
}