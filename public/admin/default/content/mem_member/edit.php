<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="<?php echo base_url();?>template/default/assets/css/style.css" rel="stylesheet" />
<script src="<?php echo base_url();?>template/default/plugin/jquery/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url();?>template/default/assets/js/script.js"></script>
</head>
<body style="padding-bottom:300px;">
<div class="toolBox">
  <button type="button" onclick="location.href='<?php echo site_url("mem_member/index/{$page}")?>'">返回</button>
</div>
<div class="noteBox"></div>
<form method="post">
  <table width="100%" cellspacing="0" class="formBox">
    <tbody>
      <tr>
        <td>ID</td>
        <td><input type="text" disabled="disabled" value="<?php echo $row['member_id']; ?>" class="ws50"/></td>
      </tr>
      <tr>
        <td>时间</td>
        <td><input type="text" disabled="disabled" value="<?php echo $row['member_regtime']; ?>" class="ws50"/></td>
      </tr>
      <tr>
        <td>姓名</td>
        <td><input type="text" name="member_name" value="<?php echo set_value('member_name',$row['member_name']); ?>" class="ws50"/>
          <?php echo form_error('member_name');?></td>
      </tr>
      <tr>
        <td>手机</td>
        <td><input type="text" name="member_phone" value="<?php echo set_value('member_phone',$row['member_phone']); ?>" class="ws50"/>
          <?php echo form_error('member_phone');?></td>
      </tr>
      <tr>
        <td>电邮</td>
        <td><input type="text" name="member_email" value="<?php echo set_value('member_email',$row['member_email']); ?>" class="ws50"/>
          <?php echo form_error('member_email'); ?></td>
      </tr>
      <tr>
        <td>QQ</td>
        <td><input type="text" name="member_qqnum" value="<?php echo set_value('member_qqnum',$row['member_qqnum']); ?>" class="ws50"/>
          <?php echo form_error('member_qqnum'); ?></td>
      </tr>
      <tr>
        <td>地区</td>
        <td><input type="text" name="member_area" value="<?php echo set_value('member_area',$row['member_area']); ?>" class="ws50"/>
          <?php echo form_error('member_area'); ?></td>
      </tr>
      <tr>
        <td>城市</td>
        <td><input type="text" name="member_city" value="<?php echo set_value('member_city',$row['member_city']); ?>" class="ws50"/>
          <?php echo form_error('member_city'); ?></td>
      </tr>
      <tr>
        <td>备注</td>
        <td><textarea name="member_remark" class="ws50"><?php echo set_value('member_remark',$row['member_remark']); ?></textarea>
          <?php echo form_error('member_remark'); ?></td>
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