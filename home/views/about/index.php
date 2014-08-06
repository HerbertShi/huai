  <!--container-->
  <div class="container">
    <div class="contain"> 
      <!--right area-->
      <div class="article fr"> 
        <!--bread area-->
        <div class="bread"><a href="../index.html">主页</a>&gt;<a href="about-us.html">关于本行</a>&gt;<span>淮安农村商业银行简介</span></div>
        <!--block card-->
        <div class="block card">
          <h1 class="align_center"><?php echo $info['title'];?></h1>
          <hr />
          <div class="content">
            <?php echo $info['content'];?>
          </div>
        </div>
      </div>
      
      <!--left area-->
      <div class="aside fl"> 
        
        <!--layer bank-->
        <div class="layer bank">
          <div class="padding">
            <div class="title">关于本行</div>
            <div class="block">
              <?php foreach($nav_list as $i=>$item):?>
              <div class="b_title active"><a href="<?php echo $item['url'];?>"><?php echo $item['title'];?></a></div>
              <?php endforeach;?>
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
