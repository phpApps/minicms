<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>会员绑定列表</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url();?>plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>plugin/bootstrap/css/boot.reset.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>plugin/jquery/jquery-3.0.0.min.js" ></script>
<script src="<?php echo base_url();?>plugin/bootstrap/js/bootstrap.min.js" ></script>
<body>
<div class="container"> <br/>
  <div class="row">
    <div class="col-xs-8">
      <div class="pull-left"><a href="<?php echo base_url();?>"><img height="50" src="<?php echo base_url();?>default/assets/img/logo.png" /></a></div>
      <div class="pull-left"><span class="db pt25 fc9">会员绑定信息</span></div>
    </div>
  </div>
  <hr/>
</div>
<div class="container">
    <h3 class="pb20">快捷登录 </h3>
	<table class="table table-bordered table-striped">
		<thead>
            <tr>
				<th>名称</th>
				<th>操作</th>
            </tr>
        </thead>
        <tbody class="count">
		<?php foreach($logintype as $v):if(!empty($v['login_mid'])):?>
            <tr>
				<td><?php echo $v['login_from'];?></td>
				<td><a href="<?php echo site_url("member/binding/unbinding?login_from={$v['login_from']}")?>">解绑</a></td>
            </tr>
		<?php endif;endforeach;?>
        </tbody>
    </table>
</div>
</body>
</html>