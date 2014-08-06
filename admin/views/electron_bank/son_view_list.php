<script type="text/javascript">
function submit_form(obj_id,opt_type) {
	var view_form = document.getElementById('view_form');
	if (opt_type == 1) {
		document.getElementById('obj_id').value = obj_id;
		view_form.action = "<?php echo site_url('/electron_bank/son_item_info/'.$parent_id); ?>";
	} else if (opt_type == 2) {
		document.getElementById('obj_id').value = obj_id;
		view_form.action = "<?php echo site_url('/electron_bank/son_update/'.$parent_id); ?>";
	} else if (opt_type == 3) {
		if(confirm('确定要删除吗？')) {
			document.getElementById('obj_id').value = obj_id;
			view_form.action = "<?php echo site_url('/electron_bank/son_delete/'.$parent_id); ?>";
		} else {return false;}
	}
	view_form.submit();
}
</script>
</head>
<div class="pad-lr-10">
    <div class="table-list">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
          	<th width="5%">序号</th>
            <th width=150>标题</th>
            <th width=80>内容</th>
            <th width=80>发布时间</th>
            <th width=50>操作</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($son_list as $i=>$item):?>
          <tr>
          	<td align="center"><?php echo $item['id'];?></td>
            <td align="center"><a href="javascript:submit_form(<?php echo $item['id'];?>,1);"><?php echo $item['title']?></a></td>
            <td align="center">
            <?php 
				$content = $item['content'];
				echo mb_strlen($content, 'UTF-8') > 16 ? str_replace("\n","<br/>",mb_substr($content, 0, 16, 'UTF-8')).'..' : str_replace("\n","<br/>",$content);
			?>
            </td>
            <td align="center"><?php echo date('Y-m-d H:i:s',$item['add_time']); ?></td>
            <td align="center">
            <a  class="blue" href="javascript:submit_form(<?php echo $item['id'];?>,2);">编辑</a>
            <a  class="blue" href="javascript:submit_form(<?php echo $item['id'];?>,3);">删除</a>
            </td>
          </tr>
          <?php endforeach;?>
        </tbody>
      </table>
	<div class="btn">
		<a class="button" style="margin-bottom:0;" href="<?php echo site_url('/electron_bank/view_list/'); ?>">返回上级菜单</a>
	    <div id="pages">
	    <?php  
	    	echo "共".$total_num."条";
        ?>
         </div>
    </div>
    </div>
</div>
<form id="view_form" name="view_form" action="" method="post">
	<input type="hidden" name="obj_id" id="obj_id" value=""/>
</form>
</body>
</html>


	