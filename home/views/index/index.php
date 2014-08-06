<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/public/css/index.css"/>
<title>淮安农村商业银行</title>
<meta name="description" content="淮安农村商业银行,个人业务,公司业务，银行卡，电子银行，手机银行" />
<meta name="keywords" content="江苏淮安农村商业银行股份有限公司，是经中国银行业监督管理委员会批准筹建，由原淮安市区农村信用合作联社与淮安市楚州区农村信用合作联社按照市场化原则合并新设发起设立的股份制农村商业银行。淮安农村商业银行注册资本4亿元，现有从业人员1048人，下辖1个营业部，84个支行，在淮安市区范围内形成规范、完善的金融服务网络。" />
<script type="text/javascript" src="/public/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/public/js/common.js"></script>
<script type="text/javascript">
$(function(){	
	var sWidth = $(".scroll_img .img a").width(); //获取焦点图的宽度（显示面积）
	var aWidth = $(".scroll_img .img").width();
	var len = $(".scroll_img .img img").length; //获取焦点图个数
	var index = 0;
	var picTimer;
  
	//上一页、下一页按钮透明度处理
	$(".scroll_img .prev,.scroll_img .next").css("opacity",0.1).hover(function() {
		$(this).stop(true,false).animate({"opacity":"1"},300);
	},function() {
		$(this).stop(true,false).animate({"opacity":"0.1"},300);
	});
  
	//上一页按钮
	$(".scroll_img .prev").click(function() {
		index -= 1;
		if(index == -1) {index = len - 1;}
		showPics(index);
	});
  
	//下一页按钮
	$(".scroll_img .next").click(function() {
		index += 1;
		if(index == len) {index = 0;}
		showPics(index);
	});
  
	//本例为左右滚动，即所有li元素都是在同一排向左浮动，所以这里需要计算出外围ul元素的宽度
	$(".scroll_img .img").css("width",sWidth* (len));
	
	//鼠标滑上焦点图时停止自动播放，滑出时开始自动播放
	$(".scroll_img").hover(function() {
		clearInterval(picTimer);
	},function() {
		picTimer = setInterval(function() {
			showPics(index);
			index++;
			if(index == len) {index = 0;}
		},4000); //此4000代表自动播放的间隔，单位：毫秒
	}).trigger("mouseleave");
	
	//显示图片函数，根据接收的index值显示相应的内容
	function showPics(index) { //普通切换
		var nowLeft = -index*sWidth; //根据index值计算ul元素的left值
		$(".scroll_img .img").stop(true,false).animate({"left":nowLeft},300); //通过animate()调整ul元素滚动到计算出的position果
	
	}
		
})

$(function(){
	$(".aside .num").click(function(){
		$("#popup").show();	
	})
})

</script>
</head>

<body>
<!--popup-->
<div class="tel_popup"> <a href="javascript:void(0);" class="close">X</a>
  <div class="link"><a href="https://online.unionpay.com/portal/open/init.do?entry=open">业务申请</a>&nbsp;|&nbsp;<a href="message.html">我要留言</a></div>
</div>
<!--popup-->
<div class="popup" id="popup">
<div class="title"><a href="javascript:void(0);" class="right">X</a>第5期 淮安农商行行报</div>
<div class="content align_center"> <img src="/public/images/ad/report.jpg" /> </div>
<div class="gray_btn_group align_center">
  <div class="bg">&nbsp;</div>
  <div class="text">
    <div><a href="#" class="fr">下一期&gt;&gt;</a><a href="#">PDF下载</a><a href="#" class="fl">&lt;&lt;上一期</a></div>
  </div>
