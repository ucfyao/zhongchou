<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
<title>芝麻乐众筹系统</title>
<meta name="robots" content="nofollow">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="/Public/css/pintuer.css" rel="stylesheet" type="text/css">
</head>
<body style="background: url(/Template/Admin/default/Style/img/bg.jpg) center;   " onkeydown="BindEnter(event)">
<div class="x12 h" style=" background-color:#000;background-color:rgba(0,0,0,0.4);" >
	<div class="container">
		<div class="xm4 xb4 xm4-move xb4-move xs12 padding-big radius-small"style=" background-color:#000;background-color:rgba(0,0,0,0.5); margin-top:100px;">
		<div class="x12 margin-top">	
				<h1 class="margin-bottom text-center text-white padding-bottom" style="font-size:36px;">芝麻乐众筹系统</h1>
		        <form method="post">
				  <div class="form-group">
					<div class="label">
					  <span class="float-right">登录账号为安装时填写的账号。</span>
					  <label for="username "><span class="text-white">账号*</span></label>
					</div>
					<div class="field field-icon-right">
					  <span class="icon icon-user"></span>
					  <input type="text" class="input" id="username" name="username" size="30" placeholder="账号" />
					</div>
				  </div>
				  <div class="form-group">
					<div class="label">
					  <span class="float-right">登录的密码口令。</span>
					  <label for="password"><span class="text-white">密码*</span></label>
					</div>

					<div class="field field-icon-right">
					  <span class="icon icon-unlock-alt"></span>
					  <input type="password" class="input" id="password" name="password" size="30" placeholder="请输入密码" />
					</div>
				  </div>
				  <div class="form-button margin-big-top"><button class="button bg-blue x3 float-right" id="login" type="button">登录</button></div>
				</form>
		</div>
	</div>

<script type="text/javascript" src="/Public/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/Public/lib/layer/layer.js"></script>

<script type="text/javascript">
function BindEnter(obj)
{
   
    if(obj.keyCode == 13)
        {
            $("#login").click()
          
        }
}
$(".h").css({
	'height':$(window).height()+'px'
})
$("#login").click(function(){
	var username=$("input[name='username']");
	var password=$("input[name='password']");
	if(username.val()==''){
		username.focus();
		return false
	}
	if(password.val()==''){
		password.focus();
		return false
	}
	$.ajax({
		type: 'POST',
		url: '<?php echo U("/Admin/Public/login");?>',
		data: {
			username:username.val(),
			password:password.val(),
		},
		beforeSend:function(){
			layer.load(2,{shade: [0.1,'#fff']});
		},
		success:function(data){
			layer.closeAll();
			if(data.status==1){
			 window.location.href = data.url;	
			}else{
				layer.msg(data.info);
			}
			
		}
});
})

		
		

</script>
</body>
</html>