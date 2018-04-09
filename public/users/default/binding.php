<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>会员绑定</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url();?>plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>plugin/bootstrap/css/boot.reset.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>plugin/jquery/jquery-3.0.0.min.js" ></script>
<script src="<?php echo base_url();?>plugin/bootstrap/js/bootstrap.min.js" ></script>
<script>
//binding
$(function(){
	var redirect_uri = "<?php echo $this->session->userdata('redirect_uri');?>";
	$(".binding").click(function(e) {
		$(this).text('正在提交...').attr('disabled',true);
		$.ajax({
			url:'<?php echo site_url("member/binding/login")?>',
			type:"POST",
			dataType:"json",
			async:false,
			data:{
				member_login:$(".binding_form input[name=member_login]").val(),
				member_password:$(".binding_form input[name=member_password]").val()
			},
			success:function(data){
				$(".binding").text('提交').attr('disabled',false);
				if(data.error == 1009){
					window.open(redirect_uri);
				}
			},
			error: function(){
				$(".binding").text('提交').attr('disabled',false)
			}
		});
		return false;
	});
	
	$(".register").click(function(e) {
		$(this).text('正在提交...').attr('disabled',true);
		$.ajax({
			url:'<?php echo site_url("member/binding/register")?>',
			type:"POST",
			dataType:"json",
			async:false,
			data:{
				member_name:$(".register_form input[name=member_name]").val(),
				member_password:$(".register_form input[name=member_password]").val(),
				member_passwordF:$(".register_form input[name=member_passwordF]").val(),
				member_login:$(".register_form input[name=member_login]").val(),
				member_email:$(".register_form input[name=member_email]").val(),
				member_type:$(".register_form select[name=member_type]").val(),
				member_qqnum:$(".register_form input[name=member_qqnum]").val(),
				member_area:$(".register_form select[name=member_area]").val(),
				member_city:$(".register_form input[name=member_city]").val()
			},
			success:function(data){
				$(".register").text('提交').attr('disabled',false);
				if(data.error == 2009){
					window.open(redirect_uri);
				}
			},
			error: function(){
				$(".register").text('提交').attr('disabled',false)
			}
		});
		return false;
	});
});
</script>
</head>
<body>
<div class="container"> <br/>
  <div class="row">
    <div class="col-xs-8">
      <div class="pull-left"><a href="<?php echo base_url();?>"><img height="50" src="<?php echo base_url();?>default/assets/img/logo.png" /></a></div>
      <div class="pull-left"><span class="db pt25 fc9">会员绑定</span></div>
    </div>
  </div>
  <hr/>
</div>
<div class="container">
  <ul id="myTab" class="nav nav-tabs">
    <li class="active"><a href="#binding" data-toggle="tab">绑定帐号</a></li>
    <li><a href="#register" data-toggle="tab">注册帐号</a></li>
  </ul>
  <div id="myTabContent" class="tab-content p20" style="border:1px solid #ddd; border-top:none;">
    <div class="tab-pane fade in active" id="binding">
      <form method="post" class="form-horizontal binding_form" role="form">
       <?php if(isset($member_icon)):?>
        <div class="form-group ">
          <div class="member_icon text-center">
            <div class="thumbnail brs5 ofh" style="width:50px; height:50px; margin: auto; padding:0;"><img width="100%" src="<?php echo isset($member_icon) ? $member_icon : '/website/template/default/assets/img/123.png';?>" alt="用户图像"/></div>
            <p class="mt5"><?php echo isset($member_name) ? $member_name :""?></p>
          </div>
        </div>
        <?php endif;?>
        <div class="form-group">
          <label class="col-sm-2 control-label">帐号/手机号码<font color="#F00">*</font></label>
          <div class="col-sm-10">
            <input type="text" name="member_login" placeholder="请输入帐号/手机号码" class="form-control" />
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label"> 密码 <font color="#F00">*</font> </label>
          <div class="col-sm-10">
            <input type="text" name="member_password" placeholder="请输入密码" class="form-control" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-10 pull-right">
            <button class="btn btn-info binding" type="button">提交</button>
          </div>
        </div>
      </form>
    </div>
    <div class="tab-pane fade" id="register">
      <form method="post" class="form-horizontal register_form" role="form">
      <?php if(isset($member_icon)):?>
        <div class="form-group ">
          <div class="member_icon text-center">
            <div class="thumbnail brs5 ofh" style="width:50px; height:50px; margin: auto; padding:0;"><img width="100%" src="<?php echo isset($member_icon) ? $member_icon : '/website/template/default/assets/img/123.png';?>" alt="用户图像"/></div>
            <p class="mt5"><?php echo isset($member_name) ? $member_name :""?></p>
          </div>
        </div>
        <?php endif;?>
		
        <div class="form-group">
          <label class="col-sm-2 control-label">姓名<font color="#F00">*</font></label>
          <div class=" col-sm-10">
            <input type="text" name="member_name" placeholder="请输入姓名"class="form-control"/>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">帐号/手机号码<font color="#F00">*</font></label>
          <div class="col-sm-10">
            <input type="text" name="member_login" placeholder="请输入手机号码"  class="form-control" />
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label"> 密码 <font color="#F00">*</font> </label>
          <div class="col-sm-10">
            <input type="text" name="member_password" placeholder="请输入密码"  class="form-control" />
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">确认密码 <font color="#F00">*</font></label>
          <div class="col-sm-10">
            <input type="text" name="member_passwordF" placeholder="请再次输入密码"  class="form-control" />
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">邮箱 <font color="#F00">*</font></label>
          <div class="col-sm-10">
            <input type="text" name="member_email" placeholder="请输入邮箱地址"  class="form-control" />
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">账户类型 <font color="#F00">*</font></label>
          <div class="col-sm-10">
            <select name="member_type"  class="form-control">
              <option value="">== 请选择 ==</option>
              <option value="客户">客户</option>
              <option value="代理">代理</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">QQ号码</label>
          <div class="col-sm-10">
            <input type="text" name="member_qqnum" placeholder="请输入QQ号码"   class="form-control "/>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">国家/地区</label>
          <div class="col-sm-10">
            <select  name="member_area"  class="form-control">
              <option value="">== 请选择 ==</option>
              <option value="中国">中国</option>
              <option value="香港">香港</option>
              <option value="台湾">台湾</option>
              <option value="其它">其它</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">城市</label>
          <div class="col-sm-10">
            <input type="text" name="member_city" placeholder="请输入城市名" class="form-control "/>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-10 pull-right">
            <button class="btn btn-info register" type="button">提交</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>