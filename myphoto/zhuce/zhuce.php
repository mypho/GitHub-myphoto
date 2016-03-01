<!DOCTYPE html>
<!-- saved from url=(0036)http://127.0.0.1/pj3/zhuce/zhuce.php -->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="shortcut icon" href="../logo/logo.ico" />
<title>myphoto=用户注册</title>
<style type="text/css">
body {
	background: #dddddd;
	margin:0;
	padding:0;
}
#page {
	background-image: url(bgpic.png);
	background-repeat: no-repeat;
	margin: 0 auto;
	font-size: 12px;
	min-width: 1024px;
	height: 696px;
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
.err {
	color: #FF0033;
	font-family: "微软雅黑";
	font-size: 24px;
	text-align: center;
}
.suc {
	color: #0C0;
	font-family: "微软雅黑";
	font-size: 24px;
	text-align: center;
}
.search {
    display:inline-block;
    position:relative;
    height:27px;
	margin-top:6px;
	margin-left:20px;
}
 
.search:hover {
    -webkit-box-shadow:0 0 3px #999;
    -moz-box-shadow:0 0 3px #999
}
 
.search .sinput {
    float:left;
    width:130px;
    height:20px;
    line-height:20px;
    padding:3px 5px;
    border:#A7A7A7 1px solid;
    background:#ccc;
    color:#888;
    font-size:12px;
    -webkit-transition:.3s;
    -moz-transition:.3s;
    outline: none;
}
 
.search .sinput:focus {
    width:200px;
}
 
.search .sbtn {
	cursor: pointer;
	height: 28px;
	font-size: 12px;
	float: left;
	width: 50px;
	margin-left: -1px;
	background: #eee;
	display: inline-block;
	padding: 0 12px;
	vertical-align: middle;
	border: #A7A7A7 1px solid;
	color: #666;
}
 
.search .sbtn:hover {
    background:#ddd;
}
.pagelink{
}
</style>
<script src="../jquery.js"></script>
<script src="zhuce.js"></script>
<link rel="stylesheet" type="text/css" href="../head.css" />
<script>
$(document).ready(function(){
	$.post("../useronline.php",{path:"../"},function(data){
		if(data!=""){
			$('#useronline').html(data);
		}
		$(".pull-right").show();
	});
});
</script>
</head>
<body>
<div class="fixeditem">
  <div class="container"> <a href="./"  class="myphotologo" onmouseover="this.className='myphotologoo'" onmouseout="this.className='myphotologo'"  title="首页"> </a>
  <div style=" display:block;float:left; width:600px;height:40px;">
     <form class="search" action="../faxian/search.php" method="get">
<input class="sinput" type="text" name="key" />
<input class="sbtn" type="submit" value="搜索" /></form></div> 
<div class="pull-right">
      <ul>
        <li><a href="../" class="row" style="border:none;" onMouseOver="this.className='row light' " onMouseOut="this.className='row'">
          <div class="homeicon icons"></div>
          首页 </a></li>
        <li><a href="../faxian" class="row " onMouseOver="this.className='row light' " onMouseOut="this.className='row '">
          <div class="faxianicon icons"></div> 发现 </a></li>
        <li><a href="../upload" class="row" onMouseOver="this.className='row light' " onMouseOut="this.className='row'">
          <div class="uploadicon icons"></div> 上传 </a></li>
        <li><a href="../login.php" class="row " onMouseOver="this.className='row light' " onMouseOut="this.className='row'">
          <div class="loginicon icons"></div> 登录 </a></li>
        <li><a href="" class="row onlight" onMouseOver="this.className='row light' " onMouseOut="this.className='row onlight'">
          <div class="zhuceicon icons"></div> 注册 </a></li>
          </span>
      </ul>
    </div>
  </div>
</div>
<div class="blank"></div>
<div id="page" class="pagepage">
  <div id="head">
    <div style="float:left" id="logo" class="logo"> <a href="ndex.html"><img id="logo" src="../登录/登录logo-455×270.png" alt="" width="200" height="121" style="margin-left:200px;margin-top:40px;"></a> </div>
    <div class="clear"></div>
    <div style="margin:0 auto;margin-top:80px; width:480px; height:280px; text-align:center; background-color:#FFFFFF;border:1px solid #d3d3d3; background:#fff; -moz-border-radius:5px;-khtml-border-radius: 5px;">
      <div style="padding-top:60px;">
      <?php
	require "../mysqlkey.php";
	session_start();
	$code = $_POST['yzm_code']; 
	if($code!=$_SESSION["yzm_code"]){
		echo "<p class='err'>验证码错误,请重新输入！<br/><br/>正在返回注册页面</p>";		//核对验证码
		echo "<script>setTimeout('window.history.go(-1)',2000);</script>";
		exit();								
	}
	$name=$_POST['user'];
	$password=md5($_POST['password']);
	$nickname=$_POST['uname'];
	$sex=$_POST['sex'];
	$email=$_POST['email'];
	$reg_date=date('Y-m-d');

	$sql="select id from $table_members where name='$name'";
	$result=mysql_query($sql,$link)or die(mysql_error());					//发送查找用户名的SQL请求
	$nums=mysql_num_rows($result);					//获取查找结果
	if($nums!=0)									//如果结果不等于0
		{
			echo "<p class='err'>账号{$name}<br/>已经存在，请更换后重试！<br/><br/>正在返回注册页面</p><p>";		//给出相应提示
			echo "<script>setTimeout('window.history.go(-1)',2000);</script>";
			exit();									
		}

	$sql="insert into $table_members(name,password,email,nickname,sex,reg_date)values('$name','$password','$email','$nickname','$sex','$reg_date')";
	mysql_query($sql,$link)or die(mysql_error());		//发送插入记录的SQL请求
	echo "<p class='suc'><span style='font-size:36px;'>注册成功</span><br/><br/><span style='color:blue'><U>{$nickname}</u></span>,欢迎您</p>";	
?>
      </div>
    </div>
  </div>
</div>
</body>
</html>