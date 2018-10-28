<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="<?php echo base_url();?>admin/assets/css/style.css" rel="stylesheet" />
<script src="<?php echo base_url();?>plugin/jquery/jquery-3.0.0.min.js"></script>
<script src="<?php echo base_url();?>admin/assets/js/script.js"></script>
</head>
<body style="padding-bottom:300px;">
<div class="toolBox">
  <button type="button">缓存</button>
</div>
<div class="noteBox">
  <?php if(isset($msg)) echo $msg;?>
</div>
<form method="post">
  <table width="100%" cellspacing="0" cellpadding="5" class="formBox">
    <tbody>
      <tr>
        <td>系统配置</td>
        <td><input type="checkbox" name="cache_model[]" checked="checked" value="update_sys_setting_cache" /></td>
      </tr>
      <tr>
        <td>语言列表</td>
        <td><input type="checkbox" name="cache_model[]" checked="checked" value="update_sys_language_cache" /></td>
      </tr>
      <tr>
        <td>权限列表</td>
        <td><input type="checkbox" name="cache_model[]" checked="checked" value="update_sys_options_cache" /></td>
      </tr>
      <tr>
        <td>用户角色</td>
        <td><input type="checkbox" name="cache_model[]" checked="checked" value="update_sys_roles_cache" /></td>
      </tr>
      <tr>
        <td></td>
        <td><button type="submit" style="height:30px; margin-top:15px;">更新缓存</button></td>
      </tr>
    </tbody>
  </table>
</form>
</body>
</html>
