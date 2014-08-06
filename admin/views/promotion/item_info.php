<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<div class="pad_10">
<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
	<tr> 
      <th width="80">优惠标题 :</th>
      <td><?php echo $obj_info['title']; ?></td>
    </tr>
    <tr> 
      <th width="80">优惠内容 :</th>
      <td><?php echo str_replace("\n","<br/>",$obj_info['content']);?></td>
    </tr>
    <tr> 
      <th width="80">发布时间：</th>
	  <td><?php echo date('Y-m-d H:i:s',$obj_info['add_time']); ?></td>
    </tr>
    <tr>
		<th></th>
		<td><a class="button" style="margin-bottom:0;" href="<?php echo site_url('/promotion/view_list/'); ?>">返回列表</a></td>
	</tr>
</table>
</div>
</body>
</html>


