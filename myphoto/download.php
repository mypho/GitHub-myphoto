<?php
    $file =substr($_POST['url'],-24);
	$filename=basename($file);
    header("Content-type: application/octet-stream");
    header('Content-Disposition: attachment; filename="' .$filename. '"');
    header("Content-Length: ". filesize($file));
    readfile($file);
	require"mysqlkey.php";
	mysql_query("update $table_posts set download_count = download_count +1 where url= '$filename'");
?>