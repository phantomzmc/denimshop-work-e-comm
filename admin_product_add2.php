<?php   //session _start();
if($session_adminid<>session_id()) {
	header("Location : admin.php"); exit();
}
$name=$_POST[name];
$ref_id_type=$_POST[ref_id_type];
$detail=$_POST[detail];
$price=$_POST[price];
$file_pic=$_FILES['file_pic']['tmp_name'];
$file_pic_name=$_FILES['file_pic']['name'];
$file_pic_size=$_FILES['file_pic']['size'];
$file_pic_type=$_FILES['file_pic']['type'];
if($name=="") {
		echo "<h3>error : กรุณาป้อนชื่อสินค้า </h3>";
		exit();
}   else if($ref_id_type=="0") {
		echo "<h3>error : กรุณาเลือกประเภทสินค้า</h3>";
		exit();
}   else if($detail=="") {
		echo "<h3>error : กรุณาป้อนรายละเอียดสินค้า</h3>";
		exit();
}   else if($price=="") {
		echo "<h3>error : กรุณาป้อนราคาสินค้า</h3>";
		exit();
}
include "../connect.php";
$sql="insert into  product values(null,'$name','$ref_id_type','$detail','$price',' ')";
$result=mysql_db_query($dbname,$sql);
if($file_pic) {	$array_last=explode(".",$file_pic_name);
		$c=count($array_last) -1;
		$lastname=strtolower($array_last[$c]);
		if ($lastname=="gif" or $lastname=="jpg" or $lastname=="jpeg") {
			$sql2="select max(pro_id) from product";
			$result2=mysql_db_query($dbname,$sql2);
			$row=mysql_fetch_row($result2);
			$photoname=$row[0].".".$lastname;
			copy($file_pic,"imgProduct/".$photoname);
			$sql3="update product  set  pro_photo='$photoname'  where  pro_id='$row[0]' ";
			$result3=mysql_db_query($dbname,$sql3);
		}
		unlink($file_pic);
}
include '../admin_menu.php';
echo "<h3>เพิ่มรายการสินค้าเรียบร้อยแล้ว</h3>";
echo "<a href=../admin_product.php>กลับหน้าหลัก</a> ";
mysql_close();
?>
