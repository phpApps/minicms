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
<table cellspacing="0" cellpadding="0" width="100%" class="toolBox">
  <tr>
    <td><button type="button" onclick="location.href='<?php echo site_url("system/sys_admin/add")?>'">添加</button></td>
  </tr>
</table>
<table cellspacing="0" cellpadding="0" width="100%" class="dataBox">
  <thead>
    <tr>
      <td>ID</td>
      <td>姓名</td>
      <td>手机</td>
      <td>角色</td>
      <td>在职</td>
      <td class="text-center">操作</td>
    </tr>
  </thead>
  <tbody>
    <?php foreach($result as $item):?>
    <tr>
      <td><?php echo $item['admin_id'];?></td>
      <td><?php echo $item['admin_name'];?></td>
      <td><?php echo $item['admin_phone'];?></td>
      <td><?php foreach($list_role as $role){ if($role['role_id']==$item['admin_roleid'])echo $role['role_name'];}?></td>
      <td><?php if($item['admin_work']==1):?>
        <input type="checkbox" disabled checked />
        <?php endif;?></td>
      <td class="text-center"><a href="<?php echo site_url("system/sys_admin/edit/$page/{$item['admin_id']}")?>">修改</a>
        <?php if($item['admin_id'] != 1):?>
        <a href="<?php echo site_url("system/sys_admin/delete/$page/{$item['admin_id']}")?>">删除</a>
        <?php endif;?></td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
<table width="100%" cellspacing="0" class="pageBox">
  <tr>
    <td></td>
  </tr>
</table>
</body>
</html>
