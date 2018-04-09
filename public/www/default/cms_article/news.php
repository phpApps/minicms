<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1, user-scalable=0" />
<title><?php echo $row_article['art_title'];?></title>
<meta name="keywords" content="<?php echo $row_article['art_keyword'];?>" />
<meta name="description" content="<?php echo $row_article['art_description'];?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>plugin/bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>plugin/bootstrap/css/boot.reset.css"/>
<style>
#submit {
	/* The submit button */
	background-color: #58B9EB;
	border: 1px solid #40A2D4;
	color: #FFFFFF;
	cursor: pointer;
	font-family: 'Myriad Pro', Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
	padding: 4px;
	margin-top: 5px;
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	border-radius: 4px;
}
#submit:hover {
	background-color: #80cdf5;
	border-color: #52b1e2;
}
#CommentForm {
	position: relative;
}
#CommentForm .wordwrap {
	position: absolute;
	right: 6px;
	bottom: 6px;
}
#CommentForm .word {
	color: red;
	padding: 0 4px;
}
.pr5 {
	padding-right: 5px;
}
.msgbox {
	margin-top: 20px;
}
.msgbox ul li.media {
	padding-top: 20px;
	border-top: #CCC 1px solid;
}
.more {
	margin-top: 20px;
}
.reply p {
	color: #ef662f;
}
.nologin {
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	z-index: 1000;
}
.nologin .loginbox {
	position: absolute;
	top: 50%;
	left: 0;
	height: 24px;
	width: 100%;
	z-index: 1001;
	margin-top: -35px;
	text-align: center;
}
.loginbox a {
	display: inline-block;
	padding: 10px 0;
}
.itop {
    background:rgba(0, 0, 0, 0.6) url(<?php echo base_url();?>default/assets/img/icons_bar.png)  no-repeat 8px 6px;
    border-radius: 2px;
    bottom: 40px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    display: none;
    height: 36px;
    margin-bottom: 5px;
    position: fixed;
    right: 10px;
    width: 40px;
}
</style>
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
          <a class="list-group-item <?php if($row_article['art_mid']==$nav['menu_id']) echo 'active'?>" href="<?php echo $nav['menu_link'];?>"><?php echo $nav['menu_name'];?></a>
          <?php endforeach;?>
        </ul>
      </div>
    </div>
    <div class="col-sm-9">
      <div class="panel panel-default">
        <div class="panel-body">
          <h1 class="text-center"><?php echo $row_article['art_title'];?></h1>
          <hr/>
          <table width="100%">
            <tr>
              <td><?php echo $row_article['art_content'];?></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-6"> 上一篇：
          <?php if(empty($row_prev)): echo '没有了';?>
          <?php else:?>
          <a href="<?php echo site_url('news/'.$row_prev['art_id']);?>"><?php echo $row_prev['art_title'];?></a>
          <?php endif;?>
        </div>
        <div class="col-xs-6 text-right"> 下一篇：
          <?php if(empty($row_next)): echo '没有了';?>
          <?php else:?>
          <a href="<?php echo site_url('news/'.$row_next['art_id']);?>"><?php echo $row_next['art_title'];?></a>
          <?php endif;?>
        </div>
        <div id="cmt_kindeditor">
          <div class="col-xs-12" style=" margin-top:20px;">
            <div class="panel panel-default">
              <div class="panel-heading">文章评论
                <div class="share" style="display:inline-block; vertical-align:middle; margin-left:20px;">
                  <div class="bdsharebuttonbox"> <a href="#" class="bds_more" data-cmd="more"></a> <a href="#" class="bds_tsina" data-cmd="tsina"></a> <a href="#" class="bds_tqq" data-cmd="tqq"></a> <a href="#" class="bds_weixin" data-cmd="weixin"></a> <a href="#" class="bds_fbook" data-cmd="fbook"></a> <a href="#" class="bds_twi" data-cmd="twi"></a> </div>
                </div>
              </div>
              <div class="panel-body">
                <form id="CommentForm" method="post">
                <?php if(!isset($this->session->userdata['userid'])):?>
                  <div class="nologin">
                    <ul class="list-inline loginbox">
                      <li><a href="<?php echo base_url('plugin/qq_login?redirect_uri='.base64_encode(current_url()));?>"><img src="<?php echo base_url('plugin/template/');?>default/assets/images/qq_login.gif" alt="QQ"/></a></li>
                      <li><a href="<?php echo base_url('plugin/fb_login?redirect_uri='.base64_encode(current_url()));?>"><img src="<?php echo base_url('plugin/template/');?>default/assets/images/fb_login.png" alt="facebook"/></a></li>
                      <li><a href="<?php echo base_url('plugin/tw_login?redirect_uri='.base64_encode(current_url()));?>"><img src="<?php echo base_url('plugin/template/');?>default/assets/images/twitter_login.png" alt="twitter"/></a></li>
                    </ul>
                  </div>
                  <?php endif;?>
                  <input type="hidden" name="lang" value="<?php echo $row_article['lang'];?>">
                  <input type="hidden" name="art_id" value="<?php echo $row_article['art_id'];?>">
                  <textarea name="comment"></textarea>
                  <span class="wordwrap">(<var class="word">200</var>/200)</span>
                  <input id="submit" value="提交评论" type="submit">
                </form>
                <div class="msgbox col-xs-12">
                  <ul class="row media-list">
                  </ul>
                </div>
              </div>
              <div class="panel-footer text-center "><a id="1" class="btnmore btn btn-info">加载更多</a></div>
            </div>
          </div>
        </div>
      </div>
      <br/>
    </div>
  </div>
