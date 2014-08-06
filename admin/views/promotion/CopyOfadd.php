<script type="text/javascript">
function reset_form() {
	if (document.getElementById('title').value == '') {
		document.getElementById('title').focus();
		return false;
	}
	if (document.getElementById('content').value == '') {
		document.getElementById('content').focus();
		return false;
	}
	return true;
}
</script>
<script type="text/javascript" src="/public/js/adm_common.js"></script>
<script type="text/javascript">
//编辑器
KE.show({
	id : 'content',
	imageUploadJson : '/public/js/kindeditor/php/upload_json.php',
	fileManagerJson : '/public/js/kindeditor/php/file_manager_json.php',
	allowFileManager : true,
	afterCreate : function(id) {
		KE.event.ctrl(document, 13, function() {
			KE.util.setData(id);
			document.forms['myform'].submit();
		});
		KE.event.ctrl(KE.g[id].iframeDoc, 13, function() {
			KE.util.setData(id);
			document.forms['myform'].submit();
		});
	}
});
	});
</script>
<style type="text/css">
	#ad_image img{ width:300px;}
</style>
</head>
<div class="pad_10">
<form action="<?php echo site_url('/notice/add');?>" method="post" name="myform" id="myform" onsubmit="return reset_form();">
<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
	<tr> 
      <th width="80">公告标题 :</th>
      <td><input type="text" id="title" name="title" maxlength="30" value="<?php echo set_value('title', $title); ?>"/>必填项且最多输入30个字</td>
    </tr>
    <tr> 
      <th width="80">公告内容 :</th>
      <td><textarea cols="40" rows="14" name="content" id="content"><?php echo set_value('content', $content); ?></textarea>
      
      <textarea name="info" id="text" style="width:70%;height:350px;visibility:hidden;">{$info.info}</textarea>
      </td>
    </tr>
</table>
<input type="submit"  class="button" value="提交">
</form>
</div>
</body>
</html>


