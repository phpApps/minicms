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
<table cellspacing="0" cellpadding="0" width="100%" class="toolBox">
  <tr>
    <td><button type="button" onclick="location.href='<?php echo site_url("system/sys_admin/index");?>'">返回</button></td>
  </tr>
</table>
<div class="noteBox"></div>
<form method="post">
  <table cellspacing="0" cellpadding="0" width="50%" class="formBox" align="left">
    <tbody>
      <tr>
        <td>用户名<span class="red">*</span></td>
        <td><input type="text" name="admin_login" value="<?php echo $row['admin_login'];?>" class="ws50"  readonly="readonly" onfocus="this.blur();" unselectable="on"  style="background-color:rgb(225,225,225);cursor:not-allowed;"/></td>
      </tr>
      <tr>
        <td>手机<span class="red">*</span></td>
        <td><input type="text" name="admin_phone" value="<?php echo set_value('admin_phone',$row['admin_phone']);?>" class="ws50" />
          <?php echo form_error('admin_phone');?></td>
      </tr>
      <tr>
        <td>登录密码<span class="red">*</span></td>
        <td><input type="text" name="admin_password" value="<?php echo set_value('admin_password');?>" class="ws50" />
          <?php echo form_error('admin_password');?></td>
      </tr>
      <tr>
        <td>确认密码<span class="red">*</span></td>
        <td><input type="text" name="admin_passwordF" value="<?php echo set_value('admin_passwordF');?>" class="ws50" />
          <?php echo form_error('admin_passwordF');?></td>
      </tr>
      <tr>
        <td>角色<span class="red">*</span></td>
        <td><select name="admin_roleid" class="ws50">
            <?php foreach($list_roles as $role):?>
            <option value="<?php echo $role['role_id'];?>" <?php echo set_select('admin_roleid',$role['role_id'],$role['role_id']==$row['admin_roleid']?TRUE:FALSE);?>><?php echo $role['role_name'];?></option>
            <?php endforeach;?>
          </select>
          <?php echo form_error('admin_roleid');?></td>
      </tr>
      <tr>
        <td>状态<span class="red">*</span></td>
        <td><select name="admin_work" class="ws50">
            <option value="1" <?php echo set_select('admin_work','1',$row['admin_work']=='1'?TRUE:FALSE);?>>在职</option>
            <option value="0" <?php echo set_select('admin_work','0',$row['admin_work']=='0'?TRUE:FALSE);?>>离职</option>
          </select>
          <?php echo form_error('admin_work');?></td>
      </tr>
      <tr>
        <td></td>
        <td><button type="submit">提交</button></td>
      </tr>
    </tbody>
  </table>
  <table cellspacing="0" cellpadding="0" width="50%" class="formBox" align="right">
    <tbody>
      <tr>
        <td>姓名<span class="red">*</span></td>
        <td><input type="text" name="admin_name" value="<?php echo set_value('admin_name',$row['admin_name']);?>" class="ws50" />
          <?php echo form_error('admin_name');?></td>
      </tr>
      <tr>
        <td>性别<span class="red">*</span></td>
        <td><select name="admin_sex" class="ws50">
            <option value="男" <?php echo set_select('admin_sex','男',$row['admin_phone']=='男'?TRUE:FALSE);?>>男</option>
            <option value="女" <?php echo set_select('admin_sex','女',$row['admin_phone']=='女'?TRUE:FALSE);?>>女</option>
          </select>
          <?php echo form_error('admin_sex');?></td>
      </tr>
      <tr>
        <td>生日</td>
        <td><input type="text" name="admin_birth" value="<?php echo set_value('admin_birth',$row['admin_birth']);?>" class="ws50" />
          <?php echo form_error('admin_birth');?></td>
      </tr>
      <tr>
        <td>电邮</td>
        <td><input type="text" name="admin_email" value="<?php echo set_value('admin_email',$row['admin_email']);?>" class="ws50" />
          <?php echo form_error('admin_email');?></td>
      </tr>
      <tr>
        <td>地址</td>
        <td><textarea name="admin_address" class="ws50"><?php echo set_value('admin_address',$row['admin_address']);?></textarea>
          <?php echo form_error('admin_address');?></td>
      </tr>
    </tbody>
  </table>
</form>
</body>
</html>
