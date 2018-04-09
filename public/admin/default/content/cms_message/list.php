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
  <button type="button" onclick="location.href='<?php echo site_url("cms_message")?>'">刷新</button>
</div>
<table width="100%" cellspacing="0" class="dataBox">
  <thead>
    <tr>
      <td>ID</td>
      <td>姓名</td>
      <td>手机</td>
      <td>留言</td>
      <td>备注</td>
      <td>时间</td>
      <td>操作</td>
    </tr>
  </thead>
  <tbody>
    <?php foreach($result as $item):?>
    <tr>
      <td><?php echo $item['msg_id'];?></td>
      <td><?php echo $item['msg_name'];?></td>
      <td><?php echo $item['msg_phone'];?></td>
      <td><?php echo ellipsize($item['msg_content'],30);?></td>
      <td><?php echo ellipsize($item['msg_remark'],30);?></td>
      <td><?php echo date('Y-m-d H:i',strtotime($item['msg_time']));?></td>
      <td><a href="<?php echo site_url("cms_message/edit/{$page}/{$item['msg_id']}")?>">修改</a>
      <a href="<?php echo site_url("cms_message/delete/{$page}/{$item['msg_id']}")?>" rel="del">删除</a></td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
<div class="pageBox"><?php echo $pages;?></div>
</body>
</html>