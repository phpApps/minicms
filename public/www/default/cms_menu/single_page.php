<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1, user-scalable=0" />
<title><?php echo $row_menu['menu_title'];?></title>
<meta name="keywords" content="<?php echo $row_menu['menu_keyword'];?>" />
<meta name="description" content="<?php echo $row_menu['menu_description'];?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>plugin/bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>plugin/bootstrap/css/boot.reset.css"/>
</head>
<body>
<?php $this->load->view('welcome/header');?>
<div class="container">
  <div class="jumbotron">
    <h2 class="mt10"><?php echo $row_menu['menu_sname'];?></h2>
    <p><?php echo $row_menu['menu_intro'];?></p>
  </div>
</div>
<div class="container">
  <ol class="breadcrumb">
    <li class="active"><a href="<?php echo base_url();?>">首页</a></li>
    <?php foreach($crumbs as $crumb):?>
    <li><a href="<?php echo $crumb['menu_link'];?>"><?php echo $crumb['menu_name'];?></a></li>
    <?php endforeach;?>
  </ol>
  <div class="row">
    <div class="col-sm-3 hidden-xs">
      <div class="panel panel-default">
        <div class="panel-heading"><?php echo $subnav['menu_name'];?></div>
        <ul class="list-group">
          <?php foreach($subnav['children'] as $nav):?>
          <a class="list-group-item <?php if($id==$nav['menu_id']) echo 'active'?>" href="<?php echo $nav['menu_link'];?>"><?php echo $nav['menu_name'];?></a>
          <?php endforeach;?>
        </ul>
      </div>
    </div>
    <div class="col-sm-9">
      <div class="panel panel-default">
        <div class="panel-body">
          <h1 class="text-center"><?php echo $row_menu['menu_name'];?></h1>
          <hr/>
          <table width="100%">
            <tr>
              <td><?php echo $row_menu['menu_content'];?></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('welcome/footer');?>
</body>
</html>