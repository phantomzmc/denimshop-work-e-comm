<?php	//session _start();
if($session_adminid<>session_id()) {
	header("Location : admin.php"); exit();
}
$id_del=$_GET[id_del];
$photo_del=$_GET[photo_del];
include "connect.php";
$sql="delete from product where pro_id='$id_del' ";
$result=mysql_db_query($dbname,$sql);
if($photo_del<>"") {
	$photo_del="imgProduct/".$photo_del;
		if(file_exists($photo_del)) {   	unlink($photo_del);   	}
}
if($result) {   	echo "<h3>ลบสินค้าเรียบร้อยแล้ว</h3>";
		echo "[<a href=admin_product.php>กลับหน้าหลัก</a> ] ";
}   else {   echo "<h3>Error : ไม่สามารถลบรายการสินค้าได้</h3>";
}
mysql_close();   ?>
