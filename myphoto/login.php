<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>myphoto登录页面</title>
<style type="text/css">
body {
	background: #dddddd;
	margin:0;
}
#page {
	background-image: url(登录/登录背景-1476×696.png);
	background-repeat: no-repeat;
	margin: 0 auto;
	font-size: 12px;
	min-width: 1024px;
	height:696px;
	max-width: 1476px;
}
.clear {
	clear: both
}
#logo {
	opacity: 1.0;
	filter: alpha(opacity=100);
}
#logo:hover {
	opacity: 0.8;
	filter: alpha(opacity=80);
}
input[type=email], input[type=number], input[type=password], input[type=tel], input[type=text], input[type=submit], input[type=url] {
	-moz-appearance: none;
	-webkit-appearance: none;
	appearance: none;
	display: inline-block;
	height: 36px;
	padding: 0 8px;
	margin: 0;
	background: #fff;
	border: 1px solid #d9d9d9;
	border-top: 1px solid #c0c0c0;
	-moz-box-sizing: border-box;
	-webkit-box-sizing: border-box;
	box-sizing: border-box;
	-moz-border-radius: 1px;
	-webkit-border-radius: 1px;
	border-radius: 1px;
	font-size: 15px;
	color: #404040;
}
</style>
<link rel="stylesheet" type="text/css" href="head.css" />
<script type="text/javascript" src="jquery.js"></script>
<script>
$(document).ready(function(){
	$.post("./useronline.php",{path:"./"},function(data){
		if(data!=""){
			$('#useronline').html(data);
		}
	});
});
</script>
</head>

<body>
<div class="fixeditem">
  <div class="container"> <a href="./"  class="myphotologo" onmouseover="this.className='myphotologoo'" onmouseout="this.className='myphotologo'"  title="首页"> </a>
<div style=" display:block;float:left; width:600px;height:40px;"></div>
    <div class="pull-right">
      <ul>
      <li><a href="./" class="row" style="border:none;" onMouseOver="this.className='row light' " onMouseOut="this.className='row'">
          <div class="homeicon icons"></div> 首页 </a></li>
        <li><a href="faxian" class="row " onMouseOver="this.className='row light' " onMouseOut="this.className='row '">
          <div class="faxianicon icons"></div> 发现 </a></li>
        <li><a href="upload" class="row" onMouseOver="this.className='row light' " onMouseOut="this.className='row'">
          <div class="uploadicon icons"></div> 上传 </a></li>
        <li><a href="" class="row onlight" onMouseOver="this.className='row light' " onMouseOut="this.className='row onlight'">
          <div class="loginicon icons"></div> 登录 </a></li>
        <li><a href="zhuce" class="row" onMouseOver="this.className='row light' " onMouseOut="this.className='row'">
          <div class="zhuceicon icons"></div> 注册 </a></li>
      </ul>
    </div>
  </div>
</div>
<div class="blank"></div>
<div id="page" class="pagepage">
  <div id="head">
    <div style="float:left" id='logo' class='logo' > <a href=""><img id="logo" src="登录/登录logo-455×270.png" alt="" width="200" height="121" style="margin-left:200px;margin-top:40px;" ></a> </div>
    <div class="clear"></div>
  </div>
  <?php echo "<form method=\"post\" action=\"deallogin.php?dump=".$_GET['dump']."\">";
  ?>
    <div style="margin:0 auto;margin-top:80px; width:360px; height:348px; background-image:url(%E7%99%BB%E5%BD%95/%E4%B8%BB%E9%A1%B5%E9%9D%A2-360%C3%97348.png)">
      <input type="text" name='user' style="margin-top:102px; margin-left:85px; width:230px;"placeholder="example@163.com"/>
      <input type="password" name='password'  style="margin-top:34px;  margin-left:85px;width:230px;"placeholder="密码"/>
      <input type="submit" value="" style=" margin-top:30px; margin-left:30px;background:url(%E7%99%BB%E5%BD%95/%E7%99%BB%E5%BD%95%E6%8C%89%E9%92%AE-141%C3%9750.png); width:141px;  height:50px; border: 1px solid #aaa; border-radius:3px">
      <input type="button" value="" onclick="javascript:window.location.href='index.html'" style="margin-left:12px; background:url(%E7%99%BB%E5%BD%95/%E6%B3%A8%E5%86%8C%E6%8C%89%E9%92%AE-141%C3%9750.png); width:141px; height:50px; border: 1px solid #aaa; border-radius:3px">
    </div>
  </form>
</div>
</body>
</html>
