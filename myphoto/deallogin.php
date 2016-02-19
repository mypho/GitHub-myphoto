<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>登陆处理</title>
<style type="text/css">
body {
	background: #dddddd;
	margin-top: auto;
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
</style>
<link rel="stylesheet" type="text/css" href="head.css" />
<script type="text/javascript" src="../jquery.js"></script>
<script>
$(document).ready(function(){
	$.post("useronline.php",{path:"./"},function(data){
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
    <div style=" display:block;float:left; width:600px;height:40px;"></div><div class="pull-right">
      <ul>
        <li><a href="./" class="row" style="border:none;" onMouseOver="this.className='row light' " onMouseOut="this.className='row'">
          <div class="homeicon icons"></div>
          首页 </a></li>
        <li><a href="faxian" class="row " onMouseOver="this.className='row light' " onMouseOut="this.className='row '">
          <div class="faxianicon icons"></div> 发现 </a></li>
        <li><a href="upload" class="row" onMouseOver="this.className='row light' " onMouseOut="this.className='row'">
          <div class="uploadicon icons"></div> 上传 </a></li>
        <li><a href="login.php" class="row onlight" onMouseOver="this.className='row light' " onMouseOut="this.className='row onlight'">
          <div class="loginicon icons"></div> 登录 </a></li>
        <li><a href="zhuce" class="row" onMouseOver="this.className='row light' " onMouseOut="this.className='row'">
          <div class="zhuceicon icons"></div> 注册 </a></li>
          </span>
      </ul>
    </div>
  </div>
</div>
<div class="blank"></div>
<div id="page" class="pagepage">
  <div id="head">
    <div style="float:left" id='logo' class='logo' > <a href="index.html"><img id="logo" src="登录/登录logo-455×270.png" alt="" width="200" height="121" style="margin-left:200px;margin-top:40px;" ></a> </div>
    <div class="clear"></div>
    <div style="margin:0 auto;margin-top:80px; width:360px; height:348px; text-align:center; background:url(%E7%99%BB%E5%BD%95/deallogin.png)">
	<div style='padding-top:120px;'>
    <?php
	$user=$_POST['user'];
	$password=md5($_POST['password']);
	require "mysqlkey.php";
	$sql="select * from $table_members where name='$user' and password='$password'";
	$res=mysql_query($sql,$link) or die(mysql_error());
	$nums=mysql_num_rows($res);
	if($nums==0){
		echo "<p style='color:#E00;font-family:微软雅黑;font-size:24px;'>输入的用户名或密码不正确</p><p style='font-family:微软雅黑;font-size:18px;'>点击<a href=# onClick='history.go(-1)'>这里</a>返回</p>";
	}
	else{
		while($row=mysql_fetch_array($res)){
			echo"<p><img src='touxiang/".$row['photo']."' width='80px'></p>";
			echo"<p style='font-family:微软雅黑;font-size:18px;'>".$row['nickname']."</p>";
			echo"<p style='margin-top:50px;font-family:微软雅黑;size:12px;color:#0a0;'>登录成功，正在跳转</p>";
			echo "<meta http-equiv='refresh' content='2;url=";
			if($_GET['dump']){
				echo $_GET['dump']."'>";
			}
			else{
				echo "index.html'>";
			}
			setcookie("user","$user");
		}
	}

	
	
	?>
	</div>
    
    </div>
  
</div>
</div>
</body>
</html>
