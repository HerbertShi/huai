
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	<title>123</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<meta name="Resource-type" content="Document" />
	<link rel="stylesheet" type="text/css" href="css/css.css" />
	<style>
	
	.section{
		text-align:center;
	}
	
	#section0,
	#section1,
	#section2,
	#section3{
		background-size: cover;
	}
 	#section0{
	/* background-image: url(images/1.jpg); */
	background-position:center top;
	background-repeat:no-repeat;
	padding: 30% 0 0 0;
} 
	#section2{
		background-image: url(images/first.jpg);
		background-position:center top;
		background-repeat:no-repeat;
		padding: 6% 0 0 0;
	}
	#section3{
		background-image: url(images/second.jpg);
		background-position:center top;
		background-repeat:no-repeat;
		padding: 6% 0 0 0;
	}
	#section3 h1{
		color: #000;
	}

  	.logo{ background:url(images/logo.png) no-repeat; background-size:35px 90px; height:90px; width:35px; position:absolute; top:14px; left:14px;}
	.logo2{ background:url(images/logo2.png) no-repeat; background-size:105px 20px; height:20px; width:105px; position:absolute; top:14px; right:14px;}
	.title{ background:url(images/title.png) no-repeat; background-size:210px 55px; height:55px; width:210px; position:absolute; top:70px; left:50%; margin-left:-95px;}
	.tip{ background:url(images/arrow.png) no-repeat; background-size:14px 42px; height:42px; width:14px; position:absolute; bottom:5px; left:50%; margin-left:-7px;}
	/* .txt{ background:url(images/contmain.png) no-repeat; background-size:150px 325px; height:
	325px; width:150px; position:absolute; top:12px; left:50%; margin-left:-75px;} */
	.bimg{ width:100%; height:100%; position:absolute; bottom:0; z-index:100;} 
	.actiondiv{position:relative; top:80%;}
	</style>		
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>	
	<script type="text/javascript" src="js/sliderpage.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$.fn.fullpage({
				verticalCentered: false,
			});
		});
	</script>
</head>
<body>
<div class="section" id="section2">
	
</div>
<div class="section" id="section3" usemap="#Map">
 <!--  <div class="txt"></div> -->
    <div class="bimg"><img class = "actiondiv" src="images/nav.png" width="139" height="100" usemap="#Map">
      <map name="Map"><area shape="rect" coords="135,36,202,63" href="http://api.map.baidu.com/marker?location=31.112297708890,121.492741808250&title=%E6%8E%A5%E5%BE%85%E4%B8%AD%E5%BF%83&content=%E4%B8%8A%E6%B5%B7%E5%B8%82%E6%B1%9F%E6%A1%83%E8%B7%AF556%E5%BC%8431%E5%8F%B7&output=html&src=kimmy">
        <!-- <area shape="rect" coords="46,36,113,63" href="http://wx.youpengchina.com/wap/index.php?wid=feicuivilla&uid=o7ef4jtBWTlMC6kZCK9UzOR7q7f8&from=singlemessage&isappinstalled=0"> -->
        <area shape="rect" coords="46,36,113,63" href="http://wx.youpengchina.com/wap/index.php?wid=feicuivilla&uid=o7ef4jtBWTlMC6kZCK9UzOR7q7f8&from=singlemessage&isappinstalled=0">
      </map>
    </div>
</div>
</body>
</html>