<script type="text/javascript" src="/public/js/adm_common.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#submit").click(function(){		
			if($("#title").val()==0){
			   alert('请填写标题');
			   return false;
			}
			if($("#content").val()==0){
			   alert('请填写内容');
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
<form action="<?php echo site_url('/invite/add_notice');?>" method="post" name="myform" id="myform">
  <div class="pad-10">
  <div class="col-tab">
  <ul class="tabBut cu-li">
    <li id="tab_setting_1" class="on" onclick="SwapTab('setting','on','',2,1);">基本信息</li>
  </ul>
  <div id="div_setting_1" class="contentList pad-10">
    <table width="100%" cellpadding="2" cellspacing="1" class="table_form">
      <tr>
        <th width="100">公告名称 :</th>
        <td><input type="text" name="title" id="title" class="input-text" size="60" value="<?php echo set_value('title', $title); ?>">最多输入30个字</td>
      </tr>
 		<tr>
        <th>详细内容 :</th>
        <td><textarea name="content" id="content" style="width:70%;height:350px;visibility:hidden;"><?php echo set_value('content', $content); ?></textarea></td>
      </tr>
    </table>
  </div>
  <div class="bk15"></div>
  <div class="btn">
    <input type="submit" value="提交" name="submit" class="button" id="submit">
  </div>
