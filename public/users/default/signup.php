<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>会员注册</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url();?>plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>plugin/bootstrap/css/boot.reset.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container"> <br/>
  <div class="row">
    <div class="col-xs-8">
      <div class="pull-left"><a href="<?php echo base_url();?>"><img height="50" src="<?php echo base_url();?>default/assets/img/logo.png" /></a></div>
      <div class="pull-left"><span class="db pt25 fc9">会员注册</span></div>
    </div>
  </div>
  <hr/>
</div>
<div class="container">
  <form method="post" action="<?php echo site_url("signup");?>">
    <table width="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td>姓名<font color="#F00">*</font></td>
        <td><input type="text" name="member_name" placeholder="member_name" /></td>
      </tr>
      <tr>
        <td>手机号码<font color="#F00">*</font></td>
        <td><input type="text" name="member_login" placeholder="member_login" /></td>
      </tr>
      <tr>
        <td>密码 <font color="#F00">*</font></td>
        <td><input type="text" name="member_password" placeholder="member_password" /></td>
      </tr>
      <tr>
        <td>确认密码 <font color="#F00">*</font></td>
        <td><input type="text" name="member_passwordF" placeholder="member_passwordF" /></td>
      </tr>
      <tr>
        <td>邮箱 <font color="#F00">*</font></td>
        <td><input type="text" name="member_email" placeholder="member_email" /></td>
      </tr>
      <tr>
        <td>账户类型 <font color="#F00">*</font></td>
        <td><select name="member_type">
            <option value="">== 请选择 ==</option>
            <option value="客户">客户</option>
            <option value="代理">代理</option>
          </select></td>
      </tr>
      <tr>
        <td>QQ号码</td>
        <td><input type="text" name="member_qqnum" placeholder="member_qqnum" /></td>
      </tr>
      <tr>
        <td>国家/地区</td>
        <td><select  name="member_area">
            <option value="">== 请选择 ==</option>
            <option value="中国">中国</option>
            <option value="香港">香港</option>
            <option value="台湾">台湾</option>
            <option value="其它">其它</option>
          </select></td>
      </tr>
      <tr>
        <td>城市</td>
        <td><input type="text" name="member_city" placeholder="member_city" /></td>
      </tr>
      <tr>
        <td></td>
        <td><button type="submit">提交</button></td>
      </tr>
    </table>
  </form>
</div>
</body>
</html>