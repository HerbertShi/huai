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
<div class="pad-lr-10">
<form name="searchform" action="<?php echo site_url('/site_bank/view_list');?>" method="post" >
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
                &nbsp; 
                &nbsp;招聘类型 :
                <select id="type" name="type">
					<option value="0">---请选择---</option>
					<option value="1" <?php echo $type==1?'selected':'';?>>个人网银</option>
					<option value="2" <?php echo $type==2?'selected':'';?>>公司网银</option>
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
<form id="myform" name="myform" action="<?php echo site_url('/site_bank/delete_item');?>" method="post" onsubmit="return check();">
    <div class="table-list">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
          	<th width="5%">序号</th>
            <th width="1%"><input type="checkbox" value="" id="check_box" onclick="selectall('id[]');"></th>
            <td width="120">标题</td>
             <td width="80">招聘类型</td>
            <td width="80">发布时间</td>
            <td width="60">操作</td>
          </tr>
        </thead>
        <tbody>
          <?php foreach($list as $i=>$item):?>
          <tr>
          	<td><?php echo $item['id'];?></td>
            <td><input type="checkbox" value="<?php echo $item['id'];?>" name="id[]"></td>
            <td><a href="<?php echo site_url('/site_bank/item_info/'.$item['id']); ?>"><?php echo $item['title']?></a></td>
     		<td>
     		<?php 
			 if ($item['type'] == 1) {
				echo "个人网银";
			} else {
				echo "企业网银";
			}
			?>	
      		</td>
      		<td><?php echo date('Y-m-d H:i:s',$item['add_time']); ?></td>
     		<td>
     			<a href="<?php echo site_url('/site_bank/update_item/'.$item['id']); ?>"  class="blue">编辑</a>
     			<a href="<?php echo site_url('/site_bank/item_info/'.$item['id']); ?>"  class="blue">详情</a>
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
	