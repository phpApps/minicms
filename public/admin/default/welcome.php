<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo setting_item('backend_title',FALSE)?></title>
<link href="<?php echo base_url();?>admin/assets/css/style.css" rel="stylesheet" />
<script src="<?php echo base_url();?>plugin/jquery/jquery-3.0.0.min.js"></script>
<script>
$(function(){
	$('#header .edit_profile').click(function(){
		$('#header .menu li').removeClass('active');
	});
	$('#header .menu li').click(function(){
		$(this).addClass('active').siblings().removeClass('active');
		$('#lefter .nav>ul>li').hide().eq($(this).index()).show();
	});
	$('#lefter .nav>ul>li>ul>li>ul>li>a').click(function(){
		$('#lefter .nav>ul>li>ul>li>ul>li>a').removeClass('active');
		$(this).addClass('active').siblings();
	});
});
</script>
<style>
html, body {height:100%;overflow:hidden;}
</style>
<body>
<div id="header">
  <div class="logo"><a href="<?php echo site_url()?>"><?php echo setting_item('backend_name',FALSE);?></a> </div>
	<div class="link">
	  <ul>
		<li><a href="<?php echo base_url();?>" target="_blank">网站首页</a></li>
		<?php $lang_list=config_item('support_language');$lang_curr=$this->session->userdata('backend_language');?>
		<?php if(count($lang_list)>1):?>
		<li class="drop"><a><?php echo isset($lang_list[$lang_curr]) ? $lang_list[$lang_curr] :$lang_curr;?><span></span></a>      
		  <ul>
			<?php foreach($lang_list as $sign=>$value):?>
			<li><a href="<?php echo site_url('system?'.$sign);?>"><?php echo $value;?></a></li>
			<?php endforeach;?>
		  </ul>  
		</li>
		<?php endif;?>
		<li class="drop"><a><?php echo $this->session->userdata('admin_name');?>qweqw<span></span></a>
		  <ul>
			<li><a class="edit_profile" href="<?php echo site_url('system/sys_profile');?>" target="iframe_content">修改资料</a></li>
			<li><a href="<?php echo site_url('login/out');?>">安全退出</a></li>
		  </ul>
		</li>
	  </ul>
	</div>
  <div class="menu">
    <?php echo $head_option;?>
  </div>
</div>
<div id="lefter">
	<div class="nav">
	<?php echo $list_option;?>
	</div>
</div>
<div id="righter">
	<iframe name="iframe_content" frameborder="0" src="<?php echo site_url('version');?>" width="100%" height="100%"></iframe>
</div>
</body>
</html>
