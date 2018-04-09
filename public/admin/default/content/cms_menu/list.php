<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="<?php echo base_url();?>template/default/assets/css/style.css" rel="stylesheet" />
<script src="<?php echo base_url();?>template/plugin/jquery/jquery-3.0.0.min.js"></script>
<script src="<?php echo base_url();?>template/default/assets/js/script.js"></script>
</head>
<body style="padding-bottom:300px;">
<div class="toolBox">
  <button type="button" onclick="location.href='<?php echo site_url('cms_menu/add')?>'">添加</button>
</div>
<table width="100%" cellspacing="0" cellpadding="0" class="dataBox">
  <thead>
    <tr>
      <td>ID</td>
      <td>名称</td>
      <td>URL</td>
      <td>类型</td>
      <td>显示</td>
      <td>排序</td>
      <td>操作</td>
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
  <td><?php echo $item['menu_id']?></td>
  <td class="lv<?php echo $lv;?>"><?php echo$item['menu_name']?></td>
  <td><a target="_blank" href="<?php echo $item['menu_link'];?>"><?php echo $item['menu_url']?></a></td>
  <td><?php if($item['menu_out']==1) echo '外链';
  			elseif(strpos($item['menu_tid'],'page')!==FALSE) echo '单页面';
  			elseif(strpos($item['menu_tid'],'list_news')!==FALSE) echo '纯文本列表';
  			elseif(strpos($item['menu_tid'],'list_image')!==FALSE) echo '含图片列表';
  		?>
    <?php ?></td>
  <td><?php if($item['menu_enable']==1):?>
    <input type="checkbox" disabled checked />
    <?php endif;?></td>
  <td><input type="text" value="<?php echo $item['menu_sort']?>" size="5" /></td>
  <td><a href="<?php echo site_url("cms_menu/edit/{$item['menu_id']}");?>">修改</a> <a href="<?php echo site_url("cms_menu/delete/{$item['menu_id']}");?>" rel="del">删除</a></td>
</tr>
<?php 
		if(isset($item['children'])){
			$lv++; 
			create_table($item['children'],$lv);
		}
	}
}
?>
</body>
</html>
