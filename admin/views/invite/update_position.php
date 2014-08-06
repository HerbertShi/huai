<script type="text/javascript">
	$(document).ready(function(){
		$("#submit").click(function(){		
			if($("#position_name").val()==0){
			   alert('请填写标题');
			   return false;
			}
			if($("#department").val()==0){
			   alert('请填写部门');
			   return false;
			}
			if($("#stop_time").val()==0){
			   alert('请填写标题');
			   return false;
			}
			if($("#position_type").val()==0){
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
<form action="<?php echo site_url('/invite/update_position/');?>" method="post" name="myform" id="myform">
<input type="hidden" name="id" id="id" value="<?php echo $position_info['id'];?>"/>
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
					<input type="text" id="position_name" name="position_name" maxlength="30" value="<?php echo $position_info['position_name']; ?>"/>
					最多输入30个字
				</td>
			</tr>
			<tr>
				<th width="100">所属部门：</th>
				<td>
					<input type="text" id="department" name="department" maxlength="30" value="<?php echo $position_info['department']; ?>"/>
				</td>
			</tr>
			<tr>
				<th width="100">截至时间：</th>
				<td>
					<input type="text" name="stop_time" id="stop_time" value="<?php echo $position_info['stop_time']; ?>">
				</td>
			</tr>
			<tr>
				<th width="100">招聘类型：</th>
				<td>
					<select id="position_type" name="position_type">
						<option value="">---请选择---</option>
						<option value="1" <?php echo $position_info['position_type']==1?'selected':''; ?>>全部</option>
						<option value="2" <?php echo $position_info['position_type']==2?'selected':''; ?>>社会招聘</option>
						<option value="3" <?php echo $position_info['position_type']==3?'selected':''; ?>>学校招聘</option>
					</select>
				</td>
			</tr>
			<tr>
				<th  width="100">职位介绍：</th>
				<td>
					<textarea cols="40" rows="14" name="content" id="content" style="width:70%;height:350px;visibility:hidden;"><?php echo $position_info['content']; ?></textarea>
				</td>
			</tr>
    </table>
  </div>
  <div class="bk15"></div>
  <div class="btn">
    <input type="submit" value="提交" name="submit" class="button" id="submit">
    <input type="button" value="返回" class="button" onclick="javascript:window.location.href='<?php echo site_url('/invite/position_list/');?>'">
  </div>
</div>
</div>
</form>
</body>
</html>
