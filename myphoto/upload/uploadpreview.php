<?php
require "../mysqlkey.php";
$sql="select * from $table_posts where poster_name='$_COOKIE[user]' and title='#' order by url DESC";		//寻找title为‘#’的图片
	$result=mysql_query($sql,$link);
	$i=0;
	while($rows=mysql_fetch_array($result)){
		
		if($rows['width']>930){
			echo "<div class='preview' style='display:inline-block;position:relative; width:930px;height:".$rows['height']*930/$rows['width']."px;'>";
			echo "<img src='../images/{$rows['url']}' style='width:930px;>";
		}else{
			echo "<div class='preview' style='display:inline-block;position:relative; width:{$rows['width']}px; height:{$rows['height']}px;'>";
			echo "<img src='../images/{$rows['url']}' style='width:{$rows['width']}px'>";
		}
		echo "<a href='' style='position:absolute;bottom:15px;right:15px;display:inline-block;width:20px;height:20px;background:url(../pic/del.png)'
		onclick='\$.post(\"../deleteimage.php\",{imagename:\"".$rows['url']."\"},function(data){
			alert(data);
		});'
		></a>";
		echo "</div>";
	}
?>