</div>
</div>
<div class="wrap"> 
  <!--header-->
  <div class="header">
    <div class="contain"> 
      <!--top area-->
      <div class="top">
        <div class="fr">
          <div class="search">
            <input type="text" placeholder="请输入关键字" />
            <a href="search.html" class="btn btn_gray">搜索</a></div>
          <div class="link"><a href="#">加入收藏</a>&nbsp;|&nbsp;<a href="#">设为主页</a><a href="about-us/hire.html" class="margin">诚聘英才<em class="icon downlist">&nbsp;</em></a></div>
        </div>
        <!--logo area-->
        <div class="fl"><a  href="index.html"><img src="/public/images/logo.png" /></a></div>
        <div class="clear">&nbsp;</div>
      </div>
      
      <!--banner area-->
      <div class="banner">
        <div class="img"><a href="mobile-bank/mobile-bank.html" style="-moz-opacity:1;filter:alpha(opacity=100);-khtml-opacity:1;opacity:1;z-index:1;"><img src="/public/images/ad/banner01.png" /></a><a href="card/card.html"><img src="/public/images/ad/banner02.png" /></a><a href="mobile-bank/mobile-bank.html"><img src="/public/images/ad/banner01.png" /></a><a href="card/card.html"><img src="/public/images/ad/banner02.png" /></a></div>
        <div class="dotts"><a href="#" class="active">&nbsp;</a><a href="#">&nbsp;</a><a href="#">&nbsp;</a><a href="#">&nbsp;</a></div>
        <!--nav area-->
        <div class="nav"><a class="active" href="/">首页</a><a href="/index.php/Private_business">个人业务</a><a href="/index.php/company">公司业务</a><a href="/index.php/bank_card">银行卡</a><a href="/index.php/e_bank">电子银行</a><a href="/index.php/index/mobile_bank">手机银行</a><a href="/index.php/about_us">关于本行</a></div>
      </div>
    </div>
  </div>
  
  <!--container-->
  <div class="container">
    <div class="contain"> 
      <!--right area-->
      <div class="article fr"> 
        <!--block 1-->
        <div class="block recommend">
          <div class="title">产品推荐</div>
          <div class="content">
            <div class="scroll_img"><a href="javascript:void(0);" class="prev">&nbsp;</a><a href="javascript:void(0);" class="next">&nbsp;</a>
              <div style="overflow:hidden;">
                <div class="img" style="left:0px;"><a href="private/sun-loans.html"><img src="/public/images/pro1.png" /></a><a href="company/min-loans.html"><img src="/public/images/pro2.png" /></a><a href="company/money-loans.html"><img src="/public/images/pro3.png" /></a><a href="e-bank/pay-loans.html"><img src="/public/images/pro4.png" /></a><a href="private/sun-loans.html"><img src="/public/images/pro1.png" /></a><a href="company/min-loans.html"><img src="/public/images/pro2.png" /></a><a href="company/money-loans.html"><img src="/public/images/pro3.png" /></a><a href="e-bank/pay-loans.html"><img src="/public/images/pro4.png" /></a> </div>
              </div>
            </div>
          </div>
        </div>
        <!--block 2-->
        <div class="block module">
          <div class="title">
            <div class="label"><span class="icon"><img src="/public/images/icon/news_icon.png" /></span>银行新闻</div>
            <div class="label"><span class="icon"><img src="/public/images/icon/favorable_icon.png" /></span>优惠活动</div>
            <div class="label"><span class="icon"><img src="/public/images/icon/info_icon.png" /></span>公告信息</div>
            <div class="clear">&nbsp;</div>
          </div>
          <div class="content">
            <div class="item border_r">
              <ul>
              <?php foreach($news as $i=>$item):?>
                <li><a href="<?php echo site_url('/news/info/'.$item['id']);?>" target="_blank"><?php echo $item['title'];?></a></li>
                <?php endforeach;?>
              </ul>
              <a href="<?php echo site_url('/news/view_list');?>" class="btn btn_white more" target="_blank">more</a> </div>
            <div class="item border_r">
              <ul>
              <?php foreach($promotions as $i=>$item):?>
                <li><a href="<?php echo site_url('/promotion/info/'.$item['id']);?>" target="_blank"><?php echo $item['title'];?></a></li>
                <?php endforeach;?>
                
              </ul>
              <a href="<?php echo site_url('/promotion/view_list');?>" class="btn btn_white more">more</a> </div>
            <div class="item">
              <ul>
              <?php foreach($notices as $i=>$item):?>
                <li><a href="<?php echo site_url('/notice/info/'.$item['id']);?>" target="_blank"><?php echo $item['title'];?></a></li>
                <?php endforeach;?>
              </ul>
              <a href="<?php echo site_url('/notice/view_list');?>" class="btn btn_white more" target="_blank">more</a></div>
            <div class="clear">&nbsp;</div>
          </div>
        </div>
        
        <!--block 3-->
        <div class="block profession">
          <div class="title">业务介绍</div>
          <div class="content">
            <div class="item border_r"><a href="private/private.html" class="btn btn_white more" target="_blank">more</a>
              <div class="img"><img src="/public/images/name1.png" />
                <div class="name">个人业务</div>
              </div>
              <div class="btn_group"><a href="private/private.html" class="btn btn_white active">存款业务</a><a href="private/private.html" class="btn btn_white">贷款业务</a></div>
              <div class="link"><a href="private/current-deposit.html">活期存款</a><a href="private/education-deposit.html">教育储蓄</a></div>
              <div class="link"><a href="private/fixed-deposit.html">定期存款</a><a href="private/notice-deposit.html">通知存款</a></div>
            </div>
            <div class="item border_r"><a href="company/company.html" class="btn btn_white more">more</a>
              <div class="img"><img src="/public/images/name2.png" />
                <div class="name">公司业务</div>
              </div>
              <div class="btn_group"><a href="company/company.html" class="btn btn_white">存款业务</a><a href="company/company.html" class="btn btn_white">贷款业务</a></div>
              <div class="link"><a href="company/unit-current-deposit.html">单位活期存款</a><a href="company/unit-fixed-deposit.html">单位定期存款</a></div>
              <div class="link"><a href="company/unit-corporate-deposit.html">单位协定存款</a><a href="company/unit-notice-deposit.html">单位通知存款</a></div>
            </div>
            <div class="item border_r"><a href="card/card.html" class="btn btn_white more">more</a>
              <div class="img"><img src="/public/images/name3.png" />
                <div class="name">银行卡业务</div>
              </div>
              <div class="btn_group"><a href="card/card.html" class="btn btn_white">圆鼎卡</a></div>
              <div class="link"><a href="card/card.html">圆鼎借记卡</a><a href="#">&nbsp;</a></div>
            </div>
            <div class="item"><a href="e-bank/e-bank.html" class="btn btn_white more">more</a>
              <div class="img"><img src="/public/images/name4.png" />
                <div class="name">电子银行</div>
              </div>
              <div class="btn_group align_left"><a href="e-bank/self-help-bank.html" class="btn btn_white">自助银行</a><a href="e-bank/tel-bank.html" class="btn btn_white">电话银行</a><a href="e-bank/pay-loans.html" class="btn btn_white">易付通</a></div>
            </div>
            <div class="clear">&nbsp;</div>
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
                <div><a href="#">服务介绍</a><a href="function-show.html">功能演示</a></div>
                <div><a href="#">下载中心</a><a href="faq.html">常见问题</a></div>
              </div>
            </div>
            <!--company bank-->
            <div class="block">
              <div class="title"><span class="icon enterprise">&nbsp;</span>
                <h1><a href="https://www.js96008.com/pweb/prelogin.do?LoginType=O&_locale=zh_CN&BankId=9999" target="_blank">企业网银</a></h1>
              </div>
              <div class="menu">
                <div><a href="#">服务介绍</a><a href="function-show.html">功能演示</a></div>
                <div><a href="#">下载中心</a><a href="faq.html">常见问题</a></div>
              </div>
            </div>
          </div>
        </div>
        
        <!--layer 2-->
        <div class="layer search">
          <h1>网点查询</h1>
          <input type="text" placeholder="请输入关键字" />
          <a href="search.html" class="btn btn_gray">搜索</a></div>
        
        <!--layer 3-->
        <div class="layer focus">
          <h1>聚焦农商行 <a href="focus.html" class="btn btn_white more" target="_blank">more</a></h1>
          <img src="/public/images/bank_logo.png" class="logo" /> <a href="javascript:void(0);" class="num">
          <h2>第五期</h2>
          <h3>NO.5</h3>
          </a> <span class="label">民本兴淮<span>·</span>万家富安</span> </div>
        <!--layer 4-->
        <div class="layer download">
          <h1>手机银行客户端下载</h1>
          <div class="block"><a href="mobile-bank/mobile-bank.html?0" class=""><em class="icon android">&nbsp;</em>Android&nbsp;版</a><a href="mobile-bank/mobile-bank.html?1" class=""><em class="icon iphone">&nbsp;</em>iphone&nbsp;版</a><a href="mobile-bank/mobile-bank.html?2" class=""><em class="icon ipad">&nbsp;</em>ipad&nbsp;版</a><a href="mobile-bank/mobile-bank.html?3" class=""><em class="icon wp7">&nbsp;</em>WP7&nbsp;版</a> </div>
        </div>
        <!--layer 4-->
        <div class="layer call">
          <h1>24小时客服在线</h1>
          <div class="block">
            <div class="fr">
              <div><img src="/public/images/call.png" alt="96008" /></div>
              <div class="btn_group"><a href="map.html" class="btn btn_white">网站地图</a><a href="about-us/outlets.html" class="btn btn_white">联系我们</a></div>
            </div>
            <span class="fl icon service">&nbsp;</span>
            <div class="clear">&nbsp;</div>
          </div>
        </div>
      </div>
      <div class="clear">&nbsp;</div>
    </div>
  </div>
