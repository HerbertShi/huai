<script type="text/javascript" src="/public/js/adm_common.js"></script>
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
<form action="<?php echo site_url('/invite/add_position');?>" method="post" name="myform" id="myform">
  <div class="pad-10">
  <div class="col-tab">
  <ul class="tabBut cu-li">
    <li id="tab_setting_1" class="on" onclick="SwapTab('setting','on','',2,1);">基本信息</li>
  </ul>
  <div id="div_setting_1" class="contentList pad-10">
    <table width="100%" cellpadding="2" cellspacing="1" class="table_form">
      <tr>
        <th width="100">职位名称 :</th>
        <td><input type="text" name="position_name" id="position_name" class="input-text" size="60" value="<?php echo set_value('position_name', $position_name); ?>">最多输入30个字</td>
      </tr>
      <tr>
		<th  width="100">所属部门：</th>
		<td>
			<input type="text" id="department" name="department" maxlength="30" value="<?php echo set_value('department', $department); ?>"/>
		</td>
		</tr>
		<tr>
			<th  width="100">截至时间：</th>
			<td>
				<input type="text" name="stop_time" id="stop_time" value="<?php echo set_value('stop_time',$stop_time)?>" class="date" size="22">
				<script language="javascript" type="text/javascript">
					Calendar.setup({
						inputField     :    "stop_time",
						ifFormat       :    "%Y-%m-%d",
						showsTime      :    'true',
						timeFormat     :    "24"
					});
				</script>
			</td>
		</tr>
		<tr>
			<th  width="100">招聘类型：</th>
			<td>
				<select id="position_type" name="position_type">
					<option value="">---请选择---</option>
					<option value="1">全部</option>
					<option value="2">社会招聘</option>
					<option value="3">学校招聘</option>
				</select>
			</td>
		</tr>
		<tr>
			<th  width="100">职位介绍：</th>
			<td>
				<textarea cols="40" rows="14" name="content" id="content" style="width:70%;height:350px;visibility:hidden;"><?php echo set_value('content', $content); ?></textarea>
			</td>
		</tr>
    </table>
  </div>
  <div class="bk15"></div>
  <div class="btn">
    <input type="submit" value="提交" name="submit" class="button" id="submit">
  </div>
