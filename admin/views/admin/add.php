<include file="./Admin/Tpl/Public_header.html" />

<script type="text/javascript">
$(document).ready(function(){
	$("#submit").click(function(){
		if($("#user_name").val()==0){
		  	alert('请填写帐号昵称');
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
<form action="<?php echo site_url('/admin/add');?>" method="post" name="myform" id="myform">
<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
	<tr> 
      <th width="80">帐号昵称 :</th>
      <td><input type="text" name="user_name" id="user_name" class="input-text" value="<?php echo set_value('user_name', $user_name); ?>"></td>
    </tr>
    <tr> 
      <th>帐号密码 :</th>
      <td><input type="password" name="password" id="password" class="input-text" value=""></td>
    </tr>
    <tr>
      <th>确认密码 :</th>
      <td><input type="password" name="repassword" id="repassword" class="input-text"></td>
    </tr>
</table>
<input type="submit" name="submit" id="submit" class="button" value="提交" style="margin:10px 30px;">
</form>

</div>
</body>
</html>