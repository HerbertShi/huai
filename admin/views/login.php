<link rel='stylesheet' type='text/css' href='/public/css/admin_login.css'>
</head>
<body>
<div class="main">
  <div class="title">&nbsp;</div>
  <div class="login">
    <form action="/admin.php/login/log" method="post" name="cms" >
      <div class="inputbox">
        <dl>
          <dd>用户名：</dd>
          <dd>
            <input type="text" name="user_name" value="" id="login_name" size="25" onfocus="this.style.borderColor='#fc9938'" onblur="this.style.borderColor='#dcdcdc'" />
          </dd>
          <dd>密码：</dd>
          <dd>
            <input type="password" name="password" value="" id="login_pwd" size="25" onfocus="this.style.borderColor='#fc9938'" onblur="this.style.borderColor='#dcdcdc'" />
          </dd>
          <dd>
            <input type="submit"  name="login" value=" " class="input" />
          </dd>
        </dl>
      </div>
      <div style="clear:both"></div>
    </form>
    <?php if (isset($login_error)) { ?> 
		<div style="color:red;"><?php echo $login_error; ?></div>
	<?php } ?>
  </div>
</div>
<div class="copyright"> 
	Powered by <a href="#" target="_blank">幻微科技有限公司</a> Copyright &copy;2014
</div>

</body>
</html>