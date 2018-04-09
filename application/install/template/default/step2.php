<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>安装程序 - OS内容管理系统</title>
<link href="<?php echo base_url();?>template/default/assets/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="top">
  <div class="top-logo"><h1>OS内容管理系统</h1></div>
  <div class="top-link">
    <ul>
      <li><a href="http://www.oscms.cn" target="_blank">官方网站</a></li>
      <li><a href="http://help.oscms.cn" target="_blank">帮助</a></li>
    </ul>
  </div>
  <div class="top-version"> 
    <h2><?php echo $ver_msg; ?></h2>
  </div>
</div>
<div class="main">
  <div class="pleft">
    <dl class="setpbox t1">
      <dt>安装步骤</dt>
      <dd>
        <ul>
          <li class="succeed">许可协议</li>
          <li class="now">环境检测</li>
          <li>参数配置</li>
          <li>正在安装</li>
          <li>安装完成</li>
        </ul>
      </dd>
    </dl>
  </div>
  <div class="pright">
    <div class="pr-title">
      <h3>服务器信息</h3>
    </div>
    <table width="726" border="0" align="center" cellpadding="0" cellspacing="0" class="twbox">
      <tr>
        <th width="300" align="center"><strong>参数</strong></th>
        <th width="424"><strong>值</strong></th>
      </tr>
      <tr>
        <td><strong>服务器域名</strong></td>
        <td><?php echo $_SERVER['SERVER_NAME']; ?></td>
      </tr>
      <tr>
        <td><strong>服务器操作系统</strong></td>
        <td><?php echo PHP_OS; ?></td>
      </tr>
      <tr>
        <td><strong>服务器解译引擎</strong></td>
        <td><?php echo $_SERVER['SERVER_SOFTWARE']; ?></td>
      </tr>
      <tr>
        <td><strong>PHP版本</strong></td>
        <td><?php echo phpversion(); ?></td>
      </tr>
      <tr>
        <td><strong>系统安装目录</strong></td>
        <td><?php echo ROOT_PATH; ?></td>
      </tr>
    </table>
    <div class="pr-title">
      <h3>系统环境检测</h3>
    </div>
    <div style="padding:2px 8px 0px; line-height:33px; height:23px; overflow:hidden; color:#666;"> 系统环境要求必须满足下列所有条件，否则系统或系统部份功能将无法使用。 </div>
    <table width="726" border="0" align="center" cellpadding="0" cellspacing="0" class="twbox">
      <tr>
        <th width="200" align="center"><strong>需开启的变量或函数</strong></th>
        <th width="80"><strong>要求</strong></th>
        <th width="400"><strong>实际状态及建议</strong></th>
      </tr>
      <tr>
        <td>allow_url_fopen</td>
        <td align="center">On </td>
        <td><?php if(ini_get('allow_url_fopen')):?>
          <font color=green>[√]On</font>
          <?php else:?>
          <font color=red>[×]Off</font>
          <?php endif;?>
          <small>(不符合要求将导致采集、远程资料本地化等功能无法应用)</small></td>
      </tr>
      <tr>
        <td>safe_mode</td>
        <td align="center">Off</td>
        <td><?php if(ini_get('safe_mode')):?>
          <font color=red>[×]On</font>
          <?php else:?>
          <font color=green>[√]Off</font>
          <?php endif;?>
          <small>(本系统不支持在<span class="STYLE2">非win主机的安全模式</span>下运行)</small></td>
      </tr>
      <tr>
        <td>GD 支持 </td>
        <td align="center">On</td>
        <td><?php if(gdversion() > 0 ):?>
          <font color=green>[√]On</font>
          <?php else:?>
          <font color=red>[×]Off</font>
          <?php endif;?>
          <small>(不支持将导致与图片相关的大多数功能无法使用或引发警告)</small></td>
      </tr>
      <tr>
        <td>MySQL 支持</td>
        <td align="center">On</td>
        <td><?php if( function_exists('mysql_connect') ):?>
          <font color=green>[√]On</font>
          <?php else:?>
          <font color=red>[×]Off</font>
          <?php endif;?>
          <small>(不支持无法使用本系统)</small></td>
      </tr>
    </table>
    <div class="pr-title">
      <h3>目录权限检测</h3>
    </div>
    <div style="padding:2px 8px 0px; line-height:33px; height:23px; overflow:hidden; color:#666;"> 系统要求必须满足下列所有的目录权限全部可读写的需求才能使用，其它应用目录可安装后在管理后台检测。 </div>
    <table width="726" border="0" align="center" cellpadding="0" cellspacing="0" class="twbox">
      <tr>
        <th width="300" align="center"><strong>目录名</strong></th>
        <th width="212"><strong>读取权限</strong></th>
        <th width="212"><strong>写入权限</strong></th>
      </tr>
      <?php foreach($sp_testdirs as $d):?>
      <tr>
        <td><?php echo $d; ?></td>
        <?php $fulld = ROOT_PATH.str_replace('/*','',$d);
				$rsta = (is_readable($fulld) ? '<font color=green>[√]读</font>' : '<font color=red>[×]读</font>');
	    		$wsta = (TestWrite($fulld) ? '<font color=green>[√]写</font>' : '<font color=red>[×]写</font>');
	    		echo "<td>$rsta</td><td>$wsta</td>\r\n";
      ?>
      </tr>
      <?php endforeach;?>
    </table>
    <div class="btn-box">
      <form id="step3" method="post" action="<?php echo site_url('step3');?>">
        <input type="hidden" name="step" value="step3" />
        <input type="button" class="btn-back" value="后退" onclick="window.history.back(-1);" />
        <input type="button" class="btn-next" value="继续" onclick="document.getElementById('step3').submit();" />
      </form>
    </div>
  </div>
</div>
<div class="foot"> </div>
</body>
</html>
