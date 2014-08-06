</head>
<div class="pad-lr-10">
<form name="searchform" action="<?php echo site_url('/electron_bank/view_list');?>" method="post" >
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
                &nbsp;关键字 :
                <input name="keyword" type="text" class="input-text" size="25" value="<?php echo $keyword;?>" />
                <input type="submit" name="search" class="button" value="搜索" />
        	</div>
            </td>
            </tr>
        </tbody>
    </table>
    </form>
	<form id="myform" name="myform" action="<?php echo site_url('/electron_bank/delete');?>" method="post" onsubmit="return check();">
    <div class="table-list">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
          	<th width="5%">序号</th>
            <th width="1%"><input type="checkbox" value="" id="check_box" onclick="selectall('id[]');"></th>
            <th width=150>标题</th>
            <th width=80>内容</th>
            <th width=80>发布时间</th>
            <th width=50>操作</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($electronbank_list as $i=>$item):?>
          <tr>
          	<td align="center"><?php echo $item['id'];?></td>
            <td align="center"><input type="checkbox" value="<?php echo $item['id'];?>" name="id[]"></td>
            <td align="center">
            	<?php if ($item['is_have_son'] == 0) {?>
            	<a href="<?php echo site_url('/electron_bank/item_info/'.$item['id']); ?>"><?php echo $item['title']?></a>
            	<?php } else { echo $item['title'];}?>
            </td>
            <td align="center">
            <?php 
				$content = $item['content'];
				echo mb_strlen($content, 'UTF-8') > 16 ? str_replace("\n","<br/>",mb_substr($content, 0, 16, 'UTF-8')).'..' : str_replace("\n","<br/>",$content);
			?>
            </td>
            <td align="center"><?php echo date('Y-m-d H:i:s',$item['add_time']); ?></td>
            <td align="center">
            <a  class="blue" href="<?php echo site_url('/electron_bank/son_add/'.$item['id']); ?>">增加子项目</a>
            <?php if ($item['is_have_son'] == 0) {?>
            <a  class="blue" href="<?php echo site_url('/electron_bank/update/'.$item['id']); ?>">编辑</a>
            <a  class="blue" href="<?php echo site_url('/electron_bank/item_info/'.$item['id']); ?>">详情</a>
            <?php } else {?>
            <a  class="blue" href="<?php echo site_url('/electron_bank/son_view_list/'.$item['id']); ?>">查看子项目</a>
            <?php }?>
            </td>
          </tr>
          <?php endforeach;?>
        </tbody>
      </table>
	<div class="btn">
	    <label for="check_box" style="float:left;">全选/取消</label>
	    <input type="submit" class="button" name="submit" value="删除" style="float:left;margin:0 10px 0 10px;"/>
	    <div id="pages">
	    <?php  echo $paginate;?>
        </div>
    </div>
    </div>
    </form>
</div>
</body>
</html>


	