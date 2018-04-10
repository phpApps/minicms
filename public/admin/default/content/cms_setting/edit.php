<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="<?php echo base_url();?>template/plugin/kindeditor/themes/default/default.css" rel="stylesheet" />
<link href="<?php echo base_url();?>template/default/assets/css/style.css" rel="stylesheet" />
<script src="<?php echo base_url();?>template/plugin/jquery/jquery-3.0.0.min.js"></script>
<script src="<?php echo base_url();?>template/plugin/kindeditor/kindeditor-min.js"></script>
<script src="<?php echo base_url();?>template/plugin/kindeditor/lang/zh_CN.js"></script>
<script src="<?php echo base_url();?>template/default/assets/js/script.js"></script>
<script type="text/javascript">
KindEditor.ready(function(K) {
	$(".uploadButton").each(function(index){
		var uploadbutton = K.uploadbutton({
			button : $(this),
			fieldName : 'imgFile',
			url : '<?php echo base_url();?>template/plugin/kindeditor/php/upload_json.php?dir=image',
			afterUpload : function(data) {
				if (data.error === 0) {
					var url = K.formatUrl(data.url, 'absolute');
					$('.uploadValue').eq(index).val(url);
				} else {
					alert(data.message);
				}
			},
			afterError : function(str) {
				alert('自定义错误信息: ' + str);
			}
		});
		uploadbutton.fileBox.change(function(e) {
			uploadbutton.submit();
		});	
	});
});
</script>
</head>
<body style="padding-bottom:300px;">
<div class="toolBox">
  <button type="button" onclick="location.href='<?php echo site_url('content/cms_setting/index');?>'">返回</button>
</div>
<div class="noteBox"></div>
<form method="post">
  <table width="50%" cellspacing="0" class="formBox" align="left">
    <tbody>
      <tr>
        <td>ID</td>
        <td><input type="text" disabled="disabled" value="<?php echo $row['set_id']; ?>" class="ws50" /></td>
      </tr>
      <tr>
        <td>类型<span class="red">*</span></td>
        <td><input type="text" name="set_type" readonly="readonly" value="<?php echo $row['set_type']; ?>" class="ws50" />
          <?php echo form_error('set_type');?></td>
      </tr>
      <tr>
        <td>标识<span class="red">*</span></td>
        <td><input type="text" name="set_sign" readonly="readonly" value="<?php echo $row['set_sign']; ?>" class="ws50" />
          <?php echo form_error('set_sign');?></td>
      </tr>
      <tr>
        <td>名称<span class="red">*</span></td>
        <td><input type="text" name="set_name" value="<?php echo set_value('set_name',$row['set_name']); ?>" class="ws50"/>
          <?php echo form_error('set_name');?></td>
      </tr>
      <tr>
        <td></td>
        <td><button type="submit">提交</button></td>
      </tr>
    </tbody>
  </table>
  <table width="50%" cellspacing="0" class="formBox" align="right">
    <tbody>
      <?php $value = json_decode($row['set_value'],TRUE);
			foreach($list_lang as $lang):
			$val = isset($value[$lang['lang_sign']]) ? $value[$lang['lang_sign']] : $row['set_value'];?>
      <tr>
        <td>数据 [<?php echo $lang['lang_name']?>]</td>
        <td><?php if($row['set_type']=='boolean'):?>
          <select name="set_value[<?php echo $lang['lang_sign']?>]" class="ws50">
            <option value="0" <?php echo set_select("set_value[{$lang['lang_sign']}]",0,$val==0?TRUE:FALSE)?>>否</option>
            <option value="1" <?php echo set_select("set_value[{$lang['lang_sign']}]",1,$val==1?TRUE:FALSE)?>>是</option>
          </select>
          <?php elseif($row['set_type']=='image'):?>
          <textarea name="set_value[<?php echo $lang['lang_sign']?>]" class="uploadValue ws50"><?php echo set_value("set_value[{$lang['lang_sign']}]",$val); ?></textarea>
          <input type="button" class="uploadButton" value="Upload" />
          <?php else:?>
          <textarea name="set_value[<?php echo $lang['lang_sign']?>]" class="ws50"><?php echo set_value("set_value[{$lang['lang_sign']}]",$val); ?></textarea>
          <?php endif;?>
          <?php echo form_error("set_value[{$lang['lang_sign']}]");?></td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</form>
</body>
</html>