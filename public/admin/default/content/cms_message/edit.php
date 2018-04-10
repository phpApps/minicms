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
  <button type="button" onclick="location.href='<?php echo site_url("content/cms_message/index/{$page}")?>'">返回</button>
</div>
<div class="noteBox"></div>
<form method="post">
  <table width="100%" cellspacing="0" class="formBox">
    <tbody>
      <tr>
        <td>ID</td>
        <td><input type="text" disabled="disabled" value="<?php echo $row['msg_id']; ?>" class="ws50"/></td>
      </tr>
      <tr>
        <td>时间</td>
        <td><input type="text" disabled="disabled" value="<?php echo $row['msg_time']; ?>" class="ws50"/></td>
      </tr>
      <tr>
        <td>姓名</td>
        <td><input type="text" name="msg_name" value="<?php echo set_value('msg_name',$row['msg_name']); ?>" class="ws50"/>
          <?php echo form_error('msg_name');?></td>
      </tr>
      <tr>
        <td>手机</td>
        <td><input type="text" name="msg_phone" value="<?php echo set_value('msg_phone',$row['msg_phone']); ?>" class="ws50"/>
          <?php echo form_error('msg_phone');?></td>
      </tr>
      <tr>
        <td>电邮</td>
        <td><input type="text" name="msg_email" value="<?php echo set_value('msg_email',$row['msg_email']); ?>" class="ws50"/>
          <?php echo form_error('msg_email'); ?></td>
      </tr>
      <tr>
        <td>QQ</td>
        <td><input type="text" name="msg_qqnum" value="<?php echo set_value('msg_qqnum',$row['msg_qqnum']); ?>" class="ws50"/>
          <?php echo form_error('msg_qqnum'); ?></td>
      </tr>
      <tr>
        <td>地区</td>
        <td><input type="text" name="msg_area" value="<?php echo set_value('msg_area',$row['msg_area']); ?>" class="ws50"/>
          <?php echo form_error('msg_area'); ?></td>
      </tr>
      <tr>
        <td>城市</td>
        <td><input type="text" name="msg_city" value="<?php echo set_value('msg_city',$row['msg_city']); ?>" class="ws50"/>
          <?php echo form_error('msg_city'); ?></td>
      </tr>
      <tr>
        <td>留言</td>
        <td><textarea name="msg_content" class="ws50"><?php echo set_value('msg_content',$row['msg_content']); ?></textarea>
          <?php echo form_error('msg_content'); ?></td>
      </tr>
      <tr>
        <td>备注</td>
        <td><textarea name="msg_remark" class="ws50"><?php echo set_value('msg_remark',$row['msg_remark']); ?></textarea>
          <?php echo form_error('msg_remark'); ?></td>
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