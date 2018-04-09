$(function(){
	
	
	// 全局左边菜单
	$('#lefter .menu dt').click(function(){
		if($(this).hasClass('open')){
			$(this).removeClass('open').siblings('dd').hide();
		}else{
			$(this).addClass('open').siblings('dd').show();
		}
	});
	$('#lefter .menu dd').click(function(){ 
		$('.menu dd').removeClass('sel');
		$(this).addClass('sel'); 
	}); 
	
	
	
	//AJAX改变排序
	if($("input[name='change_sort']").length>0){
		$("input[name='change_sort']").blur(function(){
			var newval = $(this).val();
			var oldval = $(this).attr("_oldval");
			var sortid = $(this).attr("_sortid");
			var ajaxurl = $(this).attr("_ajax");
			if(newval!=oldval){
				$.post(ajaxurl,{sortval:newval,sortid:sortid},function(json){
					if(json.error_code==0){
						$(this).attr("_oldval",newval);
					}
				});
			}
		});
	}

	
	
	
	// 删除数据提示信息
	$("a[rel='del']").click(function(){
		if(confirm('确认删除!')){
			window.location.href = $(this).attr("href");
		}
		return false;
	});
	
	
	
	// 全选操作
	$("input[name='all']",".inputall").click(function(){
		if($(this).attr("checked")){
			$("input.ids").attr("checked",'true');//全选
		}else{
			$("input.ids").removeAttr("checked");//取消全选  
		}
	});
	$("input.ids").click(function(){
		$("input[name='all']").removeAttr("checked");
	});
	
	
	
})



