<div class="container">
  <hr/>
  <div class="row">
    <?php foreach($menus as $menu):?>
    <div class="col-xs-6 col-sm-4 col-md-2">
      <h5><?php echo $menu['menu_name'];?></h5>
      <ul class="pl0">
        <?php foreach($menu['children'] as $child):?>
        <li><a href="<?php echo $child['menu_link'];?>"><?php echo $child['menu_name'];?></a></li>
        <?php endforeach;?>
      </ul>
    </div>
    <?php endforeach;?>
    <div class="col-xs-6 col-sm-4 col-md-2">
      <h5>友情链接</h5>
      <ul class="pl0">
        <?php if(isset($friend_link)):foreach($friend_link as $child):?>
        <li><a href="<?php echo $child['label_url']?>"><?php echo $child['label_name']?></a></li>
        <?php endforeach;endif;?>
      </ul>
    </div>
  </div>
  <hr/>
  <div class="col-xs-12 text-center"> <?php echo setting_item('site_icp');?><br/>
  </div>
</div>
<script src="<?php echo base_url();?>plugin/jquery/jquery-3.0.0.min.js"></script> 
<script src="<?php echo base_url();?>plugin/bootstrap/js/bootstrap.min.js"></script> 
