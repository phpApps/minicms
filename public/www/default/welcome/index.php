<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1, user-scalable=0" />
<title><?php echo setting_item('site_title') ? setting_item('site_title') : setting_item('site_name');?></title>
<meta name="keywords" content="<?php echo setting_item('site_keyword');?>">
<meta name="description" content="<?php echo setting_item('site_description');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>plugin/bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>plugin/bootstrap/css/boot.reset.css"/>
</head>
<body>
<?php $this->load->view('welcome/header');?>
<div class="container">
  <div id="index-slide" class="carousel slide" data-ride="carousel" data-interval="4000">
    <ol class="carousel-indicators">
      <?php foreach($banner_slide as $num=>$slide):?>
      <li data-target="#index-slide" data-slide-to="<?php echo $num;?>" class="<?php if($num==0) echo 'active';?>"></li>
      <?php endforeach;?>
    </ol>
    <div class="carousel-inner" role="listbox">
      <?php foreach($banner_slide as $num=>$slide):?>
      <div class="item <?php if($num==0) echo 'active';?>"> <img src="<?php echo base_url($slide['label_attach']);?>" /><a href="<?php echo $slide['label_url'];?>" title="<?php echo $slide['label_intro']?>"></a> </div>
      <?php endforeach;?>
    </div>
  </div>
</div>
<br/>
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-4">
      <div class="panel panel-default">
        <div class="panel-heading">特别关注</div>
        <ul class="panel-body">
          <?php foreach($list_tebie as $item):?>
          <li>· <a href="<?php echo site_url('news/'.$item['art_id']);?>"><?php echo ellipsize($item['art_title'],20);?></a></li>
          <?php endforeach;?>
        </ul>
      </div>
    </div>
    <div class="col-xs-12 col-sm-4">
      <div class="panel panel-default">
        <div class="panel-heading">集团要闻</div>
        <ul class="panel-body">
          <?php foreach($list_yaowen as $item):?>
          <li>· <a href="<?php echo site_url('news/'.$item['art_id']);?>"><?php echo ellipsize($item['art_title'],20);?></a></li>
          <?php endforeach;?>
        </ul>
      </div>
    </div>
    <div class="col-xs-12 col-sm-4">
      <div class="panel panel-default">
        <div class="panel-heading">综合新闻</div>
        <ul class="panel-body">
          <?php foreach($list_zonghe as $item):?>
          <li>· <a href="<?php echo site_url('news/'.$item['art_id']);?>"><?php echo ellipsize($item['art_title'],20);?></a></li>
          <?php endforeach;?>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('welcome/footer');?>
<!--<script>
$(function(){
	  var  
	  $.ajax({
		 type: "POST",
		 url: "<?php echo base_url("plugin/tp_syscmt/kindeditor");?>",
		 data: {'username':$("#username").val(), 'content':$("#content").val()},
		 dataType: "json",
		 success: function(data){
			 $('.cmt_kindeditor').empty(); //清空resText里面的所有内容
			 var html = '<div class="col-xs-12"><div class="panel panel-default"><div class="panel-heading">文章评论</div><div class="panel-body">';
			 
			     html +='<textarea name="comment" style="min-height:200px;"></textarea>';
			     html +='</div></div></div>';
			$('.cmt_kindeditor').html(html);
				
				// $('#resText').empty();   //清空resText里面的所有内容
					 //var html = ''; 
					/* $.each(data, function(commentIndex, comment){
						   html += '<div class="comment"><h6>' + comment['username']
									 + ':</h6><p class="para"' + comment['content']
									 + '</p></div>';
					 });
					 $('#resText').html(html);*/
		}
	 });
	 return false;
});
</script>-->
</body>
</html>