<style type="">
.button1 {
   background-image: linear-gradient(to bottom, #0088CC, #0044CC);
    background-repeat: repeat-x;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
	border-radius: 4px;
    border-style: solid;
    border-width: 1px;
 	color: #FFFFFF;
    display: inline-block;
    margin-bottom: 10px;
    padding: 5px 12px;
    text-align: center;
}
</style>
</head>
<a href="<?php echo site_url('/invite/add_position/'); ?>"  class="button1" >发布新职位</a>
<div class="pad-lr-10">
<form name="searchform" action="<?php echo site_url('/invite/position_list');?>" method="post" >
    <table width="100%" cellspacing="0" class="search-form">
        <tbody>
            <tr>
            <td>
            <div class="explain-col">
            	发布时间:
            	<input type="text" name="time_start" id="time_start" class="date" size="12" value="<?php echo $time_start? date('Y-m-d',$time_start) : '';?>">
				<script language="javascript" type="text/javascript">
                    Calendar.setup({
                        inputField     :    "time_start",
                        ifFormat       :    "%Y-%m-%d",
                        showsTime      :    'true',
                        timeFormat     :    "24"
                    });
                </script>
                -
                <input type="text" name="time_end" id="time_end" class="date" size="12" value="<?php echo $time_end ? date('Y-m-d',$time_end) : '';?>">
				<script language="javascript" type="text/javascript">
                    Calendar.setup({
                        inputField     :    "time_end",
                        ifFormat       :    "%Y-%m-%d",
                        showsTime      :    'true',
                        timeFormat     :    "24"
                    });
                </script>
                &nbsp;所属部门 :
                <input name="department" type="text" class="input-text" size="25" value="<?php echo $department;?>" />
                <br /><br />
                &nbsp;招聘类型 :
                <select id="position_type" name="position_type">
					<option value="">---请选择---</option>
					<option value="1" <?php echo $position_type==1?'selected':'';?>>全部</option>
					<option value="2" <?php echo $position_type==2?'selected':'';?>>社会招聘</option>
					<option value="3" <?php echo $position_type==3?'selected':'';?>>学校招聘</option>
				</select>
                &nbsp;关键字 :
                <input name="keyword" type="text" class="input-text" size="25" value="<?php echo $keyword;?>" />
                <input type="submit" name="search" class="button" value="搜索" />
        	</div>
            </td>
            </tr>
        </tbody>
    </table>
    </form>
<form id="myform" name="myform" action="<?php echo site_url('/invite/delete_position');?>" method="post" onsubmit="return check();">
    <div class="table-list">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
          	<th width="5%">序号</th>
            <th width="1%"><input type="checkbox" value="" id="check_box" onclick="selectall('id[]');"></th>
            <td width="120">职位名称</td>
            <td width="180">所属部门</td>
            <td width="80">发布时间</td>
            <td width="80">停止时间</td>
            <td width="80">招聘类型</td>
            <td width="60">操作</td>
          </tr>
        </thead>
        <tbody>
          <?php foreach($position_list as $i=>$item):?>
          <tr>
          	<td><?php echo $item['id'];?></td>
            <td><input type="checkbox" value="<?php echo $item['id'];?>" name="id[]"></td>
            <td><a href="<?php echo site_url('/invite/position_info/'.$item['id']); ?>"><?php echo $item['position_name']?></a></td>
     		<td><?php echo $item['department']?></td>
     		<td><?php echo date('Y-m-d H:i:s',$item['add_time']); ?></td>
     		<td><?php echo $item['stop_time']; ?></td>
     		<td>
     		<?php 
			if ($item['position_type'] == 1) {
				echo "全部";
			} elseif ($item['position_type'] == 2) {
				echo "社会招聘";
			} else {
				echo "学校招聘";
			}
			?>	
      		</td>
     		<td>
     			<a href="<?php echo site_url('/invite/update_position/'.$item['id']); ?>"  class="blue">编辑</a>
     			<a href="<?php echo site_url('/invite/position_info/'.$item['id']); ?>"  class="blue">详情</a>
     		</td>
          </tr>
          <?php endforeach;?>
        </tbody>
      </table>
	<div class="btn">
	    <label for="check_box" style="float:left;">全选/取消</label>
	    <input type="submit" class="button" name="submit" value="删除" style="float:left;margin:0 10px 0 10px;"/>
	    <div id="pages">
	    <?php  
          	echo $paginate;
        ?>
         </div>
    </div>
    </div>
</form>
</div>
</body>
</html>
	