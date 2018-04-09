<?php 	$lang_curr = $this->session->userdata('site_language');
		$lang_list = config_item('support_language');
		$userid = isset($this->session->userdata["userid"]) ? $this->session->userdata["userid"] : NULL;?>
        
<nav class="navbar navbar-default">
  <div class="container">
    <ul class="nav navbar-nav navbar-right">
      <li><a href="">客服</a></li>
      <li class="dropdown"> <a href="<?php echo base_url($lang_curr);?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo @$lang_list[$lang_curr];?> <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <?php foreach($lang_list as $sign=>$vaule):?>
          <li <?php if($sign == $lang_curr) echo'class="active"';?> ><a class="<?php echo $sign;?>" href="<?php echo site_url($sign);?>"><?php echo $vaule;?></a></li>
          <?php endforeach;?>
        </ul>
      </li>
    </ul>
    <div class="dropdown">
	   <?php $mid = $this->session->userdata("mid");?>
	  <?php if(isset($mid) && $mid > 0):?>
	  <button type="button" class="btn dropdown-toggle navbar-btn" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="background-color:#ccc; padding:0;width:40px; height:40px;border:none;border-radius:50%;overflow:hidden;">
	  <img class="img-circle" style="padding:2px;" src="<?php echo $this->mem_member_model->get_icon($userid);?>" width="100%" alt=""/> </button>
	  <?php else:?>
	  <a target="_blank" class="btn" style="padding-left:0;padding-right:0;"href="<?php echo site_url("admin/plugin/qq_login?redirect_uri=".base64_encode(current_url()));?>"><img src="<?php echo base_url('www/assets/img/qq_login.gif');?>"  alt="usericon 35*35"/></a>
	  <?php endif;?>
	  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <li><a href="<?php echo site_url('ajax/login');?>"><i class="glyphicon glyphicon-log-in"></i> 用户登录</a></li>
        <li><a href="<?php echo site_url("admin/plugin/tp_login/loginout?redirect_uri=".base64_encode(current_url()));?>"><i class="glyphicon glyphicon-log-out"></i> 退出登录</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
  <nav class="navbar navbar-default">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false"> <span class="sr-only">Menu</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="<?php echo base_url();?>">LOGO</a> </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url();?>">首页 <span class="sr-only">(current)</span></a></li>
        <?php foreach($menus as $menu):?>
        <li <?php if(isset($subnav) && $menu['menu_id']==$subnav['menu_id']) echo 'class="active"'?>> <a href="<?php echo $menu['menu_link'];?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo $menu['menu_name'];?> <span class="caret"> </span> </a>
          <ul class="dropdown-menu">
            <?php foreach($menu['children'] as $child):?>
            <li><a href="<?php echo $child['menu_link'];?>"><?php echo $child['menu_name'];?></a></li>
            <?php endforeach;?>
          </ul>
        </li>
        <?php endforeach;?>
      </ul>
    </div>
  </nav>
</div>
