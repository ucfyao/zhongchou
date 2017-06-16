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
    <script src="/Public/js/goTop.js"></script>
    <script src="/Public/js/TouchSlide.1.1.source.js"></script>
    <!-- <script src="/Public/lib/layer_m/layer.m.js"></script>-->
    <script src="/Public/lib/layer/layer.js"></script>
</head>
<body>
    <div class="x12 bg">
        <!-- 引入头部文件 -->
        <!-- 头部 -->
<div class="x12 bg-white padding-small">
    <!-- logo部分 -->
    <div class="x4 padding-left">
        <a href="/"><span class="text-red" style="font-size: 22px;">芝麻乐</span></a>
    </div>
    <!-- 搜索 -->
    <div class="x8">
        <form id="form">
            <div class="input-group padding-little-top">
                <input type="text" class="input input-small border-red text-small" name="keywords" size="30" placeholder="项目名称"  datatype="*">
                <span class="addbtn"><button type="submit" class="button bg-red button-small height-little" onClick="select()">搜!</button></span>
            </div>
        </form>
  </div>
</div>
<script type="text/javascript" src="/Public/lib/validform/Validform.min.js"></script>
<script>
function showmsg(msg) {
    layer.open({
        content: msg,
        time: 0.5
    });
}
function select (){
    // 关闭验证表单成功提示
    $.Tipmsg.r = null;
    // Validform 是验证方法
    $("#form").Validform({
        tiptype: function(msg) {
          showmsg(msg)
        }
  })
}
</script>
        <!-- 项目基本情况  -->
        <div class="x12 margin-top">
            <span class="x12 padding">
                <img src="<?php echo (cut_image($iteminfo["cover_img"],640,240)); ?>" alt="11" class="img-responsive">
                <div class="float-right text-right" style="margin-top:-110px;margin-right:-8px;position: relative;">
                        <span class="button button-small bg-dot radius-none">预热展示</span>
                        <i class="status-icons" style="right: 0px;"></i>
                    </div>
            </span>
            <span class="x12 height margin-top bg-white ">
                <span class="text x6"><span class="x4 text-right text-small">目标：</span><span class="x8 text-red">￥<?php echo ($iteminfo["raising_money"]); ?></span></span>
                <span class="text x6"><span class="x4 text-right text-small">已募集：</span><span class="x8 text-red">￥<?php echo ($iteminfo["count_money"]); ?></span></span>
                <span class="text x6"><span class="x4 text-right text-small">剩余：</span><span class="x8 text-red">￥100000</span></span>
                <span class="text x6"><span class="x4 text-right text-small">已完成：</span><span class="x8 text-red padding-left"><?php echo ($iteminfo["success_rate"]); ?>%</span></span>
            </span>
        </div>
        <!-- 项目用户操作 -->
        <div class="x12 bg-white margin-big-top">
            <div class="x3 text-center border-right">
                <button onClick="Lead(<?php echo ($iteminfo["id"]); ?>)" class="x12 button padding-small bg-yellow radius-none text-small">我要领投</button>
            </div>
            <div class="x3 text-center  border-right">
                <button onClick="interview(<?php echo ($iteminfo["id"]); ?>)" class="x12 button padding-small bg-yellow radius-none text-small">约谈项目</button>
            </div>
            <div class="x3 text-center border-right">
                <?php if($iteminfo['progress'] == '4'): ?><button onClick="with_item(<?php echo ($iteminfo["id"]); ?>)" class="x12 button padding-small bg-yellow radius-none text-small">我要认投</button>
                    <?php else: ?>
                    <button onClick="with_item_no(<?php echo ($iteminfo["progress"]); ?>)" class="x12 button padding-small bg-gray radius-none text-small">我要认投</button><?php endif; ?>
            </div>
            <div class="x3 text-center ">
                <button onClick="collect(<?php echo ($iteminfo["id"]); ?>)" class="x12 button padding-small bg-yellow radius-none text-small">收藏项目</button>
            </div>
        </div>
        <!-- 项目详细情况 -->
        <style>
        .tab .tab-nav li a{line-height:30px;border-radius:inherit;padding: 6px 10px;}
        .tab .tab-nav li {background-color: #fff;border-radius: inherit;}
        .tab .tab-nav .active{background-color: #EA544A; }
        .tab .tab-nav .active a{color: #fff;}
        .tab-panel img{max-width:100%}
        </style>
        <div class="x12 tab text-small margin-top">
            <div class="tab-head">
                <ul class="tab-nav" style="padding-left:0px;">
                    <li class="active"><a href="#tab-a">投资概况</a></li>
                    <li class=""><a href="#tab-b">投资列表</a></li>
                    <li class=""><a href="#tab-c">项目动态</a></li>
                    <li class=""><a href="#tab-d">话题问答</a></li>
                </ul>
            </div>
            <div class="x12 tab-body bg-white padding">
                <!-- 投资概括 -->
                <div class="tab-panel active" id="tab-a">
                    <div class="text-small">
                        <button class="button bg-main button-small radius-none" href="javascript:;"  onclick="slideFunction('tab-1');">项目详情</button>
                        <button class="button bg-main button-small radius-none" href="javascript:;"  onclick="slideFunction('tab-2');">融资计划</button>
                        <button class="button bg-main button-small radius-none" href="javascript:;"  onclick="slideFunction('tab-3');">项目视频</button>
                    </div>
                    <div class="x12">
                        <h1 class="intro-tit" id="tab-1">
                            <span class="bg-white padding-right">项目详情</span>
                        </h1>
                        <style>
                        .iteminfocontent img{max-width: 100%}
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

                </div>
                <!-- 话题问答 -->
                <div class="tab-panel" id="tab-d">
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

    <!-- 底部导航 -->
    <div class="x12" style="height:50px;"></div>
    <div class="x12 text-center text-white fixed-bottom">
        <span class="x3 bg-red padding win-back"><span class="icon-mail-reply-all padding-small-right"></span>返回</span>
        <?php if($iteminfo['progress'] == '4'): ?><a onClick="with_item(<?php echo ($iteminfo["id"]); ?>)" class="x6 bg-red text-white padding border-left border-right"><span class="icon-legal padding-small-right"></span>认投</a>
            <?php else: ?>
            <a onClick="with_item_no(<?php echo ($iteminfo["progress"]); ?>)" class="x6 bg-gray text-white padding border-left border-right"><span class="icon-legal padding-small-right"></span>认投</a><?php endif; ?>
        <a href="/User" class="x3 bg-red padding text-white"><span class="icon-user padding-small-right"></span>我</a>
    </div>
</body>
<script>
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
        area: ['100%', '260px'], //宽高
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
        area: ['100%', '320px'],
        content: ['<?php echo U('Home/Item/with_item');?>?id='+itemid,'no']
    });
}
</script>
</html>