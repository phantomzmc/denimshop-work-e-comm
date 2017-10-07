<?php  //session_start();
// if($session_adminid<>session_id()) {
// 	header("Location : admin.php"); exit();
// }
include "connect.php";
$sql="select * from product order by pro_id desc";
$result=mysql_db_query($dbname,$sql);
$number=mysql_num_rows($result);
$no=1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>ร้านค้าออนไลน์ส่วนผู้ดูแลระบบ</title>
</head>
<body>
<? include "admin_menu.php";
	if($number<>0) {
	echo "
	<br><h1 align='center'>สินค้าทั้งหมด</h1><br>
	<table class='table table-hover'>
	<tr bgcolor=#E8E8E8>
	<td><center><b>ลำดับ</b></center></td>
	<td ><center><b> รหัสสินค้า</b></center></td>
	<td> <center><b> รูปภาพ </b></center></td>
	<td><center><b> ชื่อสินค้า</b></center></td>
	<td ><center><b> ประเภทสินค้า</b></center></td>
	<td ><center><b> ราคาสินค้า</b></center></td>
	<td ><center><b> [แก้ไข]</b></center></td>
	<td ><center><b> [ลบ]</b></center></td>
</tr>";
while($rs=mysql_fetch_array($result)) {
	$id_pro=$rs['pro_id'];
	$code_pro=sprintf("%05d",$id_pro);
	$name_pro=$rs['pro_name'];
	$ref_id_type=$rs['type_id'];
	$price_pro=$rs['pro_price'];
	$photo_pro=$rs['pro_photo'];
	$sql2="select type_name from pro_type where type_id='$ref_id_type'";
	$result2=mysql_db_query($dbname,$sql2);
	$rs2=mysql_fetch_array($result2);
	$name_type=$rs2['type_name'];
echo "
<tr align='center'>
<td><center>$no</center></td>
	<td>$code_pro</td>
	<td><img src='imgProduct/$photo_pro' width='200' height='200'>
		</td>
	<td>$name_pro</td>
	<td>$name_type</td>
	<td>$price_pro</td>
	<td><a href= 'admin_product_edit.php?id_edit=$id_pro' class='btn btn-warning'> แก้ไข </a></td>
	<td><a href= 'admin_product_delete.php?id_del=$id_pro' class='btn btn-danger' > ลบ </a></td>
</tr> ";
$no++;
}
echo "</table>";
mysql_close();
}
?>
</body>
</html>
