<?php
$host="localhost";
$username="root";
$password="";
$dbname="ecomdb";
$cc=mysql_connect($host,$username,$password);
mysql_select_db("$dbname")or die("cannot select DB");
mysql_query("SET NAMES UTF-8");
mysql_query("SET character_set_results=UTF-8");
mysql_query("SET character_set_client=UTF-8");
mysql_query("SET character_set_connection=UTF-8");
if(!$cc) {
	echo "<h3> Error :: ไม่สามารถเชื่อมต่อฐานข้อมูลได้ </h3>";
	exit();
}
?>
