<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="<?php echo base_url();?>admin/assets/css/style.css" rel="stylesheet" />
<script src="<?php echo base_url();?>plugin/jquery/jquery-3.0.0.min.js"></script>
<script src="<?php echo base_url();?>admin/assets/js/script.js"></script>
<style>table{ float:left;} form{ overflow:hidden;}</style>
</head>
<body style="padding-bottom:300px;">
<div class="toolBox " style="color:#f00;text-indent: 10px;"><?php echo $sign;?></div>
<div class="noteBox"></div>
<form method="post">
  <table cellspacing="0" cellpadding="0" width="100%" class="formBox" align="left">
    <tbody>
    <tr>
      <tr>
        <td>凭证（appid）<span class="red">*</span></td>
        <td><input type="text" name="appid" value="<?php echo set_value('appid',$param['appid']);?>" class="ws50" />
          <?php echo form_error('appid');?></td>
      </tr>
     <tr>
        <td>密钥（appsecret）<span class="red">*</span></td>
        <td><input type="text" name="appsecret" value="<?php echo set_value('appsecret',$param['appsecret']);?>" class="ws50" />
           <?php echo form_error('appsecret');?></td>
      </tr>
      <tr>
        <td></td>
        <td><button type="submit">创建配置</button>&nbsp;&nbsp; <a target="_blank" href="<?php echo site_url("admin/plugin/tw_login?redirect_uri=".base64_encode(current_url()));?>">测试</a>（测试前先创建配置）</td>
      </tr>
      <tr>
         <td colspan="2">
          <b class="red">*</b> 注意：<br/>
          1.接口使用方法：域名/amin/plugin/tw_login?redirect_uri={回调地址}，回调地址采用 base64_encode 加密处理。<br/>
          2.必须在www环境下使用。<br/>
          详情见说明。
         </td>
      </tr>
    </tbody>
  </table> 
</form>
</body>
</html>