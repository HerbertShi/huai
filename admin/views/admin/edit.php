<script type="text/javascript">
$(document).ready(function(){
	$("#submit").click(function(){	
		if($("#user_name").val()==0){
		  	alert('请填写产品名称');
		   	return false;
		}
		if($("#password").val().length < 6 || $("#password").val().length > 20){
		  	alert('密码应在6-20位之间');
		   	return false;
		}
		if($("#password").val() != $("#repassword").val()){
		  	alert('两次密码必须一致');
		   	return false;
		}
	});	
});
</script>
</head>
<div class="pad_10">
<form action="<?php echo site_url('/admin/edit');?>" method="post" name="myform" id="myform">
<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
	<tr> 
		<th width="100">帐号昵称 :</th>
		<td><input type="text" name="user_name" id="user_name" class="input-text" value="<?php  echo $item_info['user_name']; ?>" readonly="readonly"></td>
    </tr>
    <tr>
		<th>帐号密码 :</th>
		<td><input type="password" name="password" id="password" class="input-text" value=""></td>
    </tr>
    <tr> 
		<th>确认密码 :</th>
		<td><input type="password" name="repassword" id="repassword" class="input-text" value=""></td>
    </tr>
	<tr>
        <th>是否删除 :</th>
        <td>
            <input type="radio" name="is_del" id="is_del" class="radio_style" value="1" <?php if ($item_info['is_del'] ==1) {?>checked="checked"<?php }?> > &nbsp;是&nbsp;&nbsp;&nbsp;
        	<input type="radio" name="is_del" id="is_del" class="radio_style" value="0" <?php if ($item_info['is_del'] ==0) {?>checked="checked"<?php }?>> &nbsp;否
        </td>
    </tr>
</table>
<input type="hidden" name="id" value="<?php echo $item_info['id']?>" />
<input type="submit" name="submit" id="submit" class="button" value="提交" style="margin:10px 50px;">
</form>
</div>
</body>