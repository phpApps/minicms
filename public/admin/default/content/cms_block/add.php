<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="<?php echo base_url();?>template/default/assets/css/style.css" rel="stylesheet" />
<script src="<?php echo base_url();?>template/plugin/jquery/jquery-3.0.0.min.js"></script>
<script src="<?php echo base_url();?>template/default/assets/js/script.js"></script
></head>
<body style="padding-bottom:300px;">
<div class="toolBox">
  <button type="button" onclick="location.href='<?php echo site_url("cms_block/index");?>'">返回</button>
</div>
<div class="noteBox"></div>
<form method="post">
  <table width="100%" cellspacing="0" class="formBox">
    <tbody>
      <tr>
        <td>关联文章<span class="red">*</span></td>
        <td><select name="block_article" class="ws50">
            <option value="0" <?php echo set_select('block_article',0);?>>否</option>
            <option value="1" <?php echo set_select('block_article',1);?>>是</option>
          </select>
          <?php echo form_error('block_article');?></td>
      </tr>
      <tr>
        <td>显示<span class="red">*</span></td>
        <td><select name="block_enable" class="ws50">
            <option value="1" <?php echo set_select('block_enable',1);?>>是</option>
            <option value="0" <?php echo set_select('block_enable',0);?>>否</option>
          </select>
          <?php echo form_error('block_enable');?></td>
      </tr>
      <tr>
        <td>标识<span class="red">*</span></td>
        <td><input type="text" name="block_sign" value="<?php echo set_value('block_sign'); ?>" class="ws50"/>
          <?php echo form_error('block_sign');?></td>
      </tr>
      <tr>
        <td>名称<span class="red">*</span></td>
        <td><input type="text" name="block_name" value="<?php echo set_value('block_name'); ?>" class="ws50"/>
          <?php echo form_error('block_name');?></td>
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