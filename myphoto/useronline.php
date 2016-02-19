<?php
if($_COOKIE['user']){
	require "mysqlkey.php";
	$user=$_COOKIE['user'];
	if(mysql_num_rows(mysql_query("select id from $table_members where name='".$user."'",$link))){
		$res=mysql_query("select * from $table_members where name='".$user."'",$link) or die('加载失败'.mysql_error());
		$row=mysql_fetch_array($res);
		$touxiang=$row['photo'];
		$path=$_POST['path'];
		echo "<li><a href='' class='row' style='border:none;width:auto;'><img style='width:34px; height:34px; padding:3px; float:left;' src='{$path}touxiang/{$touxiang}'>{$row['nickname']}</a><a href='' onclick='\$.get(\"{$path}zhuxiao.php\") ' style='display:block;float:left;color:#888899;line-height:40px;font-size:12px;margin-left:5px;'>注销</a></li>";
	}
}

?>