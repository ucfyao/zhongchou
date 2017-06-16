<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<title>找回密码-芝麻乐开源众筹系统</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/Public/css/pintuer.css">
<script src="/Public/js/jquery-1.8.3.min.js"></script>
<script src="/Public/js/pintuer.js"></script>
<script src="/Public/js/respond.js"></script>
<script src="/Public/lib//layer/layer.js"></script>
</head>
<body> 
<div class="x12 text-center">
	<span class="padding"><img src="/uploads/1/20151017/zmlcms_1445061661767.png" alt="芝麻乐开源众筹系统" class="padding"></span>
</div>
<div class="x12 bg-white padding">
<h4 class="padding-bottom">找回密码</h4>
<div class="form-group">
	<div class="field field-icon">	
		<span class="padding-small-top icon icon-user"></span>					
		<input type="text"  placeholder="手机号" name="phone" class="input input-big box-shadow-none text-small radius-none" />					
	</div>
</div>
<div class="form-group">
			
	  <div class="field field-icon">	
		<span class="padding-small-top icon icon-check-square-o"></span>
		  <input type="text " size="30" class="input radius-none input-big box-shadow-none text-small input-auto" name="verify"   placeholder="短信验证码" />
		  <input type="button" class="button button-big radius-none border text-small" onclick="getyzm(this)" value="获取验证码" />
	  </div>
	
</div>
<div class="form-group">
	<div class="field field-icon">	
		<span class="padding-small-top icon icon-key"></span>						
		<input type="password" name="pwd" placeholder="设置新的登录密码" class="input box-shadow-none text-small input-big radius-none" />
	</div>
</div>		
<a href="javascript:void(0)"  class="x12 bg-red text-center padding text-white" onclick="login(this)">确 认</a>
<div class="x12 margin-big-top">
	<span>已有账号  【<a href="/index.php/User/Login/index" class="text-blue">立即登录</a>】</span>
</div>
</div>
<script>
		var wait=60; 
		function time(o) { 
			if (wait == 0) { 
			o.removeAttribute("disabled");	
			o.value="获取验证码"; 
			wait = 30; 
			} else { 
			o.setAttribute("disabled", true); 
			o.value="重新发送(" + wait + ")"; 
			wait--; 
			setTimeout(function() { 
			time(o) 
			}, 
			1000) 
			} 
		} 
		function getyzm(d){			
			var phone=$("input[name='phone']");	
			if(phone.val()==''){
				layer.tips('手机号不能为空', phone,{tips: [1, '#f60']});
				phone.focus();
				return false
			}
			var telReg = !!phone.val().match(/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/);
			if(telReg == false){
				layer.tips('手机号格式不对', phone,{tips: [1, '#f60']});
				phone.focus();
				return false
			}
			$.post('/index.php/User/Login/forgotpwd_sendsms.html',{phone:phone.val()},function(e){
				if(e.status==1){
					layer.msg(e.info);
					time(d)
					$(d).text('验证已发送');
				}else{
					layer.msg(e.info,{shift: 6})
				}
			})	
		}
	
		function verify(id){
			$("#"+id).attr('src',"<?php echo U('/Home/Verify');?>");
		}
		function login(d){
			var phone=$("input[name='phone']")
			var pwd=$("input[name='pwd']")
			var verify=$("input[name='verify']")
			if(phone.val()==''){
				layer.tips('手机号不能为空', phone,{tips: [1, '#f60']});
				phone.focus();
				return false
			}
			if(verify.val()==''){
				layer.tips('验证码不能为空', verify,{
					tips:4,
				});
				verify.focus();
				return false			
			}
			if(pwd.val()==''){
				layer.tips('密码不能为空', pwd,{tips: [1, '#f60']});
				pwd.focus();
				return false			
			}
			$.post(
				"/index.php/User/Login/forgotpwd",
				{
					phone:phone.val(),
					pwd:pwd.val(),				
					verify:verify.val(),
				},function (data){
					if (data.status == 1) {
						layer.msg(data.info,{shift: 2})
					}else{
						layer.msg(data.info,{shift: 6})
						
					}
				}
			)
		}
	</script>
    <div class="x12" style="height:50px;"></div>
    <div class="x12 text-center text-white fixed-bottom">
        <a href="/" class="x3 bg-red text-white padding"><span class="icon-home padding-small-right"></span>首页</a>
        <a href="/Item" class="x3 bg-red text-white padding border-left border-right"><span class="icon-legal padding-small-right"></span>项目</a>
        <a href="/News" class="x3 bg-red text-white padding border-left border-right"><span class="icon-legal padding-small-right"></span>动态</a>
        <a href="/User" class="x3 bg-red padding text-white"><span class="icon-user padding-small-right"></span>我</a>
    </div>
    
</body>
</html>