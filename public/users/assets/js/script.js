var langdata = {};
	langdata.cn = new Object();
	langdata.cn.namefild_empty = "请填写姓名";
	langdata.cn.namefild_Verification = "姓名为英文字母和汉字！",
	langdata.cn.passwordfild_empty = "请填写密码",
	langdata.cn.passwordfildF_Verification = "两次密码不一致！",
	langdata.cn.emailfild_empty = "请填写邮箱";
	langdata.cn.emailfild_Verification = "请正确填写邮箱！";
	langdata.cn.phonefild_empty = "请填写手机";
	langdata.cn.phonefild_Verification = "请正确填写手机号码！";
	langdata.cn.contentfild_empty = "请填写内容";
	langdata.cn.contentfild_Verification = "请填写内容不少于100字！";
	langdata.cn.captchafild_empty = "请填写验证码";
	langdata.cn.captchafild_Verification = "";
	langdata.cn.terms_and_condfild_empty = "必须勾选风险声明和隐私政策!";
	langdata.cn.terms_and_condfild_Verification = "";
	langdata.cn.age_agreefild_empty = "必须勾选年龄服务条款!";
	langdata.cn.age_agreefild_Verification = "";
	langdata.cn.butStatus_posAfter = "提交申請";
	langdata.cn.butStatus_postBefore = "提交申請中...";
	langdata.cn.butStatus_getCode = "获取验证码";
	langdata.cn.butStatus_resend = "重新发送";
	langdata.cn['1000'] = "验证码错误",
	langdata.cn['1001']="数据验证失败",
	langdata.cn['1002']="手机号码已登记",
	langdata.cn['8999']="提交失败，请稍后重试",
	langdata.cn['9000']="提交成功"+"\n"+"工作人员将按客户申请顺序进行联系，请保持电话畅通，非常感谢！";
	
	langdata.en = new Object();
	langdata.en.namefild_empty = "请填写姓名";
	langdata.en.namefild_Verification = "姓名为英文字母和汉字！",
	langdata.en.passwordfild_empty = "请填写密码",
	langdata.en.passwordfildF_Verification = "两次密码不一致！",
	langdata.en.emailfild_empty = "请填写邮箱";
	langdata.en.emailfild_Verification = "请正确填写邮箱！";
	langdata.en.phonefild_empty = "请填写手机";
	langdata.en.phonefild_Verification = "请正确填写手机号码！";
	langdata.en.contentfild_empty = "请填写内容";
	langdata.en.contentfild_Verification = "请填写内容不少于100字！";
	langdata.en.captchafild_empty = "请填写验证码";
	langdata.en.captchafild_Verification = "";
	langdata.en.terms_and_condfild_empty = "必须勾选风险声明和隐私政策!";
	langdata.en.terms_and_condfild_Verification = "";
	langdata.en.age_agreefild_empty = "必须勾选年龄服务条款!";
	langdata.en.age_agreefild_Verification = "";
	langdata.en.butStatus_posAfter = "提交申請";
	langdata.en.butStatus_postBefore = "提交申請中...";
	langdata.en.butStatus_getCode = "获取验证码";
	langdata.en.butStatus_resend = "重新发送";
	langdata.en['1000'] = "验证码错误",
	langdata.en['1001']="数据验证失败",
	langdata.en['1002']="手机号码已登记",
	langdata.en['8999']="提交失败，请稍后重试",
	langdata.en['9000']="提交成功"+"\n"+"工作人员将按客户申请顺序进行联系，请保持电话畅通，非常感谢！";
	
	langdata.hk = new Object();
	langdata.hk.namefild_empty = "請填寫姓名"; 
	langdata.hk.namefild_Verification = "姓名為英文字母和漢字！";
	langdata.hk.emailfild_empty = "請填寫郵箱";
	langdata.hk.passwordfild_empty = "請填寫密碼",
	langdata.hk.passwordfildF_Verification = "兩次密碼不一致！",
	langdata.hk.emailfild_Verification = "請正確填寫郵箱！";
	langdata.hk.phonefild_empty = "請填寫手機";
	langdata.hk.phonefild_Verification = "請正確填寫手機號碼！";		
	langdata.hk.contentfild_empty = "請填寫內容";
	langdata.hk.contentfild_Verification = "填寫內容不少於100字！";
	langdata.hk.captchafild_empty = "請填寫驗證碼"; 
	langdata.hk.captchafild_Verification = "";
	langdata.hk.terms_and_condfild_empty = "必須勾選風險聲明和隱私政策!";
	langdata.hk.terms_and_condfild_Verification = "";
	langdata.hk.age_agreefild_empty = "必須勾選年齡服務條款!";
	langdata.hk.age_agreefild_Verification = "";
	langdata.hk.butStatus_posAfter = "提交申請";
	langdata.hk.butStatus_postBefore = "提交申請中...";
	langdata.hk.butStatus_getCode = "獲取驗證碼";
	langdata.hk.butStatus_resend = "重新發送";
	langdata.hk['1000'] = "驗證碼錯誤";
	langdata.hk['1001'] = "数据验证失败";
	langdata.hk['1002'] = "手機號碼已登記";
	langdata.hk['8999'] = "提交失敗，請稍後重試";
	langdata.hk['9000'] = "提交成功"+"\n"+"工作人員將按客戶申請順序進行聯系，請保持電話暢通，非常感謝！";
	
