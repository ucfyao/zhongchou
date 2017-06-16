<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
  <title>$zml.title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/Public/css/pintuer.css">
  <script src="/Public/js/jquery-1.8.3.min.js"></script>
  <script src="/Public/js/pintuer.js"></script>
  <script src="/Public/js/respond.js"></script>
  <script src="/Public/lib/layer/layer.js"></script>
  <script type="text/javascript" src="/Public/lib/validform/Validform.min.js"></script>
  <link href="/Public/lib/validform/style.css" rel="stylesheet" type="text/css">
</head>
<body>

  <div class="container">
    <div class="x12 padding">

      <form class="form form-x" action="#" method="post" autocomplete="off">
		<div class="form-group x6">
			<div class="label padding-right">名称： </div>
			<div class="field">
				<input type="text" class="input box-shadow-none radius-none "  name="name" value="<?php echo ($info["name"]); ?>"   />
			</div>
		</div>
		<div class="form-group x6">
			<div class="label padding-right">链接： </div>
			<div class="field">
				
				<input type="text" class="input box-shadow-none radius-none"  name="url" value="<?php echo ($info["url"]); ?>"  />
			</div>
		</div>
		<div class="form-group x6">
			<div class="label padding-right">排序： </div>
			<div class="field">
				<input type="number" min="0" class="input box-shadow-none radius-none"  name="sort" value="<?php echo ((isset($info["sort"]) && ($info["sort"] !== ""))?($info["sort"]):'0'); ?>"  />
			</div>
		</div>
		<div class="form-group x6">
			<div class="label padding-right">标识： </div>
			<div class="field">
			 <select class="input box-shadow-none radius-none input-auto" name="type">
			  <option value="0" <?php if($info['type'] == '0' ): ?>selected<?php endif; ?>>0</option>
			  <option value="1" <?php if($info['type'] == '1' ): ?>selected<?php endif; ?>>1</option>
			  <option value="2" <?php if($info['type'] == '2'): ?>selected<?php endif; ?>>2</option>
			</select>
			</div>
		</div>
		<div class="form-group x6">
			<div class="label padding-right">状态： </div>
			<div class="field">
					<label> <input type="radio" name="status" value="1" <?php if($info['status'] == '1'): ?>checked<?php endif; ?> /> 正常</label>
					<label> <input type="radio" name="status" value="0" <?php if($info['status'] == '0'): ?>checked<?php endif; ?> /> 隐藏</label>
			</div>
		</div>
		<div class="form-group ">
			<div class="field">
				<span>
					<a class="button bg-blue button-small radius-none x2 text-center input-file" href="javascript:void(0);" id="jihuashu">+ 上传图片<input size="100" name="plan_files" id="fileupload" type="file" /></a>
					<span class="text-small  text-gray padding-big-left">允许上传：jpg,png,gif 文件 ,大小不超过2MB</span>
					<input type="hidden" name="img" value="<?php echo ($info['img']); ?>"/>
				</span>
			</div>
		</div>
			<div class="x12 padding border  jihuanshu margin-top">
				<img src="<?php echo ($info['img']); ?>" width="400" />
			</div>

			

        <div class="margin-big-top text-center x12">
        <button class="btn button bg-sub" type="button" onclick="save()"> 确 定</button>
        </div>
      </form>

    </div>
  </div>
  <script src="/Public/js/form.js" ></script>
<script type="text/javascript">
function save(){
	var name=$("input[name='name']");
	var url=$("input[name='url']");
	var sort=$("input[name='sort']");
	var img=$("input[name='img']");
	var type=$("select[name='type']").val();
	var status=$("input[name='status']:checked").val();
	
	if(name.val().length < 1){
		layer.tips('标题不能为空', name);
		name.focus()
		return false
	}
	if(url.val().length < 1){
		layer.tips('链接地址不能为空', url);
		url.focus()
		return false
	}
	if(img.val().length < 1){
		layer.tips('图片没有上传', img);
		img.focus()
		return false
	}
      $.ajax({
        type: 'POST',
        url: '/index.php/Admin/Ads/ads_edit.html',
        data: {
          name: name.val(),
          url: url.val(),
          img: img.val(),
          sort:sort.val(),
          type:type,
          status:status,
         
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
                parent.location.reload()
              }
            })
          } else {
            parent.layer.alert(data.info, {
              icon: 5
            })
          }
        }
      });
  }
   $(function () {
      	$("#fileupload").wrap("<form id='myupload' action='/index.php/Admin/Upload' method='post' enctype='multipart/form-data'></form>");
      	$("#fileupload").change(function(){
      		$("#myupload").ajaxSubmit({
      			dataType:  'json',
      			beforeSend: function() {
      				var index = layer.load(1, {
					shade: [0.1,'#fff'] //0.1透明度的白色背景
				});
      			},
      			success: function(data) {

      				if(data.status==0){
      					layer.open({
      						content:data.info,
      						btn:['好的'],
      						yes:function(){
      							layer.closeAll()
      						}
      					})
      				}else{
      					var img = data.url;
      				
      					var filehtml='<img src="'+img+'" class="border" width="400" /> '
      					$(".jihuanshu").html(filehtml)
      					$(".jihuanshu").removeClass('hidden');
						$("input[name='img']").val(img);
      					layer.closeAll()
      				}
      			}
      		});
      	});
    });

</script>
</body>
</html>