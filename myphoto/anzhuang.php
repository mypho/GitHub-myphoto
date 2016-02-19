<?php
	error_reporting(0);
	echo "<html>";
	echo "<head>";
	echo "<title>安装程序</title>";
	echo "</head>";
	echo "<body>";
	echo "<style>";
	echo "* {
	padding: 0;
	margin: 0;
	}
	body {
		font-family: verdana, sans-serif;
		font-size: 10pt;
		background-color: #FFFFEE;
		padding: 25px 0px 25px 0px;
	}
	a:link, a:active, a:visited {
		color: #336699;
		text-decoration: underline;
	}
	a:hover {
		color: #7F0000 !important;
		text-decoration: none;
	}
	select option {
		padding-right: 3px;
	}
	#content {
		padding: 0px 25px 10px 25px;
	}
	p, table, h2, h3, ul, ol, dl {
		margin: 0px 0px 15px 0px;
	}
	p.important {
		background-color: #EFDFBF;
		padding: 10px;
		font-size: 8pt;
	}
	p#submit, p#submit input {
		text-align: center;
		font-weight: bold;
	}
	p#submit input {
		padding: 5px;
	}
	h2 {
		color: #336699;
		font-weight: normal;
		font-size: 14pt;
		border-bottom: 1px solid silver;
	}
	h3 {
		color: #333;
		font-weight: bold;
		font-size: 10pt;
	}
	ul, ol {
		margin-left: 35px;
	}
	dl dt {
		font-weight: bold;
		color: #333;
	}
	dl dd {
		margin-left: 35px;
		margin-bottom: 5px;
	}
	table {
		background-color:#000000;
		border-collapse: collapse;
		margin-left: 0;
		margin-right: 0;
	}
	table th, table td {
		padding: 5px;
	}
	td {
		background-color:#cccc99;
	}
	table th {
		text-align: left;
		color: #336699;
	}
	table td.title {
		width: 135px;
	}";
		echo "</style>";
	if(!$_POST['admin'])						//如果没有默认参数显示HTML
	{
		echo "<script language=\"javascript\">";
		echo "function juge(theForm)";
		echo "{";
		echo "if (theForm.admin.value == \"\")";
		echo "{";
		echo "alert(\"请输入管理员名称！\");";
		echo "theForm.admin.focus();";
		echo "return (false);";
		echo "}";
		echo "if (theForm.pass.value == \"\")";
		echo "{";
		echo "alert(\"请输入管理员密码！\");";
		echo "theForm.pass.focus();";
		echo "return (false);";
		echo "}";
		echo "if (theForm.pass.value.length < 8 )";
		echo "{";
		echo "alert(\"密码至少要8位！\");";
		echo "theForm.pass.focus();";
		echo "return (false);";
		echo "}";
		echo "if (theForm.re_pass.value !=theForm.pass.value)";
		echo "{";
		echo "alert(\"确认密码与密码不一致！\");";
		echo "theForm.re_pass.focus();";
		echo "return (false);";
		echo "}";
		echo "if (theForm.nickname.value == \"\")";
		echo "{";
		echo "alert(\"请输入昵称！\");";
		echo "theForm.nickname.focus();";
		echo "return (false);";
		echo "}";
		
		echo "}";
		echo "</script>";
		echo "<center>";
		echo "<table width=\"80%\" cellpadding=\"1\" cellspacing=\"1\">";
		echo "<form method=\"post\" action=\"$PATH_INFO\" onsubmit=\"return juge(this)\">";
		echo "<tr>";
		echo "<td colspan=\"2\" align=\"center\"><font size=\"5px\">安装myphoto</font></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>host域名</td>";
		echo "<td><input type=\"text\" name=\"host\" value=\"127.0.0.1\"></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<tr>";
		echo "<td>mysql用户名</td>";
		echo "<td><input type=\"text\" name=\"mysqluser\" value=\"root\" ></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<tr>";
		echo "<td>mysql密码</td>";
		echo "<td><input type=\"password\" name=\"mysqlpw\"></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>创建的数据库名</td>";
		echo "<td><input type=\"text\" name=\"db_name\" value=\"test1\"></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>myphoto管理员账号：</td>";
		echo "<td><input type=\"text\" name=\"admin\"></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>管理员密码：（不小于8位）</td>";
		echo "<td><input type=\"password\" name=\"pass\" size=\"21\"></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>确认密码：</td>";
		echo "<td><input type=\"password\" name=\"re_pass\" size=\"21\"></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>管理员E-mail：（可选）</td>";
		echo "<td><input type=\"text\" name=\"email\"></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>管理员昵称：（前台显示）</td>";
		echo "<td><input type=\"text\" name=\"nickname\"></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td colspan=\"2\"><center>";
		echo "<input type=\"submit\" value=\"下一步\">";
		echo "<input type=\"reset\" value=\"重新填\">";
		echo "</center></td>";
		echo "</tr>";
		echo "</form>";
		echo "</table>";
		echo "</center>";
		echo "</body>";
		echo "<html>";
	}
	else									//如果有POST参数执行操作
	{
		$name=$_POST['admin'];				//获得参数
		$password=md5($_POST['pass']);		//获得密码，并使用MD5进行加密操作
		$nickname=$_POST['nickname'];
		$email=$_POST['email'];
		$host=$_POST['host'];
		$mysqluser=$_POST['mysqluser'];
		$mysqlpw=$_POST['mysqlpw'];
		$db_name=$_POST['db_name'];
		$ip=$_SERVER['REMOTE_ADDR'];
		$table_members="bbs_members";
		$table_posts="bbs_posts";
		$time=date("Y-m-d");
		$time2=date("G：i：s");
		$link=mysql_connect($host,$mysqluser,$mysqlpw) or die('mysql连接错误：'.mysql_error());
		mysql_query("CREATE DATABASE $db_name",$link);
		mysql_select_db($db_name,$link) or die('数据库错误'.mysql_error());
		$fp=fopen("mysqlkey.php","w+");				//据写入配置文件
		fputs($fp,"<?php\n");
		fputs($fp,"\$db_host=\"$host\";\n");
		fputs($fp,"\$db_user=\"$mysqluser\";\n");
		fputs($fp,"\$db_pass=\"$mysqlpw\";\n");
		fputs($fp,"\$db_name=\"$db_name\";\n");
		fputs($fp,"\$table_members=\"bbs_members\";\n");
		fputs($fp,"\$table_posts=\"bbs_posts\";\n");
		fputs($fp,"\$link=mysql_connect(\$db_host,\$db_user,\$db_pass);\n");
		fputs($fp,"mysql_select_db(\$db_name,\$link);\n");
		fputs($fp,"?>");
		fclose($fp);
		
		
		$sql="create table $table_members(
		id int(5) not null auto_increment primary key,
		name varchar(18) not null,
		password varchar(40) not null,
		nickname varchar(18) not null,
		sex enum('boy','girl') not null default 'boy',
		email varchar(80) not null,
		photo varchar(80) not null default 'default.jpg',
		q_name varchar(200) not null default '',
		post_num int(5) not null default 0,
		reg_date varchar(20) not null,
		admin int(1) not null default '0'
		)";
		mysql_query($sql,$link) or die(mysql_error());	//发送创建member表的SQL请求
		$sql="create table $table_posts(
		id int(5) not null auto_increment primary key,
		keywords varchar(100) not null default '#',
		url varchar(50) not null,
		pic_name varchar(256),
		width int(5) not null default 360,
		height int(5) not null default 360,
		poster_id int(5) not null default 1,
		poster_name varchar(36) not null,
		poster_ip varchar(23) not null,
		title varchar(40) not null default '#',
		content text not null,
		download_count int(5) not null default 0,
		post_time varchar(30) not null
		)";
		mysql_query($sql,$link) or die(mysql_error());	//发送创建posts表的SQL请求
		  
	
		
	
		
		$sql="insert into $table_members(name,password,nickname,email,post_num,reg_date,admin)values('$name','$password','$nickname','$email','1','$time','3')";
		mysql_query($sql,$link) or die(mysql_error());	//发送添加管理员信息的SQL请求
		echo "<center>";
		echo "<table width=\"80%\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\" bgcolor=\"#000000\">";
		echo "<tr bgcolor=\"#cccc99\">";
		echo "<td align=\"center\"><font size=\"5px\">安装myphoto</font></td>";
		echo "</tr>";
		echo "<tr  bgcolor=\"#cccc99\">";
		echo "<td align=\"center\"><font size=\"3px\">成功安装！</font></td>";
		echo "</tr>";
		echo "<tr bgcolor=\"#cccc99\">";
		echo "<td align=\"center\"><font size=\"3px\">删除该文件，以减少潜在危险！</font></td>";
		echo "</tr>";
		echo "</table>";
		echo "</center>";
		echo "</body>";
		echo "</html>";
	}
?>