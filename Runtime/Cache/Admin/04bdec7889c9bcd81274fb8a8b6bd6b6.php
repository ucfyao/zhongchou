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
		<?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['name']);?>" class="button  padding-top padding-big-left border-none radius-none padding-bottom x12 <?php if('/index.php/Admin/User/0' == '/'.$vo['name'].'.html'): ?>bg-sub<?php endif; ?>"> <?php echo ($vo["title"]); ?> <span class="float-right icon-angle-right"></span></a>
		<?php if(is_array($vo["sub_menu"])): $i = 0; $__LIST__ = $vo["sub_menu"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo U($v['name']);?>" class="padding-large-left button x12  border-none radius-none <?php if('/index.php/Admin/User/0' == '/'.$v['name'].'.html'): ?>bg-sub<?php endif; ?>"><span class="padding-left"><?php echo ($v["title"]); ?><span class="float-right icon-angle-right"></span></span></a><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
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
		
      <div class="x12 padding ">
			<div class="x6 padding">
				用户总数：<span class="text-dot"><?php echo ($alluser); ?></span> 个
			</div>
			<div class="x6 padding-bottom">
				<form action="/index.php/Admin/User/0" method="get" >
				<input type="text" name="key" size="50" class="input input-auto box-shadow-none radius-none"  placeholder="手机号 / 姓名 / 地区进行搜索"/>
				<button type="submit"  class="button box-shadow-none bg-sub radius-none icon-search"  /> 搜索</button>
				</form>
			</div>
         <table class="table table-bordered table-hover text-small">
          <tbody>
            <tr>
              <th>头像</th>
			  <th>手机号码</th>
			  <th>名字</th>
			  <th>
			  <?php if($_GET['money'] != 'asc'): ?><a href="/index.php/Admin/User?money=asc" class="text-blue">余额 <span class="icon-caret-down"></span></a>
				<?php else: ?>
					<a href="/index.php/Admin/User" class="text-blue">余额 <span class="icon-caret-up"></span></a><?php endif; ?>
			</th>
			  <th>
			  <?php if($_GET['points'] != 'asc'): ?><a href="/index.php/Admin/User?points=asc" class="text-blue">积分 <span class="icon-caret-down"></span></a>
				<?php else: ?>
					<a href="/index.php/Admin/User" class="text-blue">积分 <span class="icon-caret-up"></span></a><?php endif; ?>
			  </th>
			  <th>发布</th>
			  <th>领投</th>
			  <th>提问</th>
			  <th>约谈</th>
			  <th>收藏</th>
			  <th>
				<?php if($_GET['create_time'] != 'asc'): ?><a href="/index.php/Admin/User?create_time=asc" class="text-blue">注册时间 <span class="icon-caret-down"></span></a>
				<?php else: ?>
					<a href="/index.php/Admin/User" class="text-blue">注册时间 <span class="icon-caret-up"></span></a><?php endif; ?>
			  </th>
            </tr>

            <?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr  class="height">
              <td>
				<img src="<?php echo ($vo["header"]); ?>" width="50" />
			  </td>
              <td ><?php echo ($vo["phone"]); ?></td>
              <td><?php echo ($vo["name"]); ?> (  <?php if($vo['sex'] == '1'): ?>男<?php elseif($vo['sex'] == '2'): ?>女<?php else: ?>未知<?php endif; ?> )
			
			  
			  </td>
                       
              <td><a href="/index.php/Admin/Funds/money_details/uin/<?php echo ($vo["uin"]); ?>" class="text-sub">￥<?php echo ($vo["money"]); ?> 元</a></td>
              <td><a href="###" class="text-sub"><?php echo ($vo["points"]); ?></a></td>
              <td><a href="/index.php/Admin/Item/index/uin/<?php echo ($vo["uin"]); ?>" class="text-sub"><?php echo ($vo["item"]); ?> 个</a></td>
              <td><a href="javascript:void(0)" onclick="iframe('/index.php/Admin/Investor/lead/uin/<?php echo ($vo["uin"]); ?>')"  class="text-sub"><?php echo ($vo["itemLead"]); ?> 个</a></td>
              <td><a href="/index.php/Admin/Item/index/uin/<?php echo ($vo["uin"]); ?>" class="text-sub"><?php echo ($vo["questions"]); ?> 个</a></td>
              <td><a href="javascript:void(0)" onclick="iframe('/index.php/Admin/Investor/interview_item/uin/<?php echo ($vo["uin"]); ?>')" class="text-sub"><?php echo ($vo["interview"]); ?> 个</a></td>
              <td><a href="javascript:void(0)" onclick="iframe('/index.php/Admin/Investor/collect_item/uin/<?php echo ($vo["uin"]); ?>')"  class="text-sub"><?php echo ($vo["investor"]); ?> 个</a></td>
			
              <td><?php echo (date("Y-m-d H:i",$vo["create_time"])); ?></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
          </tbody>
        </table>
        <div class="margin-big-top">
          <ul class="pagination">
            <?php echo ($page); ?>
          </ul>
        </div>
      </div>
    </div>
  	<!-- 底部 -->
    
  </div>
  <script>
function iframe(url){
		 layer.open({
        type: 2,
        title: '约谈',
        shadeClose: true,
        shade: 0.8,
        area: ['1000px', '570px'],
        content: url
      });
	}
</script>
</body>
</html>