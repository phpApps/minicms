<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="<?php echo base_url();?>template/default/assets/css/style.css" rel="stylesheet" />
<script src="<?php echo base_url();?>template/plugin/jquery/jquery-3.0.0.min.js"></script>
<script src="<?php echo base_url();?>template/plugin/datePicker/WdatePicker.js"></script>
<script src="<?php echo base_url();?>template/default/assets/js/script.js"></script>
</head>
<body style="padding-bottom:300px;">
<div class="toolBox">
  <button type="button" onclick="location.href='<?php echo site_url("cms_article/add/{$sign}")?>'">添加</button>
</div>
<form method="post" class="findBox">
  <table cellspacing="0" cellpadding="0">
    <tr>
      <td><input type="text" name="art_id" placeholder="ID" value="<?php echo $search['art_id'];?>" size="16" /></td>
      <td><input type="text" name="art_title" placeholder="标题" value="<?php echo $search['art_title'];?>" size="48" /></td>
      <td><select name="art_mid">
          <option value="0" <?php if($search['art_mid']==0) echo 'selected'; ?>>请选择菜单</option>
          <?php echo $this->cms_menu_model->menu_option($search['art_mid']);?>
        </select></td>
      <td><input name="art_hastop" type="checkbox" value="1" <?php echo set_checkbox('art_hastop',1);?> />置顶</td>
      <td><input name="art_enable" type="checkbox" value="0" <?php echo set_checkbox('art_enable',0);?> />隐藏</td>
      <td><button type="submit">搜索</button></td>
    </tr>
  </table>
  <?php foreach($list_block as $one):?>
  <fieldset style="overflow:hidden;margin:10px 0 0;">
    <legend style="padding:0 0 5px;"><?php echo $one['block_name'];?></legend>
    <?php $list_label = $this->cms_label_model->get_list(array('label_bs'=>$one['block_sign']));?>
    <?php foreach($list_label as $two):?>
    <span style="float:left;">
    <input type="checkbox" name="art_lbid[]" value='<?php echo $two['label_id'];?>' <?php if(in_array($two['label_id'],$search['art_lbid'])) echo 'checked="checked"'; ?>>
    <?php echo $two['label_name'];?> </span>
    <?php endforeach;?>
  </fieldset>
  <?php endforeach;?>
</form>
<table width="100%" cellspacing="0" class="dataBox">
  <thead>
    <tr>
      <td>ID</td>
      <td>标题</td>
      <td>菜单</td>
      <td>模块</td>
      <td>时间</td>
      <td>显示</td>
      <td>置顶</td>
      <td>操作</td>
    </tr>
  </thead>
  <tbody>
    <?php foreach($result as $item):?>
    <tr>
      <td><?php echo $item['art_id'];?></td>
      <td><?php echo ellipsize($item['art_title'],20);?></td>
      <td><?php echo $item['menu_name'];?></td>
      <td><?php echo $item['label_name'];?></td>
      <td><?php if($item['art_editime']>0)echo date('Y-m-d H:i',strtotime($item['art_editime']));?></td>
      <td><?php if($item['art_enable']==1):?>
        <input type="checkbox" disabled checked />
        <?php endif;?></td>
      <td><?php if($item['art_hastop']==1):?>
        <input type="checkbox" disabled checked />
        <?php endif;?></td>
      <td><a href="<?php echo site_url('cms_article/edit/'.$sign.'/'.$page.'/'.$item['art_id'])?>">修改</a></td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
<div class="pageBox"><?php echo $pages;?></div>
</body>
</html>