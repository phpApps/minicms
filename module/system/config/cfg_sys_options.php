<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$config['options']=array (
  1 => 
  array (
    'option_id' => '1',
    'option_name' => '系统管理',
    'option_folder' => '',
    'option_value' => 'system/welcome',
    'option_ismenu' => '1',
    'children' => 
    array (
      0 => 
      array (
        'option_id' => '2',
        'option_name' => '用户设置',
        'option_folder' => '',
        'option_value' => '',
        'option_ismenu' => '1',
        'children' => 
        array (
          0 => 
          array (
            'option_id' => '4',
            'option_name' => '权限列表',
            'option_folder' => '',
            'option_value' => 'system/sys_option',
            'option_ismenu' => '1',
          ),
          1 => 
          array (
            'option_id' => '5',
            'option_name' => '用户角色',
            'option_folder' => '',
            'option_value' => 'system/sys_role',
            'option_ismenu' => '1',
          ),
          2 => 
          array (
            'option_id' => '6',
            'option_name' => '用户列表',
            'option_folder' => '',
            'option_value' => 'system/sys_admin',
            'option_ismenu' => '1',
          ),
          3 => 
          array (
            'option_id' => '7',
            'option_name' => '修改资料',
            'option_folder' => '',
            'option_value' => 'system/sys_profile',
            'option_ismenu' => '1',
          ),
        ),
      ),
      1 => 
      array (
        'option_id' => '3',
        'option_name' => '系统设置',
        'option_folder' => '',
        'option_value' => '',
        'option_ismenu' => '1',
        'children' => 
        array (
          0 => 
          array (
            'option_id' => '8',
            'option_name' => '系统配置',
            'option_folder' => '',
            'option_value' => 'system/sys_setting',
            'option_ismenu' => '1',
          ),
          1 => 
          array (
            'option_id' => '9',
            'option_name' => '语言列表',
            'option_folder' => '',
            'option_value' => 'system/sys_language',
            'option_ismenu' => '1',
          ),
          2 => 
          array (
            'option_id' => '10',
            'option_name' => '更新缓存',
            'option_folder' => '',
            'option_value' => 'system/sys_cache',
            'option_ismenu' => '1',
          ),
        ),
      ),
    ),
  ),
  11 => 
  array (
    'option_id' => '11',
    'option_name' => 'CMS管理',
    'option_folder' => '',
    'option_value' => 'content/welcome',
    'option_ismenu' => '1',
    'children' => 
    array (
      0 => 
      array (
        'option_id' => '13',
        'option_name' => '网站管理',
        'option_folder' => '',
        'option_value' => 'content/cms_nav1',
        'option_ismenu' => '1',
        'children' => 
        array (
          0 => 
          array (
            'option_id' => '16',
            'option_name' => '站点配置',
            'option_folder' => '',
            'option_value' => 'content/cms_setting',
            'option_ismenu' => '1',
          ),
          1 => 
          array (
            'option_id' => '17',
            'option_name' => '菜单管理',
            'option_folder' => '',
            'option_value' => 'content/cms_menu',
            'option_ismenu' => '1',
          ),
          2 => 
          array (
            'option_id' => '18',
            'option_name' => '文章管理',
            'option_folder' => '',
            'option_value' => 'content/cms_article',
            'option_ismenu' => '1',
          ),
          3 => 
          array (
            'option_id' => '19',
            'option_name' => '评论管理',
            'option_folder' => 'website',
            'option_value' => 'content/cms_comment',
            'option_ismenu' => '1',
          ),
          4 => 
          array (
            'option_id' => '20',
            'option_name' => '更新缓存',
            'option_folder' => '',
            'option_value' => 'content/cms_cache',
            'option_ismenu' => '1',
          ),
        ),
      ),
      1 => 
      array (
        'option_id' => '14',
        'option_name' => '模板管理',
        'option_folder' => '',
        'option_value' => 'content/cms_nav2',
        'option_ismenu' => '1',
        'children' => 
        array (
          0 => 
          array (
            'option_id' => '21',
            'option_name' => '模块列表',
            'option_folder' => '',
            'option_value' => 'content/cms_block',
            'option_ismenu' => '1',
          ),
          1 => 
          array (
            'option_id' => '22',
            'option_name' => '标签列表',
            'option_folder' => '',
            'option_value' => 'content/cms_label/index/tag_list',
            'option_ismenu' => '1',
          ),
          2 => 
          array (
            'option_id' => '23',
            'option_name' => '友情链接',
            'option_folder' => '',
            'option_value' => 'content/cms_label/index/friend_link',
            'option_ismenu' => '1',
          ),
          3 => 
          array (
            'option_id' => '24',
            'option_name' => '幻灯片列表',
            'option_folder' => '',
            'option_value' => 'content/cms_label/index/banner_slide',
            'option_ismenu' => '1',
          ),
          4 => 
          array (
            'option_id' => '25',
            'option_name' => 'Banner图片',
            'option_folder' => '',
            'option_value' => 'content/cms_label/index/banner_img',
            'option_ismenu' => '1',
          ),
        ),
      ),
      2 => 
      array (
        'option_id' => '15',
        'option_name' => '表单管理',
        'option_folder' => '',
        'option_value' => 'content/cms_nav3',
        'option_ismenu' => '1',
        'children' => 
        array (
          0 => 
          array (
            'option_id' => '26',
            'option_name' => '在线留言',
            'option_folder' => '',
            'option_value' => 'content/cms_message',
            'option_ismenu' => '1',
          ),
        ),
      ),
    ),
  ),
  27 => 
  array (
    'option_id' => '27',
    'option_name' => '用户中心',
    'option_folder' => '',
    'option_value' => 'users/welcome',
    'option_ismenu' => '1',
    'children' => 
    array (
      0 => 
      array (
        'option_id' => '28',
        'option_name' => '用户管理',
        'option_folder' => '',
        'option_value' => 'users/mem_nav',
        'option_ismenu' => '1',
        'children' => 
        array (
          0 => 
          array (
            'option_id' => '29',
            'option_name' => '会员资料',
            'option_folder' => '',
            'option_value' => 'users/mem_member',
            'option_ismenu' => '1',
          ),
        ),
      ),
    ),
  ),
  30 => 
  array (
    'option_id' => '30',
    'option_name' => '插件管理',
    'option_folder' => 'plugin',
    'option_value' => 'welcome',
    'option_ismenu' => '1',
    'children' => 
    array (
      0 => 
      array (
        'option_id' => '31',
        'option_name' => '通讯配置',
        'option_folder' => '',
        'option_value' => 'tp_nav1',
        'option_ismenu' => '1',
        'children' => 
        array (
          0 => 
          array (
            'option_id' => '32',
            'option_name' => '阿里云短信',
            'option_folder' => '',
            'option_value' => 'plugins/caliyun/alsms',
            'option_ismenu' => '1',
          ),
          1 => 
          array (
            'option_id' => '33',
            'option_name' => '阿里云邮箱',
            'option_folder' => '',
            'option_value' => 'plugins/caliyun/alemail',
            'option_ismenu' => '1',
          ),
        ),
      ),
      1 => 
      array (
        'option_id' => '34',
        'option_name' => '快捷登录',
        'option_folder' => '',
        'option_value' => 'tp_nav2',
        'option_ismenu' => '1',
        'children' => 
        array (
          0 => 
          array (
            'option_id' => '35',
            'option_name' => 'facebook登录',
            'option_folder' => '',
            'option_value' => 'plugins/plug_login/fb_login',
            'option_ismenu' => '1',
          ),
          1 => 
          array (
            'option_id' => '36',
            'option_name' => 'twitter登录',
            'option_folder' => '',
            'option_value' => 'plugins/plug_login/tw_login',
            'option_ismenu' => '1',
          ),
		  2 => 
          array (
            'option_id' => '37',
            'option_name' => 'QQ登录',
            'option_folder' => '',
            'option_value' => 'plugins/plug_login/qq_login',
            'option_ismenu' => '1',
          ),
        ),
      ),
    ),
  ),
);