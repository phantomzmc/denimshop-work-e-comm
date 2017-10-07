<<<<<<< HEAD
<?php   //session _start();
if($session_adminid<>session_id()) {
	header("Location : admin.php"); exit();
}
$name=$_POST[name];
$ref_id_type=$_POST[ref_id_type];
$detail=$_POST[detail];
$price=$_POST[price];
=======
<?php
	//session_start();
if($session_adminid<>session_id()) {
	header("Location : admin.php"); exit();
}
$name=$_POST['name'];
$ref_id_type=$_POST['ref_id_type'];
$detail=$_POST['detail'];
$price=$_POST['price'];
>>>>>>> admin
$file_pic=$_FILES['file_pic']['tmp_name'];
$file_pic_name=$_FILES['file_pic']['name'];
$file_pic_size=$_FILES['file_pic']['size'];
$file_pic_type=$_FILES['file_pic']['type'];
<<<<<<< HEAD
=======

echo "filepic",$file_pic,"xxx",$file_pic_name;

>>>>>>> admin
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
<<<<<<< HEAD
include "../connect.php";
$sql="insert into  product values(null,'$name','$ref_id_type','$detail','$price',' ')";
$result=mysql_db_query($dbname,$sql);
if($file_pic) {	$array_last=explode(".",$file_pic_name);
=======
include "connect.php";
$sql="insert into  product values(null,'$name','$ref_id_type','$detail','$price','')";
$result=mysql_db_query($dbname,$sql);
if($file_pic) {
		$array_last=explode(".",$file_pic_name);
>>>>>>> admin
		$c=count($array_last) -1;
		$lastname=strtolower($array_last[$c]);
		if ($lastname=="gif" or $lastname=="jpg" or $lastname=="jpeg") {
			$sql2="select max(pro_id) from product";
			$result2=mysql_db_query($dbname,$sql2);
<<<<<<< HEAD
			$row=mysql_fetch_row($result2);
			$photoname=$row[0].".".$lastname;
			copy($file_pic,"imgProduct/".$photoname);
			$sql3="update product  set  pro_photo='$photoname'  where  pro_id='$row[0]' ";
=======
			$row=mysql_fetch_array($result2);
			$photoname=$row[0].".".$lastname;
			copy($file_pic,"imgProduct/".$photoname);
			$sql3="update product set pro_photo='$photoname'  where  pro_id='$row[0]' ";
>>>>>>> admin
			$result3=mysql_db_query($dbname,$sql3);
		}
		unlink($file_pic);
}
<<<<<<< HEAD
include '../admin_menu.php';
echo "<h3>เพิ่มรายการสินค้าเรียบร้อยแล้ว</h3>";
echo "<a href=../admin_product.php>กลับหน้าหลัก</a> ";
=======
include 'admin_product_add.php';
echo "<div class='alert alert-success alert-dismissable fade in' align='center'>
    <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Success!</strong> เพิ่มสินค้าเรียบร้อย
		<a href=admin_product.php>กลับหน้าหลัก</a>
  </div>";
>>>>>>> admin
mysql_close();
?>
