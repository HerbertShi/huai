<link rel='stylesheet' type='text/css' href='/public/css/admin_style.css' />
<link rel='stylesheet' type='text/css' href='/public/css/admin_index.css' /> 
<link rel='stylesheet' type='text/css' href='/public/css/admin_top.css' />
<link rel='stylesheet' type='text/css' href='/public/css/dialog.css' />

<script type="text/javascript">if(self!=top){top.location=self.location;}</script> 
<script type="text/javascript">
	$(document).ready(function(){
		$("#delcache").click(function(){
			$.post("{:u('Index/delcache')}", null, function(data){
				$("#cache").show();
				$("#cache").html(' <font color=#ff0000>'+data.data+'</font>');
				window.setTimeout(function(){
					$("#cache").hide();
				},2000);
			},"json");
			return false;			
		});

		if({:C('new_visit')} == 1){
			window.open("{:U('Setting/index')}",target="main");
		}
		
		$('.leftnav ul li').click(function(){
			$('.leftnav ul li').removeClass('thisclass');
			$(this).addClass('thisclass');
			var str = $(this).text()+' >';
			$('#current').html(str);
		})
	});
</script>

</head>
<body scroll='no'  >
<div class="topnav">
  <div class="sitenav">
    <div class=welcome>您好：<span class="username"><?php echo $this->session->userdata('user_name');?></span>，欢迎使用后台管理系统。 </div>
    <div class=sitelink> <!--<a href="{:U('Setting/index')}" target="main">设置向导</a> |<a href="javascript:Mapshow();">功能地图</a> --> 
    |<a href="<?php echo site_url('index/center'); ?>" target="_parent">后台首页</a> | 
    <a href="/" target="_blank">网站主页</a> | <a href="" class="top-txt" id="delcache">更新缓存</a><font id="cache"></font></div>
  </div>
  <div class="leftnav">
    <ul>
      <li class="navleft"></li>
      <li><a href="<?php echo site_url('notice/view_list'); ?>" target="main" onClick="left('<?php echo site_url('index/left/notice'); ?>');">公告新闻</a></li>
      <li><a href="<?php echo site_url('promotion/view_list'); ?>" target="main" onClick="left('<?php echo site_url('index/left/promotion'); ?>');">优惠新闻</a></li>
      <li><a href="<?php echo site_url('news/view_list'); ?>" target="main" onClick="left('<?php echo site_url('index/left/news'); ?>');">银行新闻</a></li>
      <li><a href="<?php echo site_url('invite/notice_list'); ?>" target="main" onClick="left('<?php echo site_url('index/left/invite'); ?>');">招聘管理</a></li>
      <li><a href="<?php echo site_url('ad/view_list'); ?>" target="main" onClick="left('<?php echo site_url('index/left/ad'); ?>');">广告管理</a></li>
      <li><a href="<?php echo site_url('admin/view_list'); ?>" target="main" onClick="left('<?php echo site_url('index/left/user'); ?>');">用户管理</a></li>
      <li><a href="<?php echo site_url('branch/view_list'); ?>" target="main" onClick="left('<?php echo site_url('index/left/branch'); ?>');">网点管理</a></li>
      <li><a href="<?php echo site_url('about_bank/view_list'); ?>" target="main" onClick="left('<?php echo site_url('index/left/about_bank'); ?>');">关于本行</a></li>
      <li><a href="<?php echo site_url('product_recommend/view_list'); ?>" target="main" onClick="left('<?php echo site_url('index/left/extend'); ?>');">扩展管理</a></li>
      <li style="margin-right: -1px"><a href="<?php echo site_url('Login/logout'); ?>" target="_parent">注销登录</a></li>
      <li class="navright"></li>
    </ul>
  </div>
</div>
<div id="Maincontent" style="margin: auto;">
  <div id="leftMenu">
  <iframe src="/admin.php/index/left" id="leftfra" name="leftfra" frameborder="0" scrolling="no"  style="border:none" width="100%" height="100%" ></iframe>
  </div>
  <div id="mainNav">
  <div class="cur_position"><div class="cur"><span id='current'></span></div></div>
  <div class="mframe" style="position:relative; overflow:hidden">
 <iframe name="main" id="main" src="/admin.php/index/main" frameborder="false" scrolling="auto" style="border:none; margin-bottom:10px;"  width="100%" height="" ></iframe>
  </div>
 </div>
</div>
<script type="text/javascript"> 
//clientHeight-0; 空白值 iframe自适应高度
function windowW(){
	if($(window).width()<980){
			$('#Maincontent').css('width',980+'px');
            $('.topnav').css('width',980+'px');
			$('body').attr('scroll','');
			$('body').css('overflow','');
	}
}
windowW();

$(window).resize(function(){
	if($(window).width()<980){
		windowW();
	}else{
        $('.topnav').css('width','');
		$('#Maincontent').css('width',100+'%');
		$('body').attr('scroll','no');
		$('body').css('overflow','hidden');

	}
});

window.onresize = function(){
	var heights = document.documentElement.clientHeight-150;document.getElementById('main').height = heights;
	var openClose = $("#main").height()+39;
}
window.onresize();
</script>
</body>
</html>
