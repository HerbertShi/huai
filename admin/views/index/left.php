<link rel='stylesheet' type='text/css' href='/public/css/admin_left.css'>
<script type="text/javascript">
	$(document).ready(function(){
		$('li').click(function(){
			$('li').find('a').removeClass('cur');
			$(this).find('a').addClass('cur');
		})
	});
</script>
</head>
<body>
<div class="menu">
<?php if($obj_id == 'notice'){?>
  <dl>
  	<dt><a onClick="showHide('#notice');" href="#" target="_self">公告信息</a></dt>
  	<dd>
      <ul id="notice" >
        <li><a href="<?php echo site_url('notice/view_list'); ?>" target="main">公告列表</a></li>
        <li><a href="<?php echo site_url('notice/add'); ?>" target="main">添加公告</a></li>
      </ul>
    </dd>
  </dl>
  <?php }elseif($obj_id == 'promotion'){?>
  <dl>
  	<dt><a onClick="showHide('#promotion');" href="#" target="_self">优惠新闻</a></dt>
  	<dd>
      <ul id="promotion" >
        <li><a href="<?php echo site_url('promotion/view_list'); ?>" target="main">优惠列表</a></li>
        <li><a href="<?php echo site_url('promotion/add'); ?>" target="main">添加优惠</a></li>
      </ul>
    </dd>
  </dl>
  <?php }elseif($obj_id == 'news'){?>
  <dl>
  	<dt><a onClick="showHide('#news');" href="#" target="_self">银行新闻</a></dt>
  	<dd>
      <ul id="news" >
        <li><a href="<?php echo site_url('news/view_list'); ?>" target="main">新闻列表</a></li>
        <li><a href="<?php echo site_url('news/add'); ?>" target="main">添加新闻</a></li>
      </ul>
    </dd>
  </dl>
  <?php }elseif($obj_id == 'ad'){?>
  <dl><dt><a onClick="showHide('#ad');" href="#" target="_self">广告管理</a></dt>
	  <dd>
	      <ul id="ad" >
	        <li><a href="<?php echo site_url('ad/view_list'); ?>" target="main">广告列表</a></li>
	        <li><a href="<?php echo site_url('ad/add'); ?>" target="main">添加广告</a></li>
	      </ul>
	    </dd>
  </dl>
   <?php }elseif($obj_id == 'invite'){?>
  <dl>
  	<dt><a onClick="showHide('#invite');" href="#" target="_self">人才招聘</a></dt>
  	<dd>
      <ul id="invite" >
        <li><a href="<?php echo site_url('invite/notice_list'); ?>" target="main">招聘公告</a></li>
        <li><a href="<?php echo site_url('invite/position_list'); ?>" target="main">招聘职位</a></li>
      </ul>
    </dd>
  </dl>
  <?php }elseif($obj_id == 'extend'){?>
  <dl>
  	<dt><a onClick="showHide('#recommend');" href="#" target="_self">推荐产品</a></dt>
  	<dd>
      <ul id="recommend" >
        <li><a href="<?php echo site_url('product_recommend/view_list'); ?>" target="main">推荐列表</a></li>
        <li><a href="<?php echo site_url('product_recommend/add'); ?>" target="main">添加推荐</a></li>
      </ul>
    </dd>
  </dl>
  <dl>
  	<dt><a onClick="showHide('#msg');" href="#" target="_self">留言管理</a></dt>
   	<dd>
      <ul id="msg" >
        <li><a href="<?php echo site_url('msg/view_list'); ?>" target="main">留言列表</a></li>
      </ul>
    </dd>
  </dl>

  <dl>
  	<dt><a onClick="showHide('#personal');" href="#" target="_self">个人业务</a></dt>
    <dd>
      <ul id="personal" >
        <li><a href="<?php echo site_url('private_business/save_list'); ?>" target="main">存款业务</a></li>
        <li><a href="<?php echo site_url('private_business/lend_list'); ?>" target="main">贷款业务</a></li>
      </ul>
    </dd>
  </dl>
  <dl>
  	<dt><a onClick="showHide('#company');" href="#" target="_self">公司业务</a></dt>
    <dd>
      <ul id="company" >
        <li><a href="<?php echo site_url('company_business/save_list'); ?>" target="main">存款业务</a></li>
        <li><a href="<?php echo site_url('company_business/lend_list'); ?>" target="main">贷款业务</a></li>
      </ul>
    </dd>
  </dl>
  <dl><dt><a onClick="showHide('#synthesize_business');" href="#" target="_self">综合业务</a></dt>
	  <dd>
	      <ul id="synthesize_business" >
	        <li><a href="<?php echo site_url('synthesize_business/view_list'); ?>" target="main">业务列表</a></li>
	        <li><a href="<?php echo site_url('synthesize_business/add'); ?>" target="main">添加业务</a></li>
	      </ul>
	    </dd>
  </dl>
  <dl>
  	<dt><a  onClick="showHide('#bank_card');" href="#" target="_self">银行卡管理</a></dt>
  	<dd>
      <ul id="bank_card" >
        <li><a href="<?php echo site_url('bank_card/view_list'); ?>" target="main">银行卡列表</a></li>
        <li><a href="<?php echo site_url('bank_card/add'); ?>" target="main">添加银行卡</a></li>
      </ul>
    </dd>
  </dl>
  <dl>
  	<dt><a onClick="showHide('#electron_bank');" href="#" target="_self">电子银行</a></dt>
  	<dd>
      <ul id="electron_bank" >
        <li><a href="<?php echo site_url('electron_bank/view_list'); ?>" target="main">电子银行列表</a></li>
        <li><a href="<?php echo site_url('electron_bank/add'); ?>" target="main">添加项目</a></li>
      </ul>
    </dd>
  </dl>
  <?php }elseif($obj_id == 'branch'){?>
	<dl>
  	<dt><a onClick="showHide('#branch');"  href="#" target="_self">网点管理</a></dt>
  	<dd>
      <ul id="branch" >
        <li><a href="<?php echo site_url('branch/view_list'); ?>" target="main">网点列表</a></li>
        <li><a href="<?php echo site_url('branch/add'); ?>" target="main">增加网点</a></li>
      </ul>
    </dd>
  	</dl>  
  <?php }elseif($obj_id == 'about_bank'){?>
  <dl>
  	<dt><a  onClick="showHide('#about_bank');" href="#" target="_self">关于本行</a></dt>
  	<dd>
      <ul id="about_bank" >
        <li><a href="<?php echo site_url('about_bank/view_list'); ?>" target="main">介绍列表</a></li>
        <li><a href="<?php echo site_url('about_bank/add'); ?>" target="main">增加介绍</a></li>
      </ul>
    </dd>
  </dl>
  <?php }elseif($obj_id == 'user'){?>
  <dl>
	  <dt><a onClick="showHide('#user');" href="#" target="_self">用户管理</a></dt>
	  <dd>
	      <ul id="user">
	      	<li><a href="<?php echo site_url('/admin/view_list'); ?>" target="main">管理员列表</a></li>
	        <li><a href="<?php echo site_url('/admin/add'); ?>" target="main">添加管理员</a></li>
	      </ul>
	  </dd>
  </dl>
  <?php } else{?>
  <dl>
    <dt><a onClick="showHide('#notice');" href="#" target="_self">公告信息</a></dt>
    <dd>
      <ul id="notice">
        <li><a href="<?php echo site_url('/news/view_list'); ?>" target="main">公告列表</a></li>
      </ul>
    </dd>
  </dl>
  <dl>
   <dt><a onClick="showHide('#promotion');" href="#" target="_self">优惠新闻</a></dt>
    <dd>
      <ul id="news">
        <li><a href="<?php echo site_url('/promotion/view_list'); ?>" target="main">优惠列表</a></li>
      </ul>
    </dd>
 </dl>
  <dl>
   <dt><a onClick="showHide('#news');" href="#" target="_self">银行新闻</a></dt>
    <dd>
      <ul id="news">
        <li><a href="<?php echo site_url('/news/view_list'); ?>" target="main">新闻列表</a></li>
      </ul>
    </dd>
 </dl>
  <dl>
    <dt><a onClick="showHide('#user');" href="#" target="_self">用户管理</a></dt>
    <dd>
      <ul id="user">
        <li><a href="<?php echo site_url('/admin/view_list'); ?>" target="main">管理员列表</a></li>    
      </ul>
    </dd>
  </dl> 
  <dl>
    <dt><a onClick="showHide('#ad');" href="#" target="_self">广告管理</a></dt>
    <dd>
      <ul id="ad">
        <li><a href="<?php echo site_url('/ad/view_list'); ?>" target="main">广告列表</a></li>
      </ul>
    </dd>
  </dl>
   <dl>
    <dt><a onClick="showHide('#branch');" href="#" target="_self">网点管理</a></dt>
    <dd>
      <ul id="branch">
        <li><a href="<?php echo site_url('/branch/view_list'); ?>" target="main">网点列表</a></li>
      </ul>
    </dd>
  </dl>
   <dl>
    <dt><a onClick="showHide('#about_bank');" href="#" target="_self">关于本行</a></dt>
    <dd>
      <ul id="bank">
        <li><a href="<?php echo site_url('/about_bank/view_list'); ?>" target="main">介绍列表</a></li>
      </ul>
    </dd>
  </dl>
     <dl>
    <dt><a onClick="showHide('#newspaper');" href="#" target="_self">行报管理</a></dt>
    <dd>
      <ul id="branch">
        <li><a href="<?php echo site_url('/newspaper/view_list'); ?>" target="main">行报列表</a></li>
        <li><a href="<?php echo site_url('/newspaper/add'); ?>" target="main">添加行报</a></li>
      </ul>
    </dd>
  </dl>
  <?php  }?>
</div>
</body>
</html>