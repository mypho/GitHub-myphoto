<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content=" charset=utf-8">
<title>图片评论</title>
<style type="text/css">
	
#view
{
	position:fixed; z-index:1; width:100%; height:100%; background-color:rgba(0,0,0,0.8);text-align:center; display:none; cursor:pointer; left:0;top:40px;
}
#view span{
	display:inline-block;vertical-align:middle;text-align:center;
}
#dowload{
	width: 80px;
	height: 40px;
	background-color: #6Ed534;
	color: #fff;
	line-height: 40px;
	font-size: 20px;
	letter-spacing: 3px;
	cursor: pointer;
	border-radius: 4px;
	margin-bottom: 0;
	margin-left: auto;
	margin-right: auto;
	margin-top: 10px;
}
#viewimg{
	background:#fff;
	display:inline-block;
	margin:0 auto;
}
.picNdes {
	display: block;
	vertical-align: top;
	margin: 0px;
	max-width: 1200px;
	text-align: center;
}
.picNdes > img {
	border: 1px solid #ccc;
	max-width: 1200px;
	max-height: 400px;
}
.picNdes > img:hover {
	opacity:0.9;
}
.image{
	position:relative;
}
.image > div{
	position:absolute;
	bottom:0;
	width:100%;
	height:30px;
	background-color:rgba(0,0,0,0.5);
	display:none;
	text-align:left;
}
.image > img{
	width:400px;
}
.image > div img {
	height:24px;
	padding:3px;
	display:inline-block;
	vertical-align:middle;
}
.image > div span {
	height:30px;
	font-size:14px;
	color:#ddd;
	vertical-align:middle;
	line-height:30px;
	display:inline-block;
}
.image > div span:hover{
	text-decoration:underline;
}
.image > div div{
	position:absolute;
	right:8px;
	bottom:0;
	height:30px;
	font-size:12px;
	color:#ccc;
	line-height:30px;
}
.picNdes figcaption div {
	text-align: left;
	margin: 3px 0 0 0;
}
.biaoqian {
	width: 35px;
	float: left;
	color: #555;
	font-size: 14px;
	line-height: 22px;
}
.picNdes figcaption div + div {
	float: left;
}
.picNdes figcaption div div a {
	display: inline-block;
	background-color: #aaa;
	margin: 0 0 7px 6px;
	white-space: nowrap;
	text-decoration: none;
	font-size: 12px;
	color: #fff;
	vertical-align: middle;
	padding-left: 5px;
	padding-right: 5px;
}
.picNdes figcaption p {
	clear: both;
	margin: 0px;
	margin-bottom: 10px;
	padding-left: 5px;
	border: none;
	vertical-align: middle;
	font-family: KaiTi;
	font-size: 16px;
	line-height: 18px;
	border-left: 1px solid #000;
	text-align: left;
	word-wrap: break-word;
}
.picNdes figcaption div div a:hover{
	background-color:#6ed534;
}
figcaption > a {
	text-decoration:none;
}
figcaption > a :hover{
	text-decoration:underline;
}
body{
	background:#eee;
}

div#letter {
	position:relative;
	background-image: url(%E4%B8%AA%E4%BA%BA%E7%95%8C%E9%9D%A2-%E5%9B%BE%E5%B1%82/%E4%B8%AA%E4%BA%BA%E7%94%A8%E6%88%B7%E5%8D%9A%E5%AE%A2%E7%95%8C%E9%9D%A2_0029_%E4%BF%A1%E7%AC%BA.png);
	background-size: cover;
	width: 900px;
	text-align:center;
	margin:auto;
	margin-top:80px;
	padding-bottom:40px;
}
div#font {
	position:relative;
	padding-top:10px;

}
#font span{
	display:inline-block;
	text-align:center;
	width:60px;
	font-family:SimHei; 
	font-size:25px;
	
}
div#user_msg{
	position:relative;
	padding:120px 40px 40px;
	text-align:left;


}

#user_msg div{
	font-family:"Arial","微软雅黑";
	font-size:28px;
	line-height:60px;
	text-align:left;
	vertical-align:top;
}
.post{float:left; width:400px; margin-left:30px; margin-bottom:30px;}




</style>
<script src="../jquery.js"></script>
<script src="jquery.masonry.min.js"></script>
<link rel="stylesheet" type="text/css" href="../head.css" />
<script>

