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
	aa=document.getElementById('viewimg').src;
	document.getElementById('url').value=aa;
	document.getElementById('downloadform').submit();
}
</script>
<link rel="stylesheet" type="text/css" href="../head.css" />
<script type="text/javascript" src="../jquery.js"></script>
<script>
function submitByEnter(form)
    {
        if(event.keyCode == 13)
        {
            form.submit();
        }
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
<div id="view" onClick="$('#view').hide()" title="点击返回"> 
<span style="height:100%;"></span> 
<span style="max-width:99%"> 
 <form method='post' id="downloadform" action='../download.php'>
	<input type='hidden' id='url' name='url' value=""/></form>
  <img id="viewimg" src="../logo/logo.png" />
  <div id="dowload" onClick="download();">下载</div>
</span>
</div>
<div class="htmleaf-container">
<form id="srh"method="get" action="" >
<img src="../logo/logo-203×123.png" style="vertical-align: middle; margin-right:20px;">
<input type="text" name="key" id="kw" maxlength="100" autocomplete="off" value="<?=$_GET['key']?>">
<input type="submit" value="搜  索" id="su" >
</form>
  <div id='wrapper'>
    <div class='grid-wrapper'>
      <?php 
require "../mysqlkey.php";
$key=$_GET['key'];
$keyarray=explode(" ",$key);//搜索优化：key带有空格的多条件搜索
$keylimit="";
foreach($keyarray as $value){ 
	$keylimit.="(keywords like '%$value%' or title like '%$value%') and ";//对多个条件进行and
}
$sql="select * from $table_posts where".$keylimit."keywords<>'#'"; //最终的查找语句
$sum=mysql_num_rows(mysql_query($sql,$link));
$i=(int)$_GET['page']-1;//i=page-1 页数，从0开始
if(isset($_GET['num'])){ //num=每页显示数目
	if((int)$_GET['num']<1){
		$num=1;
	}else{
		$num=(int)$_GET['num'];
	}
}else{$num=15;}

if($i>=$sum/$num){$i=ceil($sum/$num)-1;}//特殊情况处理
if($i<0){$i=0;}
$res=mysql_query($sql." limit ".$i*$num.",".$num,$link) ;

if(mysql_num_rows($res)==0){
	echo "<h3 class='grid-item' style=\"text-align:center;\">没有任何结果</h3>";
	
}else{
	while($rows=mysql_fetch_array($res)){
		$poster_id=$rows['poster_id'];
		$user_rows=mysql_fetch_array(mysql_query("select * from $table_members where id = '$poster_id'",$link));

		echo"<figure class=\"picNdes grid-item\">
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
			</div></a><br/><div>
			<div class=\"biaoqian\">标签:</div><div>";
		$biaoqian=explode("|",$rows['keywords']);
		foreach($biaoqian as $value){
			echo "<a href=\"?key=$value\" >$value</a>";
		}
		echo"</div></div>";
		echo "</figcaption></figure>";
	}
}
?>
	
    </div>
  </div>
    <div id='controls-top'>布局
    <div class='control-button eight'>宽屏显示</div>
    <div class='control-button nine'>3列显示</div>
    <div class='control-button twelve'>元素：窄</div>
    <div class='control-button eleven'>元素：宽</div>
    <div style="display:inline-block;width:200px;"></div>
    <?php
	
	echo"<form action='' method='get' onkeydown='submitByEnter(this);' style='width:472px;display:inline-block'>";//跳转表单
	$maxpage=$sum/$num;
	$disable="";$linkclass="";
	if($i<=0){$disable=" onclick='return false;'";$linkclass="disable";}//上一页
	echo "<a class=\"pagelink$linkclass\" href='?key={$key}&num={$num}&page=$i' $disable>上一页</a>";
	echo"<input type='hidden' name='key' value='$key'/>
	<input name='page' value=".($i+1)." />";
	$disable="";$linkclass="";
	if($i>=$maxpage-1){$disable=" onclick='return false;'";$linkclass="disable";}
    echo "<a class=\"pagelink$linkclass\" href='?key={$key}&num={$num}&page=".($i+2)."' $disable>下一页</a>";//下一页
	echo "<div style='display:inline-block;width:50px;'>共".ceil($sum/$num)."页</div>";
	echo "每页显示<input name='num' value='$num'/>条结果</form>";
	?>
  </div>
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
