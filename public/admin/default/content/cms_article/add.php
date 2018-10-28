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
				K('#art_attach').val(url);
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
				K('#art_attach2').val(url);
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
				K('#art_attach3').val(url);
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
	
	K.create('textarea[name="art_content"]', {
		pasteType : 1,
		filterMode : true,
		allowImageUpload : true,
		newlineTag : 'br',
		items : [
			'source', '|', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
			'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
			'insertunorderedlist', '|', 'emoticons', 'image', 'flash', 'link', '|', 'code', 'fullscreen']
	});

});
</script>
</head>
<body style="padding-bottom:300px;">
<div class="toolBox">
  <button type="button" onclick="location.href='<?php echo site_url("content/cms_article/index/$sign")?>'">返回</button>
</div>
<div class="noteBox"></div>
<form method="post">
  <table width="60%" cellspacing="0" class="formBox" align="left">
    <tbody>
      <tr>
        <td>显示<span class="red">*</span></td>
        <td><select name="art_enable" class="ws50">
            <option value="1" <?php echo set_select('art_enable',1);?>>是</option>
            <option value="0" <?php echo set_select('art_enable',0);?>>否</option>
          </select>
          <?php echo form_error('art_enable');?></td>
      </tr>
      <tr>
        <td>置顶<span class="red">*</span></td>
        <td><select name="art_hastop" class="ws50">
            <option value="0" <?php echo set_select('art_hastop',0);?>>否</option>
            <option value="1" <?php echo set_select('art_hastop',1);?>>是</option>
          </select>
          <?php echo form_error('art_enable');?></td>
      </tr>
      <tr>
        <td>菜单<span class="red">*</span></td>
        <td><select name="art_mid" class="ws50">
        <option value=""></option>
        <?php echo $this->cms_menu_model->menu_option(set_value('art_mid'));?>
          </select>
          <?php echo form_error('art_mid');?></td>
      </tr>
      <tr>
        <td>附件图片</td>
        <td><input type="text" id="art_attach" name="art_attach" value="<?php echo set_value('art_attach'); ?>" class="ws50" readonly="readonly" />
          <input type="button" id="uploadButton" value="Upload" />
          <?php echo form_error('art_attach');?></td>
      </tr>
      <tr>
        <td>附件图片</td>
        <td><input type="text" id="art_attach2" name="art_attach2" value="<?php echo set_value('art_attach2'); ?>" class="ws50" readonly="readonly" />
          <input type="button" id="uploadButton2" value="Upload" />
          <?php echo form_error('art_attach2');?></td>
      </tr>
      <tr>
        <td>附件文件</td>
        <td><input type="text" id="art_attach3" name="art_attach3" value="<?php echo set_value('art_attach3'); ?>" class="ws50" readonly="readonly" />
          <input type="button" id="uploadButton3" value="Upload" />
          <?php echo form_error('art_attach3');?></td>
      </tr>
      <tr>
        <td>Meta标题<span class="red">*</span></td>
        <td><input type="text" name="art_title" value="<?php echo set_value('art_title'); ?>" class="ws50"/>
          <?php echo form_error('art_title');?></td>
      </tr>
      <tr>
        <td>Meta关键字</td>
        <td><input type="text" name="art_keyword" value="<?php echo set_value('art_keyword'); ?>" class="ws50"/>
          <?php echo form_error('art_keyword');?></td>
      </tr>
      <tr>
        <td>Meta描述</td>
        <td><textarea name="art_description" class="ws50"><?php echo set_value('art_description'); ?></textarea>
          <?php echo form_error('art_description'); ?></td>
      </tr>
      <tr>
        <td>文章内容<span class="red">*</span></td>
        <td><textarea name="art_content" style="width:100%"><?php echo set_value('art_content'); ?></textarea>
          <?php echo form_error('art_content'); ?></td>
      </tr>
      <tr>
        <td></td>
        <td><button type="submit">提交</button></td>
      </tr>
    </tbody>
  </table>
  <table width="40%" cellspacing="0" class="formBox" align="left">
    <tbody>
      <tr>
        <td><?php foreach($list_block as $block):?>
          <fieldset>
            <legend><?php echo $block['block_name']; ?></legend>
            <?php $list_label = $this->cms_label_model->get_list(array('label_bs'=>$block['block_sign']));
                  foreach($list_label as $label):?>
            <input type="checkbox" name="art_lbid[]" value="<?php echo $label['label_id'];?>" <?php echo set_checkbox('art_lbid[]',$label['label_id']);?> />
            <?php echo $label['label_name'];?>
            <?php endforeach;?>
          </fieldset>
          <?php endforeach;?></td>
      </tr>
    </tbody>
  </table>
</form>
</body>
</html>