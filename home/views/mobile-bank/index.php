
  <!--container-->
  <div class="container">
    <div class="contain"> 
      <!--mobile_bank area-->
      <div class="mobile_bank">
        <div class="tab_bank"><a href="javascript:void(0);" class="active"><span  class="icon android_b">&nbsp;</span>Android版</a><a href="javascript:void(0);"><span  class="icon iphone_b">&nbsp;</span>Iphone版</a><a href="javascript:void(0);" ><span  class="icon iphone_b">&nbsp;</span>Ipad版</a><a href="javascript:void(0);" ><span  class="icon wp7_b">&nbsp;</span>WP7版</a></div>
        <div id="tab_show">
          <div class="tab_bank_content">
            <div class="d_details">
            <a href="#"><img src="/public/images/ad/mobile_banner.png" /></a>
             <!-- <div class="right">
                <dl>
                  <dt>江苏淮安农村商业银行<br/>
                    Android版客户端</dt>
                  <dd>
                    <p>界面友好炫酷，支持各类智能机，行内转账汇款0费用，专属基础理财产品，实现活转定或定转活，全新的架构设计，功能应有尽有。特有ATM预约现金取款，无卡也能取现，乐享金融新生活。</p>
                  </dd>
                </dl>
                <div class="margin_t2 margin_b"><a href="#" class="btn btn_deepred"><img src="/public/images/icon/download_icon.png" /><span>免费下载</span></a></div>
                <div class="intro">
                  <ul>
                    <li>适应机型：Android系列智能手机</li>
                    <li>系统要求：Android版本2.0以上，只要您的手机可以上网即可。</li>
                  </ul>
                </div>
              </div>
              <div class="left"><img src="/public/images/ad/android.png" /></div>
              <div class="clear">&nbsp;</div>-->
            </div>
            <div class="layer">
              <div class="title"><span>下载安装包</span></div>
              <div class="box">
                <div class="">
                  <dl>
                    <dt>方式1：二维码扫描</dt>
                    <dd>
                      <p>使用手机扫描以下二维码直接打开链接下载安装。（省联社网站提供）</p>
                    </dd>
                    <dd class="align_center"><img src="/public/images/ad/rand.png" /></dd>
                  </dl>
                </div>
                <div class="">
                  <dl>
                    <dt>方式2：直接下载</dt>
                    <dd>
                      <p>点击以下“客户端下载”按钮直接下载手机银行客户端到指定手机或SD卡中进行安装；（省联社网站提供）</p>
                    </dd>
                    <dd> <a href="#" class="btn btn_deepred margin_t2">客户端下载</a> </dd>
                  </dl>
                </div>
              </div>
            </div>
            <div class="layer">
              <div class="title  no_border"><span>在线安装</span></div>
              <div class="box">
                <div class="">
                  <dl>
                    <dt>方式1：安卓市场</dt>
                    <dd>
                      <p>运行Android（安卓）智能机上的安卓市场，在搜索框中输入“江苏农信”即可找到“手机银行客户端”官方应用软件；</p>
                    </dd>
                  </dl>
                </div>
                <div class="">
                  <dl>
                    <dt>方式2：安卓软件商城</dt>
                    <dd>
                      <p>登录安卓软件商城，在搜索框中输入“江苏农信”即可找到“手机银行客户端”官方应用软件，下载安装即可；</p>
                    </dd>
                  </dl>
                </div>
                <div class="">
                  <dl>
                    <dt>方式3：江苏农信官方门户网站</dt>
                    <dd>
                      <p>通过江苏农信官方门户网站www.js96008.com,直接下载手机银行客户端进行安装使用。</p>
                    </dd>
                  </dl>
                </div>
              </div>
            </div>
            <div class="layer">
              <div class="title  no_border"><span>安装方式</span></div>
              <div class="box">
                <div>
                  <p>在手机上运行下载后的APK文件进行安装。</p>
                </div>
              </div>
            </div>
          </div>
          <div class="tab_bank_content" style="display:none;">1111111111111</div>
          <div class="tab_bank_content" style="display:none;">22222</div>
          <div class="tab_bank_content" style="display:none;">333</div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
	$(function(){
		
		$(".tab_bank a").click(function(){
			$(this).addClass("active").siblings("a").removeClass("active");	
			var index = $(this).index();
			$("#tab_show > div").eq(index).show().siblings("div").hide();
		});	
		$(".tab_bank a").eq(location.search.split("?")[1]).click();
	})
</script>

