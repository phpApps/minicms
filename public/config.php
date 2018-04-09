<?php

//公共包路径
define( 'MODUPATH', dirname(__DIR__).DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR );


/*
 * 项目环境常量
 *
 *     development
 *     niubit_local
 *     amazon_test
 *     amazon_aws
 *
 */
define( 'ENV_WEBSITE', 'development' );


/*
 * 项目状态常量
 *
 *     enabled
 *     disabled
 *     upgrade
 *
 */
define( 'APP_WWW_STATUS', 'enabled' );
define( 'APP_ADMIN_STATUS', 'enabled' );



define( 'HOSTNAME', 'localhost' );
define( 'USERNAME', 'root' );
define( 'PASSWORD', 'furong3366' );
define( 'DATABASE', 'cms_eoscms' );
define( 'DBDRIVER', 'mysqli' );
define( 'DBPREFIX', 'mi_' );
