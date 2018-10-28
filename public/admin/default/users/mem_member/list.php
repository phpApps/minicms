<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="<?php echo base_url();?>admin/assets/css/style.css" rel="stylesheet" />
<script src="<?php echo base_url();?>admin/default/plugin/jquery/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url();?>admin/assets/js/script.js"></script>
</head>
<body style="padding-bottom:300px;">
<div class="toolBox">
  <button type="button" onclick="location.href='<?php echo site_url("users/mem_member")?>'">刷新</button>
</div>
<table width="100%" cellspacing="0" class="dataBox">
  <thead>
    <tr>
      <td>ID</td>
      <td>姓名</td>
      <td>手机</td>
      <td>邮箱</td>
      <td>注册时间</td>
      <td>备注</td>
      <td>操作</td>
    </tr>
  </thead>
  <tbody>
    <?php foreach($result as $item):?>
    <tr>
      <td><?php echo $item['member_id'];?></td>
      <td><?php echo $item['member_name'];?></td>
      <td><?php echo $item['member_phone'];?></td>
      <td><?php echo $item['member_email'];?></td>
      <td><?php echo date('Y-m-d H:i',strtotime($item['member_regtime']));?></td>
      <td><?php echo ellipsize($item['member_remark'],30);?></td>
      <td><a href="<?php echo site_url("users/mem_member/edit/{$page}/{$item['member_id']}")?>">修改</a>
      <a href="<?php echo site_url("users/mem_member/delete/{$page}/{$item['member_id']}")?>" rel="del">删除</a></td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
<div class="pageBox"><?php echo $pages;?></div>
</body>
</html>