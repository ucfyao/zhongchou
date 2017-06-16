<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会员中心 - 芝麻乐开源众筹系统</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/Public/css/pintuer.css">
<script src="/Public/js/jquery-1.8.3.min.js"></script>
<script src="/Public/js/pintuer.js"></script>
<script src="/Public/js/respond.js"></script>
<script src="/Public/lib//layer/layer.js"></script>
</head>
<body style="background:#e7e8eb">
<style>
.mynav li{width: 80px;height: 36px;line-height: 36px;float: left;text-align: center;margin-right: 5px;border-radius: 3px;position: relative;display: block;}
.mynav .active{background-color: #ea544a;}
.mynav .active a{color: #fff;}
</style>
<script type="text/javascript"> 
var Sys = {};
        var ua = navigator.userAgent.toLowerCase();
        if (window.ActiveXObject){
            Sys.ie = ua.match(/msie ([\d.]+)/)[1]
            if (Sys.ie<=7){
            alert('你目前的IE版本为'+Sys.ie+'版本太低，请升级！');location.href="http://windows.microsoft.com/zh-CN/internet-explorer/downloads/ie";
            }
        }
</script> 
<div class="x12 margin-big-bottom text-little padding-small bg-black text-pale" id="top">
    <div class="container">
        <span class="x2">欢迎来到芝麻乐开源众筹系统！</span>
        <span class="x10 text-right text-pale"><?php if(session('user.uin')): ?><a href="<?php echo U('/User');?>" class="text-pale"><?php echo session('user.phone');?> 进入用户中心</a> | <a href="<?php echo U('/User/Login/logout');?>" class="text-pale">退出</a><?php else: ?></a><a href="<?php echo U('/User/Login');?>" class="text-pale">登录</a> | <a href="<?php echo U('/User/Login/reg');?>" class="text-pale">注册</a><?php endif; ?></span>
    </div>
</div>
<div class="container-layout  bg-white">
    <div class="container padding-big-top padding-big-bottom">
        <div class="x12">
            <div class="x2">
                <a href="/"><img src="/uploads/1/20151017/zmlcms_1445061661767.png" alt="芝麻乐开源众筹系统"  class="img-responsive"></a>
            </div>
            <div class="x10 padding-top">
                <div class="x8">
                    <ul class="mynav text-big float-right padding-big-right">
                        <li <?php if(CONTROLLER_NAME== 'Index'): ?>class="active"<?php endif; ?>><a href="/">首页</a></li>
                        <li <?php if(CONTROLLER_NAME== 'Item'): ?>class="active"<?php endif; ?>><a href="/Item">项目</a></li>
                        <!--             <li><a href="#">动态</a></li> -->
                        <li <?php if(CONTROLLER_NAME== 'News'): ?>class="active"<?php endif; ?>><a href="/News">新闻</a></li>
                    </ul>
                </div>
                <div class="x4">
                    <form id="form">
                        <div class="input-group padding-little-top">
                            <input type="text" class="input border-red" id="content" name="content" size="30" placeholder="项目名称" datatype="*"/>
                            <span class="addbtn"><button type="button" class="button bg-red"  onClick="select()">搜!</button></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function select (){
    var content = $('input[name="content"]');
    if(content.val()==''){
        layer.tips("请填写搜索内容！","#content",{
            tips: 1
        })
        content.focus();
        return false
    } 
    window.location.href="/Item/index/search/"+content.val();
}
</script>
<div class="container">
<div class="x12 margin-large-top border bg-white margin-large-bottom">
	<div class="x2" style="min-height:800px">
		<div class="x12 border-bottom padding-top padding-bottom text-center ">
			<a href="/index.php/User/Info"><img src="<?php if($user['header']): echo cut_image($user['header'],'90','90'); else: ?>/Template/User/default/Public/img/user-logo.jpg<?php endif; ?>" width="90" height="90" class="header radius-circle" /></a>
			<h5 class="padding"><?php echo ($phone); ?></h5>
			<?php if($user['rstatus'] == '1'): ?><div class="txt-border txt-small radius-circle border sta" data-msg="<span class='text-black'>你已通过实名认证，<a href='<?php echo U('User/Attest/index');?>' class='text-blue'>查看认证</a></span>" ><div class="txt bg-red radius-circle icon-male"></div></div>
			
			<?php else: ?>
			<div class="txt-border txt-small radius-circle border sta" data-msg="<span class='text-black'>你未通过实名认证，<a href='<?php echo U('User/Attest/index');?>' class='text-blue'>去认证</a></span>" ><div class="txt radius-circle icon-male"></div></div><?php endif; ?>
			<div class="txt-border txt-small radius-circle border sta" data-msg="<span class='text-black'>您已绑定手机，<a href='' class='text-blue'>更改</a></span>"><div class="txt radius-circle bg-red icon-tablet"></div></div>
			<a href="<?php echo U('User/Prepaid/index');?>" class="txt-border txt-small radius-circle border " ><div class="txt radius-circle bg-red ">充</div></a>
		</div>
		<div class="x12 border-bottom padding-bottom leftnav">	
			<a href="/index.php/User/index" class="button x12 border-none radius-none padding <?php if(CONTROLLER_NAME == Index and ACTION_NAME == index): ?>bg-red<?php endif; ?>"><span class="padding-left">会员中心首页<span><span class="float-right icon-angle-right"></span></a>

			<span class="button x12 bg-gray radius-none">我是项目方</span>
			<a href="<?php echo U('Item/item_add');?>" class="button button-small x12 border-none radius-none padding <?php if(CONTROLLER_NAME == Item and ACTION_NAME == item_add): ?>bg-red<?php endif; ?>"><span class="padding-large-left">发布项目<span><span class="float-right icon-angle-right"></span></a>

			<a href="<?php echo U('Item/index');?>" class="button button-small x12 border-none radius-none padding <?php if(CONTROLLER_NAME == Item and ACTION_NAME == index): ?>bg-red<?php endif; ?>"><span class="padding-large-left">已发布的项目<span><span class="float-right icon-angle-right"></span></a>
	
			<a href="<?php echo U('Lead/index');?>" class="button button-small x12 border-none radius-none padding <?php if(CONTROLLER_NAME == Lead): ?>bg-red<?php endif; ?>"><span class="padding-large-left">领投管理<span><span class="float-right icon-angle-right"></span></a>

			<a href="<?php echo U('Item/interview');?>" class="button button-small x12 border-none radius-none padding <?php if(CONTROLLER_NAME == Item and ACTION_NAME == interview): ?>bg-red<?php endif; ?>"><span class="padding-large-left">约谈管理<span><span class="float-right icon-angle-right"></span></a>
			
			<span class="button x12 bg-gray radius-none">我是投资方</span>

			<a href="<?php echo U('Investor/collect_item');?>" class="button button-small x12 border-none radius-none padding <?php if(CONTROLLER_NAME == Investor and ACTION_NAME == collect_item): ?>bg-red<?php endif; ?>"><span class="padding-large-left">我收藏的项目<span><span class="float-right icon-angle-right"></span></a>
			<a href="<?php echo U('Investor/with_item');?>" class="button button-small x12 border-none radius-none padding <?php if(CONTROLLER_NAME == Investor and ACTION_NAME == with_item): ?>bg-red<?php endif; ?>"><span class="padding-large-left">我投资的项目<span><span class="float-right icon-angle-right"></span></a>
			<a href="<?php echo U('Investor/interview_item');?>" class="button button-small x12 border-none radius-none padding <?php if(CONTROLLER_NAME == Investor and ACTION_NAME == interview_item): ?>bg-red<?php endif; ?>"><span class="padding-large-left">我约谈的项目<span><span class="float-right icon-angle-right"></span></a>
			<a href="<?php echo U('Investor/lead');?>" class="button button-small x12 border-none radius-none padding <?php if(CONTROLLER_NAME == Investor and ACTION_NAME == lead): ?>bg-red<?php endif; ?>"><span class="padding-large-left">我领投的项目<span><span class="float-right icon-angle-right"></span></a>

			<span class="button x12 bg-gray radius-none">资金管理</span>

			<a href="<?php echo U('User/Funds/money_details');?>" class="button button-small x12 border-none radius-none padding <?php if(CONTROLLER_NAME == Funds and ACTION_NAME == money_details): ?>bg-red<?php endif; ?>"><span class="padding-large-left">资金明细<span><span class="float-right icon-angle-right"></span></a>
			<a href="<?php echo U('User/Funds/payment_details');?>" class="button button-small x12 border-none radius-none padding <?php if(CONTROLLER_NAME == Funds and ACTION_NAME == payment_details): ?>bg-red<?php endif; ?>"><span class="padding-large-left">充值记录<span><span class="float-right icon-angle-right"></span></a>
			<a href="<?php echo U('User/Prepaid/index');?>" class="button button-small x12 border-none radius-none padding <?php if(CONTROLLER_NAME == Prepaid and ACTION_NAME == index): ?>bg-red<?php endif; ?>"><span class="padding-large-left">我要充值<span><span class="float-right icon-angle-right"></span></a>

			<span class="button x12 bg-gray radius-none">个人中心</span>

			<a href="<?php echo U('Attest/index');?>" class="button button-small x12 border-none radius-none padding <?php if(CONTROLLER_NAME == Attest): ?>bg-red<?php endif; ?>"><span class="padding-large-left">我的认证<span><span class="float-right icon-angle-right"></span></a>
			<a href="<?php echo U('Info/index');?>" class="button button-small x12 border-none radius-none padding <?php if(CONTROLLER_NAME == Info and ACTION_NAME == index): ?>bg-red<?php endif; ?>"><span class="padding-large-left">账号设置<span><span class="float-right icon-angle-right"></span></a>
			<a href="<?php echo U('Dolog/index');?>" class="button button-small x12 border-none radius-none padding <?php if(CONTROLLER_NAME == Dolog): ?>bg-red<?php endif; ?>"><span class="padding-large-left">消息中心<span><span class="badge bg-dot float-right"><?php echo doLog();?>条未读</span></a>
			<a href="<?php echo U('Bank/index');?>" class="button button-small x12 border-none radius-none padding <?php if(CONTROLLER_NAME == Bank): ?>bg-red<?php endif; ?>"><span class="padding-large-left">银行卡管理<span></a>
		</div>	
	</div>
	<script type="text/javascript">
		$(".sta").each(function(e){
			var msg=$(this).attr('data-msg');
			$(this).on("mouseover mouseout",function(event){
 			if(event.type == "mouseover"){
 				 var ii=layer.tips(msg, $(this), {
    				tips: [2,'#fff']
				});	
 			}else if(event.type == "mouseout"){
  				layer.close(ii)
			 }
			})			
						
		})
	</script>
<div class="x10  border-left" style="min-height:800px;">


	<div class="padding">

	<div class="x12 padding-bottom border-bottom">
		<div class="x6 padding-large">
			<h2>我的余额</h2>
			<div class="padding text-bold" style="font-size:50px;">￥0元</div>
		</div>
		<div class="x6 padding-large">
			<a href="/index.php/User/Withdraw" class="button bg-blue radius-none">提现</a>
			<a href="/index.php/User/Prepaid" class="button bg-red radius-none">充值</a>
		</div>
		
	</div>

    <div class="x12 padding-big">

        <form class="form-x" id="form-pay" action="<?php echo U('Prepaid/pay_param');?>" method="post" autocomplete="off" target="_blank">

            <div class="form-group">
                <div class="label"><strong>充值方式:</strong></div>
                <div class="field">
                    <div class="button-group radio">
                        <label class="button active"><input name="money_type" value="1" checked="checked" type="radio">在线支付</label>
                        <!-- <label class="button"><input name="money_type" value="2" type="radio">第三方托管支付</label> -->
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="label"><label for="money">充值金额:</label></div>
                <div class="field">
                    <div class="input-group x3">
                        <input type="text" class="input" id="money" name="money" value="" datatype="*1-8" placeholder="" />
                        <span class="addon">元</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="label"><strong>支付方式:</strong></div>
                <div class="field">
                    <div class="button-group border-sub radio" id="pay_type">

                        <?php if(is_array($payment_lists)): $i = 0; $__LIST__ = $payment_lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><label class="button <?php if($i == 1): ?>active<?php endif; ?>">
                            <img src="<?php echo ($vo["ico"]); ?>" width="23">
                            <input type="radio" name="paytype" value="<?php echo ($vo["type"]); ?>" <?php if($i == 1): ?>checked="checked"<?php endif; ?> title="<?php echo ($vo["title"]); ?>"><?php echo ($vo["title"]); ?>
                        </label><?php endforeach; endif; else: echo "" ;endif; ?>
                        
                    </div>
                </div>
            </div>

            <div class="form-button">
                <button class="button bg-sub radius-none" type="submit">确定，去付款</button>
            </div>

        </form>

    </div>
</div>
</div>
</div>
</div>
<div class="clearfix"></div>

<div class="container-layout text-gray  bg-black bg-inverse padding-big-top padding-big-bottom margin-big-top" >
    <div class="container text-small">
        <div class="x10 height-big margin-bottom">
			<?php $info = D("Admin/Nav")->loadList("status =1 AND type =2 AND pid =0","");foreach ($info as $i=>$zml):$nav2=D("Admin/Nav")->loadList(array("pid"=>$zml["id"]));?><a href="<?php echo ($zml["url"]); ?>" class="padding-big-right text-gray"><?php echo ($zml["name"]); ?></a><?php endforeach ?>
        </div>
       
        <div class="x12 text-left text-little">版权所有 © 芝麻乐开源众筹系统 All Rights Reserved，赣ICP备：380959609</div>
    </div>
</div>
<div class="fixed-bottom-right margin-right" style="width:40px;right:10px;z-index: 99999;">
<!--     <div class="x12 txt radius-small bg-red margin-small-bottom icon-qrcode text-large"></div>
    <div class="x12 txt radius-small bg-red margin-small-bottom icon-pencil-square-o text-large"></div>
    <div class="x12 txt radius-small bg-red margin-small-bottom icon-question text-large"></div> -->
    <a href="javascript:;"  onclick="slideFunction('top');"><div class="txt radius-small bg-red margin-small-bottom icon-arrow-up text-large"></div></a>
</div>

<script type="text/javascript" src="/Public/lib//validform/Validform.min.js"></script>

<script type="text/javascript">
$(function(){
    $(".form-x").Validform({
        tiptype:2,
        callback:function(form){
            var money = $("#money").val();
            var paytype = $('#pay_type input[name="paytype"]:checked ').attr('title');

            if (money<0.01) {
                layer.tips('请输入正确的充值金额！', '#money', {
                    tips: [1, '#ea544a']
                });
                return false;
            };

            layer.confirm('确定要使用'+paytype+'充值'+money+'元？', function(){
                document.getElementById("form-pay").submit();
                //setTimeout("location.href = '/'",1000); 
                layer.confirm('请您确认已在新窗口完成支付', {
                    icon: 6,
                    btn: ['完成支付','取消支付'] //按钮
                }, function(){
                    location.href = '<?php echo U('User/index/index');?>';
                }, function(){
                    //layer.msg('取消成功', {shift: 6});
                });

            });
        
            return false;
        }
    });
})
</script>
</body>
</html>