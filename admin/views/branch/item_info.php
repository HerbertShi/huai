<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<div class="pad_10">
<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
	<tr> 
      <th width="80">支行名称 :</th>
      <td><?php echo $obj_info['title']; ?></td>
    </tr>
    <tr> 
      <th width="80">详细地址 :</th>
      <td><?php echo $obj_info['s_province'].$obj_info['s_city'].$obj_info['s_county'].$obj_info['address']; ?></td>
    </tr>
    <tr> 
      <th width="80">联系电话 :</th>
      <td><?php echo $obj_info['phone']; ?></td>
    </tr>
    <tr> 
      <th width="80">营业时间 :</th>
      <td><?php echo $obj_info['start_time'].'到'.$obj_info['end_time']; ?></td>
    </tr>
    <tr> 
      <th width="80">支行介绍 :</th>
      <td><?php echo str_replace("\n","<br/>",$obj_info['content']);?></td>
    </tr>
    <tr>
		<th></th>
		<td><a class="button" style="margin-bottom:0;" href="<?php echo site_url('/branch/view_list/'); ?>">返回列表</a></td>
	</tr>
</table>
</div>
</body>
</html>


