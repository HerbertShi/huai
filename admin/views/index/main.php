<link rel='stylesheet' type='text/css' href='/public/css/admin_style.css'>
<style>
td{ height:22px; line-height:22px}
</style>
</head>
<body>
<div style="float:left;width:49%;">
<div  class="cms_info" style="padding:10px 10px;">
<table border="0" width="100%" cellpadding="4" cellspacing="1" class="table">
  <tr class="table_title ver">
  </tr>
   <?php foreach($server_info as $key=>$vo):?>
  <tr class="ji">
    <td width="200"><?php echo $key;?>：</td>
    <td ><?php echo $vo;?></td>
  </tr>
   <?php endforeach;?>
</table>
</div>
</div>
<div style="float:left;width:49%;">

</div>
</div>
<div style="float:left;width:49%;">
<div class="news" style="padding:2px 2px;height:300px;">
</div>
</div>
</body>
</html>