var langname = 'cn';
var langcurr = get_langcurr();



$(document).ready(function(){

	//常用正则验证
	var emailRep = /^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/ ;//邮箱验证
	var chineseRep = /^([a-zA-Z\s\']|[\u4E00-\u9FA5])+$/ ;//中文和字母验证
	var phoneRep = /^(1[34578]\d{9})+$/;//手机号码验证
	 
	$(document).on('click','.menu-btn', function() {
		$('body').removeClass('language-open').toggleClass('menu-open');	
    });
	$(document).on('click','.lang a', function() {
		$('body').removeClass('menu-open').toggleClass('language-open');
    });
	
	$(document).on('click','.back-to-top',function(){
		$('body').animate({scrollTop:0}, 500);
	});
	
	//标签切换 
	if( $('.nav-tabs').length>0 ){
		$('.nav-tabs a').click(function (e) {
			e.preventDefault()
			$(this).tab('show')
		});
	}
	
	//交易条款
	if( $('.sel-tabs').length>0 ){
		$('.sel-tabs').change(function (e) {
			$(this).next('.sel-content').children('.sel-pane').removeClass('active');
			$($(this).val()).addClass('active');
		});
	}
	
	$("[data-toggle='tooltip']").tooltip(); 
	
	
	
	//首页开户
	$(".openMember").click(function(e) {
		    var btnThis= $(this);
			var obj = $(this).parents("form");
			var name = obj.find('input[name="member_name"]').val();
			var phone = obj.find('input[name="member_phone"]').val();
			var password = obj.find('input[name="member_password"]').val();
			var passwordF =obj.find('input[name="member_passwordF"]').val();
			var email = obj.find('input[name="member_email"]').val();
			var captcha = obj.find('input[name="captcha"]').val();
			if(name ==''){
				alert(get_langdata('namefild_empty'));
			    return false;
			}
			if(! chineseRep.test(name)){
				alert(get_langdata("namefild_Verification"));
				return false;
			}
			if( phone ==''){
				alert(get_langdata("phonefild_empty"));
				return false;
			}
			if(! phoneRep.test(phone)){
				alert(get_langdata("phonefild_Verification"));
				return false;
			}
			if(password == ''){
				alert(get_langdata("passwordfild_empty"));
				return false;
			}
			if(password != passwordF ){
			   alert(get_langdata("passwordfildF_Verification"));
			   return false;
			}
			if(! emailRep.test(email)){
				alert(get_langdata('emailfild_Verification'));
				return false;
			}
			if(captcha ==''){
				alert(get_langdata('captchafild_empty'));
				return false;
			}
			if(!$("input[name='terms_and_cond']").is(":checked")){
				alert(get_langdata('terms_and_condfild_empty'));
				return false;
			}
			if(!$("input[name='age_agree']").is(":checked")){
				alert(get_langdata('age_agreefild_empty'));
				return false;
			}
			open_account(btnThis,obj);
	 });
	 
	 
	 
	 //联络我们
	$(".openmsg").click(function(e) {
		    var btnThis= $(this);
			var obj = $(this).parents("form");
			var name = obj.find('input[name="msg_name"]').val();
			var phone = obj.find('input[name="msg_phone"]').val();
			var email = obj.find('input[name="msg_email"]').val();
			var content = obj.find('textarea[name="msg_content"]').val();
			var captcha = obj.find('input[name="captcha"]').val();
			if(name ==''){
				alert(get_langdata("namefild_empty"));
			    return false;
			}
			if(! chineseRep.test(name)){
				alert(get_langdata("namefild_Verification"));
				return false;
			}
			if( phone ==''){
				alert(get_langdata("phonefild_empty"));
				return false;
			}
			if(! phoneRep.test(phone)){
				alert(get_langdata("phonefild_Verification"));
				return false;
			}
			
			if(! emailRep.test(email)){
				alert(get_langdata("emailfild_Verification"));
				return false;
			}
			if(content==''){
				alert(get_langdata("contentfild_empty"));
				return false;
			}
			if(captcha ==''){
				alert(get_langdata("captchafild_empty"));
				return false;
			}
			open_account(btnThis,obj);
	  });
	  
	  
	  
	  //手机验证码
	  $("#send_code").click(function(e) {
		   var obj= $(this);
		   var phone = $("#send_name").val();
		   var codeUrl = $(this).attr("_url");
		       $.ajax({type:"GET",
			   url:codeUrl,
			   data:"send_name="+phone,
			   dataType:"json",
			   async:false,
			   success:function(data){
				   if(data.error==0){
					   alert(data.msg);
					   countdown(obj);
				   }else{
					   alert(data.msg);
				   }   
			   }
		   })
		   return false;
      });  
});

//开户
function open_account(btnThis,obj){
	var apiUrl = $(obj).attr("_action");
	var apiData = $(obj).serialize();
		$(btnThis).attr("disabled","disabled").val(get_langdata("butStatus_postBefore"));
		$.ajax({
			type:'POST',
			url:apiUrl,
			async:false,
			dataType:'json',
			data:apiData,
			success:function(res){
				alert(get_langdata(res.error,res));
				if(res.error == 9000) $(obj)[0].reset();
				$(btnThis).removeAttr("disabled").val(get_langdata("butStatus_posAfter"));
    			$(obj).find(".codes img").attr("src",$(obj).find(".codes img").attr("src") + new Date().getTime() );
			},
			error:function(Obj,msg,error){
				alert(msg+':'+error);
			},
			timeout:30000
	});
	return false;
}


//倒计时
var countdownTime = 60;//默认时间
function countdown(obj){
	 if(countdownTime == 0){
		 $(obj).text(get_langdata("butStatus_getCode"));
		 $(obj).removeClass("disabled");
	     countdownTime = 60;
	 }else{
		 $(obj).addClass("disabled");
		 $(obj).text(get_langdata("butStatus_resend")+"(" + countdownTime + ")");
		 countdownTime--;
		 setTimeout(function(){countdown(obj)},1000); 
	 }  
}


//语言设置 信息提示
function get_langcurr(){
	var reg = new RegExp("(/?|&)lang=([^&]*)(&|$)");
	var r = document.getElementById("langsrc").src.match(reg);
	if(r!=null){
		var lang = unescape(r[2]);
		if(langdata[lang]==undefined){
			lang = langname;
		}
		return lang;
	}
	return null;
}

function get_langdata(sign,back_json){
	if(langdata[langcurr][sign]==undefined){
		if(back_json==undefined || back_json.error==undefined){
			return 'Sign:'+sign+' Sign does not exist!';
		}else{
			return 'Error:'+back_json.error+' Msg:'+back_json.msg;
		}
	}
	else{
		return langdata[langcurr][sign];
	}
}














