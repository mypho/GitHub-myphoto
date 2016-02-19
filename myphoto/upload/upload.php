<?php
require "../mysqlkey.php";
if(!$_COOKIE['user'])					//验证cookie，未完善
{
	echo "<img hidden/><h3>您还未登录，无法上传图片！";
	echo "<p style='line-height:48px'><a href='../login.php?dump=upload'>点此登录</h3></p>";
	exit;
}

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$path = "../images/";
	$name = $_FILES['photoimg']['name'];
	$size = $_FILES['photoimg']['size'];
	$tmp = $_FILES['photoimg']['tmp_name'];
	$imgsize= getimagesize($tmp);
	$type = $imgsize[2];
	$time=date("Y年m月d日H:i:s");
	
	if(empty($name)){
		echo '请选择要上传的图片';
		exit;
	}
	switch($type){
		case 1:
			$ext='gif';
			break;
		case 2:
			$ext='jpg';
			break;
		case 3:
			$ext='png';
			break;
		default:
			echo '图片格式错误！请不要尝试上传任何非法文件！';
			exit;
	}
	if($size>(5*1024*1024)){
		echo '图片大小不能超过5M';
		exit;
	}

	$w=$imgsize[0];									//图像宽
	$h=$imgsize[1];
	$image_name = time().rand(100,999).".".$ext;				//存储目录及名称

	$poster_ip=$_SERVER['REMOTE_ADDR'];							//找到ip	

	$user=$_COOKIE['user'];										//从数据库member读出poster_id
	$sql="select id from $table_members where name='$user'";
	$res=mysql_query($sql,$link) or die(mysql_error());;
	$row=mysql_fetch_array($res);
	$poster_id=$row[0];

	if(move_uploaded_file($tmp, $path.$image_name)){
		$sql="insert into $table_posts(poster_id,pic_name,width,height,poster_name,poster_ip,url,post_time)values('$poster_id','$name','$w','$h','$user','$poster_ip','$image_name','$time')";
		mysql_query($sql,$link) or die(mysql_error());
		if($w>930){
			echo "<div class='preview' style='position:relative;width:930px;height:".$h*930/$w."px'>";
			echo "<img src='$path$image_name' style='width:930px'>";
		}else{
			echo "<div class='preview' style='position:relative;width:{$w}px;height:{$h}px'>";
			echo "<img src='$path$image_name' style='width:{$w}px'>";
		}
		echo "<a href='' style='position:absolute;bottom:15px;right:15px;display:inline-block;width:20px;height:20px;background:url(../pic/del.png)'
		onclick='\$.post(\"../deleteimage.php\",{imagename:\"".$image_name."\"});'></a>";
		echo "</div>";
	}else{
		echo '上传出错了！';
	}
	exit;
}
exit;

?>