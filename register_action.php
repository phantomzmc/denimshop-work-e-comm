<?php
	//session_start();

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$uu=$_POST['uu'];
$pp=$_POST['pp'];
$email=$_POST['email'];


if($firstname=="") {
		echo "<h3>error : กรุณาป้อนชื่อ </h3>";
		exit();
}   else if($lastname=="") {
		echo "<h3>error : กรุณาป้อนนามสกุล</h3>";
		exit();
}   else if($uu=="") {
		echo "<h3>error : กรุณาป้อน Username</h3>";
		exit();
}   else if($pp=="") {
		echo "<h3>error : กรุณาป้อน password</h3>";
		exit();
} elseif ($email = "") {
    echo "<h3>error : กรุณากรอก Email</h3>";
    exit();
}
include "connect.php";
$sql="insert into user_2 values(null,'$firstname','$lastname','$uu','$pp','$email')";
$result=mysql_db_query($dbname,$sql);
include 'register.php';
echo "<div class='alert alert-success alert-dismissable fade in' align='center'>
    <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Success!</strong> ลงทะเบียนเรียบร้อย
		<a href=admin_product.php>กลับหน้าหลัก</a>
  </div>";

mysql_close();
?>
