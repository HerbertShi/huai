<style type="text/css">
	#ad_image img{ 
		width:300px;
	}
</style>
</head>
<div class="pad_10">
<form action="<?php echo site_url('/ad/add');?>" method="post" name="myform" id="myform" enctype="multipart/form-data">
<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
	<tr> 
      <th width="80">广告名称 :</th>
      <td><input type="text" name="title" id="title" class="input-text" size="40" value=""></td>
    </tr>
    <tr> 
      <th width="80">广告链接 :</th>
      <td><input type="text" name="url" id="url" class="input-text" size="40" value=""></td>
    </tr>
     <tr> 
      <th>广告分类 :</th>
      <td>
      <select name="cate">
      	<option value="首页">首页</option>
      	<option value="行业新闻">行业新闻</option>
      	<option value="优惠新闻">优惠新闻</option>
      	<option value="活动宣传">活动宣传</option>
      </select>
      </td>
    </tr>
    <tr id="ad_code" class="bill_media"> 
      <th>图片上传 :</th>
      <td>
        <img id="img_show" src="" width="210px" height="210px"/><br /><br />
        <input type="file" name="upload_img" id="upload_img" class="input-text" size=21 />
      </td>
    </tr>
    <tr> 
      <th>开始时间 :</th>
      <td>
      	<input type="text" name="start_time" id="start_time" class="date" size="22" value="">
      	<script language="javascript" type="text/javascript">
			Calendar.setup({
				inputField     :    "start_time",
				ifFormat       :    "%Y-%m-%d %H:%M:%S",
				showsTime      :    'true',
				timeFormat     :    "24"
			});
		</script>
      </td>
    </tr>
    <tr> 
      <th>结束时间 :</th>
      <td>
      	<input type="text" name="end_time" id="end_time" class="date" size="22" value="">
        <script language="javascript" type="text/javascript">
			Calendar.setup({
				inputField     :    "end_time",
				ifFormat       :    "%Y-%m-%d %H:%M:%S",
				showsTime      :    'true',
				timeFormat     :    "24"
			});
		</script>
      </td>
    </tr>
    <tr>
         <th width="100">排序值 :</th>
         <td><input type="text" name="ord" id="ord" class="input-text" size="4" value="" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')"></td>
    </tr>
	<tr>
        <th>是否删除 :</th>
        <td>
            <input type="radio" name="is_del" id="is_del" class="radio_style" value="1" > &nbsp;是&nbsp;&nbsp;&nbsp;
        	<input type="radio" name="is_del" id="is_del" class="radio_style" value="0" checked="checked"> &nbsp;否
        </td>
    </tr>
</table>
<input type="submit" name="submit" id="submit" class="button" value="提交">
</form>
</div>
</body>
</html>