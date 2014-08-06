<script type="text/javascript" src="/public/js/area.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#submit").click(function(){		
		if($("#title").val()==0){
		   alert('请填写标题');
		   return false;
		}
		if($("#s_province").val()==0){
		   alert('请填写省份');
		   return false;
		}
		if($("#s_city").val()==0){
		   alert('请填写市');
		   return false;
		}
		if($("#s_county").val()==0){
		   alert('请填写区域');
		   return false;
		}
		if($("#address").val()==0){
		   alert('请填写详细地址');
		   return false;
		}
		if($("#phone").val()==0){
		   alert('请填写电话');
		   return false;
		}
		if($("#start_time").val()==0){
		   alert('请填写选择营业开始时间');
		   return false;
		}
		if($("#end_time").val()==0){
		   alert('请填写选择营业结束时间');
		   return false;
		}
		if($("#content").val()==0){
		   alert('请填写详细信息');
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
<form action="<?php echo site_url('/branch/update/');?>" method="post" name="myform" id="myform">
<input type="hidden" name="id" id="id" value="<?php echo $item_info['id'];?>"/>
  <div class="pad-10">
  <div class="col-tab">
  <ul class="tabBut cu-li">
    <li id="tab_setting_1" class="on" onclick="SwapTab('setting','on','',2,1);">基本信息</li>
  </ul>
  <div id="div_setting_1" class="contentList pad-10">
    <table width="100%" cellpadding="2" cellspacing="1" class="table_form">
      <tr>
        <th width="100">支行名称 :</th>
        <td>
        <input type="text" name="title" id="title" class="input-text" size="60" value="<?php echo $item_info['title']; ?>">
        </td>
      </tr>
      <tr>
        <th width="200"> 区域 :</th>
        <td>
        	目前：<?php echo $item_info['s_province'].'--'.$item_info['s_city'].'--'.$item_info['s_county']; ?><br />
       	 	改为：<select id="s_province" name="s_province"></select>&nbsp;&nbsp;
		    <select id="s_city" name="s_city" ></select>&nbsp;&nbsp;
		    <select id="s_county" name="s_county"></select>
		    <script type="text/javascript">_init_area();</script>
		    <div id="show"></div>
        </td>
      </tr>
      <tr>
        <th width="100">详细地址 :</th>
        <td><input type="text" name="address" id="address" class="input-text" size="60" value="<?php echo $item_info['address']; ?>"></td>
      </tr>
      <tr>
        <th width="100">联系电话 :</th>
        <td><input type="text" name="phone" id="phone" class="input-text" size="60" value="<?php echo $item_info['phone']; ?>"></td>
      </tr>
      <tr>
        <th width="100">营业时间 :</th>
        <td><input type="text" name="start_time" id="start_time" class="input-text" size="20" value="<?php echo $item_info['start_time']; ?>">
        <script language="javascript" type="text/javascript">
			Calendar.setup({
				inputField     :    "start_time",
				ifFormat       :    "%H:%M:%S",
				showsTime      :    'true',
				timeFormat     :    "24"
			});
		</script>到
		<input type="text" name="end_time" id="end_time" class="input-text" size="20" value="<?php echo $item_info['end_time']; ?>">
        <script language="javascript" type="text/javascript">
			Calendar.setup({
				inputField     :    "end_time",
				ifFormat       :    "%H:%M:%S",
				showsTime      :    'true',
				timeFormat     :    "24"
			});
		</script>
        </td>
      </tr>
 		<tr>
        <th>详细介绍 :</th>
        <td><textarea name="content" id="content" style="width:70%;height:350px;visibility:hidden;"><?php echo $item_info['content']; ?></textarea></td>
      </tr>
    </table>
  </div>
  <div class="bk15"></div>
  <div class="btn">
    <input type="submit" value="提交" name="submit" class="button" id="submit">
    <input type="button" value="返回" class="button" onclick="javascript:window.location.href='<?php echo site_url('/branch/view_list/');?>'">
  </div>
</div>
</div>
</form>
</body>
</html>