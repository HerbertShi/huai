<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<div class="pad_10">
<form id="view_form" name="view_form" action="<?php echo site_url('/electron_bank/son_view_list/'.$parent_id)?>" method="post">
<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
	<tr> 
      <th width="80">所属菜单 :</th>
      <td><?php echo $parent_info['title']; ?></td>
    </tr>
	<tr> 
      <th width="80">标题 :</th>
      <td><?php echo $obj_info['title']; ?></td>
    </tr>
    <tr> 
      <th width="80">内容 :</th>
      <td><?php echo str_replace("\n","<br/>",$obj_info['content']);?></td>
    </tr>
    <tr> 
      <th width="80">发布时间：</th>
	  <td><?php echo date('Y-m-d H:i:s',$obj_info['add_time']); ?></td>
    </tr>
    <tr>
		<th></th>
		<td><input type="submit" class="button" value="返回" /></td>
	</tr>
</table>
<input type="hidden" name="obj_id" id="obj_id" value="<?php echo $obj_info['parent_id'];?>"/>
</form>
</div>
</body>
</html>


