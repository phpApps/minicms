<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="<?php echo base_url();?>template/default/assets/css/style.css" rel="stylesheet" />
<script src="<?php echo base_url();?>template/plugin/jquery/jquery-3.0.0.min.js"></script>
<script src="<?php echo base_url();?>template/default/assets/js/script.js"></script>
<style>
#btn {
	display: inline-block;
	padding: 0 10px;
	background-color: #bed393;
	border: 1px solid #334905;
	color:#000;
	line-height:18px;
}
.red {
	color:#f00;
}
.green {
	color:#090;
}
</style>
</head>
<body style="padding-bottom:300px;">
<div class="toolBox">
  <button type="button" onclick="location.href='<?php echo site_url("cms_comment")?>'">刷新</button>
</div>
<table width="100%" cellspacing="0" class="dataBox">
  <thead>
    <tr>
      <td>ID</td>
      <td>文章标题</td>
      <td>评论时间</td>
      <td>评论内容</td>
      <td>管理员回复</td>
      <td>状态</td>
      <td>操作</td>
    </tr>
  </thead>
  <tbody>
    <?php foreach($result as $item):?>
    <tr>
      <td><?php echo $item['cmt_id'];?></td>
      <td><?php echo $item['art_title'];?></td>
      <td><?php echo substr($item['cmt_time'],0,-3);?></td>
      <td><?php echo ellipsize($item['cmt_content'],15);?></td>
      <td><?php if($item['cmt_reply']): echo ellipsize($item['cmt_reply'],15);?>
        <?php else:?>
        <span class="red">待回复</span>
        <?php endif;?></td>
      <td><?php if($item['cmt_status']== 2):?>
        <span class="green">已审核</span>
        <?php else:?>
        <span class="red">未审核</span> <a id="btn" href="<?php echo site_url("cms_comment/reply/{$page}/{$item['cmt_id']}")?>">审核</a>
        <?php endif;?></td>
      <td><a href="<?php echo site_url("cms_comment/edit/{$page}/{$item['cmt_id']}")?>">修改</a> <a href="<?php echo site_url("cms_comment/delete/{$page}/{$item['cmt_id']}")?>" rel="del">删除</a></td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
<div class="pageBox"><?php echo $pages;?></div>
</body>
</html>