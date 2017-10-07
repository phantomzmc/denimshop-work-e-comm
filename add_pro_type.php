<?php   //session _start();
echo "<meta charset='utf-8'/>";
if($session_adminid<>session_id()) {
	header("Location : form_login.php"); exit();
}
$name=$_POST[typename];
if($name=="") {
	echo "<h3>กรุณากรอกชื่อประเภทสินค้า </h3>";   		exit();
}
include "connect.php";
$sql="insert into  pro_type  values(null,'$name')";
$result=mysql_db_query("$dbname","$sql");
if($result) {
	include 'admin_type.php';
	echo "<h3>เพิ่มประเภทสินค้าเรียบร้อยแล้ว </h3>";
	echo "<a href=admin_type.php>กลับเมนูหลัก</a>";
}
else {
	echo "<h3>error : ไม่สามารถเพิ่มประเภทสินค้าได้ </h3>".mysql_error();
}
mysql_close();
?>
