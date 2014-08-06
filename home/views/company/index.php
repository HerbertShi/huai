  
  <!--container-->
  <div class="container">
    <div class="contain"> 
      <!--right area-->
      <div class="article t_article fr"> 
        <!--bread area-->
        <div class="bread"><a href="../index.html">主页</a>&gt;<span>公司业务</span></div>
        <!--block card-->
        <div class="block store">
          <div class="title">存款业务</div>
          <div class="content">
            <div class="link">
              <?php foreach($save_list as $i=>$item):?>
              <div><a href="<?php echo site_url('/company/save_info/'.$item['id']);?>"><?php echo $item['title'];?></a></div>
              <?php endforeach;?>
            </div>
          </div>
        </div>
        
        <!--block 2-->
        <div class="block loan com_loan">
          <div class="title">贷款业务</div>
          <div class="content">
            <div class="margin_b2">
              <div class="right">
                <div class="fr">
                  <div class="b_ques">
                    <h2>易融通</h2>
                    <h2 class="red">轻松融资&nbsp;&nbsp;&nbsp;&nbsp;通达未来</h2>
                  </div>
                  <p>以优质核心企业为依托，拓展上下游产业链及供应链融资业务，将核心企业的信用向上下游延伸，积极助推小微企业、个体工商户及农户经营发展。</p>
                </div>
                <div class="fl"><a href="money-loans.html"><img src="/public/images/ad/money_loan.png" /></a></div>
                <div class="clear">&nbsp;</div>
              </div>
              <div class="left">
                <div class="fr">
                  <div class="b_ques">
                    <h2>微贷通</h2>
                    <h2 class="red">小微贷&nbsp;&nbsp;&nbsp;&nbsp;大未来</h2>
                  </div>
                  <p>全心助力解决“草根商户”和小微企业融资难，担保难问题。为您带来更专业更有保障的金融融资服务。</p>
                </div>
                <div class="fl"><a href="min-loans.html"><img src="/public/images/ad/min_loan.png" /></a></div>
                <div class="clear">&nbsp;</div>
              </div>
              <div class="clear">&nbsp;</div>
            </div>
            <hr />
            <div class="link">
            <?php foreach($lend_list as $i=>$item):?>
              <div><a href="<?php echo site_url('/company/lend_info/'.$item['id']);?>"><?php echo $item['title'];?></a></div>
              <?php endforeach;?>
            </div>
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
                <div><a href="#">服务介绍</a><a href="function-show.html">功能演示</a></div>
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
      </div>
      <div class="clear">&nbsp;</div>
    </div>
  </div>
