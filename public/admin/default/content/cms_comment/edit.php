<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="<?php echo base_url();?>template/default/assets/css/style.css" rel="stylesheet" />
<script src="<?php echo base_url();?>template/plugin/jquery/jquery-3.0.0.min.js"></script>
<script src="<?php echo base_url();?>template/default/assets/js/script.js"></script>
<script>
$(function(){
	 var val = '<?php echo $row['cmt_status'];?>';
	 $("#cmt_status").find("option[value='"+val+"']").attr("selected",true);

});

</script>
</head>
<body style="padding-bottom:300px;">
<div class="toolBox">
  <button type="button" onclick="location.href='<?php echo site_url("cms_comment/index/{$page}")?>'">返回</button>
</div>
<div class="noteBox"></div>
<form method="post">
  <table width="100%" cellspacing="0" class="formBox">
    <tbody>
      <tr>
        <td>ID</td>
        <td><input type="text" disabled="disabled" value="<?php echo $row['cmt_id']; ?>" class="ws50"/></td>
      </tr>
      <tr>
        <td>文章标题</td>
        <td><input type="text" disabled="disabled" value="<?php echo $row['art_title']; ?>" class="ws50"/></td>
      </tr>
      <tr>
        <td>评论内容</td>
        <td><input type="text" disabled="disabled"  value="<?php echo $row['cmt_content']?>" class="ws50"/></td>
      </tr>
      <tr>
        <td>评论作者</td>
        <td><input type="text" disabled="disabled" value="<?php echo $row['member_name']; ?>" class="ws50"/></td>
      </tr>
      <tr>
        <td>评论状态</td>
        <td><select name="cmt_status" class="ws50" id="cmt_status">
            <option value ="1">未审核</option>
            <option value ="2">已审核</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>管理员回复</td>
        <td><textarea name="cmt_reply" class="ws50" style="min-height:187px;"><?php echo set_value('cmt_reply',$row['cmt_reply']); ?></textarea>
          <?php echo form_error('cmt_reply'); ?></td>
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