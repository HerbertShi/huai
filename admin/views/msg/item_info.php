<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<div class="pad_10">
<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
    	<tr>
			<th width="80">姓名：</th>
			<td><?php echo $obj_info['name']; ?></td>
		</tr>
		<tr>
			<th width="80">电话：</th>
			<td><?php echo $obj_info['phone']; ?></td>
		</tr>
		<tr>
			<th width="80">标题：</th>
			<td><?php echo $obj_info['title']; ?></td>
		</tr>
		<tr>
			<th width="80">内容：</th>
			<td><?php echo str_replace("\n","<br/>",$obj_info['content']);?></td>
		</tr>
		<tr>
			<th width="80">邮箱：</th>
			<td><?php echo $obj_info['email']; ?></td>
		</tr>
		<tr>
			<th width="80">公司名称：</th>
			<td><?php echo $obj_info['company_name']; ?></td>
		</tr>
		<tr>
			<th width="80">咨询类型：</th>
			<td><?php echo $obj_info['type']; ?></td>
		</tr>
		<tr>
			<th width="80">留言时间：</th>
			<td><?php echo date('Y-m-d H:i:s',$obj_info['add_time']); ?></td>
		</tr>
		<tr>
			<th></th>
			<td><a style="margin-bottom:0;" href="<?php echo site_url('/msg/view_list/'); ?>" class="button">返回列表</a></td>
		</tr>
</table>
</div>
</body>
</html>




