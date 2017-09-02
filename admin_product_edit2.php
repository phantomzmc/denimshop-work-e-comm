<?php  //session_start();
if($session_adminid<>session_id()) {
	header("Location : login.php"); exit();
}
$id_edit=$_POST['id_edit'];
$name=$_POST['name'];
$ref_id_type=$_POST['ref_id_type'];
$detail=$_POST['detail'];
$price=$_POST['price'];
include "connect.php";
$sql="update product set pro_name='$name',type_id='$ref_id_type',pro_detail='$detail',pro_price='$price' where pro_id='$id_edit' ";
$result=mysql_db_query($dbname,$sql);
if($result) {   	echo "<h3>แก้ไขรายการสินค้าเรียบร้อยแล้ว</h3>";
		echo "[<a href=admin_product.php>กลับหน้าหลัก</a> ] ";
} else {		echo "<h3>Error :ไม่สามารถแก้ไขรายการสินค้าได้</h3>";
}
mysql_close();
?>
