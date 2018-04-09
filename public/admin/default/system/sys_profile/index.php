<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="<?php echo base_url();?>template/default/assets/css/style.css" rel="stylesheet" />
<script src="<?php echo base_url();?>template/plugin/jquery/jquery-3.0.0.min.js"></script>
<script src="<?php echo base_url();?>template/default/assets/js/script.js"></script>
</head>
<body style="padding-bottom:300px;">
<div class="toolBox">
  <button type="button" onclick="location.href='<?php echo site_url('system/sys_profile')?>'">刷新</button>
</div>
<div class="noteBox">
  <?php if(isset($msg)) echo $msg;?>
</div>
<form method="post">
  <table width="100%" cellspacing="0" cellpadding="5" class="formBox">
    <tbody>
    <tr>
        <td>用户名<span class="red">*</span></td>
        <td><input type="text" name="admin_login" disabled="disabled" value="<?php echo $row['admin_login'];?>" class="ws50"/>
          <?php echo form_error('admin_phone');?></td>
      </tr>  
      <tr>
        <td>手机<span class="red">*</span></td>
        <td><input type="text" name="admin_phone" value="<?php echo set_value('admin_phone',$row['admin_phone']);?>" class="ws50"/>
          <?php echo form_error('admin_phone');?></td>
      </tr>
      <tr>
        <td>登录密码</td>
        <td><input type="password" style="display: none;">
          <input type="password" name="admin_password" autocomplete="off" class="ws50"/>
          <?php echo form_error('admin_password'); ?></td>
      </tr>
      <tr>
        <td>确认密码</td>
        <td><input type="password" name="admin_passwordF" autocomplete="off" class="ws50"/>
          <?php echo form_error('admin_passwordF'); ?></td>
      </tr>
      <tr>
        <td>姓名<span class="red">*</span></td>
        <td><input type="text" name="admin_name" value="<?php echo set_value('admin_name',$row['admin_name']);?>" class="ws50"/>
          <?php echo form_error('admin_name');?></td>
      </tr>
      <tr>
        <td>性别</td>
        <td><input type="text" name="admin_sex"  value="<?php echo set_value('admin_sex',$row['admin_sex']);?>" class="ws50"/>
          <?php echo form_error('admin_sex');?></td>
      </tr>
      <tr>
        <td>生日</td>
        <td><input type="text" name="admin_birth"  value="<?php echo set_value('admin_birth',$row['admin_birth']);?>" class="ws50"/>
          <?php echo form_error('admin_birth');?></td>
      </tr>
      <tr>
        <td>电邮</td>
        <td><input type="text" name="admin_email"  value="<?php echo set_value('admin_phone',$row['admin_email']);?>" class="ws50"/>
          <?php echo form_error('admin_email');?></td>
      </tr>
      <tr>
        <td>地址</td>
        <td><input type="text" name="admin_address"  value="<?php echo set_value('admin_address',$row['admin_address']);?>" class="ws50"/>
          <?php echo form_error('admin_address');?></td>
      </tr>
      <tr>
        <td></td>
        <td><button type="submit">提交</button></td>
      </tr>
    </tbody>
  </table>
</form>
</body>
</html>
