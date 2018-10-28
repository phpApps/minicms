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
	$("#option_ismenu option[value='"+<?php echo $row['option_ismenu'];?>+"']").attr("selected",true);
});
</script>
</head>
<body style="padding-bottom:300px;">
<table cellspacing="0" cellpadding="0" width="100%" class="toolBox">
  <tr>
    <td><button type="button" onclick="location.href='<?php echo site_url("system/sys_option/index");?>'">返回</button></td>
  </tr>
</table>
<div class="noteBox"></div>
<form method="post">
  <table width="100%" cellspacing="0" class="formBox">
    <tbody>
      <tr>
        <td>ID</td>
        <td><input type="text" disabled="disabled" value="<?php echo set_value('option_id',$row['option_id']); ?>" class="ws50" />
          <?php echo form_error('option_name');?></td>
      </tr>
      <tr>
        <td>上级<span class="red">*</span></td>
        <td><select name="option_pid" class="ws50">
            <option value="0">顶级</option>
            <?php echo $this->sys_option_model->select_option(set_value('option_pid',$row['option_pid']),$row['option_id']);?>
          </select>
          <?php echo form_error('option_pid');?></td>
      </tr>
      <tr>
        <td>名称<span class="red">*</span></td>
        <td><input type="text" name="option_name" value="<?php echo set_value('option_name',$row['option_name']); ?>" class="ws50" />
          <?php echo form_error('option_name');?></td>
      </tr>
      <tr>
        <td>文件夹<span class="red">*</span></td>
        <td><input type="text" name="option_folder" value="<?php echo $row['option_folder']; ?>" class="ws50"/>（项目文件夹名 <i class="red">注意：控制器所在的文件夹名称，顶级菜单必填</i>）<span id="msg"></span></td>
      </tr>
      <tr>
        <td>访问URL<span class="red">*</span></td>
        <td><input type="text" name="option_value" value="<?php echo set_value('option_value',$row['option_value']); ?>" class="ws50"/>（由控制器、方法组成）</td>
      </tr>
      <tr>
        <td>菜单<span class="red">*</span></td>
        <td><select name="option_ismenu" class="ws50" id="option_ismenu">
            <option value="0">否</option>
            <option value="1">是</option>
          </select></td>
      </tr>
      <tr>
        <td>排序<span class="red">*</span></td>
        <td><input type="text" name="option_sort" value="<?php echo set_value('option_sort',$row['option_sort']); ?>" class="ws50" />
          <?php echo form_error('option_sort');?></td>
      </tr>
      <tr>
        <td>描述</td>
        <td><textarea name="option_desc" class="ws50"><?php echo $row['option_desc'];?></textarea></td>
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