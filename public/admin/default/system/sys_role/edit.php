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
	$("#permissions input[type='checkbox']").change(function(){
		
		if($(this).is(":checked")){
			$("."+$(this).attr("id")).prop("checked",true);
		}else{
			$("."+$(this).attr("id")).prop("checked",false);
		} 
		var clss = ($(this).prop("className")).split(" ");
		
		for(var num in clss){
			var ob = $("."+clss[num]).not("input:checked");
			if(ob.length==0){
				$("#"+clss[num]).prop("checked",true);
				$("#"+clss[num]).prop("indeterminate",false);
			}else{
				$("#"+clss[num]).prop("indeterminate",true);
			}
		}
	});
});
</script>
</head>
<body style="padding-bottom:300px;">
<table cellspacing="0" cellpadding="0" width="100%" class="toolBox">
  <tr>
    <td><button type="button" onclick="location.href='<?php echo site_url("system/sys_role/index");?>'">返回</button></td>
  </tr>
</table>
<div class="noteBox"></div>
<form method="post">
  <table cellspacing="0" cellpadding="0" width="50%" class="formBox" align="left">
    <tbody>
      <tr>
        <td>名称<span class="red">*</span></td>
        <td><input type="text" name="role_name" value="<?php echo set_value('role_name',$row['role_name']);?>" class="ws50" />
          <?php echo form_error('role_name');?></td>
      </tr>
      <tr>
        <td>备注</td>
        <td><textarea name="role_remark" class="ws50"><?php echo set_value('role_remark',$row['role_remark']);?></textarea>
          <?php echo form_error('role_remark');?></td>
      </tr>
      <tr>
        <td></td>
        <td><button type="submit">提交</button></td>
      </tr>
    </tbody>
  </table>
  <table cellspacing="0" cellpadding="0" width="50%" class="formBox" align="right">
    <tbody>
      <tr>
        <td id="permissions"><?php $option_ids = array(); $role_option = json_decode($row['role_option'],TRUE);
									foreach($role_option as $ids) $option_ids = array_merge($ids,$option_ids);?>
          <?php foreach($list_option as $i=> $one):if($one):?>
          <fieldset class="mb10">
            <legend align="center">
            <input id="sys_<?php echo $i;?>" name="role_option[<?php echo $one['option_id'];?>][]" value="<?php echo $one['option_id'];?>" type="checkbox" <?php if(in_array($one['option_id'] ,$option_ids))echo 'checked';?>/>
            <?php echo $one['option_name']?></legend>
            <?php foreach($one['children'] as $j=>$two):?>
            <?php if(empty($two['children'])):?>
            <span class="dib mr10">
            <input class="sys_<?php echo $i;?>" name="role_option[<?php echo $one['option_id'];?>][]" value='<?php echo $two['option_id'];?>' type="checkbox" <?php if(in_array($two['option_id'] ,$option_ids))echo 'checked';?>/>
            <?php echo $two['option_name'];?></span>
            <?php else:?>
            <fieldset class="mb10">
              <legend class="fwb">
              <input id="sys_<?php echo $i."_".$j;?>" class="sys_<?php echo $i;?>" name="role_option[<?php echo $one['option_id'];?>][]" value="<?php echo $two['option_id'];?>"  type="checkbox" <?php if(in_array($two['option_id'] ,$option_ids))echo 'checked';?>/>
              <?php echo $two['option_name'];?></legend>
              <?php if(!empty($two['children'])):?>
              <?php foreach($two['children'] as $h=>$three):?>
              <span class="dib mr10">
              <input class="sys_<?php echo $i;?> sys_<?php echo $i.'_'.$j;?>" name="role_option[<?php echo $one['option_id'];?>][]" value="<?php echo $three['option_id'];?>"  type="checkbox" <?php if(in_array($three['option_id'] ,$option_ids))echo 'checked';?>>
              <?php echo $three['option_name'];?></span>
              <?php endforeach;?>
              <?php endif;?>
            </fieldset>
            <?php endif;?>
            <?php endforeach;?>
          </fieldset>
          <?php endif;endforeach;?></td>
      </tr>
    </tbody>
  </table>
</form>
</body>
</html>