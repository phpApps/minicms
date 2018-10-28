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
<table cellspacing="0" cellpadding="0" width="100%" class="toolBox">
  <tr>
    <td><button type="button" onclick="location.href='<?php echo site_url("system/sys_role/add")?>'">添加</button></td>
  </tr>
</table>
<table cellspacing="0" cellpadding="0" width="100%" class="dataBox">
  <thead>
    <tr>
      <td>ID</td>
      <td>名称</td>
      <td>系统</td>
      <td>操作</td>
    </tr>
  </thead>
  <tbody>
    <?php foreach($result as $item):?>
    <tr>
      <td><?php echo $item['role_id'];?></td>
      <td><?php echo $item['role_name'];?></td>
      <td><?php if($item['role_system']==1):?>
        <input type="checkbox" disabled checked />
        <?php endif;?></td>
      <td><a href="<?php echo site_url("system/sys_role/edit/{$item['role_id']}")?>">修改</a>
      <?php if($item['role_system']==0):?>
      <a href="<?php echo site_url("system/sys_role/delete/{$item['role_id']}");?>" rel="del">删除</a>
       <?php endif;?></td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
</body>
</html>
