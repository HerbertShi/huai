<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<div class="pad_10">
<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
	<tr>
		<th width="80">职位名称：</th>
		<td><?php echo $position_info['position_name']; ?></td>
	</tr>
	<tr>
		<th width="80">所属部门：</th>
		<td><?php echo $position_info['department']; ?></td>
	</tr>
	<tr>
		<th width="80">发布时间：</th>
		<td><?php echo date('Y-m-d H:i:s',$position_info['add_time']); ?></td>
	</tr>
	<tr>
		<th width="80">停止时间：</th>
		<td><?php echo $position_info['stop_time']; ?></td>
	</tr>
	<tr>
		<th width="80">招聘类型：</th>
		<td>
		<?php 
		if ($position_info['position_type'] == 1) {
			echo "全部";
		} elseif ($position_info['position_type'] == 2) {
			echo "社会招聘";
		} else {
			echo "学校招聘";
		}
		?>
		</td>
	</tr>
	<tr>
		<th width="80">工作内容：</th>
		<td><?php echo str_replace("\n","<br/>",$position_info['content']);?></td>
	</tr>
	<tr>
		<th></th>
		<td><a style="margin-bottom:0;" href="<?php echo site_url('/invite/position_list/'); ?>" class="button">返回列表</a></td>
	</tr>
</table>
</div>
</body>
</html>