function picshow(){
	$('#view').css('height',$(window).height()-40);
	$('#viewimg').css('max-height',$(window).height()-120);
	$('#viewimg').css('max-width',$(window).width()/1.08);
	$('#view').show();
}
function download(){	
	aa=document.getElementById('viewimg').src;
	document.getElementById('url').value=aa;
	document.getElementById('downloadform').submit();
}

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
    <div style=" display:block;float:left; width:600px;height:40px;"></div><div class="pull-right">
      <ul>
        <li><a href="../" class="row" style="border:none;" onMouseOver="this.className='row light' " onMouseOut="this.className='row'">
          <div class="homeicon icons"></div>
          首页 </a></li>
        <li><a href="../faxian" class="row " onMouseOver="this.className='row light' " onMouseOut="this.className='row '">
          <div class="faxianicon icons"></div> 发现 </a></li>
        <li><a href="../upload" class="row" onMouseOver="this.className='row light' " onMouseOut="this.className='row'">
          <div class="uploadicon icons"></div> 上传 </a></li>
          <span id="useronline">
        <li><a href="../login.php" class="row " onMouseOver="this.className='row light' " onMouseOut="this.className='row'">
          <div class="loginicon icons"></div> 登录 </a></li>
        <li><a href="../zhuce" class="row" onMouseOver="this.className='row light' " onMouseOut="this.className='row'">
          <div class="zhuceicon icons"></div> 注册 </a></li>
          </span>
      </ul>
    </div>
  </div>
</div>
<div class="blank"></div>
<div id="view" onClick="$('#view').hide()" title="点击返回"> 
<span style="height:100%;"></span> 
<span style="max-width:99%"> 
 <form method='post' id="downloadform" action='../download.php'>
	<input type='hidden' id='url' name='url' value=""/></form>
  <img id="viewimg" src="../logo/logo.png" />
  <div id="dowload" onClick="download();">下载</div>
</span>
</div>


<div id="letter">
<div style="float:right;margin:20px 80px;">
<div id="font">
<span >搜索</span><span >归档</span><span>投稿</span><span >私信</span>
</div>
   <img src="个人界面-图层/个人用户博客界面_0025_蓝条.png"  width=60px height="8" /><img src="个人界面-图层/个人用户博客界面_0026_绿条.png" width=60px height="8" /><img src="个人界面-图层/个人用户博客界面_0027_黄条.png" width=60px height="8" /><img src="个人界面-图层/个人用户博客界面_0028_红条.png" width=60px height="8" /></div>
<?php
require "../mysqlkey.php";
echo"<div id='user_msg'>";
$user_id=$_GET['id'];
$result_user=mysql_query("select * from $table_members where id='$user_id'",$link);
$rows_poster=mysql_fetch_array($result_user);

echo"<img src=\"../touxiang/".$rows_poster['photo']."\" style='width:80px;'/>"; 
echo"<div>".$rows_poster['nickname']."</div></div>";

$sql="select * from $table_posts where poster_id='$user_id' and keywords<>'#'"; 
$res=mysql_query($sql,$link);
$sum=mysql_num_rows($res);
if($sum==0){
	echo "<h3 style=\"text-align:center;\">该用户没有发表任何图文</h3>";
	
}else{

	while($rows=mysql_fetch_array($res)){
		$poster_id=$rows['poster_id'];
		$user_rows=mysql_fetch_array(mysql_query("select * from $table_members where id = '$poster_id'",$link));

		echo"<figure class=\"picNdes post\">
			<div class='image' onMouseOver='$(this).children(\"div\").show();' onMouseOut='$(this).children(\"div\").hide();'>
			<img src=\"../images/".$rows['url']."\" title='".$rows['content']."' onClick=\"$('#viewimg').attr('src','../images/".$rows['url']."');picshow();\"  />
			<div>
			<img src='../touxiang/".$user_rows['photo']."' />
			<a href='../userinfo?id=$poster_id'><span>".$user_rows['nickname']."</span></a>
			<div>点击图片查看大图</div>
			</div></div>
			<figcaption>
			<a href='../imageinfo?id=".$rows['id']."' >
			<div class=\"biaoqian\" style=\"width:auto; font-weight:bold;\"title='".$rows['content']."'>".$rows['title']."
			</div></a>";
		echo "</figcaption></figure>";
	}
}


?>
	
	
  <div style="clear:both"></div>
</div>
</body>
</html>