</div>
<div class="itop"></div>
<?php $this->load->view('welcome/footer');?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('plugin');?>/template/resource/kindeditor/themes/default/default.css"/>
<script src="<?php echo base_url('plugin');?>/template/resource/kindeditor/kindeditor-min.js"></script> 
<script src="<?php echo base_url('plugin');?>/template/resource/kindeditor/themes/default/emoticons.js"></script> 
<script src="<?php echo base_url('plugin');?>/template/resource/kindeditor/lang/zh_CN.js"></script> 
<script type="text/javascript"></script> 
<script>
//初始化配置资源
KindEditor.ready(function(K) {
	K.create('textarea[name="comment"]', {
		width:'100%',
		minHeight:120,
		pasteType : 1,
		filterMode : true,
		allowImageUpload : true,
		newlineTag : 'br',
		items : [
			'code','|','fontname','fontsize','|','forecolor','hilitecolor','bold','italic','underline','|','emoticons','image','flash','link'],
		afterChange : function(e){  
			var limitNum = 200; //设定限制字数  
      		var pattern = limitNum;  
      		$('.word').html(pattern);
      		if(this.count() >= limitNum) {  
      			  pattern = '字数超过限制，请适当删除部分内容';
				  $('.wordwrap').html(pattern).css('color',"#F00");       
      		 } else {  
      			 var result = limitNum - this.count();//text 不包含html代码占1个单位  
      			 pattern = result;  
     		}  
      		 $('.word').html(pattern);  
			} 
	});
});
</script> 
<script>
$(function(){
	
	//初始化数据
	getdata();
	
	//点击查看更多
	$(".btnmore").click(function(e) {
		var page = parseInt($(".btnmore").attr('id'));
		page=page+1;
		$(".btnmore").attr('id',page);
		getdata(page);
	});
	
	//回到顶部
	var obj = $(".itop"); 
	$(window).scroll(function ()
	{ 
		var scrolls  = $(document).scrollTop(); 
		if (scrolls > 300)
		{ 
			obj.fadeIn("slow")
		}else{ 
	 		obj.fadeOut("slow") } 
	}); 
	 
	//点击事件
	obj.click(function () { 
	 $("html,body").animate({
		 	scrollTop: 0
		  }, 500) 
	})
	
	//提交评论
	var inputin = false;
	$('#CommentForm').submit(function(e){
		e.preventDefault();
		if(inputin) return false;
		inputin = true;
		$('#submit').val('正在提交...');
		$.post('<?php echo base_url("plugin/tp_syscmt/kindeditor");?>',$(this).serialize(),function(msg){
			inputin = false;
			$('#submit').val('提交评论');
		},'json');
	});
	return false;
});

//评论加载函数
function getdata(page=1,limit=5){
	var  lang = '<?php echo $row_article['lang'];?>';
	var  art_id ='<?php echo $row_article['art_id'];?>';
	$.post('<?php echo base_url("plugin/tp_syscmt/cmtshow");?>',{"lang":lang,"art_id":art_id,'page':page,'limit':limit},function(data){
		if(data.status == 1){
			if($(data.xhtml).length < 5){
				$('.panel-footer').remove();
			}
			//$(data.xhtml).hide().insertAfter('#CommentForm').slideDown();
			if(data.xhtml){
				$(data.xhtml).hide().appendTo('.media-list').slideDown();
			}else{
				$('.panel-footer').remove();
			}
		}
	},'json');
return false;
}
</script>
<script id="share">
	window._bd_share_config={
				"common":{
							"bdSnsKey":{},
							"bdText":"",
							"bdMini":"2",
							"bdPic":"",
							"bdStyle":"0",
							"bdSize":"24"
						},
				"share":{},
			};
		with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
</script>
</body>
</html>