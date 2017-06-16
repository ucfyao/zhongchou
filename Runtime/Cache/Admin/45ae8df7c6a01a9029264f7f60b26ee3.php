<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <title>芝麻乐众筹管理后台</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/Public/css/pintuer.css">
  <script src="/Public/js/jquery-1.8.3.min.js"></script>
  <script src="/Public/js/pintuer.js"></script>
  <script src="/Public/js/respond.js"></script>
  <script src="/Public/lib/layer/layer.js"></script>
</head>
<body style="background:#fafafa;">
	<!-- 导航 -->

<div class="container-layout  bg-white border-bottom margin-bottom">
  <div class="container padding-big-top padding-big-bottom">
    <div class="x12">
      <div class="x2 ">
        <a href="javascript:void(0)">
          <span class=" text-red" style="font-size: 32px;">芝麻乐</span><span class="text-gray padding-left">众筹管理后台</span>
        </a>
      </div>
		<div class="x5  text-right float-right">			  
			 <div class="navbar-text navbar-right hidden-s">
			 <span class="padding-right"> 欢迎登录 <?php echo session('admin_username');?> ( <?php echo ($group_name); ?>  ) </span>	
			 <a href="javascript:void(0)" onclick="my_edit()" class="button button-small icon-cog bg-blue"> 设置</a>
			  <a href="/" target="_blank"  class="button button-small icon-link bg-blue"> 访问网站</a>
			 <button type="button" id="loginout" class="button button-small icon-power-off bg-blue"> 退出系统</button></div>
		</div>
      </div>
    </div>
  </div>
<script>
	function my_edit(id){	
		layer.open({
			type: 2,
			area: ['700px', '360px'],
			fix: true, //不固定
			maxmin: true,
			title:'用户设置',
			content: '/index.php/Admin/Auth/my_edit'
		});
	}
</script>
 <div class="container">
	<div class="border x12">
    <div class="x2 bg-white border-right">	
	<div class="x12" style="min-height:800px">
	<div class="x12 border-bottom padding-bottom">
		<?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['name']);?>" class="button  padding-top padding-big-left border-none radius-none padding-bottom x12 <?php if('/index.php/Admin/System/uploadset.html' == '/'.$vo['name'].'.html'): ?>bg-sub<?php endif; ?>"> <?php echo ($vo["title"]); ?> <span class="float-right icon-angle-right"></span></a>
		<?php if(is_array($vo["sub_menu"])): $i = 0; $__LIST__ = $vo["sub_menu"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo U($v['name']);?>" class="padding-large-left button x12  border-none radius-none <?php if('/index.php/Admin/System/uploadset.html' == '/'.$v['name'].'.html'): ?>bg-sub<?php endif; ?>"><span class="padding-left"><?php echo ($v["title"]); ?><span class="float-right icon-angle-right"></span></span></a><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
	</div>
	<div class="clearfix"></div>
		<div class="padding text-center text-small text-gray">
			<a href="" class=" text-gray padding-right">帮助中心</a>|
			<a href="" class="text-gray padding-left">联系我们</a>
			<span class="text-gray padding-top x12">ZmlCMS 版权所有</span>
		</div> 
	</div>
            
    </div>
    <div class="x10 bg-white" style="min-height:680px;">
<script>

  $(function(){
    $('#loginout').click(function(){
      layer.confirm('确定要退出吗？', {icon: 3},function(){
        parent.layer.msg('退出成功!', {
          shift: 2,
          time: 1000,
          shade: [0.1,'#000'],
          end: function(){
            window.location.href = '<?php echo U('/Admin/Public/logout');?>';
          }
        });
      });
     });
  });

  //全局配置
layer.config({
    extend: [
        'extend/layer.ext.js' 
    ]
});
</script>
<div class="x12 padding border-bottom height-big">
	<h5>文件上传配置</h5>
	
</div>
<div class="clearfix"></div>
<div class="padding  x12 ">
	<div class="border x12 margin-bottom">
	<div class="bg padding ">上传基本配置</div>
		<div class="height-large padding border-bottom  x12">
			<span class="text-gray x2">文件上传目录</span>
			<span class="x9" ><span id="UPLOAD_PATH"><?php echo (C("UPLOAD_PATH")); ?></span><span class="text-gray padding-left">如果目录不存在需要手动创建目录,确保目录有可写权限</span></span>
			<a href="###" class="text-blue"  onclick="edit_d('UPLOAD_PATH','<?php echo (C("UPLOAD_PATH")); ?>')">修改</a>
		</div>
		<div class="height-large padding  x12">
			<span class="text-gray x2">允许上传的文件类型</span>
			<span class="x9" ><span id="UPLOAD_TYPE"><?php echo (C("UPLOAD_TYPE")); ?></span><span class="text-gray padding-left">不在范围内的文件将不会被上传，半角逗号隔开</span></span>
			<a href="###" class="text-blue"  onclick="edit_d('UPLOAD_TYPE','<?php echo (C("UPLOAD_TYPE")); ?>')">修改</a>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
 <script>
 function edit_d(name,v){
	
	 layer.prompt({title: '编辑修改', formType: 2,value:v}, function(text){
			edit(name,text);
	 });
	
 }
 
 function edit(name,d){	
	
	var UPLOAD_PATH='<?php echo (C("UPLOAD_PATH")); ?>';
	var UPLOAD_TYPE='<?php echo (C("UPLOAD_TYPE")); ?>';
	;
	if(name=='UPLOAD_PATH'){
		UPLOAD_PATH=d;
	}
	if(name=='UPLOAD_TYPE'){
		UPLOAD_TYPE=d;
	}
	
	$.post(
		'/index.php/Admin/System/uploadset',
		{
			
			UPLOAD_TYPE:UPLOAD_TYPE,		
			UPLOAD_PATH:UPLOAD_PATH,		
		},function(e){
			if(e.status==0){
				layer.open({
					content:e.info,
					btn:['好的']
				})
			}else{
				$("#"+name).text(d);
				window.location.reload();
			}
		}
	
	)
	
 }


 </script>
</body>
</html>