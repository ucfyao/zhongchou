<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" href="/Public/css/pintuer.css">
<script src="/Public/js/jquery-1.8.3.min.js"></script>
<script src="/Public/lib/layer/layer.js"></script>
  <div class="x12 padding-large">
       <form method="post" class="form-x">
		  <div class="form-group x6">
			<div class="label padding-right">节点URL : </div>
			<div class="field">
			  <input type="text" class="input input-auto box-shadow-none radius-none"  name="name" size="30" placeholder="" />
			</div>
		  </div>
		  <div class="form-group x6">
			<div class="label padding-right">节点名称 : </div>
			<div class="field">
			  <input type="text" class="input input-auto box-shadow-none radius-none"  name="title" size="30"  />
			</div>
		  </div>
		  <div class="form-group x6">
			<div class="label padding-right">加入菜单 : </div>
			<div class="field"> 
			  <label><input name="menu" type="radio" value="1"> 是</label>
			  <label><input name="menu" type="radio" value="0"> 否</label>
			</div>
		  </div>
		   <div class="form-group x6">
			<div class="label padding-right">节点分组 : (后台导航和节点分组为统一配置)</div>
			<div class="field">
			  <select name="pid" class="input input-auto box-shadow-none radius-none">
				<option value="0">设置为一级分组</option>
				<?php if(is_array($node_menu)): $i = 0; $__LIST__ = $node_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			  </select>
			</div>
		  </div>
		  <div class="form-button x12 text-center margin-top"><button class="button bg-blue icon-plus" onclick="addnode(this)" type="button">创建节点</button></div>
		</form>
      </div>
	 <script>
		
	 //创建节点
		function addnode(d){
			var name=$("input[name='name']");
			var title=$("input[name='title']");
			var menu=$("input[name='menu']:checked").val();
			var pid=$("select[name='pid']").val();			
			if(name.val()==''){
				layer.tips('节点URL不能为空', name);
				name.focus();
				return false
			}
			if(title.val()==''){
				layer.tips('节点名称不能为空', title);
				title.focus();
				return false
			}
			$.post("/index.php/Admin/Auth/node_add",{
				name:name.val(),
				title:title.val(),
				menu:menu,
				pid:pid,
			},function(ret){
				if(ret.status==1){
					parent.layer.msg(ret.info, {
						offset: 200,
						shift: 2
					});
					parent.window.location.reload()
				}else{
					parent.layer.msg(ret.info, {
						offset: 200,
						shift: 2
					});
				}
			})			
		}
	 </script>