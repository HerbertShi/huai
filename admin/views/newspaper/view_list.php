<script type="text/javascript">
	function status(id,type){
	    $.get("{:U('Ad/status')}", { id: id, type: type }, function(data){
			$("#"+type+"_"+id+" img").attr('src', '__PUBLIC__/images/status_'+data.data+'.gif')
		},"json"); 
	}
</script>

</head>
<div class="pad-lr-10">
    <form name="searchform" action="<?php echo site_url('/newspaper/view_list');?>" method="post" >
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
            	&nbsp;&nbsp;资讯分类：
                <select name="cate">
            	<option value="">--选择分类--</option>
				<option value="首页">首页</option>
      			<option value="行业新闻">行业新闻</option>
      			<option value="优惠新闻">优惠新闻</option>
      			<option value="活动宣传">活动宣传</option>
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
  <form id="myform" name="myform" action="<?php echo site_url('/newspaper/delete');?>" method="post">
    <div class="table-list">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
          	<th width="5%">序号</th>
            <th width="1%"><input type="checkbox" value="" id="check_box" onclick="selectall('id[]');"></th>
            <th width=150>行报名称</th>
            <th width=80>行报链接</th>
            <th width=80>行报分类</th>
            <th width=150>图片</th>
            <th width=50>排序</th>
            <th width=50>操作</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($ad_list as $key => $val):?>
          <tr>
          	<td align="center"><?php echo $key;?></td>
            <td align="center"><input type="checkbox" value="<?php echo $val['id'];?>" name="id[]"></td>
            <td align="center"><?php echo $val['title'];?></td>
            <td align="center"><?php echo $val['url'];?></td>
            <td align="center"><?php echo $val['cate'];?></td>
            <td align="center"><img src='<?php echo base_url($val['img']);?>' height="50" width="200"/></td>
            <td align="center"><input type="text" class="input-text-c input-text" value="<?php echo $val['ord'];?>" size="4" name="orders[<?php echo $val['id'];?>]" /></td>
            <td align="center"><a class="blue" href="<?php echo site_url('/newspaper/edit/'.$val['id']);?>">编辑</a></td>
          </tr>
		 <?php endforeach;?>
        </tbody>
      </table>
	  <div class="btn">
	    <label for="check_box" style="float:left;">全选/取消</label>
	    <input type="submit" class="button" name="submit" value="删除" style="float:left;margin:0 10px 0 10px;" onclick="return check();"/>
	    <input type="submit" class="button" name="order" onclick="document.myform.action='<?php echo site_url('/newspaper/order');?>'" value="排序" style="float:left;margin:0 10px 0 0;"/>
	    <div id="pages"><?php  echo $paginate;?></div>
      </div>
    </div>
  </form>
</div>
</body>
</html>