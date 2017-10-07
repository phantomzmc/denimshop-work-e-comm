<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php   //session _start();
		if($session_adminid<>session_id()) {
			header("Location:form_login.php"); exit();
		}
		$id_del=$_GET[id_del];
		include "connect.php";
		$sql="delete  from pro_type where type_id='$id_del'";
		$result=mysql_db_query("$dbname","$sql");
		if($result) {
			include 'admin_product.php';
			echo "<div class='alert alert-success alert-dismissable fade in' align='center'>
					<a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<strong>Success!</strong> ลบรายการสินค้าเรียบร้อย
					<a href=admin_product.php>กลับหน้าหลัก</a>
				</div>";
			}
		else {
			echo "<div class='alert alert-danger alert-dismissable fade in' align='center'>
					<a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<strong>Error!</strong> ลบรายการสินค้าผิดพลาด
					<a href=admin_product.php>กลับ</a>
				</div>";
		  }
		mysql_close();
		?>
	</body>
</html>
