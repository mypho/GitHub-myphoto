<!doctype html>
<html lang="zh">
<head>
<meta a http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Myphoto-搜索结果</title>
<link rel="shortcut icon" href="../logo/logo.ico">
<link href='search/css/style.css' rel='stylesheet'>
<script src='search/js/jquery.js'></script>
<script>
function picshow(){
	$('#view').css('height',$(window).height()-40);
	$('#viewimg').css('max-height',$(window).height()-120);
	$('#viewimg').css('max-width',$(window).width()/1.08);
	$('#view').show();
}
function download(){
	var id=Math.random();	
	aa=document.getElementById('viewimg').src;
	alert(aa);
	document.getElementById('url').value=aa;
	document.getElementById('downloadform').submit();
}
</script>
<link rel="stylesheet" type="text/css" href="../head.css" />
<script type="text/javascript" src="../jquery.js"></script>
<script>
$(document).ready(function(){
	$.post("../useronline.php",{path:"../"},function(data){
		if(data!=""){
			$('#useronline').html(data);
		}
	});
});
</script>
</head>

<body class="letter">
<div class="fixeditem">
  <div class="container"> <a href="../index.html"  class="myphotologo" onmouseover="this.className='myphotologoo'" onmouseout="this.className='myphotologo'"  title="首页"> </a>
   <div style=" display:block;float:left; width:600px;height:40px;">
     <form class="search" action="search.php" method="get">
<input class="sinput" type="text" name="key" value="<?php echo $_GET['key'];?>"/>
<input class="sbtn" type="submit" value="搜索" /></form></div> 
   <div class="pull-right">
      <ul>
        <li><a href="../" class="row" style="border:none;" onMouseOver="this.className='row light' " onMouseOut="this.className='row'">
          <div class="homeicon icons"></div>
          首页 </a></li>
        <li><a href="./" class="row onlight" onMouseOver="this.className='row light' " onMouseOut="this.className='row onlight'">
          <div class="faxianicon icons"></div>
          发现 </a></li>
        <li><a href="../upload" class="row" onMouseOver="this.className='row light' " onMouseOut="this.className='row'">
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
<div id="view" onClick="$('#view').hide()"> 
<span style="height:100%;"></span> 
<span style="max-width:99%"> 
 <form method='post' id="downloadform" action='../download.php'>
	<input type='hidden' id='url' name='url' value=""/></form>
  <img id="viewimg" src="../logo/logo.png" />
  <div id="dowload" onClick="download();">下载</div>
</span>
</div>
<div class="htmleaf-container">
  <div id='controls-top'>布局
    <div class='control-button eight'>宽屏显示</div>
    <div class='control-button nine'>3列显示</div>
    <div class='control-button twelve'>元素：窄</div>
    <div class='control-button eleven'>元素：宽</div>
  </div>
  <div id='wrapper'>
    <div class='grid-wrapper'>
      <?php 
require "../mysqlkey.php";
$key=$_GET['key'];
$res=mysql_query("select * from $table_posts where (keywords like '%$key%' or title like '%$key%') and keywords<>'#'",$link) ;
if(mysql_num_rows($res)==0){
	echo "<h1>没有任何结果</h1>";
	exit();
}
while($rows=mysql_fetch_array($res)){
	echo"<figure class=\"picNdes grid-item\">
		<img src=\"../images/".$rows['url']."\"onClick=\"$('#viewimg').attr('src','../images/".$rows['url']."');picshow();\">
		<figcaption>
		<div>
		<div class=\"biaoqian\">标签:</div><div>";
	$biaoqian=explode("|",$rows['keywords']);
	foreach($biaoqian as $value){
		echo "<a href=\"?key=$value\" >$value</a>";
	}
	echo"</div></div><p>";
	$str=$rows['content'];
	$str = str_replace(array("\r", "\n"), "<br/>", $str);   
	$str=str_replace(" ","&nbsp;",$str);
	echo $str;
	echo "</p></figcaption></figure>";
}
?>
    </div>
  </div>
  <!--<div id='controls-bottom'>
	  <input class='control-input one' placeholder='添加一张图片的URL看看效果！' type='url'>
	  <div class='control-button bottom-one'>添加</div>
	</div>--> 
</div>
<script src='search/js/raf.js'></script> 
<script src='search/js/jquery.js'></script> 
<script src='search/js/transit.js'></script> 
<script src='search/js/velocity.js'></script> 
<script src='search/js/imgload.adem.js'></script> 
<script src='search/js/stackgrid.adem.js'></script> 
<script src='search/js/website.js'></script>
</body>
</html>
