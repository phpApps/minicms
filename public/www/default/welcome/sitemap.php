<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>网站地图</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>plugin/bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>plugin/bootstrap/css/boot.reset.css"/>
</head>

<body>
<?php $this->load->view('welcome/header');?>
<div class="container">
  <div class="layout clearfix pt30 pb30">
    <?php foreach($sitemap as $sign=>$site): ?>
    <div class="col-sm-4">
      <h3 class="h3tit fwb mb30"><?php echo @$langs[$sign];?></h3>
      <?php foreach($site as $one):?>
      <h4 class="h4tit fwb"> <a href="<?php echo $one['menu_link'];?>"><?php echo $one['menu_name'];?></a></h4>
      <ul class="list-inline ml10 mt10 mb30">
        <?php foreach($one['children'] as $two):?>
        <li><a href="<?php echo $two['menu_link'];?>"><?php echo $two['menu_name'];?></a></li>
        <?php endforeach;?>
      </ul>
      <?php endforeach;?>
    </div>
    <?php endforeach;?>
  </div>
</div>
<?php $this->load->view('welcome/footer');?>
</body>
</html>