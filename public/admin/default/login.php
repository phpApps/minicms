<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?php echo setting_item('backend_title',FALSE)?></title>
<link href="<?php echo base_url();?>template/default/assets/css/style.css" rel="stylesheet" />
<style>
body {
	background:url(data:image/jpg;base64,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);
}
.formlogin {
	width:50%;
	max-width:420px;
	min-width:300px;
	background:#fff;
	padding:40px;
	margin:10% auto;
	border-radius:3px;
	box-shadow:0 5px 30px rgba(0, 0, 0, .2);
}
.formlogin .logo {
	text-align:center;
	font-weight:bold;
	font-size:24px;
	margin-bottom:20px;
}
.formlogin .note span {
	display:block;
	background:#DFF0D8;
	padding:8px;
}
.formlogin table .login {
	border:1px solid #ccc;
	border-bottom:none;
}
.formlogin table .password {
	border:1px solid #ccc;
}
.formlogin table .captcha {
	border:1px solid #ccc;
}
.formlogin table input {
	border:none;
	padding:8px;
}
.formlogin table button {
	background: #5cb85c;
	border:1px solid #4cae4c;
	padding: 8px 12px;
	border-radius:3px;
	cursor:pointer;
	color: #fff;
}
.formlogin table button:hover {
	background: #449d44;
	border-color: #398439;
}
</style>
</head>
<body>
<form method="post" class="formlogin" target="_top">
  <div class="logo"><?php echo setting_item('backend_name',FALSE)?></div>
  <div class="note"><?php if(form_error('admin_login')) echo form_error('admin_login','<span>','</span>');
		  elseif(form_error('admin_login')) echo form_error('admin_password','<span>','</span>');
		  elseif(form_error('admin_login')) echo form_error('captcha','<span>','</span>');
		  elseif(!empty($msg)) echo "<span>{$msg}</span>";?>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" style="margin-top:20px;">
    <tr>
      <td class="login"><input name="admin_login" type="text" class="ws100" value="<?php echo set_value('login'); ?>" placeholder="用户名" /></td>
    </tr>
    <tr>
      <td class="password"><input name="admin_password" type="password" class="ws100" value="<?php echo set_value('password'); ?>" placeholder="密码" /></td>
    </tr>
  </table>
  <table width="100%" cellspacing="0" cellpadding="0" style="margin-top:20px;">
    <tr>
      <td class="captcha"><input name="captcha" type="text" class="ws100" placeholder="验证码" /></td>
      <td class="ws50" align="right"><img src="<?php echo site_url('admin/plugin/captcha?').time()?>" /></td>
    </tr>
  </table>
  <table cellpadding="0" cellspacing="0" width="100%" style="margin-top:20px;">
    <tr>
      <td><button type="submit" class="ws100">提交</button></td>
    </tr>
  </table>
</form>
</body>
</html>
