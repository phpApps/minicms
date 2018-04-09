<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>会员中心 - 修改密码</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1, user-scalable=0" />
<link href="<?php echo base_url();?>plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>plugin/bootstrap/css/boot.reset.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container"> <br/>
  <div class="row">
    <div class="col-xs-8"><a href="<?php echo base_url();?>"><img height="50" src="<?php echo base_url();?>default/assets/img/logo.png" /></a> <span>会员中心</span> </div>
    <div class="col-xs-4 text-right"><a href="<?php echo site_url("login/out")?>" class="btn btn-danger btn-xs">安全退出</a></div>
  </div>
  <hr/>
</div>
<div class="container">
  <ul class="nav nav-tabs">
    <li><a href="<?php echo site_url("profile");?>">修改资料</a></li>
    <li class="active"><a>修改密码</a></li>
  </ul>
  <?php if(! empty($msg)):?>
  <div class="alert alert-warning"> <?php echo $msg;?> </div>
  <?php endif;?>
  <form method="post" class="form-horizontal">
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">原密码</label>
      <div class="col-sm-10">
        <input type="password" style="display:none;">
        <input type="password" name="member_password_old" autocomplete="off" class="form-control" />
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">新密码</label>
      <div class="col-sm-10">
        <input type="password" style="display: none;">
        <input type="password" name="member_password" autocomplete="off" class="form-control" />
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">确认密码</label>
      <div class="col-sm-10">
        <input type="password" name="member_passwordF" autocomplete="off" class="form-control" />
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label"></label>
      <div class="col-sm-10">
        <button type="submit" class="btn btn-block btn-primary">提交</button>
      </div>
    </div>
  </form>
</div>
</body>
</html>
