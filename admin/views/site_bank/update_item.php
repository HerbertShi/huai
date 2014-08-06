<script type="text/javascript">
	$(document).ready(function(){
		$("#submit").click(function(){		
			if($("#name").val()==0){
			   alert('请填写标题');
			   return false;
			}
			 
			if($("#type").val()==0){
			   alert('请填写标题');
			   return false;
			}
			if($("#content").val()==0){
				   alert('请填写职位介绍');
				   return false;
				}
		});
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
</head>
<form action="<?php echo site_url('/site_bank/update_item/');?>" method="post" name="myform" id="myform">
<input type="hidden" name="id" id="id" value="<?php echo $info['id'];?>"/>
  <div class="pad-10">
  <div class="col-tab">
  <ul class="tabBut cu-li">
    <li id="tab_setting_1" class="on" onclick="SwapTab('setting','on','',2,1);">基本信息</li>
  </ul>
  <div id="div_setting_1" class="contentList pad-10">
    <table width="100%" cellpadding="2" cellspacing="1" class="table_form">
      <tr>
				<th width="100">职位名称：</th>
				<td>
					<input type="text" id="name" name="name" maxlength="30" value="<?php echo $info['title']; ?>"/>
					最多输入30个字
				</td>
			</tr>
			<tr>
				<th width="100">招聘类型：</th>
				<td>
					<select id="type" name="type">
						<option value="">---请选择---</option>
						<option value="1" <?php echo $info['type']==1?'selected':''; ?>>个人网银</option>
						<option value="2" <?php echo $info['type']==2?'selected':''; ?>>企业网银</option>
					</select>
				</td>
			</tr>
			<tr>
				<th  width="100">职位介绍：</th>
				<td>
					<textarea cols="40" rows="14" name="content" id="content" style="width:70%;height:350px;visibility:hidden;"><?php echo $info['content']; ?></textarea>
				</td>
			</tr>
    </table>
  </div>
  <div class="bk15"></div>
  <div class="btn">
    <input type="submit" value="提交" name="submit" class="button" id="submit">
    <input type="button" value="返回" class="button" onclick="javascript:window.location.href='<?php echo site_url('/invite/list/');?>'">
  </div>
</div>
</div>
</form>
</body>
</html>
