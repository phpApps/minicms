<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>安装程序 - OS内容管理系统</title>
<link href="<?php echo base_url();?>template/default/assets/css/style.css" rel="stylesheet" />
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
          <li class="succeed">环境检测</li>
          <li class="succeed">参数配置</li>
          <li class="succeed">正在安装</li>
          <li class="now">安装完成</li>
        </ul>
      </dd>
    </dl>
  </div>
  <div class="pright">
    <div class="pr-title">
      <h3>安装完成</h3>
    </div>
    <div class="install-msg"> 恭喜您!已成功安装OS内容管理系统.您现在可以: </div>
    <div class="over-link fs-14"> <a href="<?php echo base_url();?>" target="_top">访问网站首页</a> <a href="<?php echo base_url('admin.php');?>" target="_top">登录网站后台</a> </div>
    <br />
    <div class="install-msg"> 访问OSCMS网站:<br />
    </div>
    <div class="over-link"> <a href="http://www.oscms.cn" target="_blank">OSCMS官方网站</a></div>
  </div>
</div>
<div class="foot"> </div>
</body>
</html>
