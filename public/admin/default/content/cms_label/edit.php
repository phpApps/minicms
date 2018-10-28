<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="<?php echo base_url();?>plugin/kindeditor/themes/default/default.css" rel="stylesheet" />
<link href="<?php echo base_url();?>admin/assets/css/style.css" rel="stylesheet" />
<script src="<?php echo base_url();?>plugin/jquery/jquery-3.0.0.min.js"></script>
<script src="<?php echo base_url();?>plugin/kindeditor/kindeditor-min.js"></script>
<script src="<?php echo base_url();?>plugin/kindeditor/lang/zh_CN.js"></script>
<script src="<?php echo base_url();?>admin/assets/js/script.js"></script>
<script type="text/javascript">
KindEditor.ready(function(K) {
	var uploadbutton = K.uploadbutton({
		button : K('#uploadButton')[0],
		fieldName : 'imgFile',
		url : '<?php echo base_url();?>plugin/kindeditor/php/upload_json.php?dir=image',
		afterUpload : function(data) {
			if (data.error === 0) {
				var url = K.formatUrl(data.url, 'absolute');
				K('#label_attach').val(url);
			} else {
				alert(data.message);
			}
		},
		afterError : function(str) {
			alert('自定义错误信息: ' + str);
		}
	});
	var uploadbutton2 = K.uploadbutton({
		button : K('#uploadButton2')[0],
		fieldName : 'imgFile',
		url : '<?php echo base_url();?>plugin/kindeditor/php/upload_json.php?dir=image',
		afterUpload : function(data) {
			if (data.error === 0) {
				var url = K.formatUrl(data.url, 'absolute');
				K('#label_attach2').val(url);
			} else {
				alert(data.message);
			}
		},
		afterError : function(str) {
			alert('自定义错误信息: ' + str);
		}
	});
	var uploadbutton3 = K.uploadbutton({
		button : K('#uploadButton3')[0],
		fieldName : 'imgFile',
		url : '<?php echo base_url();?>plugin/kindeditor/php/upload_json.php?dir=file',
		afterUpload : function(data) {
			if (data.error === 0) {
				var url = K.formatUrl(data.url, 'absolute');
				K('#label_attach3').val(url);
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
	uploadbutton2.fileBox.change(function(e) {
		uploadbutton2.submit();
	});
	uploadbutton3.fileBox.change(function(e) {
		uploadbutton3.submit();
	});
});
</script>
</head>
<body style="padding-bottom:300px;">
<div class="toolBox">
  <button type="button" onclick="location.href='<?php echo site_url("content/cms_label/index/$label_bs");?>'">返回</button>
</div>
<div class="noteBox"></div>
<form method="post">
  <table width="50%" cellspacing="0" class="formBox" align="left">
    <tbody>
      <tr>
        <td>ID</td>
        <td><input type="text" disabled="disabled" value="<?php echo set_value('label_id',$row['label_id']); ?>" class="ws50" />
          <?php echo form_error('label_name');?></td>
      </tr>
      <tr>
        <td>状态<span class="red">*</span></td>
        <td><select name="label_enable" class="ws50">
            <option value="1" <?php echo set_select('label_enable','1',$row['label_enable']=='1'?TRUE:FALSE);?>>显示</option>
            <option value="0" <?php echo set_select('label_enable','0',$row['label_enable']=='0'?TRUE:FALSE);?>>隐藏</option>
          </select>
          <?php echo form_error('label_count');?></td>
      </tr>
      <tr>
        <td>排序</td>
        <td><input type="text" name="label_sort" value="<?php echo set_value('label_sort',$row['label_sort']); ?>" class="ws50" />
          <?php echo form_error('label_sort');?></td>
      </tr>
      <tr>
        <td>名称<span class="red">*</span></td>
        <td><input type="text" name="label_name" value="<?php echo set_value('label_name',$row['label_name']); ?>" class="ws50" />
          <?php echo form_error('label_name');?></td>
      </tr>
      <tr>
        <td>URL</td>
        <td><input type="text" name="label_url" value="<?php echo set_value('label_url',$row['label_url']); ?>" class="ws50" />
          <?php echo form_error('label_url');?></td>
      </tr>
      <tr>
        <td>简介</td>
        <td><textarea name="label_intro" class="ws50"><?php echo set_value('label_intro',$row['label_intro']); ?></textarea>
          <?php echo form_error('label_intro');?></td>
      </tr>
    </tbody>
    <tbody>
      <tr>
        <td></td>
        <td><button type="submit">提交</button></td>
      </tr>
    </tbody>
  </table>
  <table width="50%" cellspacing="0" class="formBox" align="right">
    <tbody class="notout">
      <tr>
        <td>附件图片</td>
        <td><input type="text" id="label_attach" name="label_attach" value="<?php echo set_value('label_attach',$row['label_attach']); ?>" class="ws50" readonly="readonly" />
          <input type="button" id="uploadButton" value="Upload" />
          <?php echo form_error('label_attach');?></td>
      </tr>
      <tr>
        <td>附件图片</td>
        <td><input type="text" id="label_attach2" name="label_attach2" value="<?php echo set_value('label_attach2',$row['label_attach2']); ?>" class="ws50" readonly="readonly" />
          <input type="button" id="uploadButton2" value="Upload" />
          <?php echo form_error('label_attach2');?></td>
      </tr>
      <tr>
        <td>附件文件</td>
        <td><input type="text" id="label_attach3" name="label_attach3" value="<?php echo set_value('label_attach3',$row['label_attach3']); ?>" class="ws50" readonly="readonly" />
          <input type="button" id="uploadButton3" value="Upload" />
          <?php echo form_error('label_attach3');?></td>
      </tr>
      <tr>
        <td>标题</td>
        <td><input type="text" name="label_title" value="<?php echo set_value('label_title',$row['label_title']); ?>" class="ws50"/>
          <?php echo form_error('label_title');?></td>
      </tr>
      <tr>
        <td>关键字</td>
        <td><textarea name="label_keyword" class="ws50"><?php echo set_value('label_keyword',$row['label_keyword']); ?></textarea>
          <?php echo form_error('label_keyword'); ?></td>
      </tr>
      <tr>
        <td>描述</td>
        <td><textarea name="label_description" class="ws50"><?php echo set_value('label_description',$row['label_description']); ?></textarea>
          <?php echo form_error('label_description');?></td>
      </tr>
    </tbody>
  </table>
</form>
</body>
</html>