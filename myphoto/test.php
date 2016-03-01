<?php 
 $poster_id=$_GET['id'];
 require "mysqlkey.php";
$result=mysql_query("select * from $table_posts where poster_id='$poster_id'",$link);
while($rows=mysql_fetch_array($result)){
	
	echo "<p style=\"text-align: left; font-family: KaiTi; font-size: 15px; left: 500px; border-left:2px solid #000; padding-left:5px\">".$rows['content']."</p>" ; 
}
 ?>