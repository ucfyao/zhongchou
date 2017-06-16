<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
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
		<?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['name']);?>" class="button  padding-top padding-big-left border-none radius-none padding-bottom x12 <?php if('/index.php/Admin/Funds/payment_details.html' == '/'.$vo['name'].'.html'): ?>bg-sub<?php endif; ?>"> <?php echo ($vo["title"]); ?> <span class="float-right icon-angle-right"></span></a>
		<?php if(is_array($vo["sub_menu"])): $i = 0; $__LIST__ = $vo["sub_menu"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo U($v['name']);?>" class="padding-large-left button x12  border-none radius-none <?php if('/index.php/Admin/Funds/payment_details.html' == '/'.$v['name'].'.html'): ?>bg-sub<?php endif; ?>"><span class="padding-left"><?php echo ($v["title"]); ?><span class="float-right icon-angle-right"></span></span></a><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
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
<div class="x12 padding border-bottom">
	<h1>充值记录</h1>
</div>
<div class="x12 padding">
	<div class="x12 text-center padding-top padding-bottom border-bottom border-top margin-top">
		<a href="<?php echo U('Admin/Funds/payment_details');?>" class="x1 border-right <?php if(($_GET['status'] != '0') AND ($_GET['status'] != 1)): ?>text-red<?php endif; ?>">全部</a>
		<a href="<?php echo U('Admin/Funds/payment_details',array('status'=>1));?>" class="x1 border-right <?php if($_GET['status'] == 1): ?>text-red<?php endif; ?>">成功</a>
		<a href="<?php echo U('Admin/Funds/payment_details',array('status'=>0));?>" class="x1 border-right <?php if($_GET['status'] == '0'): ?>text-red<?php endif; ?>">未完成</a>
	</div>
</div>
<div class="x12 padding">
<table class="table table-bordered text-small table-striped">
<tr>
	<th>用户</th>
	<th>订单号</th>
	<th>类型</th>
	<th>金额</th>
	<th>创建时间</th>
	<th>更新时间</th>
	<th>备注</th>
	<th>状态</th>
</tr>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zml): $mod = ($i % 2 );++$i;?><tr>
	<td><a href="<?php echo U('Admin/Funds/payment_details',array('uin'=>$zml['uin']));?>" class="text-sub"><?php echo ($zml["user_name"]); ?></a></td>
	<td><?php echo ($zml["out_trade_no"]); ?></td>
	<td><?php echo ($zml["pay_type_name"]); ?></td>
	<td><?php echo ($zml["money"]); ?></td>
	<td><?php echo (date("Y-m-d h:i:s",$zml["create_time"])); ?></td>
	<td><?php if($zml['update_time']): echo (date("Y-m-d h:i:s",$zml["update_time"])); endif; ?></td>
	<td><?php echo ($zml["body"]); ?></td>
	<td>
		<?php if($zml['status'] == 1): ?><span class="text-green float-right">成功</span>
		<?php else: ?>
			<span class="text-red float-right">未完成</span><?php endif; ?>
	</td>
</tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
</div>
<div class="x12 text-center padding"><ul class="pagination pagination-group border-red pagination-small"><?php echo ($page); ?></ul></div>
</div>
</div>
</div>
<div class="clearfix"></div>

</body>
</html>