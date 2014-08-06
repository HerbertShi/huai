  
  <!--container-->
  <div class="container">
    <div class="contain"> 
      <!--right area-->
      <div class="article fr"> 
        <!--bread area-->
        <div class="bread"><a href="../index.html">主页</a>&gt;<a href="company.html">公司业务</a>&gt;<span><?php echo $info['title'];?></span></div>
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
        <!--layer 1-->
        <div class="layer_box">
          <div class="padding"> 
            <!--company bank-->
            <div class="block">
              <div class="title"><span class="icon enterprise">&nbsp;</span>
                <h1><a href="https://www.js96008.com/pweb/prelogin.do?LoginType=O&_locale=zh_CN&BankId=9999" target="_blank">企业网银</a></h1>
              </div>
              <div class="menu">
                <div><a href="#">服务介绍</a><a href="../function-show.html">功能演示</a></div>
                <div><a href="#">下载中心</a><a href="../faq.html">常见问题</a></div>
              </div>
            </div>
          </div>
        </div>
        
        <!--layer 2-->
        <div class="layer search">
          <h1>网点查询</h1>
          <input type="text" placeholder="请输入关键字" />
          <a href="../search.html" class="btn btn_gray">搜索</a></div>
        
        <!--layer 3-->
        <div class="layer bank">
          <div class="padding">
            <div class="title">公司业务</div>
            <div class="block">
              <div class="b_title">存款业务</div>
              <ul>
                <li><a href="unit-current-deposit.html">单位活期存款</a></li>
                <li><a href="unit-fixed-deposit.html">单位定期存款</a></li>
                <li><a href="unit-corporate-deposit.html">单位协定存款</a></li>
                <li><a href="unit-notice-deposit.html">单位通知存款</a></li>
              </ul>
              <div class="b_title margin_t2">贷款业务</div>
              <ul>
                <li><a href="min-loans.html">微贷通</a></li>
                <li><a href="money-loans.html">易融通</a></li>
                <li><a href="liquidity-loans.html">流动资金贷款</a></li>
                <li><a href="fixed-assets-loans.html">固定资产贷款</a></li>
                <li><a href="receivable-pledge-loans.html">应收账款质押贷款</a></li>
                <li class="active"><a href="business-property-loans.html">经营性物业贷款</a></li>
                <li><a href="construction-mortgage-loans.html">在建工程抵押贷款</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="clear">&nbsp;</div>
    </div>
  </div>
