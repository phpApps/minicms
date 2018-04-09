<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="<?php echo base_url();?>template/default/assets/css/style.css" rel="stylesheet" />
<script src="<?php echo base_url();?>template/plugin/jquery/jquery-3.0.0.min.js"></script>
<script src="<?php echo base_url();?>template/default/assets/js/script.js"></script>
</head>
<body>
<table cellspacing="0" cellpadding="0" width="100%" class="toolBox">
  <tr>
    <td><button type="button" onclick="location.href='<?php echo site_url('system/sys_option/add')?>'">添加</button></td>
  </tr>
</table>
<table width="100%" cellspacing="0" cellpadding="0" class="dataBox">
  <thead>
    <tr>
      <td>ID</td>
      <td>名称</td>
      <td>排序</td>
      <td>访问URL</td>
      <td>菜单</td>
      <td class="text-center">操作</td>
    </tr>
  </thead>
  <tbody>
    <?php echo create_table($result);?>
  </tbody>
</table>
<?php 
function create_table($result,$level=0){
	foreach($result as $item){ 
		$lv = $level; 
?>
<tr>
  <td><?php echo $item['option_id']?></td>
  <td class="lv<?php echo $lv;?>"><?php echo $item['option_name']?></td>
  <td><input name="change_sort" type="text" value="<?php echo $item['option_sort']?>" _sortid="<?php echo $item['option_id']?>" _oldval="<?php echo $item['option_sort']?>" _ajax="<?php echo site_url('system/sys_option/ajax_sort');?>" size="6" /></td>
  <td><?php echo $item['option_value']?></td>
  <td><?php if($item['option_ismenu']==1):?>
    <input type="checkbox" disabled checked />
    <?php endif;?></td>
  <td class="text-center"><a href="<?php echo site_url("system/sys_option/edit/{$item['option_id']}");?>">修改</a>
    <?php if($item['option_system']==0):?>
    <a href="<?php echo site_url("system/sys_option/delete/{$item['option_id']}");?>" rel="del">删除</a>
    <?php endif;?></td>
</tr>
<?php 
		if(isset($item['children'])){
			$lv++; 
			create_table($item['children'],$lv);
		}
	}
}
?>
<br/><br/>
</body>
</html>
