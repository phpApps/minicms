<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="<?php echo base_url();?>template/plugin/kindeditor/themes/default/default.css" rel="stylesheet" />
<link href="<?php echo base_url();?>template/default/assets/css/style.css" rel="stylesheet" />
<script src="<?php echo base_url();?>template/default/assets/js/jquery-3.0.0.min.js"></script>
<script src="<?php echo base_url();?>template/plugin/kindeditor/kindeditor-min.js"></script>
<script src="<?php echo base_url();?>template/plugin/kindeditor/lang/zh_CN.js"></script>
<script src="<?php echo base_url();?>template/default/assets/js/script.js"></script>
<script>
$(function(){
	
	//显示测试视图
	$("#submitTest").click(function(e){
		$("#testform").toggle();
	});
	
	//发单/群发邮件
	$("#sendSingleEmail").click(function(e){ 
       	$.post("<?php echo site_url('admin/plugin/caliyunemail')?>",{
			type:$("#type").val(),
			eTitle:$('#eTitle').val(),
			eAddress:$('#eAddress').val(),
			eTemplate:$("#eTemplate").val(),
			eFromAlias:$("#eFromAlias").val(),
			eFromAlias:$('#eFromAlias').val()
		},
		function(data){
			$('.toolBox').html(data.msg);
		 },"json");
     });
	 
});
</script>
<script type="text/javascript">
KindEditor.ready(function(K) {
	K.create('textarea[name="eTemplate"]',{
		pasteType : 1,
		filterMode : false,
		allowImageUpload : true,
		width:"50%",
		height:"180px",
		newlineTag : 'br',
		allowFileManager: true,
        afterBlur: function(){this.sync();},
		items : [
			'source', '|', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
			'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
			'insertunorderedlist', '|', 'emoticons', 'image', 'flash', 'link', '|', 'code', 'fullscreen']
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
        <td>访问密钥（accessKey）<span class="red">*</span></td>
        <td><input type="text" name="accessKey" value="<?php echo set_value('accessKey',isset($param['accessKey'])?$param['accessKey']:"");?>" class="ws50" />
          <?php echo form_error('accessKey');?></td>
      </tr>
      <tr>
        <td>校验码（accessSecret）<span class="red">*</span></td>
        <td><input type="text" name="accessSecret" value="<?php echo set_value('accessSecret',isset($param['accessSecret'])?$param['accessSecret']:"");?>" class="ws50" />
          <?php echo form_error('accessSecret');?></td>
      </tr>
      <tr>
        <td>邮件签名（signName）<span class="red">*</span></td>
        <td><input type="text" name="signName"  value="<?php echo set_value('signName',isset($param['signName'])?$param['signName']:"");?>" class="ws50" />
          <?php echo form_error('signName');?></td>
      </tr>
      <tr>
        <td>区域（area）<span class="red">*</span></td>
        <td><input type="text" name="area" value="<?php echo set_value('area',isset($param['area'])?$param['area']:"");?>" class="ws50" />
          <?php echo form_error('area');?></td>
      </tr>
      <tr>
        <td>发件地址（accessSite）<span class="red">*</span></td>
        <td><input type="text" name="accessSite"  value="<?php echo set_value('accessSite',isset($param['accessSite'])?$param['accessSite']:"");?>" class="ws50" />
          <?php echo form_error('accessSite');?></td>
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
          详情见说明。 </td>
      </tr>
    </tbody>
  </table>
</form>
<form id="testform"  method="post" style="display:none; margin-top:40px;">
<input type="hidden" name="emailtpl" class="emailtpl" value="customtpl" />
  <table cellspacing="0" cellpadding="0" width="100%" class="formBox" align="left">
    <tbody>
      <tr>
        <td>测试类型<span class="red">*</span></td>
        <td>
          <select id="type" name="type" class="ws50">
                <option>请选择测试类型</option>
                <option value="SingleSendMailPassword">重置密码</option>
                <option value="SingleSendMailCode">验证码</option>
            </select></td>
      </tr>
      <tr>
        <td>邮件主题<span class="red">*</span></td>
        <td><input type="text" id="eTitle" name="eTitle" placeholder="输入所发邮件主题" class="ws50" /></td>
      </tr>
      <tr>
        <td>邮箱地址 <span class="red">*</span></td>
        <td><input type="text" id="eAddress" name="eAddress" placeholder="输入收件邮箱地址" class="ws50" />（批量发送：123@qq.com,345@qq.com ，地址间用英文逗号隔开）</td>
      </tr>
      <tr>
        <td>发信人昵称<span class="red">*</span></td>
        <td><input type="text" id="eFromAlias" name="eFromAlias" placeholder="输入发信人昵称" class="ws50" /></td>
      </tr>
      <tr>
        <td>邮件模版 <span class="red">*</span></td>
        <td><textarea id="eTemplate" name="eTemplate"></textarea></td>
      </tr>
      <tr>
        <td></td>
        <td><button type="button" id="sendSingleEmail">发送邮件</button></td>
      </tr>
    </tbody>
  </table>
</form>
</body>
</html>