<?php


//不四舍五入保留小数位
if ( !function_exists( 'abort_bits' ) ) {
    function abort_bits( $float, $bits ) {
        if($bits>0){
            $s = 0;
            $e = 0;
            $arr = explode('.',$float);
            if(isset($arr[0])){
                $s = $arr[0];
            }
            if(isset($arr[1])){
                $d = $arr[1];
                $len = strlen($d);
                if($len>=$bits){
                    $e = substr($d,0,$bits);
                }else{
                    $e = $d.str_repeat('0',$bits-$len);
                }
            }
            return $s.'.'.$e; 
        }else{
            return intval($float);
        }
    }
}



//获取小数位的长度
if ( !function_exists( 'bits_length' ) ) {
    function bits_length( $float ) {
        $count = 0;
        $temp = explode( '.', $float );
        if ( sizeof( $temp ) > 1 ) {
            $decimal = end( $temp );
            $count = strlen( $decimal );
        }
        return $count;
    }

}