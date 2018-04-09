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
  <button type="button" onclick="location.href='<?php echo site_url("cms_label/add/{$label_bs}")?>'">添加</button>
</div>
<table width="100%" cellspacing="0" class="dataBox">
  <thead>
    <tr>
      <td>ID</td>
      <td>名称</td>
      <td>排序</td>
      <td>显示</td>
      <td>操作</td>
    </tr>
  </thead>
  <tbody>
    <?php foreach($result as $item):?>
    <tr>
      <td><?php echo $item['label_id'];?></td>
      <td><?php echo $item['label_name'];?></td>
      <td><input type="text" value="<?php echo $item['label_sort']?>" size="5" /></td>
      <td><?php if($item['label_enable']==1):?>
        <input type="checkbox" disabled checked />
        <?php endif;?></td>
      <td><a href="<?php echo site_url("cms_label/edit/{$label_bs}/".$item['label_id']);?>"> 修改 </a> <a href="<?php echo site_url("cms_label/delete/{$label_bs}/".$item['label_id']);?>"> 删除 </a></td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
</body>
</html>
