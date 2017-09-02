<?php  //session _start();
echo "<meta charset='utf-8'/>";
if($session_adminid<>session_id()) {
	header("Location : form_login.php"); exit();
}
$id_edit=$_POST[id_edit];
$name=$_POST[name];
include "../connect.php";
$sql="update pro_type set  type_name='$name' where type_id='$id_edit' ";
$result=mysql_db_query($dbname,$sql);
if($result) {
	echo "<h3>แก้ไขประเภทสินค้าเรียบร้อยแล้ว</h3>";
	echo "[ <a href=admin_type.php>กลับเมนูหลัก</a> ] ";
} else {
	echo "<h3> Error  : ไม่สามารถแก้ไขประเภทสินค้าได้ </h3>";
}
mysql_close();
?>
