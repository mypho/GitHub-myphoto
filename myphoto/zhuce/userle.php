<?php
			$user=$_POST['user'];
			require "../mysqlkey.php";
			if(mysql_num_rows(mysql_query("select * from $table_members where name='".$user."'",$link))){
				echo "1";
			}
			else{
				echo"2";
			}
?>