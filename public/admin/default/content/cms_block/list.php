<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="<?php echo base_url();?>admin/assets/css/style.css" rel="stylesheet" />
<script src="<?php echo base_url();?>plugin/jquery/jquery-3.0.0.min.js"></script>
<script src="<?php echo base_url();?>admin/assets/js/script.js"></script>
</head>
<body style="padding-bottom:300px;">
<div class="toolBox">
  <button type="button" onclick="location.href='<?php echo site_url('content/cms_block/add')?>'">添加</button>
</div>
<table width="100%" cellspacing="0" class="dataBox">
  <thead>
    <tr>
      <td>ID</td>
      <td>标识</td>
      <td>名称</td>
      <td>排序</td>
      <td>关联文章</td>
      <td>启用</td>
      <td>操作</td>
    </tr>
  </thead>
  <tbody>
    <?php foreach($result as $item):?>
    <tr>
      <td><?php echo $item['block_id']?></td>
      <td><?php echo $item['block_sign']?></td>
      <td><?php echo $item['block_name']?></td>
      <td><input type="text" value="<?php echo $item['block_sort']?>" size="6" /></td>
      <td><?php if($item['block_article']==1):?>
        <input type="checkbox" disabled checked />
        <?php endif;?></td>
      <td><?php if($item['block_enable']==1):?>
        <input type="checkbox" disabled checked />
        <?php endif;?></td>
      <td><a href="<?php echo site_url("content/cms_block/edit/".$item['block_id']);?>">修改</a>
        <?php if($item['block_system']==0):?>
        <a href="<?php echo site_url("content/cms_block/delete/".$item['block_id']);?>" rel="del">删除</a></td>
      <?php endif;?>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
</body>
</html>
