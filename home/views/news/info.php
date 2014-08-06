  
  <!--container-->
  <div class="container">
    <div class="contain"> 
      <!--right area-->
      <div class="article fr"> 
        <!--bread area-->
        <div class="bread"><a href="../index.html">主页</a>&gt;<a href="news.html">银行新闻</a>&gt;<span><?php echo $info['title'];?></span></div>
        <!--block card-->
        <div class="block card">
        	<div class="align_center"><h1 class="red">稳发展 促转型 控风险 增效益</h1></div>
          <h1 class="align_center">——2012年度股东大会</h1>
          <hr />
          <div class="content">
            <div class="pag_time"><a href="<?php echo site_url('/news/view_list');?>" class="fr">返回列表&nbsp;&gt;&gt;</a>发布时间：<?php echo date('Y-m-d H:i:s',$info['add_time']);?><div class="clear">&nbsp;</div></div>
            <p class="indent"><?php echo $info['content'];?>  </p>
            <div class="clear">&nbsp;</div>
    
</div>
        </div>
      </div>
      <!--left area-->
      <div class="aside fl"> 
        
        <!--layer bank-->
        <div class="layer bank">
          <div class="padding">
		  <div class="block border_t">
              <div class="b_title active"><a href="<?php echo site_url('/news/view_list');?>">银行新闻</a></div>
              <div class="b_title"><a href="<?php echo site_url('/promotion/view_list');?>">优惠活动</a></div>
              <div class="b_title"><a href="<?php echo site_url('/notice/view_list');?>">公告信息</a></div>
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
 
