<?php   //session _start();
echo "<meta charset='utf-8'/>";
if($session_adminid<>session_id()) {
	header("Location:form_login.php"); exit();
}
$id_del=$_GET[id_del];
include "connect.php";
$sql="delete  from pro_type where type_id='$id_del'";
$result=mysql_db_query("$dbname","$sql");
if($result) {	echo "<h3> ลบประเภทสินค้าเรียบร้อยแล้ว </h3>";
		echo "[ <a href=admin_type.php>กลับเมนูหลัก</a> ] ";
	}
else {		echo "<h3> Error  : ไม่สามารถลบประเภทสินค้าได้ </h3>";
       }
mysql_close();
?>
