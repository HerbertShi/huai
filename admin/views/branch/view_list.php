<script type="text/javascript" src="/public/js/area.js"></script>
</head>
<div class="pad-lr-10">
<form name="searchform" action="<?php echo site_url('/branch/view_list');?>" method="post" >
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
                &nbsp;区域 :
                <select id="s_province" name="s_province"></select>&nbsp;&nbsp;
			    <select id="s_city" name="s_city" ></select>&nbsp;&nbsp;
			    <select id="s_county" name="s_county"></select>
			    <script type="text/javascript">_init_area();</script>
			    <div id="show"></div><br/>
                &nbsp;关键字 :
                <input name="keyword" type="text" class="input-text" size="25" value="<?php echo $keyword;?>" />
                <input type="submit" name="search" class="button" value="搜索" />
        	</div>
            </td>
            </tr>
        </tbody>
    </table>
    </form>
<form id="myform" name="myform" action="<?php echo site_url('/branch/delete');?>" method="post" onsubmit="return check();">
    <div class="table-list">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
          	<th width="5%">序号</th>
            <th width="1%"><input type="checkbox" value="" id="check_box" onclick="selectall('id[]');"></th>
            <th width=150>名称</th>
            <th width=80>电话</th>
            <th width=80>区域</th>
            <th width=50>操作</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($branch_list as $i=>$item):?>
          <tr>
          	<td align="center"><?php echo $item['id'];?></td>
            <td align="center"><input type="checkbox" value="<?php echo $item['id'];?>" name="id[]"></td>
            <td align="center"><a href="<?php echo site_url('/branch/item_info/'.$item['id']); ?>"><?php echo $item['title']?></a></td>
            <td align="center"><?php echo $item['phone'];?></td>
            <td align="center"><?php echo $item['s_province'].$item['s_city'].$item['s_county']; ?></td>
            <td align="center">
            	<a  class="blue" href="<?php echo site_url('/branch/update/'.$item['id']); ?>">编辑</a>
            	<a  class="blue" href="<?php echo site_url('/branch/item_info/'.$item['id']); ?>">详情</a>
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
<script type="text/javascript">
var Gid  = document.getElementById ;
var showArea = function(){
	Gid('show').innerHTML = "<h3>省" + Gid('s_province').value + " - 市" + 	
	Gid('s_city').value + " - 县/区" + 
	Gid('s_county').value + "</h3>"
							}
Gid('s_county').setAttribute('onchange','showArea()');
</script>
</body>
</html>


	