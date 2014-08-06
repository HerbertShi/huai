  
  <!--container-->
  <div class="container">
    <div class="contain"> 
      <!--right area-->
      <div class="article fr"> 
        <!--bread area-->
        <div class="bread"><a href="../index.html">主页</a>&gt;<span>公告信息</span></div>
        <!--block card-->
        <div class="block card">
          <div class="padding_lb">
            <h1>公告信息</h1>
          </div>
          <hr />
          <div class="content">
            <div class="news">
              <ul>
              <?php foreach($notices as $i=>$item):?>
                <li><span class="fr"><?php echo date('Y-m-d H:i:s',$item['add_time']);?></span><a href="<?php echo site_url('/notice/info/'.$item['id']);?>"><?php echo $item['title'];?></php></a></li>
              <?php endforeach;?>
              </ul>
            </div>
 			<div class="page"><?php  echo $paginate;?></div>          </div>
        </div>
      </div>
      
      <!--left area-->
      <div class="aside fl"> 
        
        <!--layer bank-->
        <div class="layer bank">
           <div class="padding">
			<div class="block border_t">
              <div class="b_title"><a href="<?php echo site_url('/news/view_list');?>">银行新闻</a></div>
              <div class="b_title"><a href="<?php echo site_url('/promotion/view_list');?>">优惠活动</a></div>
              <div class="b_title active"><a href="<?php echo site_url('/notice/view_list');?>">公告信息</a></div>
            </div>
          </div>
        </div>
        
        <!--layer search-->
        <div class="layer search">
          <h1>网点查询</h1>
          <input type="text" placeholder="请输入关键字" />
          <a href="../search.html" class="btn btn_gray">搜索</a></div>
      </div>
      <div class="clear">&nbsp;</div>
    </div>
  </div>
