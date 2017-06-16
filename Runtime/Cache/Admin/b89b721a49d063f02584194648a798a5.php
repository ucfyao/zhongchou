<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" href="/Public/css/pintuer.css">
<script src="/Public/js/jquery-1.8.3.min.js"></script>
<script src="/Public/js/pintuer.js"></script>
<script src="/Public/lib/layer/layer.js"></script>
<script src="/Public/lib/validform/Validform.min.js"></script>
	<div class="x12 padding-large">

		<form method="POST" class="form-x" autocomplete="off">
      		<div class="form-group">
      			<div class="label x2"><label for="key">API KEY</label></div>
      			<div class="field x9">
      				<input type="text" class="input" id="key" name="key" value="<?php echo (C("ZHIMALE.SMS_API_KEY")); ?>" datatype="*">
      			</div>
      		</div>

          <div class="form-group">
            <div class="label x2"><label for="sign">短信签名</label></div>
            <div class="field x9">
              <input type="text" class="input" id="sign" name="sign" value="<?php echo (C("ZHIMALE.SMS_SIGN")); ?>" datatype="*">
            </div>
          </div>

      		<div class="clearfix"></div>

      		<div class="form-button">
      			<button class="button bg-sub" type="submit">保存配置</button>
      		</div>
      	</form>
    </div>

<script type="text/javascript">
$(function(){
    $(".form-x").Validform({
        tiptype:2,
        callback:function(form){
            $.ajax({
                type: 'POST',
                url: '<?php echo U('Admin/System/sms_config');?>',
                data:{
                    key:$("#key").val(),
                    sign:$("#sign").val()
                },
                dataType: "json",

                success: function(data){
                    if (data.status == 1) {
                        parent.layer.msg(data.info, {
                            shift: 2,
                            time: 1000,
                            shade: [0.1,'#000'],
                            end: function(){
                                parent.location.reload();
                            }
                        });
                    }else if (data.status == 0) {
                        parent.layer.alert(data.info,{icon: 5});
                    }else{
                        parent.layer.alert('请求失败...',{icon: 2});
                    }
                },
            });
        
            return false;
        }
    });
})
</script>