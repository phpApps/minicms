<?php


// 时间戳差转天小时分钟秒
if ( !function_exists( 'format_seconds' ) ) {
    function format_seconds( $sec ) {
        $days = floor( $sec / ( 24 * 3600 ) );
        $sec = $sec % ( 24 * 3600 );
        $hours = floor( $sec / 3600 );
        $remainSeconds = $sec % 3600;
        $minutes = floor( $remainSeconds / 60 );
        $seconds = intval( $sec - $hours * 3600 - $minutes * 60 );
        if ( $days < 1 ) {
            $days = '';
        } else {
            $days = $days . 'day';
        }
        if ( strlen( $hours ) < 2 ) {
            $hours = '0' . $hours;
        }
        if ( strlen( $minutes ) < 2 ) {
            $minutes = '0' . $minutes;
        }
        if ( strlen( $seconds ) < 2 ) {
            $seconds = '0' . $seconds;
        }
        return $days . ' ' . $hours . ':' . $minutes . ':' . $seconds;
    }
}