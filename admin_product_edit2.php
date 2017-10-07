<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
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
		if($result) {
				include 'admin_product_edit.php';
				echo "<div class='alert alert-success alert-dismissable fade in' align='center'>
				    <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				    <strong>Success!</strong> เเก้ไขสินค้าเรียบร้อย
						<a href=admin_product.php>กลับหน้าหลัก</a>
				  </div>";
		} else {
			echo "<div class='alert alert-danger alert-dismissable fade in' align='center'>
					<a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<strong>Error!</strong> เพิ่มสินค้าผิดพลาด
					<a href=admin_product_edit.php>กลับ</a>
				</div>";
		}
		mysql_close();
		?>
	</body>
</html>
