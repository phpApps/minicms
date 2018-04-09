<?php

//按路径依次创建文件夹
if ( !function_exists( 'make_dir' ) ) {
    function make_dir( $path ) {
        if ( is_dir( $path ) ) {
            return TRUE;
        }
        $paths = explode( DIRECTORY_SEPARATOR, $path );
        if ( empty( $paths ) ) {
            return file_exists( $path );
        }
        $dir = NULL;
        foreach ( $paths as $key => $val ) {
            $dir .= $val . DIRECTORY_SEPARATOR;
            !file_exists( $dir )AND!empty( $dir )AND @mkdir( $dir, 0755 );
        }
    }
}

//导出数据Excel
if ( !function_exists( 'create_excel' ) ) {
    function create_excel( $title, $content ) {
        header( "Pragma:public" );
        header( "Expires:0" );
        header( "Cache-Control:must-revalidate,post-check=0,pre-check=0" );
        header( "Content-Type:application/force-download" );
        header( "Content-Type: application/vnd.ms-excel" );
        header( "Content-Type:application/octet-stream" );
        header( "Content-Type:application/download" );
        header( "Content-Disposition: attachment; filename=" . $title . "_" . date( "Y-m-d_His" ) . ".xls" );
        header( "Content-Transfer-Encoding:binary" );
        echo "<html xmlns:o='urn:schemas-microsoft-com:office:office'
					 xmlns:x='urn:schemas-microsoft-com:office:excel'
					 xmlns='http://www.w3.org/TR/REC-html40'>
		 <head>
			<meta http-equiv='expires' content='Mon, 06 Jan 1999 00:00:01 GMT'>
			<meta http-equiv=Content-Type content='text/html; charset=utf-8'>
			 <!--[if gte mso 9]><xml>
			<x:ExcelWorkbook>
		   <x:ExcelWorksheets>
					   <x:ExcelWorksheet>
					   <x:Name></x:Name>
					   <x:WorksheetOptions>
									   <x:DisplayGridlines/>
						</x:WorksheetOptions>
					   </x:ExcelWorksheet>
			 </x:ExcelWorksheets>
			 </x:ExcelWorkbook>
			</xml><![endif]-->
		</head>
		 <body>
		<table>";
        echo $content;
        echo "</table></body></html>";
    }
}

//导出数据TXT 
if ( !function_exists( 'create_txt' ) ) {
    function create_txt( $title, $content ) {
        header( "Content-Type: application/octet-stream" );
        header( "Content-Disposition: attachment; filename=" . $title . "_" . date( "Y-m-d_His" ) . ".txt" );
        echo $content;
    }
}