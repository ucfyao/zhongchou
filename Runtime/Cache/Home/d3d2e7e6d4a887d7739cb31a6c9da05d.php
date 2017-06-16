<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<title><?php echo ($info["name"]); ?> - 芝麻乐开源众筹系统</title>
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
<body>
	<div class="x12">
		<div class="x12 bg-white margin-top">
			<ul class="list-group radius-none">
				<li>项目名称：<?php echo ($info["name"]); ?></li>
				<li>最低出资：<?php echo ($info["lowest_money"]); ?></li>
				<li>剩余份数：<?php echo ($info["surplus_amount"]); ?></li>
			</ul>

			<form method="post" class="form-x x12 padding-big" autocomplete="off">
				<div class="form-group x12">
					<div class="field">
						<span class="x2 height-big">投资份数</span>
						<div class="input-group">
							<span class="addon icon-minus" id="del"></span>
							<input type="text" class="input" id="amount" name="amount" value="1" />
							<span class="addon icon-plus" id="add"></span>
							<span class="addon text-red">¥<span id="totalMoney"><?php echo ($info["lowest_money"]); ?></span>元</span>
							<input type="hidden" value="<?php echo ($info["lowest_money"]); ?>" name="money" id="money" />
						</div>
					</div>
				</div>

				<div class="x12 padding-big">
					<button class="button radius-none bg-red" type="button" onClick="sub_with(<?php echo ($info["id"]); ?>)">确定提交</button>
				</div>
			</form>




		</div>
	</div>



	
</body>
<script>
$(function(){
	$("#amount").keyup(function(){
		if(isNaN($(this).val()) || parseInt($(this).val())<1){
			$(this).val("1");
			$("#totalMoney").html($("#money").val());
			return;
		}

		if (parseInt($(this).val())><?php echo ($info["surplus_amount"]); ?>) {
			$(this).val("<?php echo ($info["surplus_amount"]); ?>");
			var total = parseFloat($("#money").val())*parseInt($(this).val());
			$("#totalMoney").html(total.toFixed(2));
			return;
		}

		var total = parseFloat($("#money").val())*parseInt($(this).val());
		$("#totalMoney").html(total.toFixed(2));
	})
})


/*数量+1*/
function numAdd(){
	var num_add = parseInt($("#amount").val())+1;
	if($("#amount").val()==""){
		num_add = 1;
	}

	if (num_add><?php echo ($info["surplus_amount"]); ?>) {
		layer.tips("最多<?php echo ($info["surplus_amount"]); ?>份","#amount",{
		    tips: 1
		})
	}else{
		$("#amount").val(num_add);
		var total = parseFloat($("#money").val())*parseInt($("#amount").val());
		$("#totalMoney").html(total.toFixed(2));
	}
	
}

/*数量-1*/
function numDec(){
	var num_dec = parseInt($("#amount").val())-1;
	if(num_dec<1){
		layer.tips("最少1份","#amount",{
		    tips: 1
		})
	}else{
		$("#amount").val(num_dec);
		var total = parseFloat($("#money").val())*parseInt($("#amount").val());
		$("#totalMoney").html(total.toFixed(2));
	}
}





$(function() {

	//增加份数
	$('#add').click(function(){
		numAdd();
	});

	//减少份数
	$('#del').click(function(){
		numDec();
	});

});



//提交跟投数据
function sub_with(itemid){
	var amount = $('input[name="amount"]');
	if(amount.val()==''){
		layer.tips("请填写要投资的份数","#amount",{
		    tips: 1
		})
		amount.focus();
		return false
	}

	var money = $('input[name="money"]');
	if(money.val()==''){
		layer.tips("请填写要投资的资金","#money",{
		    tips: 1
		})
		money.focus();
		return false
	}

	$.ajax({
        type: 'POST',
        url: '<?php echo U('User/Item/with_item');?>',
        data: {
        	itemid: itemid,
        	amount: amount.val(),
        	money: money.val()
        },
        dataType: "json",
        beforeSend: function() {
        	layer.load(2, {
        		shade: [0.1, '#fff']
        	})
        },
        success: function(data) {
        	layer.closeAll();
        	if (data.status == 1) {
        		parent.layer.msg(data.info, {
        			shift: 2,
        			time: 1000,
        			shade: [0.1, '#000'],
        			end: function() {
        				//parent.location.reload();
        				parent.location.href = data.url;
        			}
        		})
        	} else {
        		if (data.url) {
        			parent.layer.confirm(data.info, {
	        			icon: 5,
	        			btn: ['充值','取消']
	        		}, function(){
	        			parent.location.href = data.url;
	        		},function(){
	        			layer.closeAll();
	        		});
        		}else{
        			parent.layer.alert(data.info, {
	        			icon: 5
	        		})
        		}
        	}
        }
    });
}
</script>
</html>