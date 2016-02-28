<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content=" charset=utf-8">
<title>图片评论</title>
<style type="text/css">


div#letter {
	position:relative;
	background-image: url(%E4%B8%AA%E4%BA%BA%E7%95%8C%E9%9D%A2-%E5%9B%BE%E5%B1%82/%E4%B8%AA%E4%BA%BA%E7%94%A8%E6%88%B7%E5%8D%9A%E5%AE%A2%E7%95%8C%E9%9D%A2_0029_%E4%BF%A1%E7%AC%BA.png);
	background-size: cover;
	width: 900px;
	text-align:center;
	margin:auto;
	margin-top:80px;
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
	padding-top:50px;
	padding-left:80px;
	text-align:left;
		width:100px;

}
#user_msg img{
	width:100px;
}
div#zhuti{
	background:#FFF;
	max-width:600px;
	padding: 20px 30px 5px;
	display: inline-block;
	margin-top:20px;

}

#user_msg div{
	font-family:"黑体";
	font-size:20px;
	text-align:center;
	width:100px;
}

.font2{
	font-size:24px;
	font-family:'微软雅黑';
}
.font3{
	font-size:18px;
	font-family:'楷体';
	text-align: left;
    border-left: 1px solid #000;
    padding-left: 10px;
    margin: 10px 10px 10px 0;
}

</style>
</head>

<body background="个人界面-图层/个人用户博客界面_0031_背景.png">

<div id="letter">
<div style="float:right;">
<div id="font">
<span >搜索</span><span >归档</span><span>投稿</span><span >私信</span>
</div>
   <img src="个人界面-图层/个人用户博客界面_0025_蓝条.png"  width=70px height="8" /><img src="个人界面-图层/个人用户博客界面_0026_绿条.png" width=70px height="8" /><img src="个人界面-图层/个人用户博客界面_0027_黄条.png" width=70px height="8" /><img src="个人界面-图层/个人用户博客界面_0028_红条.png" width=70px height="8" /></div>
	
	
	
  <!-- <div id="user_msg">
  <img src=""  width="133" height="135" />
  <p >user name</p>
  </div>
  <div id="zhuti">
  <p class="font2">标题</p>
  <img src="图片评论-图层/个人用户博客界面-拷贝_0013_被评论图片.png" width="527" height="584" />
  <p>作者对本图片的个人作者对本图片的个人作者对本图片的个人作者对本图片的个人作者对本图片的个人作者对本图片的个人作者对本图片的个人作者对本图片的个人作者对本图片的个人作者对本图片的个人作者对本图片的个人作者对本图片的个人作者对本图片的个人作者对本图片的个人作者对本图片的个人作者对本图片的个人作者对本图片的个人</p>
  </div>
  
  -->
  
  
<?php
require "../mysqlkey.php";

echo"<div id='user_msg'>";
$picture_id=$_GET['id'];
$result_picture=mysql_query("select * from $table_posts where id='$picture_id'",$link);
$rows_picture=mysql_fetch_array($result_picture);
$poster_id=$rows_picture['poster_id'];

$result_user=mysql_query("select * from $table_members where id='$poster_id'",$link);
$rows_poster=mysql_fetch_array($result_user);

echo"<img src=\"../touxiang/".$rows_poster['photo']."\" />"; 
echo"<div>".$rows_poster['nickname']."</div>";
echo"</div>";
echo"<div id='zhuti'>";
echo"<p class=\"font2\">".$rows_picture['title']."</p>";
if($rows_picture['width']>"527" or $rows_picture['height']>"584")
echo"<img src='../images/".$rows_picture['url']."' width=\"527\" height=\"584\" />";
else 
echo"<img src='../images/".$rows_picture['url']."' style=\"max-width:600px\" />";
echo"<p class=\"font3\">".$rows_picture['content']."</p>";
echo"</div>";
?>
  
  
  
  
  <p style="text-align:left; padding-left:15%; font-family:FangSong; font-weight:bold">评 论</p>
  <form action="/example/html/form_action.asp" method="get">
  <textarea style="width:600px; height:200px; resize:none;"></textarea>
  <br />
  <br />
  
    <input type="submit" value="发布" />
  </form>
  <div style="text-align:left;">
  <p style="text-align:left; padding-left:5%; font-family:FangSong;">相 关 图 片</p>
  <img src="图片评论-图层/个人用户博客界面-拷贝_0003_相关图1.png"  style=" padding-left:80px;"/>
  </div>
</div>
</body>
</html>
