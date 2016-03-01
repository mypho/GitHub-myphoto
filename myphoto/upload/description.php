<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="../logo/logo.ico">
<title>myphoto-描述图片</title>
<link rel="stylesheet" type="text/css" href="description.css" />
<link rel="stylesheet" type="text/css" href="../head.css" />
<script src="../jquery.js"></script>
<script>
function otherhidden(check,text){
 if(check.checked==true){
	 text.style.visibility="visible";
 }else{
	 text.value="";
	 text.style.visibility="hidden";
 }
}
function sub(){
	for(var i=0;i<document.getElementsByName('title[]').length;i++){
		if(document.getElementsByName('title[]')[i].value==""){
			alert("标题不能为空!");
			document.getElementsByName('title[]')[i].focus();
			return false;
		}
		
		cal=document.getElementsByName('keywords'+i+'[]');
		k=0;p=0;//k判断是否选择是否有效，p判断其他其他是否被选中
		if(document.getElementById('otherkey'+i).value!=""){
			k=1;
		}
		for(var j=0;j<cal.length-1;j++){
			if(cal[j].checked){ 
				k=1;
			}
		}if(cal[j].checked){ 
				p=1;
		}if(k==0){
			alert('请至少选择一个关键词');
			if(p==0)cal[0].focus();
			if(p==1)document.getElementById('otherkey'+i).focus();
			return false;
		}
		
		if(document.getElementsByName('content[]')[i].value==""){
			alert("详细描述不能为空!");
			document.getElementsByName('content[]')[i].focus();
			return false;
		}
	}
}		
</script>

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
<style type="text/css">
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
<body style="background:#DFDFDF; min-width:1476px;margin:0;padding-bottom:80px;">
<div class="fixeditem">
  <div class="container"> <a href="../index.html"  class="myphotologo" onmouseover="this.className='myphotologoo'" onmouseout="this.className='myphotologo'"  title="首页"> </a>
  <div style=" display:block;float:left; width:600px;height:40px;">
     <form class="search" action="../faxian/search.php" method="get">
<input class="sinput" type="text" name="key" />
<input class="sbtn" type="submit" value="搜索" /></form></div> 
    
    <div class="pull-right">
      <ul>
        <li><a href="../" class="row" style="border:none;" onMouseOver="this.className='row light' " onMouseOut="this.className='row'">
          <div class="homeicon icons"></div>
          首页 </a></li>
        <li><a href="../faxian" class="row " onMouseOver="this.className='row light' " onMouseOut="this.className='row'">
          <div class="faxianicon icons"></div>
          发现 </a></li>
        <li><a href="" class="row onlight" onMouseOver="this.className='row light' " onMouseOut="this.className='row onlight'">
          <div class="uploadicon icons"></div>
          上传 </a></li>
        <sapn id="useronline"><li><a href="../login.php?dump=faxian" class="row" onMouseOver="this.className='row light' " onMouseOut="this.className='row'">
          <div class="loginicon icons"></div>
          登录 </a></li>
        <li><a href="../zhuce" class="row" onMouseOver="this.className='row light' " onMouseOut="this.className='row'">
          <div class="zhuceicon icons"></div>
          注册 </a></li>
          </span>
      </ul>
    </div>
  </div>
</div>
<div class="blank"></div>


<div id="page" >
  <div style=" position:relative; " id='logo' class='logo' > <a href="../"> <img id="logo" src="../登录/登录logo-455×270.png" alt="" width="200px" height="121px" style="margin-left: 200px; margin-top: 40px; margin-bottom: 30px;" > </a> </div>
  <div id="main">
    <h2 class="top_title">第二步：添加描述</h2>
    <form id="descriptform" method="post"  action="" onSubmit="return sub()">
      <!--<div class='kuai'>
	<h3>第一张图片</h3>
	<img src='../uploads' style='width:400px' class='preview'>
	<p>
	<table cellspacing='10px' border='0'>
	<tr><td class='tl'>标题</td><td><input type='text' name='title[]' class='title' placeholder='最多25字，不能为空' maxlength='25'></td></tr>
	<tr><td class='tl'>关键词</td><td><p><input type='checkbox' name='keywords{$i}[]' value='色彩'>色彩
	<input type='checkbox' name='keywords{$i}[]' value='自然' >自然
    <input type='checkbox' name='keywords{$i}[]' value='时尚' >时尚
    <input type='checkbox' name='keywords{$i}[]' value='中国风' >中国风
    <input type='checkbox' name='keywords{$i}[]' value='人像' >人像
    <input type='checkbox' name='keywords{$i}[]' value='美食' >美食
    <input type='checkbox' name='keywords{$i}[]' value='萌宠' >萌宠
    <input type='checkbox' name='keywords{$i}[]' value='静物' >静物
    <input type='checkbox' name='keywords{$i}[]' value='植物' >植物</p><p>
    <input type='checkbox' name='keywords{$i}[]' value='失焦' >失焦
    <input type='checkbox' name='keywords{$i}[]' value='胶片' >胶片
    <input type='checkbox' id='other{$i}' onClick="otherhidden(document.getElementById('other{$i}'),document.getElementById('otherkey{$i}'))">其他 
    <input type='text' id='otherkey{$i}' name='otherkey{$i}' class='otherkey' placeholder='若有多个关键词，请用“|”隔开，例“抽象|梦境”，最多20字' maxlength="20" style='visibility:hidden;'>
	</td></tr>	
	<tr><td class='tl' style='vertical-align:top;'>详细描述</td><td><textarea maxlength='200' placeholder='最多200字,不能为空' name='content[]'></textarea></td></tr>
	</table>
	</p>
	</div>
