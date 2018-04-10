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
	var uploadbutton = K.uploadbutton({
		button : K('#uploadButton')[0],
		fieldName : 'imgFile',
		url : '<?php echo base_url();?>template/plugin/kindeditor/php/upload_json.php?dir=image',
		afterUpload : function(data) {
			if (data.error === 0) {
				var url = K.formatUrl(data.url, 'absolute');
				K('#menu_attach').val(url);
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
		url : '<?php echo base_url();?>template/plugin/kindeditor/php/upload_json.php?dir=image',
		afterUpload : function(data) {
			if (data.error === 0) {
				var url = K.formatUrl(data.url, 'absolute');
				K('#menu_attach2').val(url);
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
		url : '<?php echo base_url();?>template/plugin/kindeditor/php/upload_json.php?dir=file',
		afterUpload : function(data) {
			if (data.error === 0) {
				var url = K.formatUrl(data.url, 'absolute');
				K('#menu_attach3').val(url);
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
	K.create('textarea[name="menu_content"]', {
		pasteType : 1,
		filterMode : false,
		allowImageUpload : true,
		newlineTag : 'br',
		items : [
			'source', '|', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
			'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
			'insertunorderedlist', '|', 'emoticons', 'image', 'flash', 'link', '|', 'code', 'fullscreen']
	});		
});
$(function(){
	if($("#menu_out").is(":checked")){
		$(".notout").hide();
	}else{
		$(".notout").show();
	}
	if($("#menu_moren").is(":checked")){
		$("#menu_tid").attr("readonly",true).val($("#menu_moren").val());
	}else{
		$("#menu_tid").removeAttr("readonly").val("");
	}
	$("#menu_out").change(function(){ 
		if($(this).is(":checked")){
			$(".notout").hide();
		}else{
			$(".notout").show();
		}
	});
	$("#menu_moren").change(function(){
		if($(this).is(":checked")){
			$("#menu_tid").attr("readonly",true).val($(this).val());
		}else{
			$("#menu_tid").removeAttr("readonly").val("");
		}
	});	
})
</script>
</head>
<body style="padding-bottom:300px;">
<div class="toolBox">
  <button type="button" onclick="location.href='<?php echo site_url("content/cms_menu/index");?>'">返回</button>
</div>
<div class="noteBox"></div>
<form method="post">
  <table width="50%" cellspacing="0" class="formBox" align="left">
    <tbody>
      <tr>
        <td>状态<span class="red">*</span></td>
        <td><select name="menu_enable" class="ws50">
            <option value="1" <?php echo set_select('menu_enable',1);?>>显示</option>
            <option value="0" <?php echo set_select('menu_enable',0);?>>隐藏</option>
          </select>
          <?php echo form_error('menu_count');?></td>
      </tr>
      <tr>
        <td>排序</td>
        <td><input type="text" name="menu_sort" value="<?php echo set_value('menu_sort',100); ?>" class="ws50" />
          <?php echo form_error('menu_sort');?></td>
      </tr>
      <tr>
        <td>上级<span class="red">*</span></td>
        <td><select name="menu_pid" class="ws50">
            <option value="0">顶级</option>
            <?php echo $this->cms_menu_model->menu_option(set_value('menu_pid'));?>
          </select>
          <?php echo form_error('menu_pid');?></td>
      </tr>
      <tr>
        <td>名称<span class="red">*</span></td>
        <td><input type="text" name="menu_name" value="<?php echo set_value('menu_name'); ?>" class="ws50" />
          <?php echo form_error('menu_name');?></td>
      </tr>
      <tr>
        <td>URL<span class="red">*</span></td>
        <td><input type="text" name="menu_url" value="<?php echo set_value('menu_url'); ?>" class="ws50" />
          <input type="checkbox" id="menu_out" name="menu_out" value="1" <?php echo set_checkbox('menu_out',1);?> />
          外链 <?php echo form_error('menu_out');?> <?php echo form_error('menu_url');?></td>
      </tr>
    </tbody>
    <tbody class="notout">
      <tr>
        <td>类型<span class="red">*</span></td>
        <td><select name="menu_tid" class="ws50">
            <option value="">请选择</option>
        	<option value="cms_menu/single_page/{id}" <?php echo set_select('menu_tid','cms_menu/single_page/{id}');?>>单页面</option>
            <option value="cms_menu/list_news/{id}" <?php echo set_select('menu_tid','cms_menu/list_news/{id}');?>>纯文本列表</option>
            <option value="cms_menu/list_image/{id}" <?php echo set_select('menu_tid','cms_menu/list_image/{id}');?>>含图片列表</option>
        </select>
		<?php echo form_error('menu_tid');?></td>
      </tr>
      <tr>
        <td>简称</td>
        <td><input type="text" name="menu_sname" value="<?php echo set_value('menu_sname'); ?>" class="ws50"/>
          <?php echo form_error('menu_sname');?></td>
      </tr>
      <tr>
        <td>简介</td>
        <td><textarea name="menu_intro" class="ws50"><?php echo set_value('menu_intro'); ?></textarea>
          <?php echo form_error('menu_intro');?></td>
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
        <td><input type="text" id="menu_attach" name="menu_attach" value="<?php echo set_value('menu_attach'); ?>" class="ws50" readonly="readonly" />
          <input type="button" id="uploadButton" value="Upload" />
          <?php echo form_error('menu_attach');?></td>
      </tr>
      <tr>
        <td>附件图片</td>
        <td><input type="text" id="menu_attach2" name="menu_attach2" value="<?php echo set_value('menu_attach2'); ?>" class="ws50" readonly="readonly" />
          <input type="button" id="uploadButton2" value="Upload" />
          <?php echo form_error('menu_attach2');?></td>
      </tr>
      <tr>
        <td>附件文件</td>
        <td><input type="text" id="menu_attach3" name="menu_attach3" value="<?php echo set_value('menu_attach3'); ?>" class="ws50" readonly="readonly" />
          <input type="button" id="uploadButton3" value="Upload" />
          <?php echo form_error('menu_attach3');?></td>
      </tr>
      <tr>
        <td>meta标题</td>
        <td><input type="text" name="menu_title" value="<?php echo set_value('menu_title'); ?>" class="ws50"/>
          <?php echo form_error('menu_title');?></td>
      </tr>
      <tr>
        <td>meta关键字</td>
        <td><textarea name="menu_keyword" class="ws50"><?php echo set_value('menu_keyword'); ?></textarea>
          <?php echo form_error('menu_keyword'); ?></td>
      </tr>
      <tr>
        <td>meta描述</td>
        <td><textarea name="menu_description" class="ws50"><?php echo set_value('menu_description'); ?></textarea>
          <?php echo form_error('menu_description');?></td>
      </tr>
      <tr>
        <td>正文内容<span class="red">*</span></td>
        <td><textarea name="menu_content" style="width:100%"><?php echo set_value('menu_content'); ?></textarea>
          <?php echo form_error('menu_content'); ?></td>
      </tr>
    </tbody>
  </table>
</form>
</body>
</html>