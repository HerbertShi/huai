  
  <!--container-->
  <div class="container">
    <div class="contain"> 
      <!--right area-->
      <div class="article t_article fr"> 
        <!--bread area-->
        <div class="bread"><a href="../index.html">主页</a>&gt;<span>个人业务</span></div>
        <!--block card-->
        <div class="block store">
          <div class="title">存款业务</div>
          <div class="content">
            <div class="link">
            <?php foreach($save_list as $i=>$item):?>
            
              <div><a href="<?php echo site_url('/private_business/save_info/'.$item['id']);?>"><?php echo $item['title'];?></a></div>
              <?php endforeach;?>
            </div>
            <div class="link margin_t">
            <?php foreach($save_list as $i=>$item):?>
              <div><a href="<?php echo site_url('/private_business/save_info/'.$item['id']);?>"><?php echo $item['title'];?></a></div>
              <?php endforeach;?>
              <div>&nbsp;</div>
            </div>
          </div>
        </div>
        
        <!--block 2-->
        <div class="block loan">
          <div class="title">贷款业务</div>
          <div class="content">
          	<div class="margin_b2">
            <div class="fr">
              <div class="b_ques">
                <h2>什么是“阳光易贷”？</h2>
                <p>“阳光易贷”原名为“阳光信贷”</p>
              </div>
              <p>
              <h1>阳光：</h1>
              将客户的贷款调查、授信、定价、操作流程和公开承诺服务等全过程置于社会公众和信用社的有效监督。
              </p>
              <p>
              <h1>惠农：</h1>
              “阳光易贷”是以居住在农村地区的农户家庭和个体工商户为主要对象，为解决信贷双方严重的信息不对称问题，而推出的一种操作性较强的惠农信贷模式。
              <p>
              <h1>双赢：</h1>
              “阳光易贷”主要是借助社会力量测评农户授信额度，农商行确定相应的贷款条件，在授信额度和期限内循环使用，实现农商行和农户的双赢。
              </p>
            </div>
            <div class="fl"><a href="sun-loans.html"><img src="/public/images/ad/sun_loan.png" /></a>
              <h2 class="red">轻松易贷&nbsp;&nbsp;&nbsp;&nbsp;阳光生活</h2>
            </div>
            <div class="clear">&nbsp;</div>
            </div>
            <hr />
            <div class="link">
              <div class="link_block">
                <h1>个人贷款：</h1>
                <div class="link_content">
                  <ul>
                  <?php foreach($lend_list as $i=>$item):?>
                    <li><a href="<?php echo site_url('/private_business/lend_info/'.$item['id']);?>"><?php echo $item['title'];?></a></li>
                    <?php endforeach;?>
                  </ul>
                </div>
                <div class="clear">&nbsp;</div>
              </div>
              <div class="link_block border_l">
                <div class="link_content">
                  <ul>
                  <?php foreach($lend_list as $i=>$item):?>
                    <li><a href="<?php echo site_url('/private_business/lend_info/'.$item['id']);?>"><?php echo $item['title'];?></a></li>
                    <?php endforeach;?>
                  </ul>
                </div>
                <div class="clear">&nbsp;</div>
              </div>
              <div class="clear">&nbsp;</div>
            </div>
          </div>
        </div>
      </div>
      <!--left area-->
      <div class="aside fl"> 
        <!--layer 1-->
        <div class="layer_box">
          <div class="padding"> 
            <!--private bank-->
            <div class="block">
              <div class="title"><span class="icon user">&nbsp;</span>
                <h1><a href="https://www.js96008.com/pweb/prelogin.do?LoginType=O&_locale=zh_CN&BankId=9999" target="_blank">个人网银</a></h1>
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
      </div>
      <div class="clear">&nbsp;</div>
    </div>
  </div>