-->
      <?php
require "../mysqlkey.php";
if(!$_COOKIE['user'])					//如果没有用户登录，显示登录连接
{
	echo "<h3 style='text-align:center;'>您还未登录，请先<a href=\"../login.php?dump=upload/description.php\">登录</a></h3>";
	exit;
}
if($_POST){
	foreach($_POST['id'] as $key => $id){
		$title=$_POST['title'][$key];
		$keywords=implode('|',$_POST['keywords'.$key]);
		$keywords.=$_POST['otherkey'.$key];
		$content=$_POST['content'][$key];
		$sql="UPDATE $table_posts SET title = '$title',keywords='$keywords',content='$content' WHERE id='$id'";
		mysql_query($sql,$link) or die(mysql_error());
	}
	echo"<h3>图片发表成功</h3>";
	
}
else{
	$sql="select * from $table_posts where poster_name='$_COOKIE[user]' and title='#' order by url DESC";		//寻找title为‘#’的图片
	$result=mysql_query($sql,$link);
	$i=0;
	while($rows=mysql_fetch_array($result)){
		echo "<div class='kuai'>";
		echo "<h3>".($i+1).".".$rows['pic_name']."</h3>";
		echo "<input type='hidden' name='id[]' value='".$rows['id']."'>";
		if($rows['width']>900){
			echo "<img src='../images/{$rows['url']}' style='width:900px' class='preview'>";
		}else{
				echo "<img src='../images/{$rows['url']}' style='width:{$rows['width']}px'  class='preview'>";
		}
		echo "<p>";
		echo "<table cellspacing='10px' border='0'>";
		echo "<tr><td class='tl'>标题</td><td><input type='text' name='title[]' class='title' placeholder='最多20字，不能为空' maxlength='25'></td></tr>";
		echo "<tr><td class='tl'>关键词</td><td><span style='text-align:left'><p>";
		echo "<input type='checkbox' name='keywords{$i}[]' value='色彩'>色彩 ";
		echo "<input type='checkbox' name='keywords{$i}[]' value='自然' >自然 ";
		echo "<input type='checkbox' name='keywords{$i}[]' value='时尚' >时尚 ";	
		echo "<input type='checkbox' name='keywords{$i}[]' value='中国风' >中国风 ";
		echo "<input type='checkbox' name='keywords{$i}[]' value='人像' >人像 ";
		echo "<input type='checkbox' name='keywords{$i}[]' value='美食' >美食 ";
		echo "<input type='checkbox' name='keywords{$i}[]' value='萌宠' >萌宠 ";
		echo "<input type='checkbox' name='keywords{$i}[]' value='静物' >静物 ";
		echo "<input type='checkbox' name='keywords{$i}[]' value='植物' >植物 </p><p>";
		echo "<input type='checkbox' name='keywords{$i}[]' value='失焦' >失焦 ";
		echo "<input type='checkbox' name='keywords{$i}[]' value='胶片' >胶片 ";
		echo "<input type='checkbox' name='keywords{$i}[]' value='' id='other{$i}' onClick=\"otherhidden(document.getElementById('other{$i}'),document.getElementById('otherkey{$i}'))\">其他 ";
		echo "<input type='text' id='otherkey{$i}' name='otherkey{$i}' class='otherkey' placeholder='若有多个关键词，请用“|”隔开，例“抽象|梦境”，最多25字' maxlength='25' style='visibility:hidden;'></p></span>";	
		echo "</td></tr>";	
		echo "<tr><td class='tl' style='vertical-align:top;'>详细描述</td><td><textarea maxlength='200' placeholder='最多200字,不能为空' name='content[]'></textarea></td></tr>";
		echo "</table>";
		echo "</p>";
		echo "</div>";
		$i++;
	}
	if($i==0){																		//没有title为‘#’的图片
		echo "<h3 style='text-align:center;'>没有未添加描述的图片，请先<a href='./'>上传</a>后再试</h3>";
	
		exit;
	}	
		
		
		echo "<input type=\"submit\" class=\"btn2\" value=\"下一步\">";
}
?>
    </form>
  </div>
</div>
</body>
</html>
