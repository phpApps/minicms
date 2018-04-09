<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>忘记密码 | 会员中心</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1, user-scalable=0" />
<link href="<?php echo base_url();?>plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>plugin/bootstrap/css/boot.reset.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>plugin/jquery/jquery-3.0.0.min.js"></script>
<script>
$(function(){
	$("#send_code").click(function(){
		$.ajax({
			type:"GET",
			url:$("#send_code").attr("_ajax"),
			data:{"send_name":$("#send_name").val()},
			dataType:"json",
			async:false,
			success:function(data){
			   if(data.error==0){
				   alert(data.msg);
			   }else{
				   alert(data.msg);
			   }   
			}
		})
		return false;
	});
})
</script>
</head>
<body>
<div class="container"> <br/>
  <div class="row">
    <div class="col-xs-8">
      <div class="pull-left"><a href="<?php echo base_url();?>"><img height="50" src="<?php echo base_url();?>default/assets/img/logo.png" /></a></div>
      <div class="pull-left"><span class="db pt25 fc9">忘记密码</span></div>
    </div>
  </div>
  <hr/>
</div>
<div class="container">
  <?php if(! empty($msg)):?>
  <div class="alert alert-warning"> <?php echo $msg;?> </div>
  <?php endif;?>
  <form method="post" action="<?php echo site_url("forget");?>">
    <div class="form-group">
      <label for="member_phone">手机:</label>
      <input class="form-control" name="send_name" id="send_name" placeholder="手机号码" type="text">
    </div>
    <div class="form-group">
      <label for="member_password"> 验证码:</label>
      <div class="row">
        <div class="col-xs-6">
          <input  id="captcha" class="form-control" name="captcha" placeholder="验证码" type="text" />
        </div>
        <div class="col-xs-6">
          <button id="send_code" class="form-control btn btn-default"  type="button" _ajax="<?php echo site_url('plugin/captcha/sms');?>">获取验证码</button>
        </div>
      </div>
    </div>
    <div class="form-group mt30">
      <input class="btn btn-block btn-primary" type="submit" value="提交" >
    </div>
    <div class="mt30"><a  href="<?php echo site_url("login");?>">立即登录</a></div>
  </form>
</div>
</body>
</html>
