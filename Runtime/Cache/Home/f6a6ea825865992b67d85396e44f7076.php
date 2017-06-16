<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<title><?php echo ($iteminfo["name"]); ?> - 芝麻乐开源众筹系统</title>
	<meta name="keywords" content="芝麻乐众筹管理后台"/>
	<meta name="description" content="芝麻乐众筹管理后台"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/Public/css/pintuer.css">
	<link rel="stylesheet" href="/Template/Home/default/css/zml.css">
	<script src="/Public/js/jquery-1.8.3.min.js"></script>
	<script src="/Public/js/pintuer.js"></script>
	<script src="/Public/js/respond.js"></script>
	<script src="/Public/lib/layer/layer.js"></script>
</head>
<body class="bg">
	<!-- 导航 -->
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
	<!-- 内容 -->
	<div class="container">
		<!-- 面包屑 -->
		<?php echo ($bread); ?>
		<div class="x12 bg-white">
			<img src="<?php echo ($iteminfo["cover_img"]); ?>" alt="<?php echo ($iteminfo["progress_name"]); ?>" class="x12" style="height:445px">
			<div class="x1 float-right" style="margin-top:-430px;margin-right:-20px" >
                <span class="button bg-dot radius-none"><?php echo ($iteminfo["progress_name"]); ?></span>
                <i class="status-icons"></i>
            </div>
			<span class="x6 x6-move text-white padding-large" style="margin-top:-186px;overflow: hidden;
    background: rgba(0,0,0,0.4);">
				<h1><?php echo ($iteminfo["name"]); ?></h1>
				<span class="x12 margin-top text-big">
					<span class="x6">融资目标：￥<?php echo ($iteminfo["raising_money"]); ?></span>
					<span class="x6">最低出资：￥<?php echo ($iteminfo["lowest_money"]); ?></span>
				</span>
				<span class="x12 margin-top text-big">
					<span class="x6">已经募集：￥<?php echo ($iteminfo["count_money"]); ?></span>
					<span class="x6">剩余时间：<?php echo ($iteminfo["last_time"]); ?></span>
				</span>
				<span class="x12 margin-big-top">
					<div class="progress progress-striped active">
						<div class="progress-bar bg-yellow" style="width:<?php echo ($iteminfo["success_rate"]); ?>%;"></div>
					</div>
				</span>
			</span>
		</div>
		<div class="x12 margin-big-top">
			<!-- 左侧主要内容 -->
			<div class="x8 padding-right">
				<style>
				.tab .tab-nav li a{line-height:30px;border-radius:inherit;padding: 8px 40px;}
				.tab .tab-nav li {background-color: #fff;border-radius: inherit;}
				.tab .tab-nav .active{background-color: #EA544A; }
				.tab .tab-nav .active a{color: #fff;}
				</style>
				<div class="tab">
					<div class="tab-head">
						<ul class="tab-nav">
							<li class="active"><a href="#tab-a">投资概况</a></li>
							<li><a href="#tab-b">投资列表</a></li>
							<li><a href="#tab-c">项目动态</a></li>
							<li><a href="#tab-d">话题问答</a></li>
						</ul>
					</div>
					<div class="x12 tab-body bg-white padding-big">
						<!-- 投资概括 -->
						<div class="tab-panel active" id="tab-a">
							<button class="button" href="javascript:;"  onclick="slideFunction('tab-1');">项目详情</button>
							<button class="button" href="javascript:;"  onclick="slideFunction('tab-2');">融资计划</button>
							<button class="button" href="javascript:;"  onclick="slideFunction('tab-3');">项目视频</button>
							<!-- 图文介绍 -->
							<div class="x12">
								<h1 class="intro-tit" id="tab-1">
									<span class="bg-white padding-right">项目详情</span>
								</h1>
								<style>
								.iteminfocontent img{max-width: 740px}
								</style>
								<div class="x12 iteminfocontent"><?php echo ($iteminfo["content"]); ?></div>
							</div>
							<!-- 融资计划书 -->
							<div class="x12">
								<h1 class="intro-tit" id="tab-2">
									<span class="bg-white padding-right">融资计划书</span>
								</h1>
								<div class="x12 margin-bottom">
									
									<?php if(!$_SESSION['user']['uin']): ?><span class="x12 text-center"><span class="padding-right text-large icon-exclamation text-red"></span>您没有权限查看此信息! 请<a class="text-red" href="<?php echo U('User/Login/index',array('bakurl'=>base64_encode('/index.php/Item/info/id/1.html')));?>">登录</a></span>
										<?php else: ?>
										<span class="x12 text-center margin-top"><a href="<?php echo ($iteminfo["plan_file"]); ?>" class="button bg-sub">点击下载计划书！</a></span><?php endif; ?>
								</div>
							</div>
							<!-- 视频 -->
							<div class="x12">
								<h1 class="intro-tit" id="tab-3">
									<span class="bg-white padding-right">项目视频</span>
								</h1>
								<?php if(is_array($video)): $i = 0; $__LIST__ = $video;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zml): $mod = ($i % 2 );++$i;?><div class="x12 margin-bottom">
										<h3 class="padding"><?php echo ($zml["pname"]); ?></h3>
										<embed src="<?php echo ($zml["url"]); ?>" quality="high" width="730" height="400" align="middle" allowScriptAccess="always" allowFullScreen="true" mode="transparent" type="application/x-shockwave-flash"></embed>
									</div><?php endforeach; endif; else: echo "" ;endif; ?>
							</div>
						</div>
						<!-- 投资列表 -->
						<div class="tab-panel" id="tab-b">
							<div class="x12 text-center padding bg">
								<span class="x4">投资人</span>
								<span class="x4">金额</span>
								<span class="x4">日期</span>
							</div>
							<?php if(is_array($invest)): $i = 0; $__LIST__ = $invest;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zml): $mod = ($i % 2 );++$i;?><div class="x12 text-center padding border-bottom border-red-light">
									<span class="x4"><?php echo ($zml["user_name"]); ?></span>
									<span class="x4">￥<?php echo ($zml["money"]); ?></span>
									<span class="x4"><?php echo (date("Y-m-d",$zml["create_time"])); ?></span>
								</div><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
						<!-- 项目动态 -->
						<div class="tab-panel" id="tab-c">
							<div class="timeline">
								<div class="timeline-date">
									<ul>
										<h2 class="second" style="position: relative;">
											<span>项目动态</span>
										</h2>
										<?php if(!$log): ?><dl class="right ">
												<span class="text-red">暂无动态</span>
											</dl><?php endif; ?>
											<?php if(is_array($log)): $i = 0; $__LIST__ = $log;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zml): $mod = ($i % 2 );++$i;?><li>
													<h3><?php echo (date("m-d",$zml["time"])); ?><span><?php echo (date("Y",$zml["time"])); ?></span></h3>
													<dl class="right ">
														<span><?php echo ($zml["content"]); ?></span>
													</dl>
												</li><?php endforeach; endif; else: echo "" ;endif; ?>
									</ul>
								</div>
							</div>
						</div>
						<!-- 话题问答 -->
						<div class="tab-panel" id="tab-d">
							<div class="x12 margin-top padding">
								<button class="button bg-yellow radius-none" onClick="q(this)">我要提问</button>
							</div>
							<?php if(is_array($questionsList)): $i = 0; $__LIST__ = $questionsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zml): $mod = ($i % 2 );++$i;?><div class="x12 margit-top border-bottom border-back padding">
									<div class="x2">
										<img src="<?php echo ($zml["header"]); ?>" alt="<?php echo ($zml["u_name"]); ?>" width="88" height="88" class="radius-circle">
									</div>
									<div class="x10 height">
										<span class="x12 text"><strong><?php echo ($zml["u_name"]); ?>：</strong></span>
										<span class="x12 text-small padding-left"><?php echo ($zml["content"]); ?></span>
									</div>
								</div><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div>
				</div>
			</div>
			<!-- 右侧 -->
			<div class="x4 padding-left ">
				<div class="x12 bg-white margin-big-top padding">
					<div class="x6 text-center  padding">
						<button onClick="Lead(<?php echo ($iteminfo["id"]); ?>)" class="x12 button bg-yellow radius-none">我要领投</button>
					</div>
					<div class="x6 text-center  padding">
						<button onClick="interview(<?php echo ($iteminfo["id"]); ?>)" class="x12 button bg-yellow radius-none">约谈项目方</button>
					</div>
					<div class="x6 text-center padding">
						<?php if($iteminfo['progress'] == '4'): ?><button onClick="with_item(<?php echo ($iteminfo["id"]); ?>)" class="x12 button bg-yellow radius-none">我要认投</button>
							<?php else: ?>
							<button onClick="with_item_no(<?php echo ($iteminfo["progress"]); ?>)" class="x12 button bg-gray radius-none">我要认投</button><?php endif; ?>
					</div>
					<div class="x6 text-center padding">
						<button onClick="collect(<?php echo ($iteminfo["id"]); ?>)" class="x12 button bg-yellow radius-none">收藏该项目</button>
					</div>
				</div>
				<div class="x12 bg-white margin-big-top padding-big">
					<div class="x12">
						<span class="x6 text-left">投资方筹资额</span>
						<span class="x6 text-right">投资方占比</span>
					</div>
					<div class="x12 margin-top padding-big-bottom">
						<span class="x6 text-left text-large text-red">¥<?php echo ($iteminfo["invest_money"]); ?></span>
						<span class="x6 text-right text-large text-red"><?php echo ($iteminfo["investment_rate"]); ?>%</span>
					</div>
					<div class="x12 margin-top">
						<span class="x6 text-left">已筹款</span>
						<span class="x6 text-right">完成度</span>
					</div>
					<div class="x12 margin-top padding-big-bottom border-bottom">
						<span class="x6 text-left text-large text-red">¥<?php echo ($iteminfo["count_money"]); ?></span>
						<span class="x6 text-right text-large text-red"><?php echo ($iteminfo["success_rate"]); ?>%</span>
					</div>
				</div>
				<!-- 项目发起 -->
				<div class="x12 bg-white padding-big margin-big-top ">
					<h1>项目发起</h1>
					<div class="x12 margin-big-top">
						<span class="x4 padding-big"><img src="<?php echo ($iteminfo["user_header"]); ?>" alt="alt" width="80" class="radius-circle"></span>
						<span class="x8 padding-big">
							<h1><?php echo ($iteminfo["user_name"]); ?></h1>
							<span class="x12 margin-top text-small text-gray">简介：<?php echo ($iteminfo["desc"]); ?></span>
						</span>
					</div>
					<!-- 领投 -->
					<?php if($leaduser): ?><h1>领投</h1><?php endif; ?>
					<?php if(is_array($leaduser)): $i = 0; $__LIST__ = $leaduser;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zml): $mod = ($i % 2 );++$i;?><div class="x12 margin-big-top">
							<span class="x4 padding-big"><img src="<?php echo ($zml["header"]); ?>" alt="alt" width="80" height="80"class="radius-circle"></span>
							<span class="x8 padding-big">
								<h1><?php echo ($zml["user_name"]); ?></h1>
								<span class="x12 margin-top text-small text-gray height">
									<span class="x12">认投金额：<?php echo ($zml["countmoney"]); ?></span>
									<span class="x12">认投时间：<?php echo (date("Y-m-d",$zml["time"])); ?></span>
								</span>
							</span>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<!-- 常见问答 -->
				<div class="x12 bg-white margin-big-top padding-big">
					<h1>Q&A</h1>
					<?php $info = D("Home/News")->loadList("a.status =1 AND a.cid In(5)","10","a.time desc");foreach ($info as $i=>$zml):$zml["url"]=U("news/info",array("id"=>$zml["id"]));?><a href="<?php echo ($zml["url"]); ?>" class="x12 margin-big-top text-red">Q：<?php echo ($zml["title"]); ?></a><?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
	<!-- 底部 -->
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

	
</body>
<script>
//收藏
function collect(itemid){
	$.get("/User/Login/check_login",{bakurl:"<?php echo base64_encode('/index.php/Item/info/id/1.html');?>" }, function(d){
		if (d.status==1) {
			//如果检测有登录状态
			$.post("/index.php/Home/Item/collect", {
				itemid: itemid
				},function(d){
					if (d.status==1) {
					layer.open({content: d.info});
				}else{
					layer.open({content: d.info});  
				}
			});
		}else{
			layer.open({
			    content: d.info,
			    yes: function(index){
			    	window.location.href=d.url;
			    }
			});  
		}
	});
}
//约谈
function interview(itemid){
	$.post("/User/Login/check_login", {
	 	bakurl:"<?php echo base64_encode('/index.php/Item/info/id/1.html');?>" 
	},function(d){
		if (d.status==1) {
			open_interview(itemid)
		}else{
			layer.open({
			    content: d.info,
			    yes: function(index){
			    	window.location.href=d.url;
			    }
			});  
		}
	});
}
//操作约谈
function open_interview(itemid){
	layer.open({
	    type: 1,
	    title:'申请约谈',
	    skin: 'layui-layer-rim', //加上边框
	    area: ['420px', '260px'], //宽高
	    content: '<form class="form padding-big">'+
		'<div class="form-group">'+
			'<div class="field field-icon-right">'+
				'<textarea type="text" class="input" id="content" name="content" rows="5" size="90" placeholder="请填写约谈理由、时间、地点、联系电话等信息，否者联系不上您！"></textarea>'+
			'</div>'+
		'</div>'+
		'<div class="form-button"><button class="button radius-none bg-red" type="button" onClick="sub_interview('+itemid+')">提交</button></div>'+
		'</form>'
	});
}
//提交约谈数据
function sub_interview(itemid){
	var content = $('textarea[name="content"]');
	if(content.val()==''){
		layer.tips("请填写约谈理由、时间、地点、联系电话等信息，否者联系不上您！","#content",{
		    tips: 1
		})
		content.focus();
		return false
	}
	$.post("/index.php/Home/Item/interview_user", {
	 	content: content.val(),
	 	itemid: itemid
	},function(d){
		if (d.status == 1) {
			layer.open({
			    content: d.info,
			    yes: function(index){
			        layer.close(index); //一般设定yes回调，必须进行手工关闭
			        layer.closeAll('page');
			    }
			});  
		}else{
			layer.open({
			    content: d.info,
			    yes: function(index){
			        layer.close(index); //一般设定yes回调，必须进行手工关闭
			        layer.closeAll('page');
			    }
			});  
		}
   	});
}
//我要领投
function Lead(itemid){
	$.get("/User/Login/check_login", { bakurl:"<?php echo base64_encode('/index.php/Item/info/id/1.html');?>" }, function(d){
		if (d.status==1) {
			lead_check(itemid)
		}else{
			layer.open({
			    content: d.info,
			    yes: function(index){
			    	window.location.href=d.url;
			    }
			});  
		}
	});
}
//验证是否可以领投
function lead_check(itemid){
	$.get("/index.php/Home/Item/lead_check",{
		itemid:itemid
	}, function(d){
		if (d.status==1) {
			open_lead(itemid)
		}else{
			layer.open({
			    content: d.info
			});  
		}
	});
}
//操作领投
function open_lead(itemid){
	layer.open({
	    type: 1,
	    title:'申请领投',
	    skin: 'layui-layer-rim', //加上边框
	    area: ['420px', '260px'], //宽高
	    content: '<form class="form padding-big">'+
		'<div class="form-group">'+
			'<div class="field field-icon-right">'+
				'<textarea type="text" class="input" id="user_desc" name="user_desc" rows="5" size="90" placeholder="请填写申请理由！"></textarea>'+
			'</div>'+
		'</div>'+
		'<div class="form-button"><button class="button radius-none bg-red" type="button" onClick="sub_lead('+itemid+')">提交</button></div>'+
		'</form>'
	});
}
//提交领投数据
function sub_lead(itemid){
	var user_desc = $('textarea[name="user_desc"]');
	if(user_desc.val()==''){
		layer.tips("请填写简介","#user_desc",{
		    tips: 1
		})
		user_desc.focus();
		return false
	}
	$.post("/index.php/Home/Item/lead_user", {
	 	user_desc: user_desc.val(),
	 	itemid: itemid
	},function(d){
		if (d.status == 1) {
			layer.open({
			    content: d.info,
			    yes: function(index){
			        layer.close(index); //一般设定yes回调，必须进行手工关闭
			        layer.closeAll('page');
			    }
			});  
		}else{
			layer.open({
				content: d.info,
			    yes: function(index){
			        layer.close(index); //一般设定yes回调，必须进行手工关闭
			        layer.closeAll('page');
			    }
			});  
		}
   	});
}
//弹出回答框
function open_questions(){
	layer.open({
	    type: 1,
	    title:'提交问题',
	    skin: 'layui-layer-rim', //加上边框
	    area: ['420px', '250px'], //宽高
	    content: '<form class="form padding-big">'+
		'<div class="form-group">'+
			'<div class="field field-icon-right">'+
				'<input type="text" class="input" id="title" name="title" size="30" placeholder="问题概述" />'+
			'</div>'+
		'</div>'+
		'<div class="form-group">'+
			'<div class="field field-icon-right">'+
				'<textarea type="text" class="input" id="content" name="content" size="90" placeholder="请填写您想问的问题！"></textarea>'+
			'</div>'+
		'</div>'+
		'<div class="form-button"><button class="button radius-none bg-red" type="button" onClick="sub(this)">提交</button></div>'+
	'</form>'
	});
}
// 我要提问
function q(a){
	$.get("/User/Login/check_login", { bakurl:"<?php echo base64_encode('/index.php/Item/info/id/1.html');?>" },function(d){
		if (d.status==1) {
			open_questions();
		}else{
			layer.open({
			    content: d.info,
			    yes: function(index){
			    	window.location.href=d.url;
			    }
			});  
		}
	});
}
//提交回答内容
function sub(a){
	var title = $('input[name="title"]');
	var content = $('textarea[name="content"]');
	if(title.val()==''){
		layer.tips("请填写标题","#title",{
		    tips: 1
		})
		title.focus();
		return false
	}
	if(content.val()==''){
		layer.tips("请填写问题内容","#content",{
		    tips: 1
		})
		content.focus();
		return false
	}
	$.post("/index.php/Home/Qa/questions_in", {
	 	title: title.val(),
	 	content: content.val(),
	 	itemid:<?php echo ($_GET['id']); ?>
	},function(d){
		if (d.status == 1) {
			layer.open({
			    content: '问题已经提交好了！',
			    yes: function(index){
			        layer.close(index); //一般设定yes回调，必须进行手工关闭
			        layer.closeAll('page');
			        $('#tab-d').append('<div class="x12 margit-top border-bottom border-back padding">'+
								'<div class="x2">'+
									'<img src="'+d.info.header+'" alt="'+d.info.u_name+'" width="88" height="88" class="radius-circle">'+
								'</div>'+
								'<div class="x10 height" id="'+d.info.id+'">'+
									'<span class="x12 text"><strong>'+d.info.u_name+'</strong></span>'+
									'<span class="x12 text-small padding-left">'+d.info.content+'</span>'+
								'</div>'+
							'</div>');
			        slideFunction(d.info.id)
			        return false;
			    }
			});  
		}else{
			alert(d.info);
		}
   	});
}
//不可认投
function with_item_no(progress){
	if (progress < 4) {
		layer.open({content: '客官别急，还没到认投的状态哦！',});
	}else{
		layer.open({content: '该项目已经过了认投期哦！',});
	}
}
//我要跟投
function with_item(itemid){
	$.get("/User/Login/check_login", {
		bakurl:"<?php echo base64_encode('/index.php/Item/info/id/1.html');?>",
	},function(data){
		if (data.status==1) {
			open_with_item(itemid);
		}else{
			layer.open({
			    content: data.info,
			    yes: function(index){
			    	window.location.href=data.url;
			    }
			});  
		}
	});
}
//跟投
function open_with_item(itemid){
	layer.open({
		type: 2,
		title: '投资项目',
		shadeClose: true,
		shade: 0.8,
		area: ['450px', '320px'],
		content: ['<?php echo U('Home/Item/with_item');?>?id='+itemid,'no']
	});
}
//项目动态时间轴
$(function(){
	$(".timeline").eq(0).animate({
		height:600
	},3000);
});
</script>
</html>