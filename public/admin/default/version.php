<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>系统管理</title>
<link href="<?php echo base_url();?>admin/assets/css/style.css" rel="stylesheet" />
<body>
<div class="toolBox"></div>
<div class="noteBox"><?php if(key($_GET)=='limit') echo '你没有操作此项的权限';?></div>
<table width="100%" cellspacing="0" cellpadding="0" class="textBox">
  <tr>
    <td>浏览器信息：</td>
    <td><?php echo $this->input->user_agent();?></td>
  </tr>
  <tr>
    <td>语言信息：</td>
    <td><?php echo $this->session->userdata('backend_language');?></td>
  </tr>
  <tr>
    <td>PHP版本：</td>
    <td><?php echo PHP_VERSION;?></td>
  </tr>
  <tr>
    <td>Mysql版本：</td>
    <td><?php echo $this->db->version();?></td>
  </tr>
  <tr>
    <td>CodeIgniter版本：</td>
    <td><?php echo CI_VERSION;?></td>
  </tr>
</table>
</body>
</html>
