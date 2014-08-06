</head>
<div class="pad-lr-10">
    <form id="myform" name="myform" action="<?php echo site_url('/admin/delete');?>" method="post" onsubmit="return check();">
    <div class="table-list">
    <table width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width="5%">序号</th>
                <th width="1%"><input type="checkbox" value="" id="check_box" onclick="selectall('id[]');"></th>
                <th width=100>编号</th>
                <th width=100>帐号昵称</th>
      			<th width=100>开通时间 :</th>
                <th width=100>上次登陆</th>
                <th width=100>操作</th>
            </tr>
        </thead>
    	<tbody>
        <?php foreach($admin_list as $key => $item):?>
        <tr>
        	<td align="center"><?php echo $key;?></td>
            <td align="center"><input type="checkbox" value="<?php echo $item['id']?>" name="id[]" <?php if ($item['id'] ==1) {?>disabled="disabled"<?php }?></td>
            <td align="center"><a href="<?php echo site_url('/admin/edit/'.$item['id']); ?>"><em style="color:green;"><?php echo $item['id'];?></em></a></td>
            <td align="center"><a href="<?php echo site_url('/admin/edit/'.$item['id']); ?>">
            <em style="color:black;"><?php echo $item['user_name'];?></em></a></td>
     		<td align="center"><?php echo date("Y-m-d H:i:s",$item['add_time']);?></td>
            <td align="center"><?php  echo date("Y-m-d H:i:s",$item['last_time']);?></td>
            <td align="center"><a class="blue" href="<?php echo site_url('/admin/edit/'.$item['id']); ?>">编辑</a></td>
        </tr>
         <?php endforeach;?>
    	</tbody>
    </table>

    <div class="btn">
		<label for="check_box" style="float:left;">全选/取消</label>
		<input type="submit" class="button" name="dosubmit" value="删除" style="float:left;margin:0 10px 0 10px;"/>
		<div id="pages"><?php echo $paginate; ?></div>
    </div>
    </div>
    </form>
</div>
</body>
</html>