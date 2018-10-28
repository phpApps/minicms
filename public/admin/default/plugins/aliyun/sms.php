<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="<?php echo base_url();?>admin/assets/css/style.css" rel="stylesheet" />
<script src="<?php echo base_url();?>plugin/jquery/jquery-3.0.0.min.js"></script>
<script src="<?php echo base_url();?>admin/assets/js/script.js"></script>
<script>
$(function(){
	$("#submitTest").click(function(e) {
		//显示/隐藏表单
		$("#testform").toggle();
	});
	//发短信
	$("#sendSMS").click(function(e){
       	$.post("<?php echo site_url('admin/plugins/aliyun/sms/test')?>",{
			send_name:$('#send_name').val(),
			sendRegTpl:$('#sendRegTpl').val(),
			type:$("#type").val()
		},
		function(data){
			$('.toolBox').html(data.msg);
		 },"json");
     });
	 
});
</script>
<style>
table {
	float: left;
}
form {
	overflow: hidden;
}
.formBox > tbody > tr > td:first-child {
	width: 160px;
}
#tr td:last-child input:first-child {
	margin-bottom: 20px;
}
</style>
</head>
<body style="padding-bottom:300px;">
<div class="toolBox " style="color:#f00;text-indent: 10px;"><?php echo isset($sign) ? $sign : '';?></div>
<div class="noteBox"></div>
<form method="post">
  <table cellspacing="0" cellpadding="0" width="100%" class="formBox" align="left">
    <tbody>
    <tr>
        <td>MNS地址（endPoint）<span class="red">*</span></td>
        <td><input type="text" name="endPoint" value="<?php echo set_value('endPoint',isset($param['endPoint']) ? $param['endPoint']:'');?>" class="ws50" />
          <?php echo form_error('endPoint');?></td>
      </tr>
      <tr>
        <td>访问密钥（accessKey）<span class="red">*</span></td>
        <td><input type="text" name="accessKey" value="<?php echo set_value('accessKey',isset($param['accessKey']) ? $param['accessKey']:'');?>" class="ws50" />
          <?php echo form_error('accessKey');?></td>
      </tr>
      <tr>
        <td>校验码（accessSecret）<span class="red">*</span></td>
        <td><input type="text" name="accessSecret" value="<?php echo set_value('accessSecret',isset($param['accessSecret']) ? $param['accessSecret']:'');?>" class="ws50" />
          <?php echo form_error('accessSecret');?></td>
      </tr>
      <tr>
        <td>主题名称（topicName）<span class="red">*</span></td>
        <td><input type="text" name="topicName" value="<?php echo set_value('topicName',isset($param['topicName']) ? $param['topicName']:'');?>" class="ws50" />
          <?php echo form_error('accessSecret');?></td>
      </tr>
      <tr>
        <td>短信签名（signName）<span class="red">*</span></td>
        <td><input type="text" name="signName"  value="<?php echo set_value('signName',isset($param['signName']) ? $param['signName']:'');?>" class="ws50" />
          <?php echo form_error('signName');?></td>
      </tr>
      <tr>
        <td></td>
        <td><button type="submit" id="submitCfg">创建配置</button>
          <button type="button" id="submitTest">测试</button>
          （先创建配置）</td>
      </tr>
      <tr>
        <td colspan="2"><b class="red">*</b> 注意：<br/>
          1.调用方法：域名/admin/plugin/aliyunsms｛方法名｝，如：密码重置 sendRegPwd。<br/>
          2.必须在www环境下使用。<br/>
          详情见说明。
           </td>
      </tr>
    </tbody>
  </table>
</form>
<form id="testform"  method="post" style="display:none;  margin-top:40px;">
  <table cellspacing="0" cellpadding="0" width="100%" class="formBox" align="left">
    <tbody>
      <tr>
        <td>测试类型 <span class="red">*</span></td>
        <td><select id="type" name="type" class="ws50">
            <option>请选择测试类型</option>
            <option value="sendRegCode">验证码</option>
            <option value="sendRegPwd">重置密码</option>
            <!--<option value="sendRegEmail">请选择测试类型</option>
              <option value="sendRegText">请选择测试类型</option>-->
          </select></td>
      </tr>
      <tr>
        <td>手机号码 <span class="red">*</span></td>
        <td><input type="text" id="send_name" name="send_name" placeholder="输入您的手机号码" class="ws50" />（群发时，多个手机号码用逗号隔开）</td>
      </tr>
      <tr>
        <td>短信模版 <span class="red">*</span></td>
        <td><input type="text" id="sendRegTpl" name="sendRegTpl" placeholder="输入阿里云后台短信模版" class="ws50" /></td>
      </tr>
      <tr>
        <td></td>
        <td><button type="button" id="sendSMS">发送短信</button></td>
      </tr>
    </tbody>
  </table>
</form>
</body>
</html>