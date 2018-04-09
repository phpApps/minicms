<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>会员登录 | 会员中心</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1, user-scalable=0" />
<link href="<?php echo base_url();?>plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>plugin/bootstrap/css/boot.reset.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container"> <br/>
  <div class="row">
    <div class="col-xs-8">
      <div class="pull-left"><a href="<?php echo base_url();?>"><img height="50" src="<?php echo base_url();?>default/assets/img/logo.png" /></a></div>
      <div class="pull-left"><span class="db pt25 fc9">会员中心</span></div>
    </div>
  </div>
  <hr/>
</div>
<div class="container">
  <?php if(! empty($msg)):?>
  <div class="alert alert-warning"> <?php echo $msg;?> </div>
  <?php endif;?>
  <form method="post">
    <div class="form-group">
      <label for="member_login">登录名:</label>
      <input class="form-control" name="member_login" id="member_login" placeholder="手机号码" type="text" />
    </div>
    <div class="form-group">
      <label for="member_password"> 登录密码:</label>
      <input class="form-control" name="member_password" id="member_password" placeholder="登录密码" type="password" />
    </div>
    <div class="form-group mt30">
      <input class="btn btn-block btn-primary" type="submit" value="登录" />
    </div>
  </form>
  <div class="mt30"><a  href="<?php echo site_url("forget");?>">忘记密码</a></div>
</div>
</body>
</html>
