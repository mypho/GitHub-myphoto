<?php

if($_COOKIE['user']){
	require "mysqlkey.php";
	$user=$_COOKIE['user'];
	if($_POST['imagename']!=null){
		$imagename=$_POST['imagename'];
		$res=mysql_query("select admin from $table_members where name='$user'") or die('failed');
		if(mysql_fetch_array($res)[0]){
			mysql_query("DELETE FROM $table_posts WHERE url = '$imagename'") or die('failed');
			if (unlink('images/'.$imagename)){
				die('success');
			}
		}
		else{
			mysql_query("DELETE FROM $table_posts WHERE url = '$imagename' AND poster_name ='$user'")or die('failed');
			echo "success";
			exit();
		}
	}
}
die('failed');
?>