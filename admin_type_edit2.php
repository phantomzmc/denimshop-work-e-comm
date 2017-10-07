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
	echo "<div class='alert alert-success alert-dismissable fade in' align='center'>
	    <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	    <strong>Success!</strong> เพิ่มประเภทสินค้าเรียบร้อย
			<a href=admin_product.php>กลับหน้าหลัก</a>
	  </div>";
} else {
	echo "<div class='alert alert-danger alert-dismissable fade in' align='center'>
	    <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	    <strong>Error!</strong> เพิ่มประเภทสินค้าผิดพลาด
			<a href=admin_product.php>กลับหน้าหลัก</a>
	  </div>";
}
mysql_close();
?>
